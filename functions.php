<?php
/**
 * Theme functions and definitions.
 *
 * This file contains all custom theme functions and hooks for the Hamburger theme.
 *
 * @package hamburger
 * @since 1.0.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @return void
 */
function hamburger_theme_support() {
	// HTML5 markup support.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Menu support.
	add_theme_support( 'menus' );

	// Title tag support.
	add_theme_support( 'title-tag' );

	// Post thumbnails support.
	add_theme_support( 'post-thumbnails' );

	// Register navigation menus.
	register_nav_menus(
		array(
			'footer_nav'   => esc_html__( 'Footer Navigation', 'hamburger' ),
			'category_nav' => esc_html__( 'Category Navigation', 'hamburger' ),
		)
	);

	// Editor styles support.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'hamburger_theme_support' );

/**
 * Outputs the page title.
 *
 * @param string $title The page title.
 * @return string
 */
function hamburger_title( $title ) {
	if ( is_front_page() && is_home() ) {
		$title = get_bloginfo( 'name', 'display' );
	} elseif ( is_singular() ) {
		$title = single_post_title( '', false );
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'hamburger_title' );

/**
 * Enqueues theme scripts and styles.
 *
 * @return void
 */
function hamburger_script() {
	// Google Fonts.
	wp_enqueue_style(
		'hamburger-google-fonts',
		'https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap',
		array(),
		null
	);

	// Reset CSS.
	wp_enqueue_style(
		'hamburger-ress',
		get_theme_file_uri( '/ress.css' ),
		array(),
		'5.0.2'
	);

	// Theme main style.
	wp_enqueue_style(
		'hamburger-style',
		get_stylesheet_uri(),
		array( 'hamburger-ress', 'hamburger-google-fonts' ),
		'1.0.0'
	);

	// jQuery (WordPress built-in).
	wp_enqueue_script( 'jquery' );

	// Theme main script.
	wp_enqueue_script(
		'hamburger-main',
		get_theme_file_uri( '/js/main.js' ),
		array( 'jquery' ),
		'1.0.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'hamburger_script' );

/**
 * Custom walker for category navigation menu.
 * Outputs menu items with hamburger theme's specific HTML structure.
 *
 * @package hamburger
 */
class Hamburger_Walker_Nav_Menu extends Walker_Nav_Menu {

	/**
	 * Start the element output.
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu().
	 * @param int    $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

		if ( 0 === $depth ) {
			$class_names = 'p-sidemenu__category';
		} else {
			$class_names = 'p-sidemenu__subitem';
		}

		$output .= $indent . '<li class="' . esc_attr( $class_names ) . '">';

		$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$item_output = isset( $args->before ) ? $args->before : '';
		if ( 0 === $depth ) {
			$item_output .= '<a class="p-sidemenu__item js-fade-link"' . $attributes . '>';
		} else {
			$item_output .= '<a class="p-sidemenu__link"' . $attributes . '>';
		}
		$item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . apply_filters( 'the_title', $item->title, $item->ID ) . ( isset( $args->link_after ) ? $args->link_after : '' );
		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Start the list before the elements are added.
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu().
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n" . $indent . '<ul class="p-sidemenu__sub-list">' . "\n";
	}

	/**
	 * End the list after the elements are added.
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu().
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat( "\t", $depth );
		$output .= $indent . '</ul>' . "\n";
	}
}
