<?php
/**
 * Front page template file.
 *
 * @package hamburger
 */

get_header(); ?>

<main class="l-main">
	<section class="c-visual c-visual--center-y p-mv">
	<picture>
		<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/top/mv--pc.jpg' ) ); ?>" media="( min-width: 1024px )">
		<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/top/mv--tb.jpg' ) ); ?>" media="( min-width: 768px )">
		<img class="c-visual__img p-mv__img" src="<?php echo esc_url( get_theme_file_uri( '/images/top/mv--sp.jpg' ) ); ?>" alt="<?php esc_attr_e( '木製テーブルに並べられたハンバーガーの写真', 'hamburger' ); ?>">
	</picture>
	<h1 class="c-visual__title p-mv__title c-color--text-inverse">ダミーサイト</h1>
	</section>

	<div class="c-layout__container">
	<a href="<?php echo esc_url( get_term_link( 'take-out', 'menu_category' ) ); ?>" class="p-menu-card p-menu-card--takeout js-fade-link">
		<h2 class="p-menu-card__title c-font--accent c-color--text-tertiary c-underline">Take Out</h2>
		<div class="p-menu-card__content">
		<div class="p-menu-card__item c-color--bg-overlay-white-80">
			<h3 class="p-menu-card__subtitle">Take OUT1</h3>
			<p class="p-menu-card__text">
			当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています
			</p>
		</div>
		<div class="p-menu-card__item c-color--bg-overlay-white-80">
			<h3 class="p-menu-card__subtitle">Take OUT2</h3>
			<p class="p-menu-card__text">
			当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています
			</p>
		</div>
		</div>
	</a>

	<a href="<?php echo esc_url( get_term_link( 'eat-in', 'menu_category' ) ); ?>" class="p-menu-card p-menu-card--eatin js-fade-link">
		<h2 class="p-menu-card__title c-font--accent c-color--text-inverse c-underline">Eat In</h2>
		<div class="p-menu-card__content">
		<div class="p-menu-card__item c-color--bg-overlay-white-80">
			<h3 class="p-menu-card__subtitle">Eat In1</h3>
			<p class="p-menu-card__text">
			店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです
			</p>
		</div>
		<div class="p-menu-card__item c-color--bg-overlay-white-80">
			<h3 class="p-menu-card__subtitle">Eat In2</h3>
			<p class="p-menu-card__text">
			店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです
			</p>
		</div>
		</div>
	</a>
	</div>

	<section class="p-access">
	<picture class="p-access__bg">
		<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/top/access--pc.jpg' ) ); ?>" media="(min-width: 1024px)">
		<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/top/access--tb.jpg' ) ); ?>" media="(min-width: 768px)">
		<img src="<?php echo esc_url( get_theme_file_uri( '/images/top/access--sp.jpg' ) ); ?>" alt="<?php esc_attr_e( '店舗周辺の地図', 'hamburger' ); ?>">
	</picture>

	<div class="p-access__overlay1 c-color--bg-overlay-black-40"></div>
	<div class="p-access__overlay2 c-color--bg-overlay-black-30"></div>

	<div class="p-access__inner">
		<h2 class="p-access__title c-color--text-inverse c-underline">見出しが入ります</h2>
		<p class="p-access__text c-font--bold c-color--text-inverse">
		テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入りま
		</p>
	</div>
	</section>
</main>

<?php
get_sidebar();
get_footer();