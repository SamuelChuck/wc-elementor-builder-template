<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

$template_types = self::template_label_type('get_types');
$selected = get_query_var(self::TAXONOMY_SLUG);
?>
<!-- Elementor New Teplate POPUP -->
<script type="text/template" id="tmpl-elementor-new-template">
	<!-- Elementor New Template Form Container  -->
	<div id="elementor-new-template__description">
		<div id="elementor-new-template__description__title"><?php echo esc_html__('Shop Builder Helps You', 'we vbt') ?><br> <span><?php echo esc_html__('Build Efficiently', 'elementor') ?></span></div>
		<div id="elementor-new-template__description__content"><?php echo esc_html__('Use templates to customize & create new looks & feel for your woocommerce site, and set them in the `Advance` tab with a few clicks whenever needed.', 'webt'); ?></div>
	</div>
	<!-- Elementor New Template Form -->
	<form id="elementor-new-template__form" action="<?php esc_url(admin_url('/edit.php')); ?>">
		<div id="elementor-new-template__form__title"><?php echo esc_html__('Choose Template Type', 'elementor'); ?></div>
		<div id="elementor-new-template__form__template-type__wrapper" class="elementor-form-field">
			<label for="elementor-new-template__form__template-type" class="elementor-form-field__label"><?php echo esc_html__('Select the type of template you want to work on', 'elementor'); ?></label>
			<div class="elementor-form-field__select__wrapper">
				<select id="elementor-new-template__form__template-type" class="elementor-form-field__select" name="template_type" required>
					<option value=""><?php echo esc_html__('Select', 'elementor'); ?>...</option>
					<?php
					foreach ($template_types as $value => $type_title) {
						printf('<option value="%1$s" %2$s>%3$s</option>', $value, selected($selected, $value, false), $type_title);
					}
					?>
				</select>
			</div>
		</div>
		<div id="elementor-new-template__form__post-title__wrapper" class="elementor-form-field">
			<label for="elementor-new-template__form__post-title" class="elementor-form-field__label">
				<?php echo esc_html__('Name your template', 'elementor'); ?>
			</label>
			<div class="elementor-form-field__text__wrapper">
				<input type="text" placeholder="<?php echo esc_attr__('Enter template name (optional)', 'elementor'); ?>" id="elementor-new-template__form__post-title" class="elementor-form-field__text" name="post_data[post_title]">
			</div>
		</div>
		<input type="hidden" name="action" value="webt_new_post">
		<input type="hidden" name="post_type" value="<?php echo self::POST_TYPE; ?>">
		<input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce('webt_new_post_nonce'); ?>">
		<button id="elementor-new-template__form__submit" class="elementor-button elementor-button-success"><?php echo esc_html__('Create Template', 'elementor'); ?></button>
	</form>
</script>