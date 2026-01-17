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

	// Automatic feed links support.
	add_theme_support( 'automatic-feed-links' );

	// Title tag support.
	add_theme_support( 'title-tag' );

	// Post thumbnails support.
	add_theme_support( 'post-thumbnails' );

	// Enable wide and full alignment options for blocks.
	add_theme_support( 'align-wide' );

	// Register custom image sizes for archive cards.
	add_image_size( 'archive-card-pc', 677, 471, true );
	add_image_size( 'archive-card-tb', 379, 355, true );
	add_image_size( 'archive-card-sp', 337, 231, true );

	// Register custom image sizes for single and page mainvisual.
	add_image_size( 'single-mv-pc', 1553, 500, true );
	add_image_size( 'single-mv-tb', 834, 505, true );
	add_image_size( 'single-mv-sp', 375, 225, true );

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
		'1.0.1'
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
 * Footer copyright name.
 *
 * @return string The copyright name to display in the footer.
 */
function hamburger_get_copyright() {
	return 'RaiseTech';
}

// init フックで、"メニュー"カスタム投稿を登録.
add_action( 'init', 'hamburger_menu_init' );

/**
 * Register the ‘Menu’ custom post type.
 */
function hamburger_menu_init() {
	// ラベル（管理画面に表示される名前）.
	$labels = array(
		// _x()は、同じ文字列でも文脈によって意味が変わる場合に、翻訳者に文脈を伝えるための関数.
		'name'               => _x( 'Menus', 'post type general name', 'hamburger' ),
		'singular_name'      => _x( 'Menu', 'post type singular name', 'hamburger' ),
		'menu_name'          => _x( 'Menus', 'admin menu', 'hamburger' ),
		'name_admin_bar'     => _x( 'Menu', 'add new on admin bar', 'hamburger' ),
		'add_new'            => _x( '新規追加', 'menu', 'hamburger' ),
		'add_new_item'       => __( '新しいMenu', 'hamburger' ),
		'new_item'           => __( '新しいMenu', 'hamburger' ),
		'edit_item'          => __( 'Menuを編集', 'hamburger' ),
		'view_item'          => __( 'Menuを表示', 'hamburger' ),
		'all_items'          => __( 'すべてのMenu', 'hamburger' ),
		'search_items'       => __( 'Menuを検索', 'hamburger' ),
		'parent_item_colon'  => __( '親Menu', 'hamburger' ),
		'not_found'          => __( 'Menuが見つかりませんでした。', 'hamburger' ),
		'not_found_in_trash' => __( 'ゴミ箱にMenuはありません。', 'hamburger' ),
	);

	// カスタム投稿タイプの設定.
	$args = array(
		'labels'             => $labels, // 先ほど定義した$labels配列.
		'public'             => true, // 公開する：site.com/menu/投稿名でアクセス可能.
		'publicly_queryable' => true, // クエリ可能：アーカイブページや検索結果に表示される.
		'show_ui'            => true, // 管理画面にUI表示：管理画面にMenuが表示される.
		'show_in_menu'       => true, // 管理画面の左サイドバーに表示.
		'query_var'          => true, // URLクエリパラメータでこの投稿タイプを指定：site.com/?menu=投稿名でアクセス可能.
		'rewrite'            => array( 'slug' => 'menu' ), // フロントエンドのURL構造を設定：'slug' => 'menu': yoursite.com/menu/投稿名.
		'capability_type'    => 'post', // この投稿タイプの権限をどの投稿タイプと同じにするか：'post': 通常の投稿と同じ権限, 'page': 固定ページと同じ権限, 配列：カスタム権限.
		'has_archive'        => true, // アーカイブページの有効化：site.com/menu/ で一覧ページが表示される.
		'hierarchical'       => false, // 親子関係（階層構造）の有効化：編集画面に「親Menu」選択欄が表示される（false:非表示）.
		'menu_position'      => null, // 管理画面の左サイドバーでの表示位置：null:デフォルト位置（自動的に下に追加）, 数値：位置を指定（目安 5:投稿の下,20:固定ページの下,60:外観の下）.
		'show_in_rest'       => true, // REST APIに公開。ブロックエディタ（Gutenberg）対応のためtrue推奨.
		'menu_icon'          => 'dashicons-food', // 管理画面の左サイドバーに表示されるアイコン.
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ), // 機能リスト(タイトル、説明文、アイキャッチ画像、抜粋、メニュー順).
	);

	register_post_type( 'menu', $args );
}
// init フックで、"Menu"カスタム投稿用のカスタム分類を登録.
add_action( 'init', 'hamburger_menu_taxonomies' );

