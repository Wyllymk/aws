<?php
/**
 * The template for displaying Front Page
 *
 * This is the template that displays front page by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atomic_Web_Space
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

get_header();
?>
<div class="relative flex min-h-screen flex-col justify-between bg-gray-100 text-black">
    <main class="size-full">

        <!-- Sidebar Navigation -->
        <div id="navMenu"
            class="bg-black fixed top-0 z-51 h-full w-60 -translate-x-full transform p-4 shadow-lg transition-all duration-300 ease-in-out pointer-events-none md:hidden">
            <!-- Overlay (darkens the image) -->
            <div class="absolute z-52 bg-black"></div>
            <!-- Your navigation items here -->
            <?php get_template_part( 'template-parts/content/content', 'aside' ); ?>
        </div>

        <!-- Overlay for Sidebar -->
        <div id="overlay" class="fixed inset-0 z-50 hidden h-screen bg-black/90"></div>

        <div class="font-sans text-gray-800">

            <!-- Hero Section -->
            <section class="relative bg-gray-900 overflow-hidden">
                <!-- Background Effects -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-gray-900 to-purple-900">
                    <div class="absolute inset-0 opacity-20">
                        <div
                            class="w-full h-full bg-[url('https://www.transparenttextures.com/patterns/circuit-pattern.png')]">
                        </div>
                    </div>
                </div>
                <?php
                    $featured_posts = new WP_Query([
                        'posts_per_page' => 1,
                        'meta_key' => 'is_featured', // Custom field to mark featured posts
                        'meta_value' => '1',         // Value indicating "featured"
                        'post_status' => 'publish',
                    ]);

                    if ($featured_posts->have_posts()) :
                        while ($featured_posts->have_posts()) : $featured_posts->the_post();
                ?>
                <!-- Content Container -->
                <div class="relative container mx-auto px-4 py-16 md:py-24 max-w-7xl z-10">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <!-- Text Content -->
                        <div class="text-white space-y-6 md:space-y-8">
                            <div class="flex items-center space-x-3">
                                <span
                                    class="inline-block px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-sm font-medium">
                                    <?php esc_html_e( 'Featured Post', 'atomic-web-space' ); ?>
                                </span>
                                <span class="text-gray-400 text-sm">
                                    <?php echo get_the_date(); ?>
                                </span>
                            </div>

                            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                                <a href="<?php the_permalink(); ?>" class="hover:text-blue-400 transition duration-200">
                                    <?php the_title(); ?>
                                </a>
                            </h1>

                            <p class="text-gray-300 text-base md:text-lg lg:text-xl max-w-xl">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>

                            <div class="md:flex flex-col sm:flex-row gap-4 hidden">
                                <a href="<?php the_permalink(); ?>"
                                    class="inline-block px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg text-white font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1">
                                    <?php esc_html_e( 'Read Article', 'atomic-web-space' ); ?>
                                </a>
                                <a href="<?php echo esc_url( site_url( '/blog/' ) ); ?>"
                                    class="inline-block px-8 py-3 text-gray-300 font-semibold text-lg hover:text-white transition-colors duration-300">
                                    <?php esc_html_e( 'All Posts →', 'atomic-web-space' ); ?>
                                </a>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <div class="relative md:mt-8 lg:mt-0">
                            <div
                                class="relative w-full h-64 sm:h-72 md:h-96 lg:h-[28rem] rounded-xl overflow-hidden shadow-2xl transform hover:scale-105 transition-transform duration-300">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/img/placeholder.webp'); ?>"
                                    alt="<?php the_title(); ?>" class="w-full h-full object-cover">
                                <!-- Image Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent"></div>
                                <!-- Category Tag -->
                                <?php 
                                    $categories = get_the_category();
                                    if (!empty($categories)) :
                                ?>
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-sm font-medium">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </span>
                                </div>
                                <?php endif; ?>
                            </div>
                            <!-- Tech Decorative Elements -->
                            <div
                                class="absolute -bottom-4 -right-4 w-24 h-24 bg-blue-500/10 rounded-full blur-3xl animate-pulse">
                            </div>
                            <div
                                class="absolute -top-4 -left-4 w-16 h-16 bg-purple-500/10 rounded-full blur-2xl animate-pulse animation-delay-2000">
                            </div>

                        </div>
                        <div class="md:hidden flex-col sm:flex-row my-4 gap-4 flex">
                            <a href="<?php the_permalink(); ?>"
                                class="inline-block px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg text-white font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1">
                                <?php esc_html_e( 'Read Article', 'atomic-web-space' ); ?>
                            </a>
                            <a href="<?php echo esc_url( site_url( '/blog/' ) ); ?>"
                                class="inline-block px-8 py-3 text-gray-300 font-semibold text-lg hover:text-white transition-colors duration-300">
                                <?php esc_html_e( 'All Posts →', 'atomic-web-space' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                    endif; 
                ?>
            </section>

            <!-- Featured Articles Section -->
            <section class="relative bg-gray-800 py-16 overflow-hidden">
                <!-- Background Effects -->
                <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-blue-900/50 opacity-50">
                </div>
                <div
                    class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/circuit-pattern.png')]">
                </div>

                <!-- Content Container -->
                <div class="relative container mx-auto px-4 max-w-7xl z-10">
                    <h2 class="text-3xl sm:text-4xl font-bold text-center text-white mb-4">
                        <?php esc_html_e( 'Featured Articles', 'atomic-web-space' ); ?>
                    </h2>
                    <p class="text-gray-400 text-center max-w-2xl mx-auto mb-12 text-base md:text-lg">
                        <?php esc_html_e( 'Dive into our hand-picked posts offering deep insights into cutting-edge tech trends.', 'atomic-web-space' ); ?>
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" x-data="featuredArticles()"
                        x-init="initAnimations">
                        <!-- Dynamic Posts -->
                        <?php
                            $featured_posts = new WP_Query([
                                'posts_per_page' => 3,
                                'meta_key' => 'is_featured', // Custom field to mark featured posts
                                'meta_value' => '1',         // Value indicating "featured"
                                'post_status' => 'publish',
                            ]);

                            if ($featured_posts->have_posts()) :
                                while ($featured_posts->have_posts()) : $featured_posts->the_post();
                        ?>
                        <div class="group relative bg-gray-900 rounded-xl overflow-hidden shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl"
                            x-ref="featured-post-<?php the_ID(); ?>">
                            <a href="<?php the_permalink(); ?>" class="block relative overflow-hidden">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/img/placeholder.webp'); ?>"
                                    alt="<?php the_title(); ?>"
                                    class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                                <!-- Overlay Fixed -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent pointer-events-none">
                                </div>
                            </a>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-white mb-2">
                                    <a href="<?php the_permalink(); ?>"
                                        class="hover:text-blue-400 transition duration-200">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <p class="text-gray-400 text-sm mb-4">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                </p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <?php $author_id = get_the_author_meta('ID'); ?>
                                        <img src="<?php echo get_avatar_url($author_id, ['size' => 40]); ?>"
                                            alt="<?php the_author(); ?>"
                                            class="h-10 w-10 rounded-full mr-2 border border-gray-700">
                                        <div>
                                            <span class="block text-blue-400 font-medium"><?php the_author(); ?></span>
                                            <span
                                                class="block text-xs text-gray-500"><?php echo get_the_date(); ?></span>
                                        </div>
                                    </div>
                                    <?php 
                                        $categories = get_the_category();
                                        if (!empty($categories)) :
                                    ?>
                                    <span class="px-2 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Decorative Dot -->
                            <div
                                class="absolute top-2 right-2 w-3 h-3 bg-blue-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                        <p class="text-gray-400 text-center col-span-full">
                            <?php esc_html_e( 'No featured posts available.', 'atomic-web-space' ); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <!-- Trending Topics Section -->
            <section id="trending-topics" class="relative bg-gray-900 py-16 overflow-hidden">
                <!-- Background Effects -->
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-900/30 via-gray-900 to-purple-900/30"></div>
                <div
                    class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/circuit-pattern.png')]">
                </div>

                <!-- Content Container -->
                <div class="relative container mx-auto px-4 max-w-7xl z-10" x-data="trendingTopics()"
                    x-init="initAnimations">
                    <h2 class="text-3xl sm:text-4xl font-bold text-center text-white mb-4">
                        <?php esc_html_e('Trending Topics', 'atomic-web-space'); ?>
                    </h2>
                    <p class="text-gray-300 text-center max-w-2xl mx-auto mb-12 text-base md:text-lg">
                        <?php esc_html_e('Explore the hottest tech categories and their latest posts—jump in!', 'atomic-web-space'); ?>
                    </p>

                    <!-- Categories -->
                    <div class="flex flex-wrap justify-center gap-4 mb-12">
                        <?php
                        $categories = get_categories([
                            'hide_empty' => true, // Still hide categories with no posts
                            'number'     => 10    // Limit to 10 categories
                        ]);
                        $first = true;
                        foreach ($categories as $category) :
                        ?>
                        <button
                            class="trending-category cursor-pointer inline-block bg-gray-800 text-gray-200 py-2 px-5 rounded-full text-sm font-medium border border-gray-700/50 transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white hover:shadow-lg hover:border-transparent"
                            :class="{ 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg border-transparent': selectedCategory === '<?php echo $category->slug; ?>' }"
                            @click="selectCategory('<?php echo $category->slug; ?>')">
                            <?php echo esc_html($category->name); ?>
                        </button>
                        <?php
                            if ($first) {
                                $first_category_slug = $category->slug;
                                $first = false;
                            }
                        endforeach;
                        ?>
                    </div>

                    <!-- Posts Container -->
                    <div id="trending-posts-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php
                        $all_posts = new WP_Query([
                            'posts_per_page' => 6, // Load all posts upfront
                            'post_status' => 'publish',
                        ]);

                        if ($all_posts->have_posts()) :
                            while ($all_posts->have_posts()) : $all_posts->the_post();
                            $post_categories = wp_get_post_categories(get_the_ID(), ['fields' => 'slugs']);
                            $category_slugs = implode(' ', $post_categories); // Space-separated list of category slugs
                        ?>
                        <div class="trending-post-card bg-gray-800 rounded-xl overflow-hidden shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl"
                            data-categories="<?php echo esc_attr($category_slugs); ?>"
                            :class="{ 'hidden': !isVisible('<?php echo esc_attr($category_slugs); ?>') }">
                            <a href="<?php the_permalink(); ?>" class="block relative">
                                <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'medium')); ?>"
                                    alt="<?php the_title_attribute(); ?>"
                                    class="trending-post-card__thumbnail w-full h-48 object-cover transition-transform duration-300 brightness-90">
                                <?php else : ?>
                                <div
                                    class="w-full h-48 bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                                    <span class="text-gray-400 text-sm">
                                        <?php esc_html_e( 'No Image', 'atomic-web-space' ); ?>
                                    </span>
                                </div>
                                <?php endif; ?>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent pointer-events-none">
                                </div>
                            </a>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-white mb-2">
                                    <a href="<?php the_permalink(); ?>"
                                        class="trending-post-card__title hover:text-blue-300 transition duration-200">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <p class="text-gray-200 text-sm mb-4 line-clamp-2">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300 text-xs"><?php echo get_the_date(); ?></span>
                                    <?php 
                                        $categories = get_the_category();
                                        if (!empty($categories)) :
                                    ?>
                                    <span
                                        class="px-2 py-1 bg-blue-600/20 text-blue-200 rounded-full text-xs font-medium">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>

                    <!-- Read More -->
                    <div class="mt-12 text-center">
                        <a :href="'/category/' + selectedCategory"
                            class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold px-6 py-3 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                            <?php esc_html_e( 'Read More', 'atomic-web-space' ); ?>
                        </a>
                    </div>
                </div>
            </section>

            <script>
            function trendingTopics() {
                return {
                    selectedCategory: '<?php echo esc_attr($first_category_slug); ?>',
                    selectedCategoryName: '<?php echo esc_html($categories[0]->name); ?>',

                    isVisible(categorySlugs) {
                        // Show post if its categories include the selected category
                        const categories = categorySlugs.split(' ');
                        return categories.includes(this.selectedCategory);
                    },

                    selectCategory(slug) {
                        this.selectedCategory = slug;
                        this.selectedCategoryName = this.getCategoryName(slug);
                        this.animatePosts();
                    },

                    getCategoryName(slug) {
                        const categories =
                            <?php echo json_encode(array_map(function($cat) { return ['slug' => $cat->slug, 'name' => $cat->name]; }, $categories)); ?>;
                        const category = categories.find(cat => cat.slug === slug);
                        return category ? category.name : '';
                    },

                    animatePosts() {
                        const posts = document.querySelectorAll('.trending-post-card');
                        let visibleCount = 0;
                        posts.forEach(post => {
                            const isVisible = post.dataset.categories.split(' ').includes(this
                                .selectedCategory);
                            if (isVisible && visibleCount < 3) { // Limit to 3 posts
                                post.classList.remove('hidden');
                                visibleCount++;
                            } else {
                                post.classList.add('hidden');
                            }
                        });
                        // Animate only visible posts
                        const visiblePosts = document.querySelectorAll('.trending-post-card:not(.hidden)');
                        gsap.fromTo(visiblePosts, {
                                scale: 0.9,
                                y: 50
                            }, // Start smaller and lower
                            {
                                scale: 1,
                                y: 0,
                                duration: 0.8,
                                stagger: 0.2,
                                ease: 'power3.out',
                                overwrite: 'auto'
                            }
                        );
                    },

                    initAnimations() {
                        this.animatePosts(); // Show first category's posts on load
                    }
                };
            }
            </script>

            <!-- Newsletter Section -->
            <section class="relative bg-gray-900 py-16 overflow-hidden">
                <!-- Background Effects -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-gray-900 to-purple-900 opacity-80">
                </div>
                <div class="absolute inset-0 opacity-30 bg-newsletter">
                </div>

                <!-- Content Container -->
                <div class="relative container mx-auto px-4 max-w-7xl z-10">
                    <div
                        class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center bg-gray-800/50 rounded-xl shadow-2xl overflow-hidden">
                        <!-- Image Side -->
                        <div class="hidden lg:block relative h-full">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/newsletter.png"
                                alt="Tech Newsletter" class="w-full h-full object-cover opacity-80">
                            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/60 to-transparent"></div>
                        </div>

                        <!-- Form Side -->
                        <div class="p-8 flex flex-col items-center justify-center text-white">
                            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-4">
                                <?php esc_html_e('Join the WordPress Revolution', 'atomic-web-space'); ?>
                            </h2>
                            <p class="text-gray-300 text-center mb-6 max-w-md text-base md:text-lg">
                                <?php esc_html_e('Subscribe for the latest WordPress news, insights, and exclusive updates delivered straight to your inbox.', 'atomic-web-space'); ?>
                            </p>

                            <?php
                            // Handle form submission
                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newsletter_submit'])) {
                            // Verify nonce for security
                            if (!isset($_POST['newsletter_nonce']) || !wp_verify_nonce($_POST['newsletter_nonce'], 'newsletter_action')) {
                                echo '<p class="text-red-400 text-start mb-6">Security check failed. Please try again.</p>';
                            } else {
                                $email = sanitize_email($_POST['email']);
                                if (is_email($email)) {
                                global $wpdb;
                                $table_name = $wpdb->prefix . 'newsletter_subscribers';

                                // Check if email already exists
                                $exists = $wpdb->get_var($wpdb->prepare(
                                    "SELECT COUNT(*) FROM $table_name WHERE email = %s",
                                    $email
                                ));

                                if ($exists == 0) {
                                    // Insert email into custom table
                                    $result = $wpdb->insert(
                                    $table_name,
                                    ['email' => $email, 'subscribed_at' => current_time('mysql')],
                                    ['%s', '%s']
                                    );

                                    if ($result) {
                                    echo '<p class="text-green-400 text-start mb-6">Thank you for subscribing!</p>';
                                    } else {
                                    echo '<p class="text-red-400 text-start mb-6">An error occurred. Please try again later.</p>';
                                    }
                                } else {
                                    echo '<p class="text-yellow-400 text-start mb-6">This email is already subscribed.</p>';
                                }
                                } else {
                                echo '<p class="text-red-400 text-start mb-6">Please enter a valid email address.</p>';
                                }
                            }
                            }
                            ?>

                            <form method="POST" class="flex flex-col sm:flex-row gap-3 w-full max-w-md">
                                <?php wp_nonce_field('newsletter_action', 'newsletter_nonce'); ?>
                                <input type="email" name="email" placeholder="Enter your email"
                                    class="bg-gray-700 text-gray-200 border border-gray-600 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 flex-1 transition-all duration-300"
                                    required>
                                <button type="submit" name="newsletter_submit"
                                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                                    <?php esc_html_e( 'Subscribe', 'atomic-web-space' ); ?>
                                </button>
                            </form>
                            <p class="text-gray-400 text-center text-xs mt-4">
                                <?php esc_html_e( 'By subscribing, you agree to our', 'atomic-web-space' ); ?>
                                <a href="<?php echo esc_url(site_url('/terms-and-conditions/')); ?>"
                                    class="text-blue-400 hover:text-blue-300 underline">
                                    <?php esc_html_e( 'Terms', 'atomic-web-space' ); ?>
                                </a>
                                <?php esc_html_e( 'and', 'atomic-web-space' ); ?>
                                <a href="<?php echo esc_url(site_url('/privacy-policy/')); ?>"
                                    class="text-blue-400 hover:text-blue-300 underline">
                                    <?php esc_html_e( 'Privacy Policy', 'atomic-web-space' ); ?>
                                </a>.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

        </div>


    </main>

</div>

<?php
get_footer();