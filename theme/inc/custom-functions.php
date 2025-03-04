<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Atomic_Web_Space
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

add_action( 'after_switch_theme', 'aws_create_default_pages' );

function aws_create_default_pages() {
    $pages = [
        'Home' => '',
        'Blog' => ''       
    ];
    
    foreach ( $pages as $title => $content ) {
        // Check if the page already exists
        $existing_page = get_page_by_title( $title );
        
        if ( ! $existing_page ) {
            $page_id = wp_insert_post(
                array(
                    'post_title'   => $title,
                    'post_content' => $content,
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                )
            );
            
            if ( ! is_wp_error( $page_id ) ) {
                // Set Home page as the front page
                if ( $title === 'Home' ) {
                    update_option( 'page_on_front', $page_id );
                    update_option( 'show_on_front', 'page' );
                }
                
                // Set Blog page as the posts page
                if ( $title === 'Blog' ) {
                    update_option( 'page_for_posts', $page_id );
                }
            }
        }
    }
}
/**
 * Create essential pages upon theme activation.
 *
 * This function creates several essential pages (such as Coming Soon, etc.)
 * for the theme. The function checks if each page already exists based on the slug and
 * if it does not, the page is created and associated with the appropriate template.
 */
function aws_create_pages() {
	// Pages to create
	$pages = array(
		array(
			'title'    => 'Coming Soon',
			'slug'     => 'coming-soon',
			'template' => 'page-templates/page-coming-soon.php',
		),
		array(
			'title'    => 'Contact',
			'slug'     => 'contact',
			'template' => 'page-templates/page-contact.php',
		),
		array(
			'title'    => 'About',
			'slug'     => 'about',
			'template' => 'page-templates/page-about.php',
		)
	);

	// Loop through each page and create if it doesn't exist
	foreach ( $pages as $page ) {
		$page_exists = get_page_by_path( $page['slug'] );

		if ( ! $page_exists ) {
			$new_page = array(
				'post_title'   => $page['title'],
				'post_content' => '',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_name'    => $page['slug'],
			);

			$page_id = wp_insert_post( $new_page );

			if ( $page_id && ! is_wp_error( $page_id ) ) {
				update_post_meta( $page_id, '_wp_page_template', $page['template'] );
			}
		}
	}
}

add_action( 'after_switch_theme', 'aws_create_pages' );

// Add Metabox to Post Editor
function add_featured_post_meta_box() {
    add_meta_box(
        'featured_post',           // ID
        'Featured Post',          // Title
        'featured_post_callback', // Callback function
        'post',                   // Post type
        'side',                   // Context (sidebar)
        'high'                    // Priority
    );
}
add_action('add_meta_boxes', 'add_featured_post_meta_box');

// Metabox Callback (Checkbox in Editor)
function featured_post_callback($post) {
    $is_featured = get_post_meta($post->ID, 'is_featured', true);
    wp_nonce_field('featured_post_nonce_action', 'featured_post_nonce'); // Security
    ?>
<label class="flex items-center space-x-2">
    <input type="checkbox" name="is_featured" value="1" <?php checked($is_featured, '1'); ?>
        class="form-checkbox h-5 w-5 text-blue-600">
    <span>Mark as Featured</span>
</label>
<p class="description text-gray-500 text-sm mt-2">
    Check this to feature this post in the Featured Articles section.
</p>
<?php
}

// Save Metabox Data
function save_featured_post_meta($post_id) {
    // Verify nonce for security
    if (!isset($_POST['featured_post_nonce']) || !wp_verify_nonce($_POST['featured_post_nonce'], 'featured_post_nonce_action')) {
        return;
    }

    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save or delete the featured status
    if (isset($_POST['is_featured']) && $_POST['is_featured'] == '1') {
        update_post_meta($post_id, 'is_featured', '1');
    } else {
        delete_post_meta($post_id, 'is_featured');
    }
}
add_action('save_post', 'save_featured_post_meta');

// Add Star Column to Posts List
function add_featured_column($columns) {
    $columns['featured'] = '<span title="Featured Post" class="dashicons dashicons-star-filled text-yellow-400"></span>';
    return $columns;
}
add_filter('manage_post_posts_columns', 'add_featured_column');

// Display Star in Posts List and Make it Clickable
function display_featured_column($column, $post_id) {
    if ($column === 'featured') {
        $is_featured = get_post_meta($post_id, 'is_featured', true);
        $star_class = $is_featured ? 'dashicons-star-filled text-yellow-400' : 'dashicons-star-empty text-gray-400';
        $nonce = wp_create_nonce('toggle_featured_' . $post_id);
        ?>
<span class="dashicons <?php echo $star_class; ?> cursor-pointer text-xl" data-post-id="<?php echo $post_id; ?>"
    data-nonce="<?php echo $nonce; ?>"
    onclick="toggleFeatured(this, <?php echo $post_id; ?>, '<?php echo $nonce; ?>')"></span>
<?php
    }
}
add_action('manage_post_posts_custom_column', 'display_featured_column', 10, 2);

// AJAX Handler for Toggling Featured Status
function toggle_featured_post() {
    check_ajax_referer('toggle_featured_' . $_POST['post_id'], 'nonce');

    $post_id = intval($_POST['post_id']);
    if (!current_user_can('edit_post', $post_id)) {
        wp_send_json_error('Permission denied');
    }

    $is_featured = get_post_meta($post_id, 'is_featured', true);
    if ($is_featured) {
        delete_post_meta($post_id, 'is_featured');
        wp_send_json_success(['is_featured' => false]);
    } else {
        update_post_meta($post_id, 'is_featured', '1');
        wp_send_json_success(['is_featured' => true]);
    }
}
add_action('wp_ajax_toggle_featured', 'toggle_featured_post');


// Enqueue Admin Scripts for AJAX Toggle
function enqueue_admin_scripts($hook) {
    if ($hook !== 'edit.php') {
        return;
    }
    wp_enqueue_script('featured-toggle', get_template_directory_uri() . '/assets/js/custom-js.js', ['jquery'], '1.0', true);
    wp_localize_script('featured-toggle', 'featuredToggle', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');