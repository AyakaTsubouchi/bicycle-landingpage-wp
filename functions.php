<?php
/*
	==========================================
	 Include scripts
	==========================================
*/
function ayacat_script_enqueue()
{
	//css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.1.x', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/ayacat.css', array(), '1.0.0', 'all');
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '5.1.x', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/ayacat.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'ayacat_script_enqueue');

/*
	==========================================
	 Activate menus
	==========================================
*/
function ayacat_theme_setup()
{

	add_theme_support('menus');

	// register_nav_menu('primary', 'Primary Header Navigation');
	// register_nav_menu('secondary', 'Footer Navigation');
}

add_action('init', 'ayacat_theme_setup');

function sunset_custom_settings()
{
	//Sidebar Options
	register_setting('ayacat-settings-group', 'set_schedular');
}

function ayacat_schedular_option()
{
}
function ayacat_get_schedular_option()
{
	$setSchedular = esc_attr(get_option('set_schedular'));
	echo '<input type="checkbox" name="set_schedular" value="' . $setSchedular . '"  />';
}

/*
	==========================================
	 Theme support function
	==========================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'image', 'video'));
add_theme_support('html5', array('search-form'));
add_theme_support('custom-logo', array(
	'height'               => 80,
	'width'                => 320,
	'flex-height'          => true,
	'flex-width'           => true,
	'header-text'          => array('site-title', 'site-description'),
	'unlink-homepage-logo' => true,
));

/*
	==========================================
	 Sidebar function
	==========================================
*/
function ayacat_widget_setup()
{

	register_sidebar(
		array(
			'name'	=> 'header-one',
			'id'	=> 'header-one',
			'class'	=> 'custom',
			'description' => 'Standard Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
}
add_action('widgets_init', 'ayacat_widget_setup');

/*
	==========================================
	 Include Walker file
	==========================================
*/
// require get_template_directory() . '/inc/walker.php';
/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');
add_filter('nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3);
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute($atts, $item, $args)
{
	if (is_a($args->walker, 'WP_Bootstrap_Navwalker')) {
		if (array_key_exists('data-toggle', $atts)) {
			unset($atts['data-toggle']);
			$atts['data-bs-toggle'] = 'dropdown';
		}
	}
	return $atts;
}

/*
	==========================================
	 Head function
	==========================================
*/
function ayacat_remove_version()
{
	return '';
}
add_filter('the_generator', 'ayacat_remove_version');

/*
	==========================================
	 Custom Post Type
	==========================================
*/

function ayacat_service_post_type()
{

	$labels = array(
		'name' => 'Services',
		'singular_name' => 'Service',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Services',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('Services', $args);
}
add_action('init', 'ayacat_service_post_type');



/*
	==========================================
	Custom Term Function
	==========================================
*/

function ayacat_get_terms($postID, $term)
{

	$terms_list = wp_get_post_terms($postID, $term);
	$output = '';

	$i = 0;
	foreach ($terms_list as $term) {
		$i++;
		if ($i > 1) {
			$output .= ', ';
		}
		$output .= '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
	}

	return $output;
}
