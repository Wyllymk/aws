<?php
/**
 * Template part for displaying footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atomic_Web_Space
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<!-- Footer -->
<footer class="relative bg-gray-900 text-gray-300 py-8 overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/50 via-gray-900 to-purple-900/50"></div>
    <div
        class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/circuit-pattern.png')]">
    </div>

    <!-- Content Container -->
    <div class="relative container mx-auto px-4 max-w-7xl z-10">
        <div class="flex flex-col lg:flex-row justify-between items-center gap-8 py-6">
            <!-- Logo & Description -->
            <div class="flex flex-col items-center lg:items-start max-w-sm text-center lg:text-left">
                <a href="<?php echo esc_url(site_url('/')); ?>" class="flex items-center mb-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="Logo"
                        class="h-12">
                </a>
                <p class="text-gray-400 text-sm">
                    <?php esc_html_e('Your source for the latest tech news, reviews, and insights. Stay ahead with cutting-edge content.', 'atomic-web-space'); ?>
                </p>
            </div>

            <!-- Navigation Links -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-8 lg:gap-12">
                <!-- Support -->
                <div class="flex flex-col space-y-3">
                    <h6 class="text-white font-semibold text-lg"><?php esc_html_e('Support', 'atomic-web-space'); ?>
                    </h6>
                    <a href="#"
                        class="text-gray-400 text-sm hover:text-blue-400 transition-all duration-300 hover:translate-x-1">
                        <?php esc_html_e('Contact', 'atomic-web-space'); ?>
                    </a>
                    <a href="#"
                        class="text-gray-400 text-sm hover:text-blue-400 transition-all duration-300 hover:translate-x-1">
                        <?php esc_html_e('Blog', 'atomic-web-space'); ?>
                    </a>
                </div>

                <!-- Company -->
                <div class="flex flex-col space-y-3">
                    <h6 class="text-white font-semibold text-lg"><?php esc_html_e('Company', 'atomic-web-space'); ?>
                    </h6>
                    <a href="#"
                        class="text-gray-400 text-sm hover:text-blue-400 transition-all duration-300 hover:translate-x-1">
                        <?php esc_html_e('About Us', 'atomic-web-space'); ?>
                    </a>
                    <a href="#"
                        class="text-gray-400 text-sm hover:text-blue-400 transition-all duration-300 hover:translate-x-1">
                        <?php esc_html_e('FAQ', 'atomic-web-space'); ?>
                    </a>
                </div>

                <!-- Legal -->
                <div class="flex flex-col space-y-3">
                    <h6 class="text-white font-semibold text-lg"><?php esc_html_e('Legal', 'atomic-web-space'); ?></h6>
                    <a href="#"
                        class="text-gray-400 text-sm hover:text-blue-400 transition-all duration-300 hover:translate-x-1">
                        <?php esc_html_e('Terms and Conditions', 'atomic-web-space'); ?>
                    </a>
                    <a href="#"
                        class="text-gray-400 text-sm hover:text-blue-400 transition-all duration-300 hover:translate-x-1">
                        <?php esc_html_e('Privacy Policy', 'atomic-web-space'); ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="w-full h-px bg-gray-700 my-6"></div>

        <!-- Copyright -->
        <div class="text-center text-gray-400 text-sm">
            <p>
                <?php
        $start_year = 2023;
        $current_year = date('Y');
        printf(esc_html__('© %d - %d. All Rights Reserved.', 'atomic-web-space'), $start_year, $current_year);
        ?>
            </p>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div
            class="absolute bottom-0 right-0 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl animate-pulse animation-delay-2000">
        </div>
    </div>
</footer>