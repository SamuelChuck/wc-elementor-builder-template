<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Widget.
 *
 * @package webt
 * 
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_MyAccount_Logout_Widget extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'logout';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Logout', 'webt');
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
		return ['webt', 'woocommerce', 'myaccount', 'logout', 'login', 'signout'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_style',
			array(
				'label' => esc_html__('Style', 'elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'product_title_color',
			[
				'label'     => esc_html__('Color', 'elementor'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-customer-logout a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .webt-customer-logout a',
			)
		);

		$this->add_responsive_control(
			'align',
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
				'default'      => 'left',
				'selectors' => [
					'{{WRAPPER}} .webt-customer-logout' => 'text-align: {{VALUE}}',
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

		foreach (wc_get_account_menu_items() as $endpoint => $label) :
			if ($endpoint == 'customer-logout') :
?>
				<div class="webt-customer-logout">
					<a href="<?php echo esc_url(wc_logout_url(wc_get_page_permalink('myaccount'))); ?>"><?php echo esc_html($label); ?></a>
				</div>
<?php
			endif;
		endforeach;
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Logout_Widget());
