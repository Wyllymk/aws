<?php
/**
 * The main template file for the blog homepage
 *
 * This template displays all posts when set as the "Posts page" in WordPress settings.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atomic_Web_Space
 */
// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<section id="primary" class="relative bg-gray-900 py-16 overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900/30 via-gray-900 to-purple-900/30"></div>
    <div
        class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/circuit-pattern.png')]">
    </div>

    <main id="main" class="relative container mx-auto px-4 max-w-7xl z-10">
        <?php if (have_posts()) : ?>
        <!-- Header -->
        <?php if (is_home() && !is_front_page()) : ?>
        <header class="entry-header mb-12 text-center" x-data="{ animate: true }" x-init="animateEntryHeader()">
            <h1 class="text-3xl md:text-4xl font-bold text-white">
                <?php single_post_title(); ?>
            </h1>
            <p class="text-gray-300 mt-2 text-lg">Your gateway to the latest WordPress insights</p>
        </header>
        <?php endif; ?>

        <!-- Posts Grid -->
        <div id="home-posts-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
            x-data="{ animate: true }" x-init="animateBlogPosts()">
            <?php
        // Load posts loop.
        while (have_posts()) :
          the_post();
        ?>
            <article
                <?php post_class('home-post-card bg-gray-800 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl'); ?>>
                <div class="flex flex-col">
                    <!-- Thumbnail -->
                    <a href="<?php the_permalink(); ?>" class="block relative">
                        <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/img/placeholder.webp'); ?>"
                            alt="<?php the_title_attribute(); ?>"
                            class="w-full h-48 object-cover brightness-90 home-post-card__thumbnail transition-transform duration-300">
                        <?php else : ?>
                        <div
                            class="w-full h-48 bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                            <span class="text-gray-400 text-sm">No Image</span>
                        </div>
                        <?php endif; ?>
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent pointer-events-none">
                        </div>
                    </a>

                    <!-- Content -->
                    <div class="p-6 flex-1 flex flex-col">
                        <h2 class="text-xl font-semibold text-white mb-2">
                            <a href="<?php the_permalink(); ?>"
                                class="home-post-card__title hover:text-blue-300 transition duration-200">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <p class="text-gray-200 text-sm mb-4 line-clamp-2 flex-1">
                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                        <div class="flex items-center justify-between text-gray-300 text-xs">
                            <span><?php echo get_the_date(); ?></span>
                            <span
                                class="px-2 py-1 bg-blue-600/20 text-blue-200 rounded-full"><?php the_category(', '); ?></span>
                        </div>
                    </div>
                </div>
            </article>
            <?php
        endwhile;
        ?>
        </div>

        <!-- Pagination -->
        <nav id="home-pagination" class="mt-12 flex justify-between items-center text-gray-300"
            x-data="{ animate: true }" x-init="animateBlogPagination()">
            <div>
                <?php
          previous_posts_link('<span class="inline-block bg-gray-800 px-4 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300">← Previous</span>');
          ?>
            </div>
            <div class="text-sm">
                <?php
          $current_page = max(1, get_query_var('paged'));
          $total_pages = $wp_query->max_num_pages;
          echo sprintf('Page %d of %d', $current_page ?: 1, $total_pages);
          ?>
            </div>
            <div>
                <?php
          next_posts_link('<span class="inline-block bg-gray-800 px-4 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-300">Next →</span>', $wp_query->max_num_pages);
          ?>
            </div>
        </nav>

        <?php else : ?>
        <!-- No Posts -->
        <div id="home-no-posts" class="text-center" x-data="{ animate: true }" x-init="animateNoPosts()">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">No Data Transmitted</h1>
            <p class="text-gray-200 text-lg md:text-xl mb-6">
                <?php esc_html_e('No posts found. Check back later or start creating some tech content!', 'atomic-web-space'); ?>
            </p>
            <a href="<?php echo esc_url(admin_url('post-new.php')); ?>"
                class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold px-6 py-3 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                Create a Post
            </a>
        </div>
        <?php endif; ?>
    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();