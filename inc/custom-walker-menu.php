<?php
/**
 * The template for Menu Walker
 *
 * @package Broden Theme
 */

/**
 * Custom Walker - Mega Menu
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/

class broden_navigation_walker extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "\n<ul class=\"sub-menu\">\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "</ul>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';
        $enablemega = get_post_meta($item->ID, 'menu_item_megacategory', true) === "true";

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        if($enablemega) {
            $classes[] = 'mega-menu';
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before  . apply_filters( 'the_title', $item->title, $item->ID )  ;
        $item_output .= '</a>';

        // build mega menu category drop down
        
        $parent_tax = get_post_meta( $item->menu_item_parent, '_menu_item_object', true );
        $children = get_posts ( array (
                'post_type' => 'nav_menu_item',
                'nopaging' => true,
                'numberposts' => 1,
                'meta_key' => '_menu_item_menu_item_parent',
                'meta_value' => $item->ID ,
        ) );

        if ($depth == 0 && $item->object == 'category' && ! empty ( $children )) {
            $item_output .= '<div class="mega-menu-wrapper">';
        } elseif (! empty ( $children )) {
            $item_output .= '<div class="simple-sub">';
        } elseif ($depth == 0 && $item->object == 'category' && empty ( $children )) {
            $item_output .= '<div class="mega-menu-wrapper no-children">';
        } elseif ($depth == 1 && $item->object == 'category' && ! empty ( $children ) && $parent_tax == 'category') {
        }
        $item_output .= $args->after;                

        if($enablemega) {
            
            if ($depth < 2 && $item->object == 'category' )  {
                      if ($parent_tax == 'category' || $parent_tax == ''){
                            $cat = $item->object_id;        
                            global $post;
                            if ($depth < 1 && empty ( $children )){
                            $menuposts = get_posts ( array('numberposts' => 4, 'cat' => $cat ));
                            $item_output .= '<div class="mega-category six-menu">';                                          
                            }else{
                            $menuposts = get_posts ( array('numberposts' => 3, 'cat' => $cat ));
                            $item_output .= '<div class="mega-category five-menu">'; 
                            }   
                            $item_output .= '<ul class="mega-category-wrapper">';  
                            foreach ( $menuposts as $post ) :
                                setup_postdata ( $post );        
                                $post_title = wp_trim_words( get_the_title(), 10 );
                                $post_link = get_permalink ();
                                $post_date = get_option('date_format');
                                $post_image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'broden-trending-style-2' );
                                $menu_post_image = '<img src="' . esc_url($post_image [0]) . '" alt="' . esc_attr($post_title) . '">';          
                                $item_output .= '<li>
                                    <article class="post" itemscope="itemscope" itemtype="http://schema.org/Article">
                                    <figure class="post-image">               
                                        <a href="' . esc_url($post_link) . '" title="' . esc_attr($post_title) . '">' . wp_kses_post($menu_post_image) . '</a>
                                    </figure><!--post-image-->
                                    <div class="post-inwrap">                                                                        
                                        <div class="post-title">
                                            <h2><a href="' . esc_url($post_link) . '" title="' . the_title_attribute("echo=0") . '">' . esc_html($post_title) . '</a></h2>
                                        </div><!--post-title-->
                                        <div class="post-meta">
                                            <div class="post-date">'. get_the_time(  $post_date ) .'</div>
                                        </div><!--post-date-->
                                    </div><!--post-inwrap-->
                                    </article>
                                </li>';
                            endforeach;
                            wp_reset_postdata();            
                            $item_output .= '</ul></div>';
                      
                      }
                  } 
            elseif ($depth == 0 && $item->object != 'category') {
            }
        }

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    function end_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
        $children = get_posts ( array (
                'post_type' => 'nav_menu_item',
                'nopaging' => true,
                'numberposts' => 1,
                'meta_key' => '_menu_item_menu_item_parent',
                'meta_value' => $item->ID ,
        ) );
        if (! empty ( $children )||($depth == 0 && $item->object == 'category' && empty ( $children ))) {$output .= '</div>';}
        $output .= "</li>\n";
    }
}


add_action('wp_update_nav_menu_item', 'custom_nav_update',10, 3);
function custom_nav_update($menu_id, $menu_item_db_id, $args ) {
    // mega category
    if ( isset($_REQUEST['menu-item-megacategory'])  && isset($_REQUEST['menu-item-megacategory'][$menu_item_db_id]) &&
        is_array($_REQUEST['menu-item-megacategory']) ) {
        $megacategory = $_REQUEST['menu-item-megacategory'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, 'menu_item_megacategory', $megacategory );
    } else {
        update_post_meta( $menu_item_db_id, 'menu_item_megacategory', 'false' );
    }
}

/*
 * Adds value of new field to $item object that will be passed to Walker_Nav_Menu_Edit_Main
 */
add_filter( 'wp_setup_nav_menu_item','custom_nav_item' );
function custom_nav_item($menu_item) {
    $menu_item->megacategory = get_post_meta( $menu_item->ID, 'menu_item_megacategory', true );
    return $menu_item;
}

add_filter( 'wp_edit_nav_menu_walker', 'custom_nav_edit_walker',10,2 );
function custom_nav_edit_walker($walker,$menu_id) {
    return 'Walker_Nav_Menu_Edit_Main';
}