/**
 * Registers custom taxonomies for the hamburger menu custom post type.
 *
 * Registers two taxonomies:
 * - menu_category: Hierarchical taxonomy (like categories)
 * - menu_tag: Non-hierarchical taxonomy (like tags)
 *
 * @return void
 */
function hamburger_menu_taxonomies() {
	// "Menuカテゴリー"というカスタム分類を追加（階層型：カテゴリーのように親子関係がある）.
	$category_labels = array(
		'name'              => _x( 'Menuカテゴリー', 'taxonomy general name', 'hamburger' ),
		'singular_name'     => _x( 'Menuカテゴリー', 'taxonomy singular name', 'hamburger' ),
		'search_items'      => __( 'Menuカテゴリーを検索', 'hamburger' ),
		'all_items'         => __( 'すべてのMenuカテゴリー', 'hamburger' ),
		'parent_item'       => __( '親カテゴリー', 'hamburger' ),
		'parent_item_colon' => __( '親カテゴリー:', 'hamburger' ),
		'edit_item'         => __( 'Menuカテゴリーを編集', 'hamburger' ),
		'update_item'       => __( 'Menuカテゴリーを更新', 'hamburger' ),
		'add_new_item'      => __( '新しいMenuカテゴリーを追加', 'hamburger' ),
		'new_item_name'     => __( '新しいMenuカテゴリー名', 'hamburger' ),
		'menu_name'         => __( 'Menuカテゴリー', 'hamburger' ),
	);

	$category_args = array(
		'hierarchical'      => true,
		'labels'            => $category_labels,
		'show_ui'           => true,
		'show_admin_column' => true, // 管理画面の投稿一覧に、このタクソノミーのカラムを表示する.
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'menu-category' ),
		'show_in_rest'      => true,
	);

	register_taxonomy( 'menu_category', array( 'menu' ), $category_args );

	// "Menuタグ"を追加（非階層型：タグのように親子関係がない）.
	$tag_labels = array(
		'name'                       => _x( 'Menuタグ', 'taxonomy general name', 'hamburger' ),
		'singular_name'              => _x( 'Menuタグ', 'taxonomy singular name', 'hamburger' ),
		'search_items'               => __( 'Menuタグを検索', 'hamburger' ),
		'popular_items'              => __( '人気のMenuタグ', 'hamburger' ),
		'all_items'                  => __( 'すべてのMenuタグ', 'hamburger' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Menuタグを編集', 'hamburger' ),
		'update_item'                => __( 'Menuタグを更新', 'hamburger' ),
		'add_new_item'               => __( '新しいMenuタグを追加', 'hamburger' ),
		'new_item_name'              => __( '新しいMenuタグ名', 'hamburger' ),
		'separate_items_with_commas' => __( 'Menuタグをカンマで区切る', 'hamburger' ),
		'add_or_remove_items'        => __( 'Menuタグを追加または削除', 'hamburger' ),
		'choose_from_most_used'      => __( 'よく使われているMenuタグから選択', 'hamburger' ),
		'not_found'                  => __( 'Menuタグが見つかりませんでした。', 'hamburger' ),
		'menu_name'                  => __( 'Menuタグ', 'hamburger' ),
	);

	$tag_args = array(
		'hierarchical'          => false,
		'labels'                => $tag_labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count', // 各タグに紐づいている投稿数を自動更新する関数(WordPressの標準関数)を指定.
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'menu-tag' ),
		'show_in_rest'          => true,
	);

	register_taxonomy( 'menu_tag', array( 'menu' ), $tag_args );
}

/**
 * Customizes navigation menu <li> CSS classes for sidebar and footer menus.
 *
 * Adds custom CSS classes to menu items based on their location and hierarchy:
 * - Sidebar menu parent items: 'p-sidemenu__category'
 * - Sidebar menu child items: 'p-sidemenu__subitem'
 * - Footer menu items: 'p-footer__item'
 *
 * @param array    $classes Array of CSS classes applied to the menu item's <li> element.
 * @param WP_Post  $item    The current menu item object.
 * @param stdClass $args    An object of wp_nav_menu() arguments.
 * @return array Modified array of CSS classes.
 */
