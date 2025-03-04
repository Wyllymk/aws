<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both
 * the current comments and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atomic_Web_Space
 */
// Exit if accessed directly
defined('ABSPATH') || exit;

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password, we will return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="mt-12 bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
    <?php if (have_comments()) : ?>
    <h2 class="text-2xl md:text-3xl font-bold text-white mb-6">
        <?php
            $atomic_web_space_comment_count = get_comments_number();
            if ('1' === $atomic_web_space_comment_count) {
                printf(
                    /* translators: 1: title. */
                    esc_html__('One comment on “%1$s”', 'atomic-web-space'),
                    '<span class="text-blue-300">' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: title. */
                    esc_html(_nx('%1$s comment on “%2$s”', '%1$s comments on “%2$s”', $atomic_web_space_comment_count, 'comments title', 'atomic-web-space')),
                    '<span class="text-blue-300">' . number_format_i18n($atomic_web_space_comment_count) . '</span>',
                    '<span class="text-blue-300">' . get_the_title() . '</span>'
                );
            }
            ?>
    </h2>

    <!-- Comments Navigation -->
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <nav class="flex justify-between mb-6 text-gray-300">
        <div>
            <?php previous_comments_link('<span class="hover:text-blue-300 transition duration-300">← Older Comments</span>'); ?>
        </div>
        <div>
            <?php next_comments_link('<span class="hover:text-blue-300 transition duration-300">Newer Comments →</span>'); ?>
        </div>
    </nav>
    <?php endif; ?>

    <!-- Comments List -->
    <ol class="space-y-6">
        <?php
            wp_list_comments([
                'style'       => 'ol',
                'callback'    => 'atomic_web_space_html5_comment',
                'short_ping'  => true,
                'avatar_size' => 48,
            ]);
            ?>
    </ol>

    <!-- Comments Navigation (Bottom) -->
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <nav class="flex justify-between mt-6 text-gray-300">
        <div>
            <?php previous_comments_link('<span class="hover:text-blue-300 transition duration-300">← Older Comments</span>'); ?>
        </div>
        <div>
            <?php next_comments_link('<span class="hover:text-blue-300 transition duration-300">Newer Comments →</span>'); ?>
        </div>
    </nav>
    <?php endif; ?>

    <!-- Comments Closed Message -->
    <?php if (!comments_open()) : ?>
    <p class="text-gray-400 text-center mt-6"><?php esc_html_e('Comments are closed.', 'atomic-web-space'); ?></p>
    <?php endif; ?>

    <?php endif; ?>

    <!-- Comment Form -->
    <?php
    comment_form([
        'title_reply'          => '<h3 class="text-2xl font-bold text-white mb-4">Leave a Comment</h3>',
        'title_reply_to'       => '<h3 class="text-2xl font-bold text-white mb-4">Reply to %s</h3>',
        'comment_notes_before' => '<p class="text-gray-300 mb-4">Your email address will not be published. Required fields are marked <span class="text-blue-300">*</span></p>',
        'class_form'           => 'space-y-6',
        'class_submit'         => 'bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold px-6 py-2 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 hover:shadow-lg',
        'fields'               => [
            'author' => '<div class="grid grid-cols-1 md:grid-cols-2 gap-4"><div><label for="author" class="block text-gray-200 mb-2">Name <span class="text-blue-300">*</span></label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" class="w-full bg-gray-700 text-gray-200 border border-gray-600 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required></div>',
            'email'  => '<div><label for="email" class="block text-gray-200 mb-2">Email <span class="text-blue-300">*</span></label><input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" class="w-full bg-gray-700 text-gray-200 border border-gray-600 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required></div></div>',
            'url'    => '<div><label for="url" class="block text-gray-200 mb-2">Website</label><input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" class="w-full bg-gray-700 text-gray-200 border border-gray-600 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"></div>',
        ],
        'comment_field'        => '<div><label for="comment" class="block text-gray-200 mb-2">Comment <span class="text-blue-300">*</span></label><textarea id="comment" name="comment" class="w-full bg-gray-700 text-gray-200 border border-gray-600 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="6" required></textarea></div>',
    ]);
    ?>
</div><!-- #comments -->

<?php
// Custom Comment Display Function
function atomic_web_space_html5_comment($comment, $args, $depth) {
    $tag = ('div' === $args['style']) ? 'div' : 'li';
    ?>
<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>"
    <?php comment_class('bg-gray-900 rounded-lg p-4 shadow-md'); ?>>
    <div class="flex items-start space-x-4">
        <!-- Avatar -->
        <div class="flex-shrink-0">
            <?php if ($args['avatar_size'] != 0) : ?>
            <img src="<?php echo esc_url(get_avatar_url($comment, $args['avatar_size'])); ?>"
                alt="<?php comment_author(); ?>" class="h-12 w-12 rounded-full border border-gray-700">
            <?php endif; ?>
        </div>
        <!-- Comment Content -->
        <div class="flex-1">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-blue-300 font-semibold"><?php comment_author_link(); ?></span>
                    <time class="block text-gray-400 text-sm" datetime="<?php comment_time('c'); ?>">
                        <?php printf('%1$s at %2$s', get_comment_date(), get_comment_time()); ?>
                    </time>
                </div>
                <?php if ('0' == $comment->comment_approved) : ?>
                <span class="text-yellow-400 text-sm italic">Awaiting Moderation</span>
                <?php endif; ?>
            </div>
            <div class="mt-2 text-gray-200">
                <?php comment_text(); ?>
            </div>
            <div class="mt-2 text-gray-300 text-sm">
                <?php
                    comment_reply_link(array_merge($args, [
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth'],
                        'reply_text' => '<span class="hover:text-blue-300 transition duration-300">Reply</span>',
                        'before'     => '<span class="mr-2">',
                        'after'      => '</span>',
                    ]));
                    edit_comment_link('<span class="hover:text-blue-300 transition duration-300">Edit</span>', '<span class="mr-2">', '</span>');
                    ?>
            </div>
        </div>
    </div>
</<?php echo $tag; ?>>
<?php
}