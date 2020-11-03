<?php

namespace WEBT;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use WC_Shortcode_Cart;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Widget.
 *
 * @package webt
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_Mini_Cart extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-mini-cart';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Mini Cart', 'webt');
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
		return ['webt-cart'];
	}

	/**
	 * Search keywords
	 */
	public function get_keywords()
	{
		return ['webt', 'woocommerce', 'cart', 'mini', 'table'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{

		$this->start_controls_section(
			'label_section',
			[
				'label' => __('Title Labels', 'webt'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'empty_cart_message',
			[
				'label' => __('Empty Cart Message', 'webt'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __('You have no item in your cart.', 'webt'),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_cart_style',
			[
				'label' => __('Cart', 'webt-pro'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'empty_cart_message_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}} .woocommerce-mini-cart__empty-message',
			]
		);
		$this->add_responsive_control(
			'empty_cart_message_align',
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
					'{{WRAPPER}} .woocommerce-mini-cart__empty-message' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'empty_cart_message_margin',
			[
				'label' => __('Margin', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-mini-cart__empty-message' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'heading_subtotal_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __('Subtotal', 'webt-pro'),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'subtotal_color',
			[
				'label' => __('Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__subtotal' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtotal_typography',
				'selector' => '{{WRAPPER}} .webt-menu-cart__subtotal',
			]
		);
		$this->add_responsive_control(
			'subtotal_align',
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
					'{{WRAPPER}} .webt-menu-cart__subtotal' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'subtotal_padding',
			[
				'label' => __('Padding', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__subtotal' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);		
		
		$this->add_control(
			'heading_subtotal_price_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __('Subtotal Price', 'webt-pro'),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'subtotal_price_color',
			[
				'label' => __('Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__subtotal > span.woocommerce-Price-amount.amount' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtotal_price_typography',
				'selector' => '{{WRAPPER}} .webt-menu-cart__subtotal > span.woocommerce-Price-amount.amount',
			]
		);
		$this->add_control(
			'heading_product_divider_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __('Divider', 'webt-pro'),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'divider_style',
			[
				'label' => __('Style', 'webt-pro'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __('None', 'webt-pro'),
					'solid' => __('Solid', 'webt-pro'),
					'double' => __('Double', 'webt-pro'),
					'dotted' => __('Dotted', 'webt-pro'),
					'dashed' => __('Dashed', 'webt-pro'),
					'groove' => __('Groove', 'webt-pro'),
				],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product, {{WRAPPER}} .webt-menu-cart__subtotal' => 'border-bottom-style: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label' => __('Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product, {{WRAPPER}} .webt-menu-cart__subtotal' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'divider_width',
			[
				'label' => __('Weight', 'webt-pro'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product, {{WRAPPER}} .webt-menu-cart__products, {{WRAPPER}} .webt-menu-cart__subtotal' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'divider_product_gap',
			[
				'label' => __('Product Spacing', 'webt-pro'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} tr.webt-menu-cart__product.woocommerce-cart-form__cart-item.cart_item' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'divider_gap',
			[
				'label' => __('Subtotal Spacing', 'webt-pro'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__subtotal' => 'padding-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .webt-menu-cart__footer-buttons, {{WRAPPER}} .webt-menu-cart__subtotal' => 'padding-top: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_product_tabs_style',
			[
				'label' => __('Products', 'webt-pro'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'product_image_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __('Product Image', 'webt-pro'),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'product_image_align',
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
					'{{WRAPPER}} img.attachment-woocommerce_thumbnail.size-woocommerce_thumbnail' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'product_image_width',
			[
				'label' => __('Width', 'webt-pro'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 90,
						'max' => 180,
					],
				],
				'size-units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} img.attachment-woocommerce_thumbnail.size-woocommerce_thumbnail' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_image_border',
				'selector' => '{{WRAPPER}} img.attachment-woocommerce_thumbnail.size-woocommerce_thumbnail',
			]
		);
		$this->add_responsive_control(
			'product_image_border_radius',
			[
				'label' => __('Radius', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} img.attachment-woocommerce_thumbnail.size-woocommerce_thumbnail' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'product_image_padding',
			[
				'label' => __('Padding', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} img.attachment-woocommerce_thumbnail.size-woocommerce_thumbnail' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'product_image_margin',
			[
				'label' => __('Margin', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-image.product-thumbnail > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'product_title_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __('Product Title', 'webt-pro'),
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs('product_title_control_tabs');
		$this->start_controls_tab('product_title_icon_style_normal', ['label' => 'Normal']);

		$this->add_control(
			'product_title_color',
			[
				'label' => __('Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-name, {{WRAPPER}} .webt-menu-cart__product-name a' => 'color: {{VALUE}}',

				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab('product_title_icon_style_hover', ['label' => 'Hover']);

		$this->add_control(
			'product_title_color_hover',
			[
				'label' => __('Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-name:hover, {{WRAPPER}} .webt-menu-cart__product-name a:hover' => 'color: {{VALUE}}',

				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();



		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'product_title_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}} .webt-menu-cart__product-name, {{WRAPPER}} .webt-menu-cart__product-name a',
			]
		);
		$this->add_responsive_control(
			'product_title_align',
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
					'{{WRAPPER}} .webt-menu-cart__product-name, {{WRAPPER}} .webt-menu-cart__product-name a' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'product_title_margin',
			[
				'label' => __('Margin', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'heading_product_price_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __('Product Price', 'webt-pro'),
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs('product_price_control_tabs');
		$this->start_controls_tab('product_price_style_normal', ['label' => 'Normal']);

		$this->add_control(
			'product_price_color',
			[
				'label' => __('Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-price' => 'color: {{VALUE}}',

				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab('product_price_style_hover', ['label' => 'Hover']);
		$this->add_control(
			'product_price_color_hover',
			[
				'label' => __('Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-price:hover' => 'color: {{VALUE}}',

				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();



		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'product_price_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}} .webt-menu-cart__product-price',
			]
		);

		$this->add_responsive_control(
			'product_price_align',
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
					'{{WRAPPER}} .webt-menu-cart__product-price' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'product_price_margin',
			[
				'label' => __('Margin', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'remove_icon_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __('Product Remove', 'webt-pro'),
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs('remove_icon_control_tabs');
		$this->start_controls_tab('remove_icon_style_normal', ['label' => 'Normal']);
		$this->add_control(
			'remove_icon_color',
			[
				'label' => __('Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-remove.product-remove > a' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'remove_icon_typography',
				'selector' => '{{WRAPPER}} .webt-menu-cart__product-remove.product-remove > a',
			]
		);
		$this->add_responsive_control(
			'remove_icon_align',
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
					'{{WRAPPER}} .webt-menu-cart__product-remove.product-remove' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'remove_icon_border',
				'selector' => '{{WRAPPER}} .webt-menu-cart__product-remove.product-remove > a',
			]
		);

		$this->add_responsive_control(
			'remove_icon_border_radius',
			[
				'label' => __('Radius', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-remove.product-remove > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'remove_icon_box_shadow',
				'label' => __( 'Box Shadow', 'webt-pro' ),
				'selector' => '{{WRAPPER}} .webt-menu-cart__product-remove.product-remove > a',
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab('remove_icon_style_hover', ['label' => 'Hover']);

		$this->add_control(
			'remove_icon_color_hover',
			[
				'label' => __('Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-remove.product-remove > a:hover' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'remove_icon_typography_hover',
				'selector' => '{{WRAPPER}} .webt-menu-cart__product-remove.product-remove > a:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'remove_icon_border_hover',
				'selector' => '{{WRAPPER}} .webt-menu-cart__product-remove.product-remove > a:hover',
			]
		);

		$this->add_responsive_control(
			'remove_icon_border_radius_hover',
			[
				'label' => __('Radius', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-remove.product-remove > a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'remove_icon_box_shadow_hover',
				'label' => __( 'Box Shadow', 'webt-pro' ),
				'selector' => '{{WRAPPER}} .webt-menu-cart__product-remove.product-remove > a:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();



		$this->add_responsive_control(
			'remove_icon_padding',
			[
				'label' => __('Padding', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-remove.product-remove > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; display: -webkit-inline-box;',
				],
			]
		);
		$this->add_responsive_control(
			'remove_icon_margin',
			[
				'label' => __('Margin', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__product-remove.product-remove' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_buttons',
			[
				'label' => __('Buttons', 'webt-pro'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'buttons_layout',
			[
				'label' => __('Layout', 'webt-pro'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'inline' => __('Inline', 'webt-pro'),
					'stacked' => __('Stacked', 'webt-pro'),
				],
				'default' => 'inline',
				'prefix_class' => 'webt-menu-cart--buttons-',
			]
		);

		$this->add_control(
			'space_between_buttons',
			[
				'label' => __('Space Between', 'webt-pro'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__footer-buttons' => 'grid-column-gap: {{SIZE}}{{UNIT}}; grid-row-gap: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .webt-menu-cart__footer-buttons' => 'display: grid; grid-template-columns: 1fr 1fr;'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'product_buttons_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}} .webt-menu-cart__footer-buttons .webt-button',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => __('Radius', 'webt-pro'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .webt-menu-cart__footer-buttons .webt-button' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'heading_view_cart_button_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __('View Cart', 'webt-pro'),
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs('view_cart_control_tabs');
		$this->start_controls_tab('view_cart_style_normal', ['label' => 'Normal']);

		$this->add_control(
			'view_cart_button_text_color',
			[
				'label' => __('Text Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-button--view-cart' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'view_cart_button_background_color',
			[
				'label' => __('Background Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-button--view-cart' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab('view_cart_style_hover', ['label' => 'Hover']);

		$this->add_control(
			'view_cart_button_text_color_hover',
			[
				'label' => __('Text Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-button--view-cart:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'view_cart_button_background_color_hover',
			[
				'label' => __('Background Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-button--view-cart:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'view_cart_border',
				'selector' => '{{WRAPPER}} .webt-button--view-cart',
			]
		);

		$this->add_responsive_control(
			'view_cart_padding',
			[
				'label' => __('Padding', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-button--view-cart' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'view_cart_margin',
			[
				'label' => __('Margin', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-button--view-cart' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'heading_checkout_button_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __('Checkout', 'webt-pro'),
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs('checkout_control_tabs');
		$this->start_controls_tab('checkout_style_normal', ['label' => 'Normal']);

		$this->add_control(
			'checkout_button_text_color',
			[
				'label' => __('Text Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-button--checkout' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'checkout_button_background_color',
			[
				'label' => __('Background Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-button--checkout' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab('checkout_style_hover', ['label' => 'Hover']);

		$this->add_control(
			'checkout_button_text_color_hover',
			[
				'label' => __('Text Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-button--checkout:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'checkout_button_background_color_hover',
			[
				'label' => __('Background Color', 'webt-pro'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-button--checkout:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'checkout_border',
				'selector' => '{{WRAPPER}} .webt-button--checkout',
			]
		);

		$this->add_responsive_control(
			'checkout_padding',
			[
				'label' => __('Padding', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-button--checkout' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'checkout_margin',
			[
				'label' => __('Margin', 'webt-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-button--checkout' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();
	}


	/**
	 * Render widget output on the frontend.
	 * 
	 * @return void
	 */
	protected function render()
	{ 
		$settings = $this->get_settings_for_display();
		$cart_items = WC()->cart->get_cart();
		if (empty($cart_items)) { ?>
			<div class="woocommerce-mini-cart__empty-message"><?php esc_attr_e( $settings['empty_cart_message'], 'webt-pro'); ?></div>
		<?php } else {
			$this->woocommerce_mini_cart();
		}
	}
	
	/**
	 * woocommerce_mini_cart
	 *
	 * @param  mixed $args
	 * @return void
	 */
	public function woocommerce_mini_cart($args = array())
	{
		$defaults = array(
			'list_class' => '',
		);
		$args = wp_parse_args($args, $defaults);

		wc_get_template('cart/mini-cart-teble.php', $args);
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Mini_Cart());
