<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////
// 
add_action( 'after_setup_theme', 'generic_setup' );
function generic_setup() {
	load_theme_textdomain( 'generic', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form' ) );
	global $content_width;
	if ( ! isset( $content_width ) ) { $content_width = 1920; }
	register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'generic' ) ) );
}


//////////////////////////////////////////////////////////////////////////////////////////////////////
// 
add_action( 'wp_enqueue_scripts', 'generic_load_scripts' );
function generic_load_scripts() {
	wp_enqueue_style( 'generic-style', get_stylesheet_uri() );
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'generic-videos', get_template_directory_uri() . '/js/videos.js' );
	
	wp_enqueue_script( 'generic-videos' );
	wp_add_inline_script( 'generic-videos', 'jQuery(document).ready(function($){$("#wrapper").vids();});' );


	wp_register_style( 'select2Css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' );
	wp_enqueue_style( 'select2Css' );

	wp_register_script( 'select2Js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js' );
	wp_enqueue_script( 'select2Js' );

	wp_register_script('searchJs', get_template_directory_uri() . '/js/main.js');
    $ajax_nonce = wp_create_nonce( "search-ajax-nonce" );
    wp_localize_script('searchJs', 'KurdishDB', [
		'ajaxurl' => admin_url('admin-ajax.php'),
		'ajaxnonce' => $ajax_nonce
	]);
	wp_enqueue_script('searchJs');
}


//////////////////////////////////////////////////////////////////////////////////////////////////////
// Widget Areas
function register_widget_areas() {

  register_sidebar( array(
    'name'          => 'Top Container Section',
    'id'            => 'section_topcontainer',
    'description'   => 'Notice Section (#topcontainer)',
    'before_widget' => '<div class="topcontainer-box">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => '',
  ));
	
	register_sidebar( array(
    'name'          => 'Homepage Above Search Bar',
    'id'            => 'homepage_abovesearchbar',
    'description'   => 'Above Search Bar',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  ));

  register_sidebar( array(
    'name'          => 'Footer Area',
    'id'            => 'footerarea',
    'description'   => 'Centre',
    'before_widget' => '<div class="footer-area">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widgettitle">',
    'after_title'   => '</h4>',
  ));
	
}

add_action( 'widgets_init', 'register_widget_areas' );


//////////////////////////////////////////////////////////////////////////////////////////////////////
// Ubermenu Integration
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Header Main Menu' ),
      'login-menu' => __( 'Header Login Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


//////////////////////////////////////////////////////////////////////////////////////////////////////
// Tag Cloud Settings
function wpb_tag_cloud() {
	$tags = get_tags();
	$args = array(
		'smallest' => 17,
		'largest' => 17,
		'unit' => 'px',
		'number' => 10,
		'format' => 'flat',
		'separator' => "",
		'orderby' => 'count',
		'order' => 'DESC',
		'show_count' => 0,
		'echo' => false
	);
	$tag_string = wp_generate_tag_cloud( $tags, $args );
	return $tag_string;
}
// Add a shortcode so that we can use it in widgets, posts, and pages
add_shortcode('wpb_popular_tags', 'wpb_tag_cloud');
// Enable shortcode execution in text widget
add_filter ('widget_text', 'do_shortcode');


//////////////////////////////////////////////////////////////////////////////////////////////////////
// Unknown
add_action( 'wp_footer', 'generic_footer_scripts' );
function generic_footer_scripts() {
?>
<script>
	jQuery(document).ready(function ($) {
		var deviceAgent = navigator.userAgent.toLowerCase();
		if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
			$("html").addClass("ios");
		}
		if (navigator.userAgent.search("MSIE") >= 0) {
			$("html").addClass("ie");
		}
		else if (navigator.userAgent.search("Chrome") >= 0) {
			$("html").addClass("chrome");
		}
		else if (navigator.userAgent.search("Firefox") >= 0) {
			$("html").addClass("firefox");
		}
		else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
			$("html").addClass("safari");
		}
		else if (navigator.userAgent.search("Opera") >= 0) {
			$("html").addClass("opera");
		}
		$(".menu-icon").on("click", function () {
			$("#menu").toggleClass("toggled");
		});
		$(".menu-toggle").on("keypress", function(e) {
			if(e.which == 13) {
				$("#menu").toggleClass("toggled");
			}
		});
	});
