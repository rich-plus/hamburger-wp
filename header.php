<?php
/**
 * Header template
 *
 * @package Hamburger
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="c-layout__wrapper">
		<div class="c-layout__wrapper-inner">
			<header class="l-header c-color--bg-tertiary">
				<div class="p-header">
					<a class="p-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img
							src="<?php echo esc_url( get_theme_file_uri( '/images/logo/logo.png' ) ); ?>"
							alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					</a>
					<?php get_search_form(); ?>
				</div>
				<!-- Menuボタン（Tablet/Mobile） -->
				<button type="button" class="p-hamburger c-font--accent c-color--text-secondary js-hamburger">
					<span class="p-hamburger__menu"><?php esc_html_e( 'Menu', 'hamburger' ); ?></span>
				</button>
			</header>