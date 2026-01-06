<?php
/**
 * Search form template
 *
 * @package Hamburger
 */

?>
<form class="p-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
	<label for="s" class="u-visually-hidden">
		<?php esc_html_e( 'サイト内検索', 'hamburger' ); ?>
	</label>
	<input type="search" id="s" name="s"
		class="p-search__input c-font--bold c-color--text-primary c-border--primary"
		placeholder="<?php esc_attr_e( 'メニュー名を検索', 'hamburger' ); ?>"
		value="<?php echo esc_attr( get_search_query() ); ?>"
	>
	<button type="submit" class="c-button--grad c-color--text-secondary">
		<?php esc_html_e( '検索', 'hamburger' ); ?>
	</button>
</form>
