<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use WEBT\Plugin;

/**
 * WooCommerce Page Builder For Elementor Widget.
 *
 * @class Widget_MyAccount_Form_Lost_Password_Confirmation_Widget
 * @package webt
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


class Widget_MyAccount_Form_Lost_Password_Confirmation_Widget extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-myaccount-lost-password-confirmation';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Lost Password Confirmation', 'webt');
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-woocommerce';
	}

	/**
	 * Get widget categories.
	 */
	public function get_categories()
	{
		return ['webt-myaccount-form'];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls()
	{
		/*Content Tab*/

		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Content', 'webt'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'password_confirmation_message',
			[
				'label' => __('Confirmation Message', 'webt'),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Massage', 'webt'),
				'default' => __('A password reset email has been sent to the email address on file for your account, but may take several minutes to show up in your inbox. Please wait at least 10 minutes before attempting another reset.', 'webt'),
			]
		);

		$this->add_control(
			'password_confirmation_notice',
			[
				'label' => __('Comfirmation Notice', 'webt'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Password reset email has been sent', 'webt'),
				'default' => __(' Password reset email has been sent', 'webt'),
			]
		);

		/*Switch*/
		$this->add_control(
			'show_password_confirmation_notice',
			[
				'label' => __('Show comfirmation notice', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'webt'),
				'label_off' => __('Hide', 'webt'),
				'return_value' => 'show',
				'default' => 'hide',
				'separator' => 'before',
			]
		);

		/*Url*/
		$this->add_control(
			'redirect_after_login',
			[
				'label' => esc_html__('Redirect After Login', 'webt'),
				'type'  => Controls_Manager::SWITCHER,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'redirect_url',
			[
				'type'          => Controls_Manager::URL,
				'show_label'    => false,
				'show_external' => false,
				'separator'     => false,
				'placeholder'   => 'http://your-link.com/',
				'description'   => esc_html__('Note: Because of security reasons, you can only use your current domain here.', 'webt'),
				'condition'     => [
					'redirect_after_login' => 'yes',
				],
			]
		);

		$this->end_controls_section();


		// Message
		$this->start_controls_section(
			'message_style',
			array(
				'label' => esc_html__('Message', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'message_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .webt-account-form-lost-password-confirmation-message .woocommerce_lost_password_confirmation_message',
			)
		);
		$this->add_control(
			'message_color',
			[
				'label' => esc_html__('Message Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-lost-password-confirmation-message .woocommerce_lost_password_confirmation_message' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'message_align',
			[
				'label'        => esc_html__('Alignment', 'elementor'),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left'   => [
						'title' => esc_html__('Left', 'elementor'),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'elementor'),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__('Right', 'elementor'),
						'icon'  => 'fa fa-align-right',
					],
				],
				'prefix_class' => '',
				'default'      => '',
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-lost-password-confirmation-message .woocommerce_lost_password_confirmation_message' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

?>
		<div class="webt-account-form-lost-password-confirmation-message">

			<?php
			if ('show' === $settings['show_password_confirmation_notice']) {
				wc_print_notice(esc_html__($settings['password_confirmation_notice'], 'woocommerce'));
			} ?>

			<p class="woocommerce-form woocommerce_lost_password_confirmation_message"> <?php echo esc_html(apply_filters('woocommerce_lost_password_confirmation_message', esc_html__($settings['password_confirmation_message'], 'woocommerce'))); ?></p>

		</div>
<?php

	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Form_Lost_Password_Confirmation_Widget());