/**
 * Copied from Walker_Nav_Menu_Edit class in core
 *
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu_Edit_Main extends Walker_Nav_Menu  {
    /**
     * @see Walker_Nav_Menu::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {}

    /**
     * @see Walker_Nav_Menu::end_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     */
    function end_lvl( &$output, $depth = 0, $args = array() ) {}

    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $_wp_nav_menu_max_depth;

        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        ob_start();
        $item_id = esc_attr( $item->ID );
        $removed_args = array(
            'action',
            'customlink-tab',
            'edit-menu-item',
            'menu-item',
            'page-tab',
            '_wpnonce',
        );

        $original_title = '';
        if ( 'taxonomy' == $item->type ) {
            $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
            if ( is_wp_error( $original_title ) )
                $original_title = false;
        } elseif ( 'post_type' == $item->type ) {
            $original_object = get_post( $item->object_id );
            $original_title = $original_object->post_title;
        }

        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr( $item->object ),
            'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
        );

        $title = $item->title;

        if ( ! empty( $item->_invalid ) ) {
            $classes[] = 'menu-item-invalid';
            /* translators: %s: title of menu item which is invalid */
            $title = sprintf( esc_html__( '%s (Invalid)', 'broden' ), $item->title );
        } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title = sprintf( esc_html__('%s (Pending)', 'broden' ), $item->title );
        }

        $title = empty( $item->label ) ? $title : $item->label;

        $allcategory = get_categories();
        ?>
    <li id="menu-item-<?php echo esc_attr( $item_id ); ?>" class="<?php echo implode(' ', $classes ); ?>">
        <dl class="menu-item-bar">
            <dt class="menu-item-handle">
                <span class="item-title"><?php echo esc_html( $title ); ?></span>
                <span class="item-controls">
                    <span class="item-type">
                        <?php echo esc_html( $item->type_label ); ?>
                    </span>
                    <span class="item-order hide-if-js">
                        <a href="<?php
                        echo wp_nonce_url(
                            add_query_arg(
                                array(
                                    'action' => 'move-up-menu-item',
                                    'menu-item' => $item_id,
                                ),
                                remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                            ),
                            'move-menu_item'
                        );
                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'broden' ); ?>">&#8593;</abbr></a>
                        |
                        <a href="<?php
                        echo wp_nonce_url(
                            add_query_arg(
                                array(
                                    'action' => 'move-down-menu-item',
                                    'menu-item' => $item_id,
                                ),
                                remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                            ),
                            'move-menu_item'
                        );
                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'broden' ); ?>">&#8595;</abbr></a>
                    </span>
                    <a class="item-edit" id="edit-<?php echo esc_attr( $item_id ); ?>" title="<?php esc_attr_e('Edit Menu Item', 'broden' ); ?>" href="<?php
                    echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                    ?>"><?php echo esc_html__( 'Edit Menu Item', 'broden'  ); ?></a>
                </span>
            </dt>
        </dl>

        <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr( $item_id ); ?>">
            <?php if( 'custom' == $item->type ) : ?>
                <p class="field-url description description-wide">
                    <label for="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>">
                        <?php echo esc_html__( 'URL', 'broden'  ); ?><br />
                        <input type="text" id="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                    </label>
                </p>
            <?php endif; ?>
            <p class="description description-thin">
                <label for="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>">
                    <?php echo esc_html__( 'Navigation Label', 'broden'  ); ?><br />
                    <input type="text" id="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                </label>
            </p>
            <p class="description description-thin">
                <label for="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>">
                    <?php echo esc_html__( 'Title Attribute', 'broden'  ); ?><br />
                    <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                </label>
            </p>
            <p class="field-link-target description">
                <label for="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>">
                    <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $item->target, '_blank' ); ?> />
                    <?php echo esc_html__( 'Open link in a new window/tab', 'broden'  ); ?>
                </label>
            </p>
            <p class="field-css-classes description description-thin">
                <label for="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>">
                    <?php echo esc_html__( 'CSS Classes (optional)', 'broden'  ); ?><br />
                    <input type="text" id="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                </label>
            </p>
            <p class="field-xfn description description-thin">
                <label for="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>">
                    <?php echo esc_html__( 'Link Relationship (XFN)', 'broden'  ); ?><br />
                    <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                </label>
            </p>
            <p class="field-description description description-wide">
                <label for="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>">
                    <?php echo esc_html__( 'Description', 'broden'  ); ?><br />
                    <textarea id="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
                    <span class="description"><?php echo esc_html__('The description will be displayed in the menu if the current theme supports it.', 'broden' ); ?></span>
                </label>
            </p>

            <p class="field-custom description description-wide mega-category-menu mega-menu-category-checkbox">
                <label for="edit-mega-category-<?php echo esc_attr( $item_id ); ?>">
                    <input type="checkbox" id="edit-mega-category-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-custom" name="menu-item-megacategory[<?php echo esc_attr( $item_id ); ?>]" value="true" <?php if($item->megacategory === 'true') { echo 'checked="checked"'; } ?>  />
                    <?php echo esc_html__( 'Enable Mega Category', 'broden'  ); ?>
                </label>
            </p>

            <div class="menu-item-actions description-wide submitbox">
                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
                    <p class="link-to-original">
                        <?php printf( esc_html__('Original: %s', 'broden' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                    </p>
                <?php endif; ?>
                <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr( $item_id ); ?>" href="<?php
                echo wp_nonce_url(
                    add_query_arg(
                        array(
                            'action' => 'delete-menu-item',
                            'menu-item' => $item_id,
                        ),
                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                    ),
                    'delete-menu_item_' . $item_id
                ); ?>"><?php echo esc_html__('Remove', 'broden' ); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo esc_attr( $item_id ); ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
                ?>#menu-item-settings-<?php echo esc_attr( $item_id ); ?>"><?php echo esc_html__('Cancel', 'broden' ); ?></a>
            </div>

            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item_id ); ?>" />
            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
        </div><!-- .menu-item-settings-->
        <ul class="menu-item-transport"></ul>
        <?php
        $output .= ob_get_clean();
    }
}