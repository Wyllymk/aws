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

<!-- Header -->
<header class="sticky top-0 z-20 bg-gray-900 shadow-lg transition-all duration-300">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/50 via-gray-900 to-purple-900/50 opacity-75"></div>

    <!-- Content Container -->
    <div class="relative container mx-auto px-4 py-4 max-w-7xl z-10">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="<?php echo esc_url(site_url('/')); ?>" class="flex items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="Logo"
                    class="h-10">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="<?php echo esc_url(site_url('/')); ?>"
                    class="text-gray-300 font-medium text-lg hover:text-blue-400 transition-all duration-300 relative group">
                    <?php esc_html_e( 'Home', 'atomic-web-space' ); ?>
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-400 transition-all duration-300 group-hover:w-full">
                    </span>
                </a>
                <a href="<?php echo esc_url(site_url('/blog/')); ?>"
                    class="text-gray-300 font-medium text-lg hover:text-blue-400 transition-all duration-300 relative group">
                    <?php esc_html_e( 'Blog', 'atomic-web-space' ); ?>
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-400 transition-all duration-300 group-hover:w-full">
                    </span>
                </a>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-toggle" class="lg:hidden text-gray-300 focus:outline-none relative z-20">
                <svg class="w-8 h-8 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path id="menu-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                    <path id="menu-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu (Hidden by Default) -->
        <div id="mobile-menu" class="lg:hidden hidden absolute top-0 left-0 w-full bg-gray-900 shadow-lg mt-16">
            <div class="flex flex-col items-center py-6 space-y-6">
                <a href="<?php echo esc_url(site_url('/')); ?>"
                    class="text-gray-300 font-medium text-lg hover:text-blue-400 transition-all duration-300">
                    <?php esc_html_e( 'Home', 'atomic-web-space' ); ?>
                </a>
                <a href="<?php echo esc_url(site_url('/blog/')); ?>"
                    class="text-gray-300 font-medium text-lg hover:text-blue-400 transition-all duration-300">
                    <?php esc_html_e( 'Blog', 'atomic-web-space' ); ?>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- JavaScript for Mobile Menu Toggle -->
<script>
document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
    const mobileMenu = document.getElementById('mobile-menu');
    const menuOpen = document.getElementById('menu-open');
    const menuClose = document.getElementById('menu-close');

    mobileMenu.classList.toggle('hidden');
    menuOpen.classList.toggle('hidden');
    menuClose.classList.toggle('hidden');
});
</script>