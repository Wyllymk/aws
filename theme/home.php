<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aws
 * @since 1.0.0
 * @version 1.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<div class="site-content container mx-auto px-4 py-20">
    <div class="content-area">
        <main class="site-main">

            <!-- Header -->
            <div class="p-6 text-center mb-8">
                <h1 class="text-4xl font-bold">Welcome to <?php bloginfo('name'); ?></h1>
                <p class="text-lg text-gray-600"><?php bloginfo('description'); ?></p>
            </div>

            <!-- Sticky Post -->
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
            <div class="grid grid-cols-1 gap-6">
                <?php
                $args = array(
                    'posts_per_page'      => 2,
                    'post__in'            => get_option('sticky_posts'),
                    'ignore_sticky_posts' => 2
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <article id="post-<?php the_ID(); ?>"
                    <?php post_class("bg-white shadow-lg rounded-lg overflow-hidden"); ?>>
                    <div class="flex flex-wrap md:flex-nowrap">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="w-full md:w-1/3">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-auto object-cover')); ?>
                            </a>
                        </div>
                        <?php endif; ?>

                        <div class="w-full md:w-2/3 p-6">
                            <div class="flex justify-between items-center">
                                <div><?php bootscore_category_badge(); ?></div>
                                <div>
                                    <span class="bg-red-500 text-white text-xs font-semibold py-1 px-2 rounded">⭐</span>
                                </div>
                            </div>

                            <a class="text-black hover:underline" href="<?php the_permalink(); ?>">
                                <h2 class="text-xl font-bold"><?php the_title(); ?></h2>
                            </a>

                            <?php if ('post' === get_post_type()) : ?>
                            <p class="text-sm text-gray-500 mt-2">
                                <?php
                                bootscore_date();
                                bootscore_author();
                                bootscore_comments();
                                bootscore_edit();
                                ?>
                            </p>
                            <?php endif; ?>

                            <p class="mt-2 text-gray-700"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>

                            <p class="mt-4">
                                <a class="text-blue-600 hover:underline" href="<?php the_permalink(); ?>">
                                    <?php _e('Read more »', 'bootscore'); ?>
                                </a>
                            </p>

                            <?php bootscore_tags(); ?>
                        </div>
                    </div>
                </article>
                <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <?php endif; ?>

            <!-- Post List -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                <?php if (is_sticky()) continue; ?>

                <article class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="flex flex-wrap md:flex-nowrap">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="w-full md:w-1/3">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-auto object-cover')); ?>
                            </a>
                        </div>
                        <?php endif; ?>

                        <div class="w-full md:w-2/3 p-6">
                            <?php bootscore_category_badge(); ?>

                            <a class="text-black hover:underline" href="<?php the_permalink(); ?>">
                                <h2 class="text-xl font-bold"><?php the_title(); ?></h2>
                            </a>

                            <?php if ('post' === get_post_type()) : ?>
                            <p class="text-sm text-gray-500 mt-2">
                                <?php
                                bootscore_date();
                                bootscore_author();
                                bootscore_comments();
                                bootscore_edit();
                                ?>
                            </p>
                            <?php endif; ?>

                            <p class="mt-2 text-gray-700"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>

                            <p class="mt-4">
                                <a class="text-blue-600 hover:underline" href="<?php the_permalink(); ?>">
                                    <?php _e('Read more »', 'bootscore'); ?>
                                </a>
                            </p>

                            <?php bootscore_tags(); ?>
                        </div>
                    </div>
                </article>

                <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                <?php bootscore_pagination(); ?>
            </div>

        </main>
    </div>
</div>

<?php get_footer();