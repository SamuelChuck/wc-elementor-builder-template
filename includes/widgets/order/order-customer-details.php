<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
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

class Widget_Order_Customer_Details extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-order-customer-details';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Order Customer Details', 'woocommerce');
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
	 * Search keywords
	 */
	public function get_keywords()
	{
		return ['webt', 'woocommerce', 'customer', 'order', 'details', 'myaccount'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{

		/* --------------------------------- Section -------------------------------- */
		$this->start_controls_section(
			'section_style',
			array(
				'label' => esc_html__('Section', 'elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'section_display',
			[
				'label' => __('Display', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Flex', 'webt'),
				'label_off' => __('Block', 'webt'),
				'return_value' => 'flex',
				'default' => 'flex',
			]
		);

		$this->end_controls_section();
		/* --------------------------------- Column -------------------------------- */
		$this->start_controls_section(
			'column_style',
			array(
				'label' => esc_html__('Column', 'elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'column_border',
				'selector' => '{{WRAPPER}} .woocommerce-customer-details .woocommerce-column',
			]
		);
		$this->add_control(
			'column_border_radius',
			[
				'label' => esc_html__('Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details .woocommerce-column' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'column_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details .woocommerce-column' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'column_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details .woocommerce-column' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'column_space_between_vertical',
			[
				'label' => __('Vertical Gap', 'webt'),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details .woocommerce-columns .woocommerce-column.col-2' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'column_space_between_horizontal',
			[
				'label' => __('Horizonal Gap', 'webt'),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details .woocommerce-columns .woocommerce-column.col-2' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'column_width',
			[
				'label' => __('Width', 'webt'),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 400,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'devices' => ['desktop', 'tablet', 'mobile'],
				'desktop_default' => [
					'size' => 50,
					'unit' => '%',
				],
				'tablet_default' => [
					'size' => 50,
					'unit' => '%',
				],
				'mobile_default' => [
					'size' => 100,
					'unit' => '%',
				],

				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details .woocommerce-columns .woocommerce-column' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		/* --------------------------------- Heading -------------------------------- */
		$this->start_controls_section(
			'heading_style',
			array(
				'label' => esc_html__('Heading', 'elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'heading_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-customer-details .woocommerce-column__title',
			)
		);
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details .woocommerce-column__title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'heading_align',
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
					'{{WRAPPER}} .woocommerce-customer-details .woocommerce-column__title' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		/* --------------------------------- Address -------------------------------- */
		$this->start_controls_section(
			'address_style_section',
			array(
				'label' => esc_html__('Address', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'address_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-customer-details address',
			)
		);
		$this->add_control(
			'address_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details address' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'address_align',
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
					'{{WRAPPER}} .woocommerce-customer-details address' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'address_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details address' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		/* ---------------------------------- Phone --------------------------------- */
		$this->start_controls_section(
			'address_phone_style_section',
			array(
				'label' => esc_html__('Address Phone', 'skeletor'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'address_phone_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-customer-details address .woocommerce-customer-details--phone',
			)
		);
		$this->add_control(
			'address_phone_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details address .woocommerce-customer-details--phone' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'address_phone_align',
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
					'{{WRAPPER}} .woocommerce-customer-details address .woocommerce-customer-details--phone' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'address_phone_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details address .woocommerce-customer-details--phone' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();


		/* ---------------------------------- Email --------------------------------- */
		$this->start_controls_section(
			'address_email_style_section',
			array(
				'label' => esc_html__('Address Email', 'skeletor'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'address_email_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-customer-details address .woocommerce-customer-details--email',
			)
		);
		$this->add_control(
			'address_email_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details address .woocommerce-customer-details--email' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'address_email_align',
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
					'{{WRAPPER}} .woocommerce-customer-details address .woocommerce-customer-details--email' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'address_email_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-customer-details address .woocommerce-customer-details--email' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		if ($settings['section_display'] === 'flex') {
			$inline_css = '@media (min-width: 650px){section.woocommerce-columns {display: flex;}}';
		} else {
			$inline_css = 'section.woocommerce-columns {display: block;}';
		}
		global $wp;
		$orders = get_option('woocommerce_myaccount_orders_endpoint');
		$view_order = get_option('woocommerce_myaccount_view_order_endpoint');
		$order_received = get_option('woocommerce_checkout_order_received_endpoint');

		if (isset($wp->query_vars[$orders])) {
			$order_id = $wp->query_vars[$orders];
		} elseif (isset($wp->query_vars[$view_order])) {
			$order_id = $wp->query_vars[$view_order];
		} elseif (isset($wp->query_vars[$order_received])) {
			$order_id = $wp->query_vars[$order_received];
		} else {
			$order_id = webt_last_order_id();
		}
		$order = wc_get_order($order_id);

		if (empty($order) || !$order) {
			return;
		}

		$show_customer_details = current_user_can('administrator') || (is_user_logged_in() && $order->get_user_id() === get_current_user_id());

		if ($show_customer_details) {
?>
			<style>
				<?php echo $inline_css; ?>
			</style>
<?php
			wc_get_template('order/order-details-customer.php', array('order' => $order));
		}
	}
}
Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Order_Customer_Details());
