<?php
/**
 * Broden Theme Metabox Options
 *
 * @package Broden
 */

function broden_admin_scripts() {
    $screen = get_current_screen();
    if($screen->post_type === 'post' && is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('custom-meta-boxes', get_template_directory_uri() . '/js/backend/custom-meta-boxes.js', null, null);
        wp_enqueue_style('custom-meta-boxes', get_template_directory_uri() . '/css/backend/custom-meta-boxes.css', null, null);
    }
}

add_action('current_screen', 'broden_admin_scripts');

/**
 * Post Settings Meta Box
 */
function broden_post_settings_box() {

    $screens = array( 'post' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'broden_post_settings_box',
            esc_html__( 'Post settings', 'broden' ),
            'broden_post_settings_inner_box',
            $screen,
            'normal',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'broden_post_settings_box' );

function broden_post_settings_inner_box( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'broden_post_settings_inner_box', 'broden_post_settings_inner_box_nonce' );

  /*
   * Use get_post_meta() to retrieve an existing value
   * from the database and use the value for the form.
   */
  $value_post_featured = get_post_meta( $post->ID, '_post_featured_value', true );
  $post_style_select = get_post_meta( $post->ID, '_post_style', true );

  $checked = '';
  if( $value_post_featured == true ) { 
    $checked = 'checked = "checked"';
  }
  echo '<p><input type="checkbox" id="post_featured" name="post_featured" '.$checked.' /> <label for="post_featured">'.esc_html__( "Show this post in Homepage posts slider (Featured post)", 'broden' ).'</label></p>';

  $selected_1 = '';
  $selected_2 = '';
  $selected_3 = '';

  if($post_style_select == "style-1") {
    $selected_1 = ' selected';
  }
  if($post_style_select == "style-2") {
    $selected_2 = ' selected';
  }
  if($post_style_select == "style-3") {
    $selected_3 = ' selected';
  }
  
  echo '<p><label for="post_layout" style="display: inline-block; width: 150px;">'.esc_html__( "Post Layout: ", 'broden' ).'</label>';
  echo '<select name="post_layout" id="post_layout">
        <option value="style-1"'.$selected_1.'>'.esc_html__( "Standart Layout", 'broden' ).'</option>
        <option value="style-2"'.$selected_2.'>'.esc_html__( "Full Image Layout", 'broden' ).'</option>
        <option value="style-3"'.$selected_3.'>'.esc_html__( "Full Width Layout", 'broden' ).'</option>
    </select></p>';

}

function broden_post_settings_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['broden_post_settings_inner_box_nonce'] ) )
    return $post_id;

  $nonce = $_POST['broden_post_settings_inner_box_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'broden_post_settings_inner_box' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // Check the user's permissions.
  if ( 'page' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
  
  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
  if(!isset($_POST['post_featured'])) $_POST['post_featured'] = false;
  
  $mydata = sanitize_text_field( $_POST['post_featured'] );

  // Update the meta field in the database.
  update_post_meta( $post_id, '_post_featured_value', $mydata );
  
  // Sanitize user input.
  $mydata = sanitize_text_field( $_POST['post_layout'] );

  // Update the meta field in the database.
  update_post_meta( $post_id, '_post_style', $mydata );

}
add_action( 'save_post', 'broden_post_settings_save_postdata' );

/**
* CMB2 METABOXES
*/

function broden_register_post_format_settings_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = 'broden_';
  /**
   * Metabox to be displayed on a single page ID
   */
  $cmb_post_format_settings = new_cmb2_box( array(
    'id'           => $prefix . 'gallery_format_settings_metabox',
    'title'        => esc_html__( 'Gallery Settings', 'cmb2' ),
    'object_types' => array( 'post' ), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
  ) );

  $cmb_post_format_settings->add_field( array(
    'name'         => esc_html__( 'Gallery images', 'cmb2' ),
    'desc'         => esc_html__( 'Use this field to add your images for gallery in Gallery post format. Use SHIFT/CTRL keyboard buttons to select multiple images.', 'cmb2' ),
    'id'           => $prefix . 'gallery_file_list',
    'type'         => 'file_list',
    'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  ) );

  $cmb_post_format_settings = new_cmb2_box( array(
    'id'           => $prefix . 'video_format_settings_metabox',
    'title'        => esc_html__( 'Video Settings', 'cmb2' ),
    'object_types' => array( 'post' ), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
  ) );

  $cmb_post_format_settings->add_field( array(
    'name' => esc_html__( 'Video url', 'cmb2' ),
    'desc' => esc_html__( 'Enter a Youtube, Vimeo video page url or Embed code.', 'cmb2' ),
    'id'   => $prefix . 'video_embed',
    'type' => 'oembed',
  ) );

  $cmb_post_format_settings = new_cmb2_box( array(
    'id'           => $prefix . 'audio_format_settings_metabox',
    'title'        => esc_html__( 'Audio Settings', 'cmb2' ),
    'object_types' => array( 'post' ), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
  ) );

  $cmb_post_format_settings->add_field( array(
    'name' => esc_html__( 'Audio url', 'cmb2' ),
    'desc' => esc_html__( 'Enter a SoundCloud, Mixcloud, Spotify audio page url or Embed code.', 'cmb2' ),
    'id'   => $prefix . 'audio_embed',
    'type' => 'oembed',
  ) );
  
}
add_action( 'cmb2_init', 'broden_register_post_format_settings_metabox' );