function hamburger_nav_menu_css_classes( $classes, $item, $args ) {
	// サイドメニューの場合.
	if ( isset( $args->theme_location ) && 'category_nav' === $args->theme_location ) {

		// メニュー項目（li）が親メニューかどうかを判定する.
		// menu_item_parent が '0' の場合、その項目は階層の最上位にある.
		$is_parent = isset( $item->menu_item_parent ) && '0' === $item->menu_item_parent;

		// 親（階層の最上位）メニューの場合.
		if ( $is_parent ) {
			// 親メニュー用のクラスを付与.
			$classes[] = 'p-sidemenu__category';
		} else {
			// 子メニュー用のクラスを付与.
			$classes[] = 'p-sidemenu__subitem';
		}
	}

	// フッターメニューの場合.
	if ( isset( $args->theme_location ) && 'footer_nav' === $args->theme_location ) {
		$classes[] = 'p-footer__item';
	}
	return $classes;
}
// メニュー項目（li）のCSSクラスをカスタマイズするフィルターを追加.
add_filter( 'nav_menu_css_class', 'hamburger_nav_menu_css_classes', 10, 3 );

/**
 * Customizes navigation menu <a> element attributes for sidebar and footer menus.
 *
 * Adds custom CSS classes to menu links based on their location and hierarchy:
 * - Sidebar menu parent items: 'p-sidemenu__item js-fade-link'
 * - Sidebar menu child items: 'p-sidemenu__link'
 * - Footer menu items: 'p-footer__link js-fade-link'
 *
 * Preserves existing classes if they exist.
 *
 * @param array    $atts   HTML attributes applied to the menu item's <a> element.
 * @param WP_Post  $item   The current menu item object.
 * @param stdClass $args   An object of wp_nav_menu() arguments.
 * @return array Modified array of HTML attributes.
 */
function hamburger_nav_menu_link_attributes( $atts, $item, $args ) {
	// すでにclass属性が設定されている場合は、上書きではなく、文字列連結して、後続にクラスを追加できるようにする.
	$existing_class = isset( $atts['class'] ) ? $atts['class'] . ' ' : '';

	// サイドメニューの場合.
	if ( isset( $args->theme_location ) && 'category_nav' === $args->theme_location ) {

		// このリンクが属するメニュー項目（li）が親メニューかどうかを判定する.
		// menu_item_parent が '0' の場合、その項目は階層の最上位にある.
		$is_parent = isset( $item->menu_item_parent ) && '0' === $item->menu_item_parent;

		// 親（階層の最上位）メニューの場合.
		if ( $is_parent ) {
			// 親メニュー用のクラスを付与（既存クラスがあれば保持）.
			$atts['class'] = $existing_class . 'p-sidemenu__item js-fade-link';
		} else {
			// 子メニュー用のクラスを付与.
			$atts['class'] = $existing_class . 'p-sidemenu__link';
		}
	}
	// フッターメニューの場合.
	if ( isset( $args->theme_location ) && 'footer_nav' === $args->theme_location ) {
		$atts['class'] = $existing_class . 'p-footer__link js-fade-link';
	}
	return $atts;
}
// メニューのリンク（<a>タグ属性）をカスタマイズするフィルターを追加.
add_filter( 'nav_menu_link_attributes', 'hamburger_nav_menu_link_attributes', 10, 3 );

/**
 * Customizes navigation submenu <ul> CSS classes for sidebar menu.
 *
 * Adds custom CSS classes to submenu containers based on their location:
 * - Sidebar menu submenus: 'p-sidemenu__sub-list'
 *
 * @param array    $classes Array of CSS classes applied to the submenu <ul> element.
 * @param stdClass $args    An object of wp_nav_menu() arguments.
 * @return array Modified array of CSS classes.
 */
function hamburger_sidebar_nav_menu_submenu_css_classes( $classes, $args ) {
	// サイドメニューの場合.
	if ( isset( $args->theme_location ) && 'category_nav' === $args->theme_location ) {
		$classes[] = 'p-sidemenu__sub-list';
	}
	return $classes;
}
// メニュー項目（ul）のCSSクラスをカスタマイズするフィルターを追加.
add_filter( 'nav_menu_submenu_css_class', 'hamburger_sidebar_nav_menu_submenu_css_classes', 10, 2 );

