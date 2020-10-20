<?php

namespace WEBT;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base as ElementorWidget_Base;
use Widget_Base;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Widget.
 *
 * @package webt
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_MyAccount_Dashboard_Widget extends ElementorWidget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-dashboard';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Dashboard', 'webt');
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
        return ['webt', 'woocommerce', 'myaccount', 'dashboard'];
	}
	
	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Style', 'elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'link_color',
			[
				'label' => esc_html__('Link Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}}',
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label' => esc_html__('Alignment', 'elementor'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'elementor'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'elementor'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'elementor'),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}}',
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
		wc_get_template('myaccount/dashboard.php', array(
			'current_user' => get_user_by('id', get_current_user_id()),
		));
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Dashboard_Widget());