</script>
<?php
}
add_filter( 'document_title_separator', 'generic_document_title_separator' );
function generic_document_title_separator( $sep ) {
	$sep = '|';
	return $sep;
}
add_filter( 'the_title', 'generic_title' );
function generic_title( $title ) {
	if ( $title == '' ) {
		return '...';
	} else {
		return $title;
	}
}
function generic_schema_type() {
	$schema = 'https://schema.org/';
	if ( is_single() ) {
		$type = "Article";
	} elseif ( is_author() ) {
		$type = 'ProfilePage';
	} elseif ( is_search() ) {
		$type = 'SearchResultsPage';
	} else {
		$type = 'WebPage';
	}
	echo 'itemscope itemtype="' . $schema . $type . '"';
}
add_filter( 'nav_menu_link_attributes', 'generic_schema_url', 10 );
function generic_schema_url( $atts ) {
	$atts['itemprop'] = 'url';
	return $atts;
}
if ( ! function_exists( 'generic_wp_body_open' ) ) {
	function generic_wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
add_action( 'wp_body_open', 'generic_skip_link', 5 );
function generic_skip_link() {
	echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'generic' ) . '</a>';
}
add_filter( 'the_content_more_link', 'generic_read_more_link' );
function generic_read_more_link() {
	if ( ! is_admin() ) {
		return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'generic' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
	}
}
add_filter( 'excerpt_more', 'generic_excerpt_read_more_link' );
function generic_excerpt_read_more_link( $more ) {
	if ( ! is_admin() ) {
		global $post;
		return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'generic' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
	}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'generic_image_insert_override' );
function generic_image_insert_override( $sizes ) {
	unset( $sizes['medium_large'] );
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );
	return $sizes;
}

add_action( 'wp_head', 'generic_pingback_header' );
function generic_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'comment_form_before', 'generic_enqueue_comment_reply_script' );
function generic_enqueue_comment_reply_script() {
	if ( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
function generic_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
										  }
add_filter( 'get_comments_number', 'generic_comment_count', 0 );
function generic_comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$get_comments = get_comments( 'status=approve&post_id=' . $id );
		$comments_by_type = separate_comments( $get_comments );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}



//////////////////////////////////////////////////////////////////////////////////////////////////////
// // Share Section > Post Form


  function load_stylesheets()
  {
    wp_register_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), false,'all'); 
    wp_enqueue_style('bootstrap');
    wp_register_style('stylesheet', get_template_directory_uri().'/style.css', array(), false,'all'); 
    wp_enqueue_style('stylesheet');

    /* Theme scripts */
    wp_register_script('alw-theme-script', get_template_directory_uri() . '/js/main.js', array());
    $ajax_nonce = wp_create_nonce( "search-ajax-nonce" );
    wp_localize_script('alw-theme-script', 'ALW_JS', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'ajaxnonce' => $ajax_nonce
        ]);
    wp_enqueue_script('alw-theme-script');
  }


//////////////////////////////////////////////////////////////////////////////////////////////////////
// // Search Section > Search Tags
function search_tags()
{
	check_ajax_referer( 'search-ajax-nonce', 'security' );

	if (isset($_POST['search_tag'])){
		$search_tag = esc_attr($_POST['search_tag']);
		$result = array();
		foreach (get_tags('post_tag') as $tag) {
			if (stripos($tag->name, $search_tag) !== false) {
				$result[$tag->term_id] = $tag->name;
			}
		}
		echo json_encode($result);
	}
	die();
}

// // Search Section > Search Posts
function search_posts()
{
	check_ajax_referer( 'search-ajax-nonce', 'security' );

	if (isset($_POST['search_tag'])){
		$search_tag = esc_attr($_POST['search_tag']);
          
		$query = new WP_Query(
			array(
				// 'posts_per_page' => -1,
				// 's' => $search_tag,
				'post_type' => 'post',
				'tax_query' => array(
					array(
						'taxonomy' => 'post_tag',
						'field' => 'name',
						'terms' => array($search_tag),
						'operator' => 'IN',
					),
					'relation' => 'OR',
				),
			)
		);
		$result = array();
		if ($query->have_posts()) {
			foreach ( $query->posts as $post ) {
				$result[$post->ID] = get_the_title($post->ID);
			}
		}
		echo json_encode($result);
	}
	die();
}

  add_action('wp_enqueue_scripts', 'load_stylesheets'); 
  add_action('wp_ajax_search_tags', 'search_tags');
  add_action('wp_ajax_nopriv_search_tags', 'search_tags');
  