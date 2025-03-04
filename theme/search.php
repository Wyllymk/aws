<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

    <main id="main" class="relative container mx-auto px-4 max-w-4xl z-10">
        <?php if (have_posts()) : ?>
        <!-- Header -->
        <header class="page-header mb-12 text-center" x-data="{ animate: true }" x-init="animateHeader()">
            <h1 class="text-3xl md:text-4xl font-bold text-white">
                <?php
          printf(
            /* translators: 1: search result title. 2: search term. */
            esc_html__('Search Results for: %s', 'atomic-web-space'),
            '<span class="text-blue-300">' . esc_html(get_search_query()) . '</span>'
          );
          ?>
            </h1>
            <p class="text-gray-300 mt-2 text-lg">
                <?php
          $total_results = $wp_query->found_posts;
          printf(
            esc_html(_n('%s result found', '%s results found', $total_results, 'atomic-web-space')),
            number_format_i18n($total_results)
          );
          ?>
            </p>
        </header>

        <!-- Search Results -->
        <div class="space-y-8" x-data="{ animate: true }" x-init="animateResults()">
            <?php
        // Start the Loop.
        while (have_posts()) :
          the_post();
        ?>
            <article
                <?php post_class('group bg-gray-800 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl'); ?>>
                <div class="flex flex-col md:flex-row">
                    <!-- Thumbnail -->
                    <div class="md:w-1/3 flex-shrink-0">
                        <a href="<?php the_permalink(); ?>" class="block relative">
                            <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'medium')); ?>"
                                alt="<?php the_title_attribute(); ?>"
                                class="w-full h-48 md:h-full object-cover brightness-90 group-hover:scale-105 transition-transform duration-300">
                            <?php else : ?>
                            <div
                                class="w-full h-48 md:h-full bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                                <span class="text-gray-400 text-sm">No Image</span>
                            </div>
                            <?php endif; ?>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent pointer-events-none">
                            </div>
                        </a>
                    </div>

                    <!-- Content -->
                    <div class="p-6 md:w-2/3">
                        <h2 class="text-xl font-semibold text-white mb-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-blue-300 transition duration-200">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <p class="text-gray-200 text-sm mb-4 line-clamp-2">
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

            <!-- Pagination -->
            <nav class="mt-12 flex justify-between text-gray-300">
                <div>
                    <?php
            previous_posts_link('<span class="hover:text-blue-300 transition duration-300 text-lg font-semibold">← Previous</span>');
            ?>
                </div>
                <div>
                    <?php
            next_posts_link('<span class="hover:text-blue-300 transition duration-300 text-lg font-semibold">Next →</span>', $wp_query->max_num_pages);
            ?>
                </div>
            </nav>
        </div>

        <?php else : ?>
        <!-- No Results -->
        <div class="text-center" x-data="{ animate: true }" x-init="animateNoResults()">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">No Signal Detected</h1>
            <p class="text-gray-200 text-lg md:text-xl mb-6">
                <?php esc_html_e('No results found for your search. Try a different query or explore our blog.', 'atomic-web-space'); ?>
            </p>
            <div class="max-w-md mx-auto mb-6">
                <?php get_search_form(['class' => 'flex items-center gap-2 bg-gray-800 rounded-lg p-2']); ?>
            </div>
            <a href="<?php echo esc_url(home_url('/')); ?>"
                class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold px-6 py-3 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                Back to Home
            </a>
        </div>
        <?php endif; ?>
    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();