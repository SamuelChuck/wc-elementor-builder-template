<?php
/**
 * Shows Elementor Blank Slate template 
 * 
 * @since 1.0.0
 * @package Elementor
 */

if (empty($gqv_library_type)) {
    $post_counts = (array) wp_count_posts(self::POST_TYPE);
    unset($post_counts['auto-draft']);
    $post_count = array_sum($post_counts);

    if (0 < $post_count) {
        return;
    }

    $gqv_library_type = 'template';

    $inline_css .= '#woocomerce-template-library-tabs-wrapper {display: none;}';
}

$library_type_label = self::template_label_type($gqv_library_type);
?>

<style type="text/css">
    <?php echo ($inline_css); ?>
</style>
<?php
if ('advanced' === $gqv_library_type) {
    return;
}
?>
<div class="elementor-template_library-blank_state">
    <div class="elementor-blank_state">
        <i class="eicon-folder"></i>
        <h2> <?php printf(esc_html__('Create Your First %s', 'webt'), $library_type_label); ?> </h2>
        <p><?php echo esc_html__('Add templates and reuse them across your website. Easily export and import them to any other project, for an optimized workflow.', 'webt'); ?></p>
        <a id="webt-elementor-template-library-add-new" class="elementor-button elementor-button-success" href="#">
            <?php printf(esc_html__('Add New %s', 'elementor'), $library_type_label); ?>
        </a>
    </div>
</div>
<?php
