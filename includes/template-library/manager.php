<?php

namespace WEBT\TemplateLibrary;

use WEBT\Plugin;
use WEBT\TemplateLibrary\Source_Local;
use WEBT\TemplateLibrary\Class_Taxonomy_Single_Term;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Manager
 */
class Manager
{
    /**
     * Run Manager.
     *
     * @since 1.6.0
     * @access public
     * @static
     */
    public static function run()
    {
        self::includes();
        self::taxonomy_control();
    }

    /**
     * taxonmy_control
     * Taxonomy Single Term class Control
     * 
     * @return void
     */
    public static function taxonomy_control()
    {
        $Tax_Control = new Class_Taxonomy_Single_Term(Source_Local::TAXONOMY_SLUG, [Source_Local::POST_TYPE], 'radio'); // 'type' can be 'radio' or 'select' (default: radio)
        // Priority of the metabox placement.
        $Tax_Control->set('priority', 'high');
        // 'normal' to move it under the post content.
        $Tax_Control->set('context', 'normal');
        // Custom title for your metabox
        $Tax_Control->set('metabox_title', __('Template Type', 'webt'));
        // Makes a selection required.
        $Tax_Control->set('force_selection', true);
        // Will keep radio elements from indenting for child-terms.
        $Tax_Control->set('indented', true);
        // Allows adding of new terms from the metabox
        $Tax_Control->set('allow_new_terms', false);
    }

    /**
     * includes
     *
     * @return void
     */
    public static function includes()
    {
        require(WEBT_INCLUDES_PATH . 'template-library' . '/' . 'sources' . '/' . 'local.php');
        require(WEBT_INCLUDES_PATH . 'template-library' . '/' . 'classes' . '/' . 'class-taxonomy-single-term.php');
        require(WEBT_INCLUDES_PATH . 'template-library' . '/' . 'classes' . '/' . 'class-walker-taxonomy-single-term.php');
    }
}
