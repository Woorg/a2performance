<?php
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'carbon_fields_register_fields', function () {
        Block::make( __( 'Advantages block' ) )
            ->add_fields([
                Field::make( 'text', 'advantages_title', __( 'Title' ) ),

                Field::make( 'complex', 'advantages' )
                    ->add_fields( 'advantages_list', array(
                        Field::make( 'image', 'advantages_image', __( 'Image' ) ),
                        Field::make( 'text', 'advantages_item_title', __( 'Title' ) ),
                        Field::make( 'textarea', 'advantages_text', __( 'Text' ) )
                            ->set_rows( 2 )

                    ) ),

                Field::make( 'association', 'advantages_more', __( 'More link' ) )
            ])

            ->set_category( 'custom', __( 'Custom blocks' ), 'admin-page' )

            ->set_inner_blocks( true )
            ->set_inner_blocks_position( 'below' )

            ->set_render_callback( function ( $arg ) {
                 return a2_get_block_template('advantages', $arg);
            });

    });
