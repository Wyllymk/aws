<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aws
 */

?>

<header id="masthead" class="text-black dark:text-white fixed top-0 left-0 right-0 z-50 shadow-lg
	<?php
	if ( is_admin_bar_showing() ) {
		echo ' mt-8 ';}
	?>">

    <nav id="site-navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'aws' ); ?>">

        <div class="bg-gray-100 dark:bg-gray-800 transition-width duration-300 ease-in-out">
            <div class="w-full">
                <nav class="flex items-center justify-between py-4 px-4">
                    <div class="flex items-center justify-center md:w-60">
                        <a href="<?php echo esc_url( site_url( '/' ) ); ?>"
                            class="flex items-center justify-center text-nowrap">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Atomic-Web-Space.png"
                                alt="logo" class="h-8 filter invert-0 dark:invert">
                        </a>
                    </div>
                    <div
                        class="flex flex-grow flex-row-reverse md:flex-row items-center justify-start md:justify-between md:pl-4 md:w-20">

                        <button id="menuButton" class="">
                            <svg class="w-8 h-8 fill-gray-900 dark:fill-white md:hidden"
                                xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M9 19h10v-2H9v2zm0-6h6v-2H9v2zm0-8v2h12V5H9zm-4-.5a1.5 1.5 0 1 0 .001 3.001A1.5 1.5 0 0 0 5 4.5zm0 6a1.5 1.5 0 1 0 .001 3.001A1.5 1.5 0 0 0 5 10.5zm0 6a1.5 1.5 0 1 0 .001 3.001A1.5 1.5 0 0 0 5 16.5z" />
                            </svg>
                        </button>

                        <!-- Navigation Links -->
                        <div id="navLinks" class="hidden md:flex space-x-6 font-manrope">
                            <a href="<?php echo ! is_front_page() ? esc_url( home_url( '#' ) ) : '#'; ?>"
                                class="nav-link text-gray-900 dark:text-white hover:text-teal-500 dark:hover:text-teal-300 transition-all duration-300 relative group">
                                <?php esc_html_e( 'Home', 'wilson-devops' ); ?>
                                <span
                                    class="absolute left-0 right-0 bottom-0 h-0.5 bg-teal-500 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
                            </a>
                            <a href="<?php echo ! is_front_page() ? esc_url( home_url( '#about' ) ) : '#about'; ?>"
                                class="nav-link text-gray-900 dark:text-white hover:text-teal-500 dark:hover:text-teal-300 transition-all duration-300 relative group">
                                <?php esc_html_e( 'About', 'wilson-devops' ); ?>
                                <span
                                    class="absolute left-0 right-0 bottom-0 h-0.5 bg-teal-500 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
                            </a>
                            <a href="<?php echo ! is_front_page() ? esc_url( home_url( '#services' ) ) : '#services'; ?>"
                                class="nav-link text-gray-900 dark:text-white hover:text-teal-500 dark:hover:text-teal-300 transition-all duration-300 relative group">
                                <?php esc_html_e( 'Services', 'wilson-devops' ); ?>
                                <span
                                    class="absolute left-0 right-0 bottom-0 h-0.5 bg-teal-500 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
                            </a>
                            <a href="<?php echo ! is_front_page() ? esc_url( home_url( '#projects' ) ) : '#projects'; ?>"
                                class="nav-link text-gray-900 dark:text-white hover:text-teal-500 dark:hover:text-teal-300 transition-all duration-300 relative group">
                                <?php esc_html_e( 'Projects', 'wilson-devops' ); ?>
                                <span
                                    class="absolute left-0 right-0 bottom-0 h-0.5 bg-teal-500 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
                            </a>
                            <a href="<?php echo ! is_front_page() ? esc_url( home_url( '#contact' ) ) : '#contact'; ?>"
                                class="nav-link text-gray-900 dark:text-white hover:text-teal-500 dark:hover:text-teal-300 transition-all duration-300 relative group">
                                <?php esc_html_e( 'Contact', 'wilson-devops' ); ?>
                                <span
                                    class="absolute left-0 right-0 bottom-0 h-0.5 bg-teal-500 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
                            </a>
                        </div>

                        <!-- Dark Mode Toggle Button -->
                        <div class="flex items-center text-prime-teal dark:text-white">
                            <!-- Button component -->
                            <button class="pr-4" x-data="themeToggle" @click="toggle">
                                <svg x-show="!isDark"
                                    class="w-7 h-7 transform transition-transform duration-300 fill-gray-900"
                                    xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 15 15">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M2.9.5a.4.4 0 0 0-.8 0v.6h-.6a.4.4 0 1 0 0 .8h.6v.6a.4.4 0 1 0 .8 0v-.6h.6a.4.4 0 0 0 0-.8h-.6V.5Zm3 3a.4.4 0 1 0-.8 0v.6h-.6a.4.4 0 1 0 0 .8h.6v.6a.4.4 0 1 0 .8 0v-.6h.6a.4.4 0 0 0 0-.8h-.6v-.6Zm-4 3a.4.4 0 1 0-.8 0v.6H.5a.4.4 0 1 0 0 .8h.6v.6a.4.4 0 0 0 .8 0v-.6h.6a.4.4 0 0 0 0-.8h-.6v-.6ZM8.544.982l-.298-.04c-.213-.024-.34.224-.217.4A6.57 6.57 0 0 1 9.203 5.1a6.602 6.602 0 0 1-6.243 6.59c-.214.012-.333.264-.183.417a6.8 6.8 0 0 0 .21.206l.072.066l.26.226l.188.148l.121.09l.187.131l.176.115c.12.076.244.149.37.217l.264.135l.26.12l.303.122l.244.086a6.568 6.568 0 0 0 1.103.26l.317.04l.267.02a6.6 6.6 0 0 0 6.943-7.328l-.037-.277a6.557 6.557 0 0 0-.384-1.415l-.113-.268l-.077-.166l-.074-.148a6.602 6.602 0 0 0-.546-.883l-.153-.2l-.199-.24l-.163-.18l-.12-.124l-.16-.158l-.223-.2l-.32-.26l-.245-.177l-.292-.19l-.321-.186l-.328-.165l-.113-.052l-.24-.101l-.276-.104l-.252-.082l-.325-.09l-.265-.06l-.292-.053Zm1.86 4.318a7.578 7.578 0 0 0-.572-2.894a5.601 5.601 0 1 1-4.748 10.146a7.61 7.61 0 0 0 3.66-2.51a.749.749 0 0 0 1.355-.442a.75.75 0 0 0-.584-.732c.062-.116.122-.235.178-.355A1.25 1.25 0 1 0 10.35 6.2c.034-.295.052-.595.052-.9Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg x-show="isDark"
                                    class="w-8 h-8 transform transition-transform duration-300 fill-white hidden dark:block"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M15 3v5h2V3zM7.5 6.094L6.094 7.5l3.531 3.563l1.438-1.438zm17 0l-3.563 3.531l1.438 1.438L25.906 7.5zM16 9c-3.855 0-7 3.145-7 7s3.145 7 7 7s7-3.145 7-7s-3.145-7-7-7zm0 2c2.773 0 5 2.227 5 5s-2.227 5-5 5s-5-2.227-5-5s2.227-5 5-5zM3 15v2h5v-2zm21 0v2h5v-2zM9.625 20.938L6.094 24.5L7.5 25.906l3.563-3.531zm12.75 0l-1.438 1.437l3.563 3.531l1.406-1.406zM15 24v5h2v-5z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </nav><!-- #site-navigation -->

</header><!-- #masthead -->