<?php
/**
 * Template part for displaying header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atomic_Web_Space
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<header class="sticky inset-x-0 top-10 z-50">
    <div class="bg-gray-100 mx-auto w-9/10 md:w-3/4 shadow-lg rounded-full backdrop-blur-lg duration-300 ease-in-out">
        <div class="w-full">
            <nav class="flex items-center justify-between p-2 space-x-4">
                <div class="flex items-center justify-start">
                    <a href="<?php echo esc_url( site_url( '/' ) ); ?>"
                        class="flex items-center justify-center text-nowrap">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="logo"
                            class="h-6 md:h-8 lg:h-12">
                    </a>
                </div>
                <div
                    class="flex flex-grow flex-row-reverse items-center space-x-4 justify-start md:flex-row md:justify-between">

                    <div class="flex items-center">
                        <a href="#plans"
                            class="mr-4 text-xs md:hidden rounded-full border border-mustard-gold bg-mustard-gold px-4 py-1 text-white hover:drop-shadow-white-glow">
                            <?php esc_html_e( 'Get Started', 'atomic-web-space' ); ?>
                        </a>
                        <button id="menuButton" class="md:hidden">
                            <svg class="size-8 fill-gray-100 " xmlns="http://www.w3.org/2000/svg" width="200"
                                height="200" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M9 19h10v-2H9v2zm0-6h6v-2H9v2zm0-8v2h12V5H9zm-4-.5a1.5 1.5 0 1 0 .001 3.001A1.5 1.5 0 0 0 5 4.5zm0 6a1.5 1.5 0 1 0 .001 3.001A1.5 1.5 0 0 0 5 10.5zm0 6a1.5 1.5 0 1 0 .001 3.001A1.5 1.5 0 0 0 5 16.5z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Navigation Links -->
                    <div id="navLinks" class="hidden space-x-6 md:flex">
                        <a href="#home"
                            class="nav-link group relative text-black transition-all duration-300 hover:text-gray-900 hover:drop-shadow-brass-nail">
                            <?php esc_html_e( 'Home', 'atomic-web-space' ); ?>
                            <span
                                class="absolute inset-x-0 bottom-0 h-0.5 scale-x-0 bg-mustard-gold transition-all duration-300 group-hover:scale-x-100"></span>
                        </a>
                        <a href="#plans"
                            class="nav-link group relative text-black transition-all duration-300 hover:text-gray-900 hover:drop-shadow-brass-nail">
                            <?php esc_html_e( 'Plans', 'atomic-web-space' ); ?>
                            <span
                                class="absolute inset-x-0 bottom-0 h-0.5 scale-x-0 bg-mustard-gold transition-all duration-300 group-hover:scale-x-100"></span>
                        </a>
                        <a href="#evaluation"
                            class="nav-link group relative text-black transition-all duration-300 hover:text-gray-900 hover:drop-shadow-brass-nail">
                            <?php esc_html_e( 'Evaluation', 'atomic-web-space' ); ?>
                            <span
                                class="absolute inset-x-0 bottom-0 h-0.5 scale-x-0 bg-mustard-gold transition-all duration-300 group-hover:scale-x-100"></span>
                        </a>
                        <a href="#faqs"
                            class="nav-link group relative text-black transition-all duration-300 hover:text-gray-900 hover:drop-shadow-brass-nail">
                            <?php esc_html_e( 'FAQs', 'atomic-web-space' ); ?>
                            <span
                                class="absolute inset-x-0 bottom-0 h-0.5 scale-x-0 bg-mustard-gold transition-all duration-300 group-hover:scale-x-100"></span>
                        </a>
                    </div>

                    <!-- Buttons Group -->
                    <div class="flex items-center space-x-4">
                        <!-- Button component -->
                        <a href="https://app.betvault.com"
                            class="hidden rounded-full text-xs lg:text-lg border border-brass-nail bg-transparent hover:bg-brass-nail hover:drop-shadow-brass-nail px-4 py-1 text-black hover:shadow-custom-light md:block">
                            <?php esc_html_e( 'Login', 'atomic-web-space' ); ?>
                        </a>
                        <a href="#plans"
                            class="mr-4 hidden whitespace-nowrap text-xs lg:text-lg rounded-full border border-mustard-gold bg-mustard-gold px-4 py-1 text-white hover:drop-shadow-mustard-gold md:block">
                            <?php esc_html_e( 'Get Started', 'atomic-web-space' ); ?>
                        </a>
                    </div>

                </div>
            </nav>
        </div>
    </div>
</header>