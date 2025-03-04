<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Atomic_Web_Space
 */
// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<section id="primary" class="relative bg-gray-900 min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900/50 via-gray-900 to-purple-900/50"></div>
    <div
        class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/circuit-pattern.png')]">
    </div>
    <!-- Animated Particles -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
    </div>

    <main id="main" class="relative container mx-auto px-4 max-w-4xl z-10 text-center">
        <div>
            <!-- Header -->
            <header class="page-header mb-8">
                <h1 class="text-6xl md:text-8xl font-bold text-white mb-4 tracking-tight" x-data="{ text: '404' }"
                    x-text="text"></h1>
                <p class="text-2xl md:text-3xl text-gray-300">Lost in the Digital Void</p>
            </header>

            <!-- Content -->
            <div class="page-content space-y-6" x-data="{ animate: true }" x-init="$nextTick(() => animateContent())">
                <p class="text-gray-200 text-lg md:text-xl max-w-2xl mx-auto">
                    <?php esc_html_e('This page couldn’t be found. It may have been removed, renamed, or perhaps it’s drifting in cyberspace.', 'atomic-web-space'); ?>
                </p>

                <!-- Search Form -->
                <div class="max-w-md mx-auto">
                    <?php get_search_form(['class' => 'flex items-center gap-2 bg-gray-800 rounded-lg p-2']); ?>
                </div>

                <!-- Back to Home Button -->
                <a href="<?php echo esc_url(home_url('/')); ?>"
                    class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold px-6 py-3 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    Return to Base
                </a>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-32 h-32 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div
                class="absolute bottom-0 right-0 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl animate-pulse animation-delay-2000">
            </div>
        </div>
    </main><!-- #main -->
</section><!-- #primary -->

<!-- Custom Search Form Styling (Override Default) -->
<style>
.search-form {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.search-form input[type="search"] {
    flex: 1;
    background: #1F2937;
    /* gray-800 */
    color: #E5E7EB;
    /* gray-200 */
    border: 1px solid #4B5563;
    /* gray-600 */
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    outline: none;
}

.search-form input[type="search"]:focus {
    ring: 2px solid #3B82F6;
    /* blue-500 */
}

.search-form input[type="submit"] {
    background: linear-gradient(to right, #2563EB, #9333EA);
    /* blue-600 to purple-600 */
    color: white;
    font-weight: 600;
    padding: 0.5rem 1.5rem;
    border-radius: 0.5rem;
    border: none;
    transition: all 0.3s;
}

.search-form input[type="submit"]:hover {
    background: linear-gradient(to right, #1D4ED8, #7E22CE);
    /* blue-700 to purple-700 */
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Animate 404 Text
    gsap.from('h1', {
        opacity: 0,
        y: -50,
        scale: 0.8,
        duration: 1,
        ease: 'power3.out',
        onComplete: () => {
            gsap.to('h1', {
                scale: 1.05,
                duration: 1.5,
                yoyo: true,
                repeat: -1,
                ease: 'sine.inOut'
            });
        }
    });

    // Animate Particles
    gsap.to('.particle-1', {
        x: 100,
        y: 150,
        duration: 5,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut'
    });
    gsap.to('.particle-2', {
        x: -150,
        y: 100,
        duration: 6,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut',
        delay: 1
    });
    gsap.to('.particle-3', {
        x: 120,
        y: -120,
        duration: 4,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut',
        delay: 2
    });
});

function animateContent() {
    gsap.from('.page-content', {
        opacity: 0,
        y: 30,
        duration: 1,
        ease: 'power3.out',
        delay: 0.5
    });
}
</script>

<?php
get_footer();