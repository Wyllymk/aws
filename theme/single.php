<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Atomic_Web_Space
 */
// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<!-- Progress Bar -->
<div class="fixed top-18 left-0 w-full h-1 bg-gray-800 z-30">
    <div id="reading-progress" class="h-full bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300"
        style="width: 0%;">
    </div>
</div>

<section id="primary" class="relative bg-gray-900 py-16 overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900/30 via-gray-900 to-purple-900/30"></div>
    <div
        class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/circuit-pattern.png')]">
    </div>

    <main id="main" class="relative container mx-auto px-4 max-w-4xl z-10">
        <?php
        /* Start the Loop */
        while (have_posts()) :
        the_post();
        ?>
        <!-- Post Content -->
        <article <?php post_class('bg-gray-800 rounded-xl shadow-lg overflow-hidden'); ?>>
            <!-- Featured Image -->
            <div class="relative">
                <?php if (has_post_thumbnail()) : ?>
                <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>"
                    alt="<?php the_title_attribute(); ?>" class="w-full h-64 md:h-96 object-cover brightness-90">
                <?php else : ?>
                <div
                    class="w-full h-64 md:h-96 bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                    <span class="text-gray-400 text-xl font-semibold">No Featured Image</span>
                </div>
                <?php endif; ?>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent pointer-events-none">
                </div>
            </div>

            <!-- Post Header -->
            <header class="p-8">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4"><?php the_title(); ?></h1>
                <div class="flex items-center justify-between text-gray-300 text-sm">
                    <div class="flex items-center space-x-3">
                        <?php $author_id = get_the_author_meta('ID'); ?>
                        <img src="<?php echo esc_url(get_avatar_url($author_id, ['size' => 40])); ?>"
                            alt="<?php the_author(); ?>" class="h-10 w-10 rounded-full border border-gray-700">
                        <div>
                            <span class="block text-blue-300 font-medium"><?php the_author(); ?></span>
                            <span class="block text-gray-400"><?php echo get_the_date(); ?></span>
                        </div>
                    </div>
                    <span class="px-2 py-1 bg-blue-600/20 text-blue-200 rounded-full">
                        <?php the_category(', '); ?></span>
                </div>
            </header>

            <!-- Post Content -->
            <div class="p-8 prose prose-invert max-w-none text-gray-200">
                <?php
                the_content();
                wp_link_pages([
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'atomic-web-space'),
                    'after'  => '</div>',
                ]);
                ?>
            </div>

            <!-- Tags -->
            <?php if (get_the_tags()) : ?>
            <div class="p-8 border-t border-gray-700">
                <div class="flex flex-wrap gap-2">
                    <?php
              foreach (get_the_tags() as $tag) :
              ?>
                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"
                        class="inline-block bg-gray-700 text-gray-200 py-1 px-3 rounded-full text-sm hover:bg-blue-600 hover:text-white transition duration-300">
                        #<?php echo esc_html($tag->name); ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </article>

        <!-- Post Navigation -->
        <?php if (is_singular('post')) : ?>
        <nav class="mt-12 flex justify-between items-center text-gray-300">
            <div>
                <?php
            previous_post_link(
              '<span class="block text-sm text-gray-400">%link</span>',
              '<span class="text-lg font-semibold hover:text-blue-300 transition duration-300">&larr; %title</span>'
            );
            ?>
            </div>
            <div class="text-right">
                <?php
            next_post_link(
              '<span class="block text-sm text-gray-400">%link</span>',
              '<span class="text-lg font-semibold hover:text-blue-300 transition duration-300">%title &rarr;</span>'
            );
            ?>
            </div>
        </nav>
        <?php endif; ?>

        <!-- Comments -->
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>

        <!-- Similar Blogs -->
        <div class="mt-16">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-6 text-center">Similar Blogs</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
          $categories = wp_get_post_categories(get_the_ID());
          $similar_posts = new WP_Query([
            'posts_per_page' => 3,
            'post__not_in' => [get_the_ID()], // Exclude current post
            'category__in' => $categories,
            'orderby' => 'rand',
          ]);

          if ($similar_posts->have_posts()) :
            while ($similar_posts->have_posts()) : $similar_posts->the_post();
          ?>
                <div
                    class="group relative bg-gray-800 rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <a href="<?php the_permalink(); ?>" class="block relative">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/img/placeholder.webp'); ?>"
                            alt="<?php the_title_attribute(); ?>"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300 brightness-90">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent pointer-events-none">
                        </div>
                    </a>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white mb-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-blue-300 transition duration-200">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <p class="text-gray-200 text-sm line-clamp-2">
                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
          else :
          ?>
                <p class="text-gray-300 text-center col-span-full">No similar posts found.</p>
                <?php endif; ?>
            </div>
        </div>

        <?php
    endwhile; // End the loop
    ?>
    </main><!-- #main -->
</section><!-- #primary -->

<!-- Reading Progress Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const progressBar = document.getElementById('reading-progress');
    const updateProgress = () => {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = (scrollTop / docHeight) * 100;
        progressBar.style.width = `${progress}%`;
    };
    window.addEventListener('scroll', updateProgress);
    updateProgress(); // Initial call
});
</script>

<?php
get_footer();