/**
 * Limit search results to the custom post type "menu".
 *
 * @param WP_Query $query The WordPress query object.
 * @return void
 */
function hamburger_search_filter( $query ) {
	// サイト内検索をカスタム投稿タイプ"Menu"だけに限定するためのフック処理.
	if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
		$query->set( 'post_type', 'menu' );
	}
}
add_action( 'pre_get_posts', 'hamburger_search_filter' );

/**
 * Set posts per page and handle sorting for archive and search pages.
 *
 * @param WP_Query $query The WordPress query object.
 * @return void
 */
function hamburger_archive_query_modify( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		// アーカイブページまたは検索結果ページの場合.
		if ( $query->is_archive() || $query->is_search() ) {
			// 1ページあたりの表示件数を6件に設定.
			$query->set( 'posts_per_page', 6 );

			// URLパラメータから並び替えを取得.
			$orderby = isset( $_GET['orderby'] ) ? sanitize_text_field( wp_unslash( $_GET['orderby'] ) ) : 'date';
			$order   = isset( $_GET['order'] ) ? strtoupper( sanitize_text_field( wp_unslash( $_GET['order'] ) ) ) : 'DESC';

			// 並び替えを設定.
			$query->set( 'orderby', $orderby );
			$query->set( 'order', $order );
		}
	}
}
add_action( 'pre_get_posts', 'hamburger_archive_query_modify' );

/**
 * Generates custom pagination HTML for the theme.
 *
 * This function builds pagination markup manually using the current
 * query information instead of relying on WP-PageNavi's default HTML.
 * It outputs the same structure whether WP-PageNavi is active or not.
 *
 * - Uses the main query by default
 * - Supports custom WP_Query objects
 * - Outputs both PC (numbered) and mobile (prev/next) pagination
 * - All dynamic values are properly escaped
 *
 * @param string        $html  HTML output from WP-PageNavi (accepted for compatibility, not used).
 * @param WP_Query|null $query Query object used for pagination. Defaults to main query.
 * @return string              Fully escaped pagination HTML.
 */
