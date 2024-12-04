<?php
/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aws
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" type="image/png"
        href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png"
        href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/svg+xml"
        href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.svg" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="aws" />
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/site.webmanifest" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <div id="page">
        <a href="#content" class="sr-only"><?php esc_html_e( 'Skip to content', 'aws' ); ?></a>

        <div x-data="themeToggle()" x-init="init()" id="content" class="bg-purple-50">

            <?php get_template_part( 'template-parts/layout/header', 'content' ); ?>

            <!-- Loader Spinner HTML -->
            <!-- <div id="spinner-loader"
                class="fixed inset-0 bg-white dark:bg-gray-800 flex items-center justify-center z-[60]">
                <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
            </div> -->