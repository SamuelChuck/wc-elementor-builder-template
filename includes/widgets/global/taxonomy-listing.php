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
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Widget_Taxonomy_Listing_Widget extends Widget_Base
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'webt-term-taxonomy';
    }

    /**
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Term Taxonomy', 'woocommerce');
    }

    /**
     * Get widget icon.
     */
    public function get_icon()
    {
        return 'fa fa-list';
    }

    /**
     * Get widget categories.
     */
    public function get_categories()
    {
        return ['webt-global'];
    }

    /**
     * Register oEmbed widget controls.
     */
    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'webt'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'taxonomy',
            [
                'label' => __('Taxonomy', 'webt'),
                'type' => Controls_Manager::SELECT,
                'options' => get_taxonomies(),
                'default' => '',
            ]
        );

        $this->add_control(
            'parent_term_id',
            [
                'label' => __('Term id', 'webt'),
                'type' => Controls_Manager::NUMBER,
            ]
        );

        $this->add_control(
            'show_term_url',
            [
                'label' => __('Term Link', 'webt'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'webt'),
                'label_off' => __('Hide', 'webt'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'hide_empty_term',
            [
                'label' => __('Hide Empty', 'webt'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'webt'),
                'label_off' => __('Hide', 'webt'),
                'return_value' => true,
                'default' => true,
            ]
        );

        $this->end_controls_section();

        /**
         * Style Section
         */

        // Text
        $this->start_controls_section(
            'term_style',
            array(
                'label' => __('Term', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );


        $this->start_controls_tabs('term_style_tabs');

        $this->start_controls_tab(
            'term_tab_normal',
            [
                'label' => __('Normal', 'webt'),
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'term_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .term-item-container .term-item ',
            ]
        );

        $this->add_control(
            'term_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .term-item-container .term-item' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover Style
        $this->start_controls_tab(
            'term_tab_hover',
            [
                'label' => __('Hover', 'webt'),
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'term_typography_hover',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .term-item-container .term-item:hover ',
            ]
        );

        $this->add_control(
            'term_hover_color',
            [
                'label' => __('Hover Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .term-item-container .term-item:hover' => 'color: {{VALUE}} ',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'term_align',
            [
                'label' => __('Alignment', 'webt'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'webt'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'webt'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'webt'),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'webt'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .term-item-container .term-item' => 'text-align: {{VALUE}}',
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

        $termchildren = array(
            'hierarchical' => 1,
            'show_option_none' => '',
            'hide_empty' => $settings['hide_empty_term'],
            'parent' => $settings['parent_term_id'],
            'taxonomy' => $settings['taxonomy'],
        );

        $subcats = get_terms($termchildren);
        // Display the children
        echo '<div class="term-item-container">';
        foreach ($subcats as $value) {
            $term_link = get_term_link($value);
            $name = $value->name;
            $id = $value->term_id;
            if ('yes' === $settings['show_term_url']) {
                echo '<a class="term-item" href="' . $term_link . '"> <div class="term-item term-item__' . $id . '">' . $name . '</div></a>';
            } else {
                echo '<div class="term-item term-item__' . $id . '">' . $name . '</div>';
            }
        }
        echo '</div>';
    }
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Taxonomy_Listing_Widget());
