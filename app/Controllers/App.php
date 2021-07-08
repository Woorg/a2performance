<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

   public function relatedNews()
    {
        $query = new \WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post__not_in'   => [ get_the_ID() ],
            'orderby'        => 'id',
            'order'          => 'DESC',
        ]);

        return $query;

    }

    public function socialLinks()
    {
        $data = [
            'instagram_url' => carbon_get_theme_option( 'instagram_url' ),
            'twitter_url' => carbon_get_theme_option( 'twitter_url'),
            'facebook_url' => carbon_get_theme_option( 'facebook_url' ),
        ];

        return $data;
    }

    public function generalInfo() {
        $data = [
            'copyright'   => carbon_get_theme_option( 'copyright' ),
            'logo'        => carbon_get_theme_option( 'logo_image' ),
            'logo_second' => carbon_get_theme_option( 'logo_image_text' ),
            'email'       => carbon_get_theme_option( 'email' ),
            'basedin'     => carbon_get_theme_option( 'basedin' ),
        ];

        return $data;

    }

    public static function primaryMenu()
    {
        $menu =  wp_nav_menu([
          'theme_location'  => 'primary_navigation',
          'container'       => null,
          'menu_class'      => 'nav__list',
        ]);

        return $menu;

    }



}
