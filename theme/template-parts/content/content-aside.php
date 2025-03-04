<?php
/**
 * Template part for displaying header for mobile screens
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atomic_Web_Space
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>
<!-- Sidebar - occupies 1/5 of the width on large screens -->

<aside class="relative z-50 w-full flex-shrink-0">
    <div class="flex h-full flex-col">
        <!-- Sidebar Navigation -->
        <nav id="sidebar" class="flex-grow ">
            <ul class="mt-10 space-y-4 p-4 text-lg font-semibold text-brass-nail">
                <li>
                    <h5 class="text-xs font-normal uppercase text-gray-500">
                        <?php esc_html_e( 'Menu', 'atomic-web-space' ); ?>
                    </h5>
                </li>
                <!-- Dashboard Link -->
                <li class="rounded-lg">
                    <a href="#home"
                        class="menu-link flex items-center rounded-lg p-2 hover:bg-gray-600 hover:text-mustard-gold">
                        <span class="ml-4"><?php esc_html_e( 'Home', 'atomic-web-space' ); ?></span>
                    </a>
                </li>
                <li class="rounded-lg">
                    <a href="#plans"
                        class="menu-link flex items-center rounded-lg p-2 hover:bg-gray-600 hover:text-mustard-gold">
                        <span class="ml-4"><?php esc_html_e( 'Plans', 'atomic-web-space' ); ?></span>
                    </a>
                </li>
                <li class="rounded-lg">
                    <a href="#evaluation"
                        class="menu-link flex items-center rounded-lg p-2 hover:bg-gray-600 hover:text-mustard-gold">
                        <span class="ml-4"><?php esc_html_e( 'Evaluation', 'atomic-web-space' ); ?></span>
                    </a>
                </li>
                <li class="rounded-lg">
                    <a href="#faqs"
                        class="menu-link flex items-center rounded-lg p-2 hover:bg-gray-600 hover:text-mustard-gold">
                        <span class="ml-4"><?php esc_html_e( 'FAQs', 'atomic-web-space' ); ?></span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>