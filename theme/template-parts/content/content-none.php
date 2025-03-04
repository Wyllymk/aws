<?php
/**
 * Template part for displaying a message when posts are not found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atomic_Web_Space
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<section>

    <header class="page-header">
        <?php if ( is_search() ) : ?>

        <h1 class="page-title">
            <?php
				printf(
					/* translators: 1: search result title. 2: search term. */
					'<h1 class="page-title">%1$s <span>%2$s</span></h1>',
					esc_html__( 'Search results for:', 'atomic-web-space' ),
					get_search_query()
				);
			?>
        </h1>

        <?php else : ?>

        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'atomic-web-space' ); ?></h1>

        <?php endif; ?>
    </header><!-- .page-header -->

    <div <?php atomic_web_space_content_class( 'page-content' ); ?>>
        <?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>

        <p>
            <?php esc_html_e( 'Your site is set to show the most recent posts on your homepage, but you haven&rsquo;t published any posts.', 'atomic-web-space' ); ?>
        </p>

        <p>
            <a href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>">
                <?php
					/* translators: 1: link to WP admin new post page. */
					esc_html_e( 'Add or publish posts', 'atomic-web-space' );
				?>
            </a>
        </p>

        <?php
		elseif ( is_search() ) :
			?>

        <p>
            <?php esc_html_e( 'Your search generated no results. Please try a different search.', 'atomic-web-space' ); ?>
        </p>

        <?php
			get_search_form();
		else :
			?>

        <p>
            <?php esc_html_e( 'No content matched your request.', 'atomic-web-space' ); ?>
        </p>

        <?php
			get_search_form();
		endif;
		?>
    </div><!-- .page-content -->

</section>