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
				<ul class="p-footer__nav-list">
					<li class="p-footer__item">
						<a href="<?php echo esc_url( home_url( '/page/' ) ); ?>" class="p-footer__link js-fade-link">
							ショップ情報
						</a>
					</li>
					<li class="p-footer__item">
						<!-- 固定ページができたら、リンクを書き換える -->
						<a href="#" class="p-footer__link">ヒストリー</a>
					</li>
				</ul>
			</nav>
			<small class="p-footer__copy">
				Copyright: <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</small>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
