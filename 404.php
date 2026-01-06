<?php
/**
 * 404 Error Page Template
 *
 * @package hamburger
 */

get_header();
?>

<main class="l-main">
	<div style="padding: 20px">
		<h1><?php esc_html_e( '404 Not Found', 'hamburger' ); ?></h1>
		<p><?php esc_html_e( 'お探しのページが見つかりませんでした。', 'hamburger' ); ?></p>
	</div>
</main>

<?php
get_sidebar();
get_footer();