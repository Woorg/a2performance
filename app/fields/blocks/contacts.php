<?php
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'carbon_fields_register_fields', function () {
        Block::make( __( 'Contacts block' ) )
            ->add_fields([
                Field::make( 'text', 'title', __( 'Title' ) ),
                Field::make( 'rich_text', 'text', __( 'Text' ) ),
                Field::make( 'text', 'form_shortcode', __( 'Form shortcode' ) ),
            ])

            ->set_category( 'custom', __( 'Custom blocks' ), 'admin-page' )

            ->set_inner_blocks( true )
            ->set_inner_blocks_position( 'below' )

            ->set_render_callback( function ( $arg ) {
                 return a2_get_block_template('contacts', $arg);
            });

    });
