<?php

namespace ADB\BackToTop\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Widget_Base;

class BackToTopWidget extends Widget_Base
{
    public function get_name()
    {
        return 'adb-back-to-top';
    }

    public function get_title()
    {
        return esc_html__('Back To Top', 'adb-elementor-back-to-top');
    }

    public function get_icon()
    {
        return 'eicon-arrow-up';
    }

    public function get_categories()
    {
        return ['adb-widgets'];
    }

    public function get_script_depends()
    {
        return ['adb-back-to-top'];
    }

    public function get_style_depends()
    {
        return ['adb-back-to-top'];
    }

    protected function register_controls()
    {
        // Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'adb-elementor-back-to-top'),
            ]
        );

        $this->add_control(
            'button_type',
            [
                'label' => esc_html__('Button Type', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'icon' => esc_html__('Icon Only', 'adb-elementor-back-to-top'),
                    'text' => esc_html__('Text Only', 'adb-elementor-back-to-top'),
                    'both' => esc_html__('Icon & Text', 'adb-elementor-back-to-top'),
                ],
            ]
        );

        $this->add_control(
            'selected_icon',
            [
                'label' => esc_html__('Icon', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chevron-up',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'button_type!' => 'text',
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Back to Top', 'adb-elementor-back-to-top'),
                'condition' => [
                    'button_type!' => 'icon',
                ],
            ]
        );

        $this->end_controls_section();

        // Position Section
        $this->start_controls_section(
            'section_position',
            [
                'label' => esc_html__('Position', 'adb-elementor-back-to-top'),
            ]
        );

        $this->add_control(
            'position',
            [
                'label' => esc_html__('Position', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SELECT,
                'default' => 'bottom-right',
                'options' => [
                    'bottom-right' => esc_html__('Bottom Right', 'adb-elementor-back-to-top'),
                    'bottom-left' => esc_html__('Bottom Left', 'adb-elementor-back-to-top'),
                    'bottom-center' => esc_html__('Bottom Center', 'adb-elementor-back-to-top'),
                    'top-right' => esc_html__('Top Right', 'adb-elementor-back-to-top'),
                    'top-left' => esc_html__('Top Left', 'adb-elementor-back-to-top'),
                    'top-center' => esc_html__('Top Center', 'adb-elementor-back-to-top'),
                ],
            ]
        );

        $this->add_responsive_control(
            'offset_x',
            [
                'label' => esc_html__('Offset X', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .adb-back-to-top' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'offset_y',
            [
                'label' => esc_html__('Offset Y', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .adb-back-to-top' => 'margin-top: {{SIZE}}{{UNIT}}; margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Percentage Counter Section
        $this->start_controls_section(
            'section_percentage',
            [
                'label' => esc_html__('Scroll Percentage', 'adb-elementor-back-to-top'),
            ]
        );

        $this->add_control(
            'show_percentage',
            [
                'label' => esc_html__('Show Percentage', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'adb-elementor-back-to-top'),
                'label_off' => esc_html__('No', 'adb-elementor-back-to-top'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'percentage_position',
            [
                'label' => esc_html__('Percentage Position', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SELECT,
                'default' => 'after_text',
                'options' => [
                    'first' => esc_html__('First', 'adb-elementor-back-to-top'),
                    'before_icon' => esc_html__('Before Icon', 'adb-elementor-back-to-top'),
                    'after_icon' => esc_html__('After Icon', 'adb-elementor-back-to-top'),
                    'after_text' => esc_html__('Last', 'adb-elementor-back-to-top'),
                ],
                'condition' => [
                    'show_percentage' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'show_percentage_symbol',
            [
                'label' => esc_html__('Show % Symbol', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'adb-elementor-back-to-top'),
                'label_off' => esc_html__('No', 'adb-elementor-back-to-top'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'show_percentage' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'percentage_typography',
                'label' => esc_html__('Percentage Typography', 'adb-elementor-back-to-top'),
                'selector' => '{{WRAPPER}} .adb-scroll-percentage',
                'condition' => [
                    'show_percentage' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'percentage_color',
            [
                'label' => esc_html__('Percentage Color', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .adb-scroll-percentage' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_percentage' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'percentage_spacing',
            [
                'label' => esc_html__('Spacing', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .adb-scroll-percentage' => 'margin: 0 {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_percentage' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Button Style', 'adb-elementor-back-to-top'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Icon Style
        $this->add_control(
            'icon_heading',
            [
                'label' => esc_html__('Icon', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'button_type!' => 'text',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                    'em' => [
                        'min' => 0.1,
                        'max' => 20,
                    ],
                    'rem' => [
                        'min' => 0.1,
                        'max' => 20,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .adb-back-to-top i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .adb-back-to-top svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'button_type!' => 'text',
                ],
            ]
        );

        // Text Style
        $this->add_control(
            'text_heading',
            [
                'label' => esc_html__('Text', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'button_type!' => 'icon',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .adb-back-to-top-text',
                'condition' => [
                    'button_type!' => 'icon',
                ],
            ]
        );

        $this->start_controls_tabs('button_style_tabs');

        // Normal State
        $this->start_controls_tab(
            'button_normal',
            [
                'label' => esc_html__('Normal', 'adb-elementor-back-to-top'),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .adb-back-to-top i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .adb-back-to-top svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'button_type!' => 'text',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .adb-back-to-top-text' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'button_type!' => 'icon',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .adb-back-to-top',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .adb-back-to-top',
            ]
        );

        $this->add_responsive_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .adb-back-to-top' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'selector' => '{{WRAPPER}} .adb-back-to-top',
            ]
        );

        $this->end_controls_tab();

        // Hover State
        $this->start_controls_tab(
            'button_hover',
            [
                'label' => esc_html__('Hover', 'adb-elementor-back-to-top'),
            ]
        );

        $this->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__('Icon Color', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .adb-back-to-top:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .adb-back-to-top:hover svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'button_type!' => 'text',
                ],
            ]
        );

        $this->add_control(
            'text_color_hover',
            [
                'label' => esc_html__('Text Color', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .adb-back-to-top:hover .adb-back-to-top-text' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'button_type!' => 'icon',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_hover',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .adb-back-to-top:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border_hover',
                'selector' => '{{WRAPPER}} .adb-back-to-top:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_hover',
                'selector' => '{{WRAPPER}} .adb-back-to-top:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Animation Section
        $this->start_controls_section(
            'section_animation',
            [
                'label' => esc_html__('Hover Animation', 'adb-elementor-back-to-top'),
            ]
        );

        $this->add_control(
            'hover_animation_type',
            [
                'label' => esc_html__('Animation Type', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => esc_html__('None', 'adb-elementor-back-to-top'),
                    'elementor' => esc_html__('Elementor Animation', 'adb-elementor-back-to-top'),
                    'custom' => esc_html__('Custom Animation', 'adb-elementor-back-to-top'),
                ],
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' => esc_html__('Elementor Animation', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::HOVER_ANIMATION,
                'condition' => [
                    'hover_animation_type' => 'elementor',
                ],
            ]
        );

        $this->add_control(
            'custom_animation_scale',
            [
                'label' => esc_html__('Scale', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [''],
                'range' => [
                    '' => [
                        'min' => 0.1,
                        'max' => 2,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => '',
                    'size' => 1,
                ],
                'condition' => [
                    'hover_animation_type' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .adb-back-to-top:hover' => 'transform: scale({{SIZE}});',
                ],
            ]
        );

        $this->add_control(
            'custom_animation_duration',
            [
                'label' => esc_html__('Duration (ms)', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 5000,
                'step' => 100,
                'default' => 300,
                'condition' => [
                    'hover_animation_type' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .adb-back-to-top' => 'transition-duration: {{VALUE}}ms;',
                ],
            ]
        );

        $this->add_control(
            'custom_animation_timing',
            [
                'label' => esc_html__('Timing Function', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ease',
                'options' => [
                    'linear' => esc_html__('Linear', 'adb-elementor-back-to-top'),
                    'ease' => esc_html__('Ease', 'adb-elementor-back-to-top'),
                    'ease-in' => esc_html__('Ease In', 'adb-elementor-back-to-top'),
                    'ease-out' => esc_html__('Ease Out', 'adb-elementor-back-to-top'),
                    'ease-in-out' => esc_html__('Ease In Out', 'adb-elementor-back-to-top'),
                ],
                'condition' => [
                    'hover_animation_type' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .adb-back-to-top' => 'transition-timing-function: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Advanced Section
        $this->start_controls_section(
            'section_advanced',
            [
                'label' => esc_html__('Advanced', 'adb-elementor-back-to-top'),
            ]
        );

        $this->add_control(
            'scroll_offset',
            [
                'label' => esc_html__('Scroll Offset (px)', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::NUMBER,
                'default' => 100,
                'min' => 0,
                'max' => 5000,
                'step' => 10,
            ]
        );

        $this->add_control(
            'scroll_duration',
            [
                'label' => esc_html__('Scroll Duration (ms)', 'adb-elementor-back-to-top'),
                'type' => Controls_Manager::NUMBER,
                'default' => 800,
                'min' => 100,
                'max' => 5000,
                'step' => 100,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', [
            'adb-back-to-top',
            'adb-position-' . $settings['position']
        ]);

        // Add animation classes based on settings
        if ($settings['hover_animation_type'] === 'elementor' && !empty($settings['hover_animation'])) {
            $this->add_render_attribute('wrapper', 'class', 'elementor-animation-' . $settings['hover_animation']);
        }

        // For custom animation, we don't need a class as it's handled by CSS selectors

        if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
            $this->add_render_attribute('wrapper', 'class', 'in-editor');
            $this->add_render_attribute('wrapper', 'style', 'display: flex');
        }

        $this->add_render_attribute('wrapper', 'data-scroll-offset', $settings['scroll_offset']);
        $this->add_render_attribute('wrapper', 'data-scroll-duration', $settings['scroll_duration']);
?><div <?php echo $this->get_render_attribute_string('wrapper');
        ?>><?php $elements = [];

                    // Add percentage if enabled and position is first
                    if ($settings['show_percentage'] === 'yes' && $settings['percentage_position'] === 'first') {
                        $elements[] = '<span class="adb-scroll-percentage">0' . ($settings['show_percentage_symbol'] === 'yes' ? '%' : '') . '</span>';
                    }

                    // Add percentage if enabled and position is before icon
                    if ($settings['show_percentage'] === 'yes' && $settings['percentage_position'] === 'before_icon') {
                        $elements[] = '<span class="adb-scroll-percentage">0' . ($settings['show_percentage_symbol'] === 'yes' ? '%' : '') . '</span>';
                    }

                    // Add icon if enabled
                    if (in_array($settings['button_type'], ['icon', 'both'])) {
                        ob_start();
                        \Elementor\Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true']);
                        $elements[] = ob_get_clean();
                    }

                    // Add percentage if enabled and position is after icon
                    if ($settings['show_percentage'] === 'yes' && $settings['percentage_position'] === 'after_icon') {
                        $elements[] = '<span class="adb-scroll-percentage">0' . ($settings['show_percentage_symbol'] === 'yes' ? '%' : '') . '</span>';
                    }

                    // Add text if enabled
                    if (in_array($settings['button_type'], ['text', 'both'])) {
                        $elements[] = '<span class="adb-back-to-top-text">' . esc_html($settings['button_text']) . '</span>';
                    }

                    // Add percentage if enabled and position is last
                    if ($settings['show_percentage'] === 'yes' && $settings['percentage_position'] === 'after_text') {
                        $elements[] = '<span class="adb-scroll-percentage">0' . ($settings['show_percentage_symbol'] === 'yes' ? '%' : '') . '</span>';
                    }

                    echo implode('', $elements);
                    ?></div><?php
                }
            }
