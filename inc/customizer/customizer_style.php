<?php
/**
 * Broden Theme Customizer CSS
 *
 * @package Broden
 */

function broden_customizer_css() {
	?>

    <style type="text/css">
        
        <?php
            $font = get_theme_mod( 'broden_body_font' ) ? get_theme_mod( 'broden_body_font' ) : get_theme_mod( 'broden_google_web_fonts', 'Montserrat' );
            $fonttitle = get_theme_mod( 'broden_title_font' ) ? get_theme_mod( 'broden_body_font' ) : get_theme_mod( 'broden_google_web_fonts', 'Montserrat' );
            $fontcat = get_theme_mod( 'broden_category_font' ) ? get_theme_mod( 'broden_category_font' ) : get_theme_mod( 'broden_google_web_fonts', 'Rajdhani' );
            $fonttext = get_theme_mod( 'broden_text_font' );
        ?>


        body {
            font-family: <?php echo esc_attr( $font ); ?>;
        }
        h1,h2,h3,h4,h5,h6 {
            font-family: <?php echo esc_attr( $fonttitle ); ?>;
        }
        .post .post-cat ul li a, .post .post-meta .post-comment a, .post .post-meta .post-date, .error-404.not-found h1 {
            font-family: <?php echo esc_attr( $fontcat ); ?>;
        }
        p {
            font-family: <?php echo esc_attr( $fonttext ); ?>;
        }
        header.style-3 .header-main { 
        background: url(<?php
            if( get_theme_mod( 'broden_header_background' ) ){
                echo get_theme_mod( 'broden_header_background' );
            }else{
                echo esc_url( get_template_directory_uri() . '/images/header-image.jpg' );
            }
        ?> ); }

        header .header-main .brand-logo a img {
            max-height: <?php echo get_theme_mod( 'broden_logo_height' ); ?>px;
        }

        header .header-main .brand-logo {
            padding-top: <?php echo get_theme_mod( 'broden_logo_padding_top' ); ?>px;
            padding-bottom: <?php echo get_theme_mod( 'broden_logo_padding_bottom' ); ?>px;
        }

        header .header-main .social-button, header .search-button, header.style-3 .header-main .social-button, header.style-3 .search-button {
            margin-top: <?php echo get_theme_mod( 'broden_header_icons_margin' ); ?>px;
        }

        /* HEADER COLORS*/
        header .header-bottom .main-menu > ul li a, .sidebar-navigation .sidebar-scroll .navbar ul li a, .sidebar-navigation .sidebar-scroll .navbar ul li.menu-item-has-children span, .sidebar-navigation .sidebar-scroll .navbar ul li ul li a, .sidebar-navigation .sidebar-scroll .navbar ul li.menu-item-has-children.active {color: <?php echo get_theme_mod( 'broden_header_link_color' ); ?>!important;}
        header .header-bottom .main-menu ul li > a:hover, header .header-bottom .main-menu ul li:hover > a, header .header-bottom .main-menu ul li > ul li a:hover, header .header-bottom .main-menu ul li > ul li:hover > a {background-color:<?php echo get_theme_mod( 'broden_header_link_active_bg_color' ); ?>;color:<?php echo get_theme_mod( 'broden_header_link_active_color' ); ?>;}
        header .header-bottom .main-menu ul li > ul, header .header-bottom .main-menu ul li.mega-menu .mega-menu-wrapper, header .header-bottom .main-menu ul li.menu-item-has-children .mega-menu-wrapper, header .header-bottom .main-menu ul li .simple-sub {border-color:<?php echo get_theme_mod( 'broden_header_submenu_border_color' ); ?>;}
        header .social-button a, header .search-button a {color: <?php echo get_theme_mod( 'broden_header_social_search_link' ); ?>;}
        header .social-button a:hover, header .header-main .social-button a.social-toggle.active, header .header-bottom.sticky .social-button a.social-toggle.active, header.style-2 .header-bottom .social-button a.social-toggle.active, header .search-button a:hover, header .search-button .dropdown.open a, header .search-button .mobile-search.open a {background-color:<?php echo get_theme_mod( 'broden_header_social_search_active' ); ?>;color:<?php echo get_theme_mod( 'broden_header_social_search_active_color' ); ?>;}
        
        /* POST COLORS*/
        .post .post-cat ul li a {background-color: <?php echo get_theme_mod( 'broden_post_category_background' ); ?> ; color: <?php echo get_theme_mod( 'broden_post_category_color' ); ?> ;}
        .post .post-title h2 a { color: <?php echo get_theme_mod( 'broden_post_title_default' ); ?> ; }
        .post .post-title h2 a:hover {background-color: <?php echo get_theme_mod( 'broden_post_title_background' ); ?> ; color: <?php echo get_theme_mod( 'broden_post_title_color' ); ?> ;}
        .blog-feautured .post .post-inwrap .post-title h2 a:hover { color: <?php echo get_theme_mod( 'broden_featured_post_title_hover' ); ?> ; }
        .post .post-content p, .post-post-entry p { color: <?php echo get_theme_mod( 'broden_post_text_color' ); ?> ; }
        .post .post-content p a, .post-post-entry p a { background-color: <?php echo get_theme_mod( 'broden_post_text_link_background' ); ?> ; }

        /* THEME DEFAULT COLORS*/
        .post-comments .comment-list li cite a:hover { background-color: <?php echo get_theme_mod( 'broden_comment_author_hover_background' ); ?>; }
        .post-comments .comment-list li .reply-button a:hover { background-color: <?php echo get_theme_mod( 'broden_comment_reply_button_background' ); ?> ; }
        .post-comments .comment-respond form .btn:hover { background-color: <?php echo get_theme_mod( 'broden_comment_submit_button_background' ); ?> ; }
        .theme-category-articles .slick-prev:hover:before, .theme-category-articles .slick-next:hover:before { background-color: <?php echo get_theme_mod( 'broden_category_articles_button_background' ); ?> ; }

        .blog-feautured .slick-prev:hover:before, .blog-feautured .slick-next:hover:before { background-color: <?php echo get_theme_mod( 'broden_featured_posts_button_background' ); ?> ; }
        
        .back-to-top a { background-color: <?php echo get_theme_mod( 'broden_back_top_button_default_background' ); ?> ; background-color: <?php echo get_theme_mod( 'broden_back_top_button_color' ); ?> ; }
        .back-to-top a:hover { background-color: <?php echo get_theme_mod( 'broden_back_top_button_background' ); ?> ; }

        .preloader .lines .line { background-color: <?php echo get_theme_mod( 'broden_preloader_background' ); ?> ; }

        .blog-feautured .featured-style-1:before, .blog-feautured .featured-style-2:before, .blog-feautured .featured-style-3:before, .blog-feautured .featured-style-4:before { background-color: <?php echo get_theme_mod( 'broden_featured_posts_background_color' ); ?> ; }

        .widget { background-color: <?php echo get_theme_mod( 'broden_widget_background' ); ?> ; }

        .widget .widget-title { background-color: <?php echo get_theme_mod( 'broden_widget_title_background' ); ?> ; }

        .widget .widget-title h4 { color: <?php echo get_theme_mod( 'broden_widget_title_color' ); ?> ; }

        .theme-category-articles { background-color: <?php echo get_theme_mod( 'broden_featured_article_background' ); ?> ; }

        .blog-feautured .featured-style-1, .blog-feautured .featured-style-2, .blog-feautured .featured-style-4 {
            padding-top: <?php echo get_theme_mod( 'broden_featured_padding_top' ); ?>px ;
            padding-bottom: <?php echo get_theme_mod( 'broden_featured_padding_bottom' ); ?>px;
        }

        .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce .edit-account .button, .woocommerce input[name="login"], .woocommerce .return-to-shop a, .woocommerce .lost_reset_password .button {
            background-color: <?php echo get_theme_mod( 'broden_woo_button_background' ); ?>!important;
            color: <?php echo get_theme_mod( 'broden_woo_button_color' ); ?>!important;
        }

        .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce .edit-account .button:hover, .woocommerce input[name="login"]:hover, .woocommerce .return-to-shop a:hover, .woocommerce .lost_reset_password .button:hover {
            background-color: <?php echo get_theme_mod( 'broden_woo_hover_button_background' ); ?>!important;
            color: <?php echo get_theme_mod( 'broden_woo_hover_button_color' ); ?>!important;
        }

        .woocommerce span.onsale {
            background-color: <?php echo get_theme_mod( 'broden_woo_onsale_background_color' ); ?>!important;
        }

        .woocommerce ul.products li.product .price {
            color: <?php echo get_theme_mod( 'broden_woo_product_price_color' ); ?>!important;
        }

        .woocommerce ul.products li.product .button {
            background-color: <?php echo get_theme_mod( 'broden_woo_add_to_cart_bg_color' ); ?>;
            border: 2px solid <?php echo get_theme_mod( 'broden_woo_add_to_cart_border_color' ); ?>;
            color: <?php echo get_theme_mod( 'broden_woo_add_to_cart_color' ); ?>;
        }

        .woocommerce ul.products li.product .button:hover {
            background-color: <?php echo get_theme_mod( 'broden_woo_add_to_cart_bg_hover_color' ); ?>;
            border: 2px solid <?php echo get_theme_mod( 'broden_woo_add_to_cart_bg_hover_color' ); ?>;
            color: <?php echo get_theme_mod( 'broden_woo_add_to_cart_hover_color' ); ?>;    
        }

        <?php if(get_theme_mod( 'broden_custom_css' )) : ?>
            <?php echo get_theme_mod( 'broden_custom_css' ); ?>
        <?php endif; ?>

	</style>

    <?php
}
add_action( 'wp_head', 'broden_customizer_css' );