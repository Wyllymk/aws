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

<!-- Footer - stays at the bottom if content doesn't span full height -->
<footer class="relative z-20 flex w-full flex-col py-4 text-center">

    <div class="flex w-11/12 mx-auto flex-col items-center justify-between space-y-4 py-2 lg:flex-row lg:space-y-0">
        <div class="flex flex-col space-y-2 mb-5 mb:mb-0">
            <a href="<?php echo esc_url( site_url( '/' ) ); ?>" class="flex items-center justify-center text-nowrap">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="logo" class="h-12">
            </a>
            <div class="flex justify-center gap-2">
                <a target="_blank" href="#" class="hover:drop-shadow-mustard-gold">
                    <img class="h-8" src="<?php echo get_template_directory_uri(); ?>/assets/img/insta.svg"
                        alt="Instagram">
                </a>
                <a target="_blank" href="#" class="hover:drop-shadow-mustard-gold">
                    <img class="h-8" src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.svg"
                        alt="Facebook">
                </a>
                <a target="_blank" href="#" class="hover:drop-shadow-mustard-gold">
                    <img class="h-8" src="<?php echo get_template_directory_uri(); ?>/assets/img/youtube.svg"
                        alt="Youtube">
                </a>
            </div>
        </div>
        <div class="flex space-x-6">
            <div class="flex flex-col space-y-2 text-start">
                <h6 class="text-black">
                    <?php esc_html_e( 'Support', 'bet-vault' ); ?>
                </h6>
                <a href="#"
                    class="text-gray-500 text-sm hover:text-mustard-gold hover:translate-x-1 transition-transform">
                    <?php esc_html_e( 'Whatsapp', 'bet-vault' ); ?>
                </a>
                <a href="#"
                    class="text-gray-500 text-sm hover:text-mustard-gold hover:translate-x-1 transition-transform">
                    <?php esc_html_e( 'Contact', 'bet-vault' ); ?>
                </a>
                <a href="#"
                    class="text-gray-500 text-sm hover:text-mustard-gold hover:translate-x-1 transition-transform">
                    <?php esc_html_e( 'Blog', 'bet-vault' ); ?>
                </a>

            </div>
            <div class="flex flex-col space-y-2 text-start">
                <h6 class="text-black">
                    <?php esc_html_e( 'Company', 'bet-vault' ); ?>
                </h6>
                <a href="#"
                    class="text-gray-500 text-sm hover:text-mustard-gold hover:translate-x-1 transition-transform">
                    <?php esc_html_e( 'About Us', 'bet-vault' ); ?>
                </a>
                <a href="#"
                    class="text-gray-500 text-sm hover:text-mustard-gold hover:translate-x-1 transition-transform">
                    <?php esc_html_e( 'Careers', 'bet-vault' ); ?>
                </a>
                <a href="#"
                    class="text-gray-500 text-sm hover:text-mustard-gold hover:translate-x-1 transition-transform">
                    <?php esc_html_e( 'FAQ', 'bet-vault' ); ?>
                </a>
            </div>
            <div class="flex flex-col space-y-2 text-start">
                <h6 href="#" class="text-black">
                    <?php esc_html_e( 'Legal', 'bet-vault' ); ?>
                </h6>
                <a href="#"
                    class="text-gray-500 text-sm hover:text-mustard-gold hover:translate-x-1 transition-transform">
                    <?php esc_html_e( 'Terms and Conditions', 'bet-vault' ); ?>
                </a>
                <a href="#"
                    class="text-gray-500 text-sm hover:text-mustard-gold hover:translate-x-1 transition-transform">
                    <?php esc_html_e( 'Privacy Policy', 'bet-vault' ); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Horizontal Divider -->
    <div class="my-4 w-11/12 mx-auto flex h-px self-center bg-gray-500"></div>

    <div class="flex w-11/12 mx-auto flex-col items-start py-2 space-y-2">
        <p class="text-start text-gray-500 text-xs">
            <?php esc_html_e( 'BetVault is not a casino, sportsbook, or gambling operator and does not accept or place wagers of any kind. Furthermore, BetVault does not promote or support any form of illegal gambling. All information and services provided by BetVault are strictly for educational and entertainment purposes. No real money wagering takes place on our platform, and all challenge accounts utilize virtual "profit points" to demonstrate theoretical pick outcomes based on real, live sports odds from reputable operators.', 'bet-vault' ); ?>
        </p>
        <h5 class="text-lg">
            <?php esc_html_e( '© 2025. All Rights Reserved.', 'bet-vault' ); ?>
        </h5>
    </div>

</footer>