<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Template Widget.
 *
 * @class Widget_MyAccount_Downloads_Widget
 * @package webt
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_MyAccount_Downloads extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-downloads';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('My Account Downloads', 'webt');
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
		return ['webt-myaccount'];
	}

	/**
	 * Search keywords
	 */
	public function get_keywords()
	{
		return ['webt', 'woocommerce', 'download', 'myaccount'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{

		/* -------------------------------------------------------------------------- */
		/*                                 Content Tab                                */
		/* -------------------------------------------------------------------------- */

		/* --------------------------------- Message -------------------------------- */

		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Downloads Pending', 'webt'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_pending_message',
			[
				'label' => __('Downloads Pending Message', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'webt'),
				'label_off' => __('Hide', 'webt'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'massage_title',
			[
				'label' => __('Title', 'webt'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Download Pending Message', 'webt'),
				'default' => __('Download pending', 'webt'),
				'condition'     => [
					'show_pending_message' => 'yes',
				],
			]
		);

		$this->add_control(
			'massage',
			[
				'label' => __('Message', 'webt'),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Show Download Message', 'webt'),
				'default' => __('Your Download request is pending', 'webt'),
				'condition'     => [
					'show_pending_message' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		/* -------------------------------------------------------------------------- */
		/*                                 Style Tabe                                 */
		/* -------------------------------------------------------------------------- */

		/* ------------------------------ Message Title ----------------------------- */

		$this->start_controls_section(
			'section_message_title_style',
			array(
				'label' => esc_html__('Message Title', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'     => [
					'show_pending_message' => 'yes',
				],
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'message_title_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-notice .woocommerce-downloads-pending__title',
			)
		);
		$this->add_control(
			'message_title_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-notice .woocommerce-downloads-pending__title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'message_title_border',
				'selector' => '{{WRAPPER}} .woocommerce-notice .woocommerce-downloads-pending__title',
			]
		);

		$this->add_responsive_control(
			'message_title_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-notice .woocommerce-downloads-pending__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'message_title_text_align',
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
					'{{WRAPPER}} .woocommerce-notice .woocommerce-downloads-pending__title' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		/* --------------------------------- Message -------------------------------- */

		$this->start_controls_section(
			'section_message_style',
			array(
				'label' => esc_html__('Message', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'     => [
					'show_pending_message' => 'yes',
				],
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'message_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-notice .woocommerce-downloads-pending',
			)
		);
		$this->add_control(
			'message_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-notice .woocommerce-downloads-pending' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'message_border',
				'selector' => '{{WRAPPER}} .woocommerce-notice .woocommerce-downloads-pending',
			]
		);

		$this->add_responsive_control(
			'message_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-notice .woocommerce-downloads-pending' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'message_text_align',
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
					'{{WRAPPER}} .woocommerce-notice .woocommerce-downloads-pending' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();


		/* --------------------------------- Heading -------------------------------- */

		$this->start_controls_section(
			'section_heading_style',
			array(
				'label' => esc_html__('Table Headings', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'heading_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-table--order-downloads thead th',
			)
		);
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-downloads thead th' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'heading_border',
				'selector' => '{{WRAPPER}} .woocommerce-table--order-downloads thead th',
			]
		);

		$this->add_responsive_control(
			'heading_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-downloads thead th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'heading_text_align',
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
					'{{WRAPPER}} .woocommerce-table--order-downloads thead th' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		/* ------------------------------- Table style ------------------------------ */

		$this->start_controls_section(
			'section_table_style',
			array(
				'label' => esc_html__('Table Style', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'table_border',
				'selector' => '{{WRAPPER}} tbody tr td',
			]
		);
		$this->add_responsive_control(
			'table_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} tbody tr td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'table_text_align',
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
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
				'selectors' => [
					'{{WRAPPER}} tbody tr td' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		/* ---------------------------- Product Style ---------------------------- */

		$this->start_controls_section(
			'section_product_name_style',
			array(
				'label' => esc_html__('Product Name', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'product_name_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .download-product a',
			)
		);
		$this->add_control(
			'product_name_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .download-product a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'product_name_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} tbody tr td.download-product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		/* --------------------------- Downloads remaining -------------------------- */

		$this->start_controls_section(
			'section_download_remaining_style',
			array(
				'label' => esc_html__('Downloads remaining', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'download_remaining_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .download-remaining',
			)
		);
		$this->add_control(
			'download_remaining_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .download-remaining' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'download_remaining_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} tbody tr td.download-remaining' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		/* --------------------------------- Expires -------------------------------- */

		$this->start_controls_section(
			'section_expires_style',
			array(
				'label' => esc_html__('Expires', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'expires_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .download-expires',
			)
		);
		$this->add_control(
			'expires_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .download-expires' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'expires_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} tbody tr td.download-expires' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		/* --------------------------- Download-file style -------------------------- */

		$this->start_controls_section(
			'section_download_file_style',
			array(
				'label' => esc_html__('Download', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'download_file_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .download-file a.woocommerce-MyAccount-downloads-file',
			)
		);
		//Tabs
		$this->start_controls_tabs('download_file_button_style_tabs');
		//Normal tab
		$this->start_controls_tab(
			'download_file_button_style_normal',
			[
				'label' => esc_html__('Normal', 'webt'),
			]
		);

		$this->add_control(
			'download_file_button_text_color',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .download-file a.woocommerce-MyAccount-downloads-file' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'download_file_button_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .download-file a.woocommerce-MyAccount-downloads-file' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'download_file_button_border',
				'selector' => '{{WRAPPER}} .download-file a.woocommerce-MyAccount-downloads-file',
			]
		);

		$this->add_control(
			'download_file_button_radius',
			[
				'label' => esc_html__('Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .download-file a.woocommerce-MyAccount-downloads-file' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		//Hover Tab
		$this->start_controls_tab(
			'download_file_button_style_hover',
			[
				'label' => esc_html__('Hover', 'webt'),
			]
		);

		$this->add_control(
			'download_file_button_text_color_hover',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .download-file a.woocommerce-MyAccount-downloads-file:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'download_file_button_bg_color_hover',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .download-file a.woocommerce-MyAccount-downloads-file:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'download_file_button_border_hover',
				'selector' => '{{WRAPPER}} .download-file a.woocommerce-MyAccount-downloads-file:hover',
			]
		);

		$this->add_control(
			'download_file_button_radius_hover',
			[
				'label' => esc_html__('Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .download-file a.woocommerce-MyAccount-downloads-file:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'download_file_button_transition',
			[
				'label' => esc_html__('Transition Duration', 'webt'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.2,
				],
				'range' => [
					'px' => [
						'max' => 2,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .download-file a.woocommerce-MyAccount-downloads-file' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->add_responsive_control(
			'download_file_button_padding',
			[
				'label' => esc_html__('Buton Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .download-file a.woocommerce-MyAccount-downloads-file' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'download_file_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} tbody tr td.download-file' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$order_id = webt_order_id();
		$order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

		if (empty($order) || !$order) {
			return;
		}

		$downloads             = $order->get_downloadable_items();
		$show_downloads        = $order->has_downloadable_item();
		$allow_downloads	   = $order->is_download_permitted();

		if (!$downloads) {
			$downloads = WC()->customer->get_downloadable_products();
		}
		if ($show_downloads && $allow_downloads) {
			wc_get_template(
				'order/downloads-table.php',
				array(
					'downloads' => $downloads,
				)
			);
		} elseif ($show_downloads && $settings['show_pending_message'] === 'yes') { ?>
			<h3 class="woocommerce-notice woocommerce-notice--success woocommerce-downloads-pending"> <?php echo $settings['massage_title'] ?> </h3>
			<p class="woocommerce-notice woocommerce-notice--success woocommerce-downloads-pending"> <?php echo $settings['massage'] ?> </p>
<?php
		}
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Downloads());
