<?php
/**
 * Footer template
 *
 * @package Hamburger
 */

?>
</div>

	<footer class="l-footer">
		<div class="p-footer c-color--text-inverse">
			<nav class="p-footer__nav" aria-label="フッターメニュー">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer_nav',
							'container'      => false, // メニューを囲むコンテナ要素（<div>など）を出力しない.
							'menu_class'     => 'p-footer__nav-list', // メニューの<ul>要素にこのCSSクラス名を付与.
							'items_wrap'     => '<ul class="%2$s">%3$s</ul>', // ID属性( id="%1$s" )を非表示.
							'fallback_cb'    => false, // メニューがない場合、非表示.
						)
					);
					?>
			</nav>
			<small class="p-footer__copy">
				Copyright: <?php echo esc_html( hamburger_get_copyright() ); ?>
			</small>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
