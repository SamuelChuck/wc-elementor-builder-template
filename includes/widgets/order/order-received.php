<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Widget.
 *
 * @package webt
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_Order_Received_Widget extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-order-received';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Order-received', 'webt');
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
		return ['webt-checkout'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		$this->start_controls_section(
			'order_received_section',
			[
				'label' => esc_html__('Order Received', 'webt'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'order_received_text',
			[
				'label'     => esc_html__('Order Received Text', 'webt'),
				'type'      => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Thank you. Your order has been received.', 'webt'),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'order_received_text_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-thankyou-order-received',
			)
		);
		$this->add_control(
			'order_received_text_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-thankyou-order-received' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'order_received_text_align',
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
				'default'      => '',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-thankyou-order-received' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		// order_received style
		$this->start_controls_section(
			'order_received_overview_style',
			array(
				'label' => esc_html__('Label', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'order_received_overview_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} ul.order_details li',
			)
		);
		$this->add_control(
			'order_received_overview_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.order_details li' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'order_received_overview_align',
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
				'default'      => '',
				'selectors' => [
					'{{WRAPPER}} ul.order_details li' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'order_received_details_style',
			array(
				'label' => esc_html__('Details', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'order_received_details_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} ul.order_details li strong',
			)
		);
		$this->add_control(
			'order_received_details_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.order_details li strong' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'order_received_details_align',
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
				'default'      => '',
				'selectors' => [
					'{{WRAPPER}} ul.order_details li strong' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render()
	{

		$settings = $this->get_settings_for_display();
		$order_received_text = $settings['order_received_text'];
		global $Get;
		$order_received = $Get->order_id();
		$order = wc_get_order($order_received);
?>

		<?php if ($order) :

			do_action('woocommerce_before_thankyou', $order->get_id()); ?>

			<?php if ($order->has_status('failed')) : ?>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
					<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
					<?php if (is_user_logged_in()) : ?>
						<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
					<?php endif; ?>
				</p>

			<?php else : ?>

				<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), $order); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																												?></p>

				<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

					<li class="woocommerce-order-overview__order order">
						<?php esc_html_e('Order number:', 'woocommerce'); ?>
						<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?></strong>
					</li>

					<li class="woocommerce-order-overview__date date">
						<?php esc_html_e('Date:', 'woocommerce'); ?>
						<strong><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?></strong>
					</li>

					<?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
						<li class="woocommerce-order-overview__email email">
							<?php esc_html_e('Email:', 'woocommerce'); ?>
							<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
									?></strong>
						</li>
					<?php endif; ?>

					<li class="woocommerce-order-overview__total total">
						<?php esc_html_e('Total:', 'woocommerce'); ?>
						<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?></strong>
					</li>

					<?php if ($order->get_payment_method_title()) : ?>
						<li class="woocommerce-order-overview__payment-method method">
							<?php esc_html_e('Payment method:', 'woocommerce'); ?>
							<strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
						</li>
					<?php endif; ?>

				</ul>

			<?php endif; ?>
		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
				<?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
				?></p>

		<?php endif; ?>

<?php
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Order_Received_Widget());