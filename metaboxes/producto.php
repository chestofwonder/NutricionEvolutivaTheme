<?php

function producto_meta_box_callback( $post ) {

	wp_nonce_field( 'producto_save_meta_box_data', 'producto_meta_box_nonce' );

	$value = get_post_meta( $post->ID, 'precio', true );

	echo '<label for="precio">';
	_e( 'Precio', 'datos_del_producto' );
	echo '</label> ';
	echo '<input type="text" id="precio" name="precio" value="' . esc_attr( $value ) . '" size="25" />';
}


function producto_save_meta_box_data( $post_id ) {

	// Check if our nonce is set.
	if ( ! isset( $_POST['producto_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['producto_meta_box_nonce'], 'producto_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['precio'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['precio'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'precio', $my_data );
}
add_action( 'save_post', 'producto_save_meta_box_data' );

