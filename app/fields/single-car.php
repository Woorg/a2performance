<?php

namespace App;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', function () {

    Container::make('post_meta', __('Car data', 'sage'))
        ->where('post_type', '=', 'catalog')
        ->add_fields([
            Field::make( 'association', 'car_feedback_link', __( 'Feedback link' ) )
                 ->set_max( 1 ),

            Field::make( 'complex', 'car_list', __('Car data list', 'sage'))
            ->add_fields( 'car_list_item', array(
                Field::make( 'text', 'car_data_title', __( 'Title' ) )
                    ->set_width( 33 ),

                Field::make( 'text', 'car_data_value', __( 'Value' ) )
                    ->set_width( 33 ),
                Field::make( 'complex', 'car_values', __('Indicators', 'sage'))
                    ->set_width( 33 )
                    ->add_fields( 'car_value_item', array(
                        Field::make( 'text', 'car_data_before', __( 'Before' ) )
                            ->set_width( 50 ),
                        Field::make( 'text', 'car_data_after', __( 'After' ) )
                            ->set_width( 50 ),

                    ))
                    ->set_layout( 'tabbed-horizontal' )
                    ->set_max( 1 ),

            ) )
            ->set_layout( 'tabbed-horizontal' )
            ->set_max( 2 )

        ]);
});




// Load Carbon Fields

// \Carbon_Fields\Carbon_Fields::boot();
