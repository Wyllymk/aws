<?php
/**
 * The template for displaying the coming-soon page
 *
 * This is the template that displays the coming-soon page by default. Please note that
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
<main class="min-h-90 bg-white dark:bg-gray-900 transition-colors duration-400 ease-in-out">

    <!-- Sidebar Navigation -->
    <div id="navMenu"
        class="transform translate-x-full w-60 py-4 px-4 z-40 fixed md:hidden top-0 h-full bg-gray-100 dark:bg-gray-800 shadow-lg transition-all duration-400 ease-in-out">
        <!-- Your navigation items here -->
        <?php get_template_part( 'template-parts/content/content', 'aside' ); ?>

    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 top-0 h-screen z-30 bg-black/70 hidden"></div>

    <!-- Coming Soon Section -->
    <div class="flex h-screen text-black dark:text-white items-center justify-center">

        <!-- Coming Soon Section -->
        <section id="comingSoonHero" class="w-full flex justify-center items-center">
            <div class="container mx-auto px-6">
                <div class="flex pt-40 flex-col lg:flex-row lg:items-center justify-between">
                    <!-- Text Column -->
                    <div class="lg:w-1/2">
                        <h1
                            class="text-4xl md:text-5xl lg:text-6xl font-bold font-oswald mb-4 text-regal-blue dark:text-gray-100">
                            <?php _e( "We're Working on It!", 'atomic-web-space' ); ?>
                        </h1>
                        <p class="text-lg md:text-xl mb-8 text-gray-700 dark:text-gray-300">
                            <?php _e( 'This page is under development. Stay tuned for exciting updates!', 'atomic-web-space' ); ?>
                        </p>
                        <div class="flex gap-4 justify-center lg:justify-start">
                            <a href="<?php echo esc_url( site_url( '/' ) ); ?>"
                                class="px-8 py-3 rounded-full bg-gradient-to-r from-blue-500 via-purple-600 to-pink-500 text-white font-semibold text-lg hover:scale-105 hover:from-blue-600 hover:via-purple-700 hover:to-pink-600 transition-all transform active:scale-95 focus:ring-4 focus:ring-blue-300 focus:outline-none shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/50 dark:bg-gradient-to-r dark:from-blue-800 dark:via-purple-900 dark:to-pink-700">
                                <?php _e( 'Go to Homepage', 'atomic-web-space' ); ?>
                            </a>
                        </div>
                    </div>

                    <!-- Image Column with Masking -->
                    <div class="text-center lg:w-1/2 lg:text-right overflow-hidden">
                        <img class="mx-auto lg:mx-0 img-fluid object-cover h-auto max-h-screen" loading="lazy"
                            src="<?php echo get_template_directory_uri() . '/assets/img/placeholder.webp'; ?>"
                            alt="<?php esc_attr_e( 'Coming Soon Image', 'atomic-web-space' ); ?>" style="
								-webkit-mask-image: url(<?php echo get_template_directory_uri() . '/assets/img/hero-blob.svg'; ?>);
								mask-image: url(<?php echo get_template_directory_uri() . '/assets/img/hero-blob.svg'; ?>);
								-webkit-mask-size: contain;
								mask-size: contain;
								-webkit-mask-repeat: no-repeat;
								mask-repeat: no-repeat;
								-webkit-mask-position: center;
								mask-position: center;
							">
                    </div>

                </div>
            </div>
        </section>

    </div>

</main>

<?php
get_footer();