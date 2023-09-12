<?php
/*
* Plugin Name: Fix Toggle Accordion Widget Eelementor
* Plugin URI: https://github.com/davidchc/fix_toggle_accordion_widget_elementor
* Version: 0.1.1
* Author: David CHC
* Author URI: https://www.davidchc.com.br
* Description: Plugin to add href to Elementor's Toggle Accordion Widget to fix pagespeed notification of Links are not trackable
* License: GPLv3
*/

function add_href_toggle_accordion_widget_content($widget_content, $widget)
{

    $widgets_allowed = ['toggle', 'accordion'];


    if (in_array($widget->get_name(), $widgets_allowed)) {
        $widget_content = str_replace('tabindex="0"', ' href="#" tabindex="0"', $widget_content);
    }

    return $widget_content;
}


add_action('after_setup_theme', function () {

    add_filter('elementor/widget/render_content', 'add_href_toggle_accordion_widget_content', 10, 2);
});
