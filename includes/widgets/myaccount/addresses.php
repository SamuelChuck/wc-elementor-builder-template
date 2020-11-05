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

class Widget_MyAccount_Addresses extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'edit-address';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Addresses', 'webt');
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
		return ['webt', 'woocommerce', 'myaccount', 'edit', 'adresses', 'form'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
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
				'selector'  => '{{WRAPPER}} .webt-addresses > p',
			)
		);
		$this->add_control(
			'message_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-addresses > p' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .webt-addresses > p' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

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
				'selector' => '
						{{WRAPPER}} .u-columns .woocommerce-Address',
			]
		);
		
		$this->add_control(
			'column_border_radius',
			[
				'label' => esc_html__('Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'
						{{WRAPPER}} .u-columns .woocommerce-Address' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'
						{{WRAPPER}} .u-columns .woocommerce-Address' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'
						{{WRAPPER}} .u-columns .woocommerce-Address' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .u-columns .col-2.woocommerce-Address' => 'margin-top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .u-columns .col-2.woocommerce-Address' => 'margin-left: {{SIZE}}{{UNIT}};',
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

				'selectors' => ['
						{{WRAPPER}} .u-columns .woocommerce-Address' => 'width: {{SIZE}}{{UNIT}};',],
			]
		);
		$this->end_controls_section();


		// header
		$this->start_controls_section(
			'header_style',
			array(
				'label' => esc_html__('Header', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'header_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-Address-title, {{WRAPPER}} .woocommerce-Address-title h3',
			)
		);
		$this->add_control(
			'header_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-Address-title h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'header_align',
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
					'{{WRAPPER}} .woocommerce-Address-title' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// address
		$this->start_controls_section(
			'address_style',
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
				'selector'  => '{{WRAPPER}} address',
			)
		);
		$this->add_control(
			'address_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} address' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} address' => 'text-align: {{VALUE}}',
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
			$inline_css = '@media (min-width: 650px){ .u-columns.woocommerce-Addresses.col2-set.addresses {display: flex;}}';
		} else {
			$inline_css = '.u-columns.woocommerce-Addresses.col2-set.addresses {display: block;}';
		}
		if (!is_user_logged_in()) {
			return esc_html__('You need first to be logged in', 'webt');
		}

		echo '<div class="webt-addresses">';
?>
		<style>
			<?php echo $inline_css; ?>
		</style>
<?php
		wc_get_template('myaccount/addresses.php');
		echo '</div>';
	}
}
Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Addresses());
