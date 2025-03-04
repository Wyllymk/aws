<?php
/**
 * The template for displaying archive pages
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
        <header class="page-header mb-12 text-center" x-data="{ animate: true }" x-init="animateHeader()">
            <h1 class="text-3xl md:text-4xl font-bold text-white">
                <?php the_archive_title(); ?>
            </h1>
            <?php if (the_archive_description()) : ?>
            <p class="text-gray-300 mt-2 text-lg"><?php the_archive_description(); ?></p>
            <?php endif; ?>
            <p class="text-gray-300 mt-2 text-sm">
                <?php
          $total_posts = $wp_query->found_posts;
          printf(
            esc_html(_n('%s post found', '%s posts found', $total_posts, 'atomic-web-space')),
            number_format_i18n($total_posts)
          );
          ?>
            </p>
        </header>

        <!-- Posts Grid -->
        <div id="archive-posts-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
            x-data="{ animate: true }" x-init="animatePosts()">
            <?php
        // Start the Loop.
        while (have_posts()) :
          the_post();
        ?>
            <article
                <?php post_class('archive-post-card bg-gray-800 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl'); ?>>
                <div class="flex flex-col">
                    <!-- Thumbnail -->
                    <a href="<?php the_permalink(); ?>" class="block relative">
                        <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'medium')); ?>"
                            alt="<?php the_title_attribute(); ?>"
                            class="archive-post-card__thumbnail w-full h-48 object-cover brightness-90 transition-transform duration-300">
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
                                class="archive-post-card__title hover:text-blue-300 transition duration-200">
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
        <nav id="archive-pagination" class="mt-12 flex justify-between items-center text-gray-300"
            x-data="{ animate: true }" x-init="animatePagination()">
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
        <div id="archive-no-posts" class="text-center" x-data="{ animate: true }" x-init="animateNoPosts()">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">No Data in this Sector</h1>
            <p class="text-gray-200 text-lg md:text-xl mb-6">
                <?php esc_html_e('No posts found in this archive. Try exploring another category or date!', 'atomic-web-space'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>"
                class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold px-6 py-3 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                Back to Home
            </a>
        </div>
        <?php endif; ?>
    </main><!-- #main -->
</section><!-- #primary -->

<script>
document.addEventListener('DOMContentLoaded', () => {
    function animateHeader() {
        gsap.from('.page-header', {
            scale: 0.9,
            y: 30,
            duration: 1,
            ease: 'power3.out'
        });
    }

    function animatePosts() {
        gsap.from('.archive-post-card', {
            scale: 0.9,
            y: 50,
            duration: 0.8,
            stagger: 0.2,
            ease: 'power3.out'
        });
    }

    function animatePagination() {
        gsap.from('#archive-pagination', {
            scale: 0.9,
            y: 20,
            duration: 0.8,
            ease: 'power3.out',
            delay: 0.5
        });
    }

    function animateNoPosts() {
        gsap.from('#archive-no-posts', {
            scale: 0.9,
            y: 30,
            duration: 1,
            ease: 'power3.out'
        });
    }

    // Thumbnail hover effects
    document.querySelectorAll('.archive-post-card').forEach(card => {
        const thumbnail = card.querySelector('.archive-post-card__thumbnail');
        if (thumbnail) {
            card.addEventListener('mouseenter', () => gsap.to(thumbnail, {
                scale: 1.05,
                duration: 0.3
            }));
            card.addEventListener('mouseleave', () => gsap.to(thumbnail, {
                scale: 1,
                duration: 0.3
            }));
        }
    });
});
</script>

<?php
get_footer();