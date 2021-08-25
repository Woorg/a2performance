<?php
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'carbon_fields_register_fields', function () {
        Block::make( __( 'Stores block' ) )
            ->add_fields([
                Field::make( 'complex', 'stores' )
                    ->add_fields( 'stores_list', array(
                        Field::make( 'image', 'stores_image', __( 'Game image' ) ),
                        Field::make( 'image', 'stores_icon', __( 'Game icon' ) ),
                        Field::make( 'text', 'stores_item_title', __( 'Game title' ) ),
                        Field::make( 'textarea', 'stores_item_text', __( 'Game Text' ) )
                            ->set_rows( 4 ),
                        Field::make( 'text', 'stores_item_appstore', __( 'App store link' ) ),
                        Field::make( 'text', 'stores_item_gplay', __( 'Google play link' ) )
                    ) )

            ])

            ->set_category( 'custom', __( 'Custom blocks' ), 'admin-page' )

            ->set_inner_blocks( true )
            ->set_inner_blocks_position( 'below' )

            ->set_render_callback( function ( $arg ) {
                 return a2_get_block_template('stores', $arg);
            });

    });
