<?php
/**
 * The template for displaying the contact page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wilson_Devops
 */
defined('ABSPATH') || exit;

get_header();
?>

<main class="bg-cyber-light dark:bg-cyber-dark transition-colors duration-400 ease-in-out">

    <!-- Sidebar Navigation (Mobile) -->
    <div id="navMenu" class="transform translate-x-full opacity-0 w-64 py-4 px-4 z-40 fixed md:hidden top-0 h-full 
        bg-cyber-light/90 dark:bg-cyber-dark/90 backdrop-blur-md drop-shadow-cyber-cyan 
        transition-all duration-400 ease-in-out">
        <?php get_template_part('template-parts/content/content', 'aside'); ?>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 top-0 h-screen z-30 bg-black/70 hidden"></div>


    <!-- Contact Section -->
    <section class="min-h-screen flex items-center py-20 bg-gray-200 dark:bg-gray-900" id="contact">
        <div class="container mx-auto px-4 relative">
            <!-- Contact Information -->
            <div
                class="contact__data lg:absolute top-8 lg:left-14 xl:left-28 2xl:left-72 w-full lg:max-w-sm xl:max-w-md md:max-w-xl h-auto bg-gray-300 dark:bg-gray-800 px-6 py-12 mx-auto lg:ml-0 lg:mr-auto border-b-4 border-teal-800 z-10 transition-colors duration-300">
                <!-- Title -->
                <h2 class="relative text-5xl mx-auto my-6 mb-10 max-w-max">
                    <span class="relative z-10 text-4xl font-bold text-center text-gray-900 dark:text-white">
                        <?php esc_html_e( 'Contact Me.', 'wilson-devops' ); ?>
                    </span>
                    <span class="absolute top-2 -right-2 w-12 h-9 bg-teal-400 dark:bg-teal-600 opacity-50"></span>
                </h2>
                <!-- Description -->
                <p class="text-black dark:text-gray-300 text-start">
                    <?php esc_html_e( 'I will read all emails. Send me any message you want and I\'ll get back to you.', 'wilson-devops' ); ?>
                </p>
                <p class="text-black dark:text-gray-300 text-start mt-3">
                    <?php esc_html_e( 'I need your', 'wilson-devops' ); ?>
                    <b><?php esc_html_e( 'Name', 'wilson-devops' ); ?></b>
                    <?php esc_html_e( 'and', 'wilson-devops' ); ?>
                    <b><?php esc_html_e( 'Email Address', 'wilson-devops' ); ?></b>
                    <?php esc_html_e( ", I'll reply as quickly as possible.", 'wilson-devops' ); ?>
                </p>
                <!-- Geometric -->
                <div
                    class="relative bottom-64 xl:left-96 left-60 md:left-80 w-6 h-6 bg-primary rotate-[-30deg] before:content-[''] before:absolute before:w-5 before:h-5 before:border-2 before:border-black dark:before:border-white before:-left-1.5 before:-top-1.5 md:scale-120 animate-pulse">
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact__mail max-w-xl mx-auto mt-10 xl:mr-40 2xl:mr-56 lg:mr-1">
                <div class="bg-gray-950 dark:bg-black rounded-xl shadow-lg md:p-8">
                    <div class="py-6 px-4 transition-colors duration-300">
                        <h2 class="text-white text-center font-nico text-4xl mb-8">
                            <?php esc_html_e( 'Send Me A Message', 'wilson-devops' ); ?>
                        </h2>
                        <!-- Success Alert -->
                        <?php
							// Get messages and clear from session
							$forms_error   = isset( $_SESSION['forms_error'] ) ? $_SESSION['forms_error'] : array();
							$forms_success = isset( $_SESSION['forms_success'] ) ? $_SESSION['forms_success'] : array();
							unset( $_SESSION['forms_error'], $_SESSION['forms_success'] );
						?>

                        <!-- Success Alert -->
                        <?php if ( ! empty( $forms_success ) ) : ?>
                        <?php foreach ( $forms_success as $success ) : ?>
                        <div class="flex items-center justify-between bg-green-500 border-l-4 border-green-700 text-white p-4 mb-4 rounded"
                            role="alert">
                            <div>
                                <strong>Success!</strong>
                                <p class="text-sm"><?php echo esc_html( $success ); ?>
                                </p>
                            </div>
                            <button type="button" class="float-right text-white hover:text-gray-300"
                                onclick="this.parentElement.style.display='none';">×</button>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>

                        <!-- Error Alert -->
                        <?php if ( ! empty( $forms_error ) ) : ?>
                        <?php foreach ( $forms_error as $error ) : ?>
                        <div class="flex items-center justify-between bg-red-500 border-l-4 border-red-700 text-white p-4 mb-4 rounded"
                            role="alert">
                            <div>
                                <strong>Warning!</strong>
                                <p class="text-sm"><?php echo esc_html( $error ); ?></p>
                            </div>
                            <button type="button" class="float-right text-white hover:text-gray-300"
                                onclick="this.parentElement.style.display='none';">×</button>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <form class="grid gap-5" method="post" enctype="multipart/form-data">
                            <?php wp_nonce_field( 'send_form_data', '_wpnonce_send_form_data' ); ?>
                            <input type="text" name="honeypot" class="hidden">
                            <!-- Input Group -->
                            <div class="relative w-full h-14 group">
                                <input type="text" id="name" placeholder=" " name="name"
                                    class="peer absolute w-full h-full bg-gray-900 dark:bg-black border-b border-gray-700 text-white px-4 py-2 text-base font-medium outline-none focus:border-teal-800 hover:border-teal-800 focus:border-b-2 hover:border-b-2 group-hover:scale-x-100 transition-all duration-400"
                                    required />
                                <label for="name"
                                    class="absolute top-2 left-2.5 text-gray-400 text-sm font-medium bg-gray-950 px-2 pointer-events-none opacity-0 peer-placeholder-shown:opacity-100 peer-placeholder-shown:top-2.5 peer-focus:opacity-100 peer-focus:-top-4 transition-all duration-400">
                                    <?php esc_html_e( 'Full Name*', 'wilson-devops' ); ?>
                                </label>
                            </div>

                            <!-- Email Group -->
                            <div class="relative w-full h-14">
                                <input type="email" id="email" placeholder=" " name="email"
                                    class="peer absolute w-full h-full bg-gray-900 dark:bg-black border-b border-gray-700 text-white px-4 py-2 text-base font-medium outline-none focus:border-teal-800 hover:border-teal-800 focus:border-b-2 hover:border-b-2 group-hover:scale-x-100 transition-all duration-400"
                                    required />
                                <label for="email"
                                    class="absolute top-2 left-2.5 text-gray-400 text-sm font-medium bg-gray-950 px-2 pointer-events-none opacity-0 peer-placeholder-shown:opacity-100 peer-placeholder-shown:top-2.5 peer-focus:opacity-100 peer-focus:-top-4 transition-all duration-400">
                                    <?php esc_html_e( 'Email Address*', 'wilson-devops' ); ?>
                                </label>
                            </div>

                            <!-- Subject Group -->
                            <div class="relative w-full h-14">
                                <input type="text" id="subject" placeholder=" " name="subject"
                                    class="peer absolute w-full h-full bg-gray-900 dark:bg-black border-b border-gray-700 text-white px-4 py-2 text-base font-medium outline-none focus:border-teal-800 hover:border-teal-800 focus:border-b-2 hover:border-b-2 transition-all duration-400" />
                                <label for="subject"
                                    class="absolute top-2 left-2.5 text-gray-400 text-sm font-medium bg-gray-950 px-2 pointer-events-none opacity-0 peer-placeholder-shown:opacity-100 peer-placeholder-shown:top-2.5 peer-focus:opacity-100 peer-focus:-top-4 transition-all duration-400">
                                    <?php esc_html_e( 'Subject', 'wilson-devops' ); ?>
                                </label>
                            </div>

                            <!-- Message Group -->
                            <div class="relative">
                                <textarea id="message" rows="4" placeholder=" " name="message"
                                    class="peer resize-none w-full bg-gray-900 dark:bg-black border focus:border-2 hover:border-2 border-gray-700 hover:border-teal-800 focus:border-teal-800 text-white px-4 py-2 text-base font-medium outline-none transition-all duration-400"></textarea>
                                <label for="message"
                                    class="absolute top-2 left-2.5 text-gray-400 text-sm font-medium bg-gray-950 px-2 pointer-events-none opacity-0 peer-placeholder-shown:opacity-100 peer-placeholder-shown:top-2.5 peer-focus:opacity-100 peer-focus:-top-4 transition-all duration-400">
                                    <?php esc_html_e( 'Message*', 'wilson-devops' ); ?>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" name="submit_mail"
                                class="bg-teal-500 hover:bg-teal-700 text-white font-medium px-6 py-3 mt-4 rounded cursor-pointer transition-colors duration-400">
                                <?php esc_html_e( 'Submit', 'wilson-devops' ); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Social Media Links -->
            <div
                class="contact__social lg:absolute bottom-0 lg:left-14 xl:left-44 2xl:left-72 w-full max-w-sm mt-10 mx-auto text-center bg-transparent text-gray-900 dark:text-gray-300 p-6 rounded-xl">
                <p class="mb-3">
                    <?php esc_html_e( "Don't want to send mails?", 'wilson-devops' ); ?>
                </p>
                <p class="mb-6">
                    <?php esc_html_e( 'Write me on social media.', 'wilson-devops' ); ?>
                </p>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/spiral-arrow.png"
                    alt="Decorative arrow"
                    class="absolute bottom-40 right-32 transform rotate-45 skew-y-12 filter invert-0 dark:invert w-16 h-16 object-contain animate-bounce" />
                <div class="flex justify-center space-x-4">
                    <!-- Twitter -->
                    <a href="https://twitter.com/WilsonMbuthiaK" target="_blank"
                        class="p-3 rounded-full bg-gray-700 hover:bg-black transition duration-400">
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M8 2H1l8.26 11.014L1.45 22H4.1l6.388-7.349L16 22h7l-8.608-11.478L21.8 2h-2.65l-5.986 6.886L8 2Zm9 18L5 4h2l12 16h-2Z" />
                        </svg>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/in/wilson-mbuthia-k/" target="_blank"
                        class="p-3 rounded-full bg-gray-700 hover:bg-linkedin transition">
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128">
                            <path fill="currentColor"
                                d="M116 3H12a8.91 8.91 0 0 0-9 8.8v104.42a8.91 8.91 0 0 0 9 8.78h104a8.93 8.93 0 0 0 9-8.81V11.77A8.93 8.93 0 0 0 116 3zM39.17 107H21.06V48.73h18.11zm-9-66.21a10.5 10.5 0 1 1 10.49-10.5a10.5 10.5 0 0 1-10.54 10.48zM107 107H88.89V78.65c0-6.75-.12-15.44-9.41-15.44s-10.87 7.36-10.87 15V107H50.53V48.73h17.36v8h.24c2.42-4.58 8.32-9.41 17.13-9.41C103.6 47.28 107 59.35 107 75z" />
                        </svg>
                    </a>
                    <!-- GitHub -->
                    <a href="https://github.com/Wyllymk" target="_blank"
                        class="p-3 rounded-full bg-gray-700 hover:bg-black transition">
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 .297c-6.63 0-12 5.373-12 12c0 5.303 3.438 9.8 8.205 11.385c.6.113.82-.258.82-.577c0-.285-.01-1.04-.015-2.04c-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729c1.205.084 1.84 1.236 1.84 1.236c1.07 1.835 2.809 1.305 3.495.998c.108-.775.418-1.305.762-1.605c-2.665-.3-5.467-1.335-5.467-5.931c0-1.31.47-2.38 1.235-3.221c-.135-.303-.54-1.52.105-3.176c0 0 1.005-.322 3.3 1.23c.96-.267 1.98-.399 3-.405c1.02.006 2.04.138 3 .405c2.28-1.555 3.285-1.23 3.285-1.23c.645 1.655.24 2.872.12 3.176c.765.84 1.23 1.91 1.23 3.221c0 4.615-2.81 5.63-5.475 5.92c.435.375.81 1.11.81 2.24c0 1.62-.015 2.94-.015 3.34c0 .315.21.69.825.575C20.565 22.09 24 17.592 24 12.296c0-6.627-5.373-12-12-12z" />
                        </svg>
                    </a>
                    <!-- WhatsApp -->
                    <a href="https://wa.me/+254703639230?text=Hi%20I%20want%20to%20get%20in%20touch" target="_blank"
                        rel="nofollow" class="p-3 rounded-full bg-gray-700 hover:bg-whatsapp transition">

                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" width="200" height="200"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.23-8.24 8.23c-1.48 0-2.93-.39-4.19-1.15l-.3-.17l-3.12.82l.83-3.04l-.2-.32a8.188 8.188 0 0 1-1.26-4.38c.01-4.54 3.7-8.24 8.25-8.24M8.53 7.33c-.16 0-.43.06-.66.31c-.22.25-.87.86-.87 2.07c0 1.22.89 2.39 1 2.56c.14.17 1.76 2.67 4.25 3.73c.59.27 1.05.42 1.41.53c.59.19 1.13.16 1.56.1c.48-.07 1.46-.6 1.67-1.18c.21-.58.21-1.07.15-1.18c-.07-.1-.23-.16-.48-.27c-.25-.14-1.47-.74-1.69-.82c-.23-.08-.37-.12-.56.12c-.16.25-.64.81-.78.97c-.15.17-.29.19-.53.07c-.26-.13-1.06-.39-2-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.12-.24-.01-.39.11-.5c.11-.11.27-.29.37-.44c.13-.14.17-.25.25-.41c.08-.17.04-.31-.02-.43c-.06-.11-.56-1.35-.77-1.84c-.2-.48-.4-.42-.56-.43c-.14 0-.3-.01-.47-.01Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();