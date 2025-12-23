<?php
/**
 * Sidebar menu template.
 *
 * Displays the category navigation menu.
 *
 * @package Hamburger
 */

?>

</div>


<aside class="c-layout__sidebar">
	<nav class="p-sidemenu c-color--text-secondary c-color--bg-secondary" aria-label="サイドメニュー">
	<!-- Menu (PC) -->
	<h2 class="p-sidemenu__title c-font--accent">Menu</h2>

	<!-- Menu List (共通) -->
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'category_nav',
			'container'      => false, // メニューを囲むコンテナ要素（<div>など）を出力しない.
			'menu_class'     => 'p-sidemenu__nav-list', // メニューの<ul>要素にこのCSSクラス名を付与.
			'items_wrap'     => '<ul class="%2$s">%3$s</ul>', // ID属性( id="%1$s" )を非表示.
			'fallback_cb'    => false, // メニューがない場合、非表示.
		)
	);
	?>
	</nav>
	<div class="p-sidemenu__overlay c-color--bg-overlay-black-50"></div>
</aside>