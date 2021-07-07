<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'options', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__) . '/config/assets.php',
            'theme' => require dirname(__DIR__) . '/config/theme.php',
            'view' => require dirname(__DIR__) . '/config/view.php',
        ]);
    }, true);


// Templates for gutenberg blocks


function get_block_template($template, $args)
{
    $template = App\locate_template([$template . ".blade.php", 'resources/views/blocks/' . $template . '.blade.php']);

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);

    $data = array_merge($data, $args);

    if ($template)
        echo App\template($template, $data);
    else
        echo sprintf(__("Template for block %s not found", 'my-theme'), $template);
}



/**
    Add attributes to script tags
 */

add_filter('script_loader_tag', 'chickenfish_script_loader_tag', 10, 2);

function chickenfish_script_loader_tag($tag, $handle)
{

    // Добавляем атрибут async к зарегистрированному скрипту.
    if (wp_scripts()->get_data($handle, 'async')) {
        $tag = str_replace('></', ' async></', $tag);
    }
    if (wp_scripts()->get_data($handle, 'defer')) {
        $tag = str_replace('></', ' defer></', $tag);
    }

    return $tag;
}


/*
    Contact form 7 remove span
*/

// add_filter('wpcf7_form_elements', function($content) {

//     $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

//     $content = str_replace('<br />', '', $content);

//     return $content;

// });


/**
    Add svg support
 */


add_filter('mime_types', 'svg_upload_allow');

function svg_upload_allow($mimes)
{
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}


add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{

    // WP 5.1 +
    if (version_compare($GLOBALS['wp_version'], '5.1.0', '>='))
        $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
    else
        $dosvg = ('.svg' === strtolower(substr($filename, -4)));

    // mime тип был обнулен, поправим его
    // а также проверим право пользователя
    if ($dosvg) {

        // разрешим
        if (current_user_can('manage_options')) {

            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        }
        // запретим
        else {
            $data['ext'] = $type_and_ext['type'] = false;
        }
    }

    return $data;
}



/**
    Change nav item class
 */

function chickenfish_add_additional_class_on_li($classes, $item, $args)
{
    $classes[] = 'nav__item';
    return $classes;
}

add_filter('nav_menu_css_class', 'chickenfish_add_additional_class_on_li', 1, 3);


/**
    Change nav link class
 */

function chickenfish_filter_nav_menu_link_attributes($atts, $item, $args, $depth)
{

    $atts['class'] = 'nav__link';
    return $atts;
}

add_filter('nav_menu_link_attributes', 'chickenfish_filter_nav_menu_link_attributes', 10, 4);


/**
 * Return images path
 * @return string
 */

function images_path()
{
    $images_path = get_template_directory_uri() . '/front/static/prod/assets/images/';
    return $images_path;
}


/**
 * Return svg path
 * @return string
 */

function svg_path()
{
    $images_path = get_template_directory_uri() . '/front/static/prod/';
    return $images_path;
}


/**
 * Automatic updates
 */

add_filter('auto_update_plugin', '__return_true');
add_filter('auto_update_theme', '__return_true');


/**
 * Random
 */

function random()
{
    return (float)rand() / (float)getrandmax();
}



function app_path()
{
    $app_path = get_theme_root_uri() . '/chickenfish/app';
    return $app_path;
}


/**
 * Excerpt more filter
 *
 */

add_filter('excerpt_more', function( $more ) {
    return '...';
});
