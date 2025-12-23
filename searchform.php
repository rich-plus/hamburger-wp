<?php
/**
 * Search form template
 *
 * @package Hamburger
 */

?>
<form class="p-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
	<label for="s" class="u-visually-hidden">
	サイト内検索
	</label>
	<input type="search" id="s" name="s"
	class="p-search__input c-font--bold c-color--text-secondary c-border--primary" placeholder="チーズバーガー">
	<button type="submit" class="c-button--grad c-color--text-secondary">検索</button>
</form>
