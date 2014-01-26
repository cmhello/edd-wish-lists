<?php
/**
 * Edit Wish List template
*/
$edd_wish_lists = edd_wish_lists();
$edd_wish_lists::$add_script = true;

$wish_list  = get_post( get_query_var('edit') );
$post_id    = $wish_list->ID;
$content    = $wish_list->post_content;
$title      = get_the_title( $post_id );
$privacy    = get_post_status( $post_id );
?>

<h3>
	<?php printf( __( '%s Settings', 'edd-wish-lists'), edd_wl_get_label_singular() ); ?>
</h3>

<form action="<?php echo add_query_arg( 'updated', true ); ?>" class="wish-list-form" method="post">
	<p>
	    <label for="list-title"><?php _e( 'Title', 'edd-wish-lists' ); ?> <span class="required">*</span></label>
	    <input type="text" name="list-title" id="list-title" value="<?php echo $title; ?>">
	</p>
	<p>
	    <label for="list-description"><?php _e( 'Description', 'edd-wish-lists' ); ?></label>
	    <textarea name="list-description" id="list-description" rows="2" cols="30"><?php echo $content; ?></textarea>
	</p>
	<p>
	  <select name="privacy">
	    <option value="private" <?php selected( $privacy, 'private' ); ?>><?php _e( 'Private', 'edd-wish-lists' ); ?></option>
	    <option value="publish" <?php selected( $privacy, 'publish' ); ?>><?php _e( 'Public', 'edd-wish-lists' ); ?></option>
	  </select>
	</p>
	<p> 
	    <input type="submit" value="<?php _e( 'Update', 'edd-wish-lists' ); ?>" class="button button-default">
	</p>

	<input type="hidden" name="submitted" id="submitted" value="true">
	
	<?php wp_nonce_field( 'list_nonce', 'list_nonce_field' ); ?>
</form>

<p>
	<a href="#" data-action="edd_wl_delete_list" data-post-id="<?php echo $post_id; ?>" class="eddwl-delete-list">
		<?php printf( __( 'Delete %s', 'edd-wish-lists' ), edd_wl_get_label_singular() ); ?>
	</a>
</p>