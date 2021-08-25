<?php

namespace App;

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', function () {
    Container::make('theme_options', __('Theme Options', 'sage'))
        ->add_fields(array(

            Field::make( 'text', 'instagram_url', __( 'Instagram URL' ) ),
            // Field::make( 'text', 'instagram_token', __( 'Instagram access token' ) ),

            Field::make( 'text', 'email', __( 'Email' )),
            Field::make( 'text', 'phone', __( 'Phone' )),
            Field::make( 'text', 'copyright', __( 'Copyright' )),


        ));


    // Container::make('theme_options', __('Books archive options', 'sage'))
    //     ->set_page_parent('edit.php?post_type=book')

    //     ->add_fields([
    //         Field::make('rich_text', 'books_archive_desc', __('Books archive description', 'sage'))
    //     ]);
});


// Load Carbon Fields
add_action('after_setup_theme', function () {
    \Carbon_Fields\Carbon_Fields::boot();
});
