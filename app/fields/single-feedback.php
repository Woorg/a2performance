<?php

namespace App;

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', function () {

    Container::make('post_meta', __('Feedback data', 'sage'))
        ->where('post_type', '=', 'feedback')
        ->add_fields([
            Field::make( 'text', 'feedback_link', __( 'FeedbacK link' ) ),
            Field::make( 'text', 'feedback_name', __( 'Feedback name' ) ),
            Field::make( 'text', 'feedback_car', __( 'Feedback car' ) )

        ]);
});


// Load Carbon Fields

// \Carbon_Fields\Carbon_Fields::boot();
