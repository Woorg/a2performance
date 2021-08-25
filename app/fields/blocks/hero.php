<?php
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'carbon_fields_register_fields', function () {
        Block::make( __( 'Hero block' ) )
            ->add_fields( [
                Field::make( 'complex', 'hero_slider', __( 'Slider' ) )
                    ->add_fields( 'slider', [
                        Field::make( 'image', 'photo', __( 'Slide Photo' ) ),
                        Field::make( 'text', 'title', __( 'Slide Title' ) ),
                        Field::make( 'textarea', 'text', __( 'Slide text' ) )
                            ->set_rows( 2 ),
                        Field::make( 'textarea', 'button_text', __( 'Button text' ) )
                            ->set_rows( 2 )

                    ] )
            ] )

            ->set_category( 'custom', __( 'Custom blocks' ), 'admin-page' )

            ->set_inner_blocks( true )
            ->set_inner_blocks_position( 'below' )

            ->set_render_callback( function ( $arg ) {
                 return a2_get_block_template('hero', $arg);
            });

    });