function hamburger_customize_pagination( $html = '', $query = null ) {
	// クエリ未指定時はメインクエリを使用.
	if ( null === $query ) {
		global $wp_query;
		$query = $wp_query;
	}

	// 現在ページ（1以上に補正）.
	$paged = $query->get( 'paged' )
		? (int) $query->get( 'paged' )
		: (int) get_query_var( 'paged' );
	$paged = max( 1, $paged );

	// 総ページ数.
	$total_pages = (int) $query->max_num_pages;

	// 1ページのみの場合は表示しない.
	if ( $total_pages <= 1 ) {
		return '';
	}

	// 矢印アイコンのURL.
	$laquo_img = get_theme_file_uri( '/images/archive/laquo.svg' );
	$raquo_img = get_theme_file_uri( '/images/archive/raquo.svg' );

	/*
	========================================
		PC / Tablet : 数字ページネーション
	========================================
	*/

	$numbers_html  = '<div class="p-pagination__numbers">';
	$numbers_html .= '<span class="p-pagination__info">';
	$numbers_html .= sprintf(
		/* translators: 1: current page, 2: total pages */
		esc_html__( 'page %1$d / %2$d', 'hamburger' ),
		$paged,
		$total_pages
	);
	$numbers_html .= '</span>';

	// 前のページ.
	if ( $paged > 1 ) {
		$numbers_html .= '<a href="' . esc_url( get_pagenum_link( $paged - 1 ) ) . '" class="p-pagination__prev is-active">';
		$numbers_html .= '<img src="' . esc_url( $laquo_img ) . '" alt="' . esc_attr__( '前のページへ', 'hamburger' ) . '">';
		$numbers_html .= '</a>';
	} else {
		$numbers_html .= '<span class="p-pagination__prev is-disabled">';
		$numbers_html .= '<img src="' . esc_url( $laquo_img ) . '" alt="' . esc_attr__( '前のページへ', 'hamburger' ) . '">';
		$numbers_html .= '</span>';
	}

	// ページ番号リスト.
	$numbers_html .= '<ul class="p-pagination__list">';

	$start_page = max( 1, $paged - 4 );
	$end_page   = min( $total_pages, $paged + 4 );

	for ( $i = $start_page; $i <= $end_page; $i++ ) {
		if ( $i === $paged ) {
			// 現在ページ.
			$numbers_html .= '<li>';
			/* translators: %d is the current page number. */
			$numbers_html .= '<a href="' . esc_url( get_pagenum_link( $i ) ) . '" class="p-pagination__item c-color--text-inverse c-color--bg-accent c-border--primary" aria-current="page" aria-label="' . esc_attr( sprintf( __( '現在のページ、%dページ目', 'hamburger' ), $i ) ) . '">';
			$numbers_html .= esc_html( $i );
			$numbers_html .= '</a>';
			$numbers_html .= '</li>';
		} else {
			// 通常ページ.
			$numbers_html .= '<li>';
			/* translators: %d is the target page number. */
			$numbers_html .= '<a href="' . esc_url( get_pagenum_link( $i ) ) . '" class="p-pagination__item c-border--primary" aria-label="' . esc_attr( sprintf( __( '%dページ目へ', 'hamburger' ), $i ) ) . '">';
			$numbers_html .= esc_html( $i );
			$numbers_html .= '</a>';
			$numbers_html .= '</li>';
		}
	}

	$numbers_html .= '</ul>';

	// 次のページ.
	if ( $paged < $total_pages ) {
		$numbers_html .= '<a href="' . esc_url( get_pagenum_link( $paged + 1 ) ) . '" class="p-pagination__next is-active">';
		$numbers_html .= '<img src="' . esc_url( $raquo_img ) . '" alt="' . esc_attr__( '次のページへ', 'hamburger' ) . '">';
		$numbers_html .= '</a>';
	} else {
		$numbers_html .= '<span class="p-pagination__next is-disabled">';
		$numbers_html .= '<img src="' . esc_url( $raquo_img ) . '" alt="' . esc_attr__( '次のページへ', 'hamburger' ) . '">';
		$numbers_html .= '</span>';
	}

	$numbers_html .= '</div>';

	/*
	========================================
		Mobile : 前へ / 次へ
	========================================
	*/

	$arrows_html = '<div class="p-pagination__arrows">';

	if ( $paged > 1 ) {
		$arrows_html .= '<a href="' . esc_url( get_pagenum_link( $paged - 1 ) ) . '" class="p-pagination__prev is-active">';
		$arrows_html .= '<img class="p-pagination__prev-laquo" src="' . esc_url( $laquo_img ) . '" alt="' . esc_attr__( '前のページへ', 'hamburger' ) . '">';
		$arrows_html .= esc_html__( '前へ', 'hamburger' );
		$arrows_html .= '</a>';
	} else {
		$arrows_html .= '<span class="p-pagination__prev is-disabled">';
		$arrows_html .= '<img class="p-pagination__prev-laquo" src="' . esc_url( $laquo_img ) . '" alt="' . esc_attr__( '前のページへ', 'hamburger' ) . '">';
		$arrows_html .= esc_html__( '前へ', 'hamburger' );
		$arrows_html .= '</span>';
	}

	if ( $paged < $total_pages ) {
		$arrows_html .= '<a href="' . esc_url( get_pagenum_link( $paged + 1 ) ) . '" class="p-pagination__next is-active">';
		$arrows_html .= esc_html__( '次へ', 'hamburger' );
		$arrows_html .= '<img class="p-pagination__next-raquo" src="' . esc_url( $raquo_img ) . '" alt="' . esc_attr__( '次のページへ', 'hamburger' ) . '">';
		$arrows_html .= '</a>';
	} else {
		$arrows_html .= '<span class="p-pagination__next is-disabled">';
		$arrows_html .= esc_html__( '次へ', 'hamburger' );
		$arrows_html .= '<img class="p-pagination__next-raquo" src="' . esc_url( $raquo_img ) . '" alt="' . esc_attr__( '次のページへ', 'hamburger' ) . '">';
		$arrows_html .= '</span>';
	}

	$arrows_html .= '</div>';

	// 画面幅で出し分け（CSS制御）.
	return '<nav class="p-pagination c-color--text-secondary">' . $numbers_html . $arrows_html . '</nav>';
}

/**
 * Output custom pagination.
 *
 * Use this function in archive.php or search.php.
 *
 * @param WP_Query|null $query Query object. Defaults to global query.
 */
function hamburger_pagination( $query = null ) {
	echo wp_kses_post( hamburger_customize_pagination( '', $query ) );
}
