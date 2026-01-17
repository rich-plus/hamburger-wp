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
	<h1 class="c-visual__title p-mv__title c-color--text-inverse"><?php esc_html_e( 'ダミーサイト', 'hamburger' ); ?></h1>
	</section>

	<div class="c-layout__container">
	<?php
	// Take Out用の投稿を取得（「人気」タグが付いた投稿、最大2件）.
	$takeout_category = get_term_by( 'slug', 'take-out', 'menu_category' );
	$takeout_tag      = get_term_by( 'slug', 'popular', 'menu_tag' ); // タグのスラッグを指定（必要に応じて変更）.
	$takeout_posts    = array();

	if ( $takeout_category && $takeout_tag ) {
		$takeout_query = new WP_Query(
			array(
				'post_type'      => 'menu',
				'posts_per_page' => 3,
				'tax_query'      => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'menu_category',
						'field'    => 'term_id',
						'terms'    => $takeout_category->term_id,
					),
					array(
						'taxonomy' => 'menu_tag',
						'field'    => 'term_id',
						'terms'    => $takeout_tag->term_id,
					),
				),
			)
		);
		$takeout_posts = $takeout_query->posts;
		wp_reset_postdata();
	}
	?>
	<a href="<?php echo esc_url( get_term_link( 'take-out', 'menu_category' ) ); ?>" class="p-menu-card p-menu-card--takeout js-fade-link">
		<h2 class="p-menu-card__title c-font--accent c-color--text-tertiary c-underline"><?php esc_html_e( 'Take Out', 'hamburger' ); ?></h2>
		<div class="p-menu-card__content">
		<?php if ( ! empty( $takeout_posts ) ) : ?>
			<?php foreach ( $takeout_posts as $takeout_post ) : ?>
				<?php setup_postdata( $takeout_post ); ?>
				<div class="p-menu-card__item c-color--bg-overlay-white-80">
					<h3 class="p-menu-card__subtitle"><?php echo esc_html( get_the_title( $takeout_post->ID ) ); ?></h3>
					<p class="p-menu-card__text">
						<?php
						$excerpt = get_the_excerpt( $takeout_post->ID );
						if ( empty( $excerpt ) ) {
							$content = $takeout_post->post_content;
							$content = strip_shortcodes( $content );
							$content = wp_strip_all_tags( $content );
							$excerpt = wp_trim_words( $content, 30 );
						}
						echo esc_html( $excerpt );
						?>
					</p>
				</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<!-- デフォルトのテキスト -->
			<div class="p-menu-card__item c-color--bg-overlay-white-80">
				<h3 class="p-menu-card__subtitle"><?php esc_html_e( 'Take OUT1', 'hamburger' ); ?></h3>
				<p class="p-menu-card__text">
					<?php esc_html_e( '当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています', 'hamburger' ); ?>
				</p>
			</div>
			<div class="p-menu-card__item c-color--bg-overlay-white-80">
				<h3 class="p-menu-card__subtitle"><?php esc_html_e( 'Take OUT2', 'hamburger' ); ?></h3>
				<p class="p-menu-card__text">
					<?php esc_html_e( '当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています', 'hamburger' ); ?>
				</p>
			</div>
		<?php endif; ?>
		</div>
	</a>

	<?php
	// Eat In用の投稿を取得（「人気」タグが付いた投稿、最大2件）.
	$eatin_category = get_term_by( 'slug', 'eat-in', 'menu_category' );
	$eatin_tag      = get_term_by( 'slug', 'popular', 'menu_tag' ); // タグのスラッグを指定（必要に応じて変更）.
	$eatin_posts    = array();

	if ( $eatin_category && $eatin_tag ) {
		$eatin_query = new WP_Query(
			array(
				'post_type'      => 'menu',
				'posts_per_page' => 3,
				'tax_query'      => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'menu_category',
						'field'    => 'term_id',
						'terms'    => $eatin_category->term_id,
					),
					array(
						'taxonomy' => 'menu_tag',
						'field'    => 'term_id',
						'terms'    => $eatin_tag->term_id,
					),
				),
			)
		);
		$eatin_posts = $eatin_query->posts;
		wp_reset_postdata();
	}
	?>
	<a href="<?php echo esc_url( get_term_link( 'eat-in', 'menu_category' ) ); ?>" class="p-menu-card p-menu-card--eatin js-fade-link">
		<h2 class="p-menu-card__title c-font--accent c-color--text-inverse c-underline"><?php esc_html_e( 'Eat In', 'hamburger' ); ?></h2>
		<div class="p-menu-card__content">
		<?php if ( ! empty( $eatin_posts ) ) : ?>
			<?php foreach ( $eatin_posts as $eatin_post ) : ?>
				<?php setup_postdata( $eatin_post ); ?>
				<div class="p-menu-card__item c-color--bg-overlay-white-80">
					<h3 class="p-menu-card__subtitle"><?php echo esc_html( get_the_title( $eatin_post->ID ) ); ?></h3>
					<p class="p-menu-card__text">
						<?php
						$excerpt = get_the_excerpt( $eatin_post->ID );
						if ( empty( $excerpt ) ) {
							$content = $eatin_post->post_content;
							$content = strip_shortcodes( $content );
							$content = wp_strip_all_tags( $content );
							$excerpt = wp_trim_words( $content, 30 );
						}
						echo esc_html( $excerpt );
						?>
					</p>
				</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<!-- デフォルトのテキスト -->
			<div class="p-menu-card__item c-color--bg-overlay-white-80">
				<h3 class="p-menu-card__subtitle"><?php esc_html_e( 'Eat In1', 'hamburger' ); ?></h3>
				<p class="p-menu-card__text">
					<?php esc_html_e( '店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです', 'hamburger' ); ?>
				</p>
			</div>
			<div class="p-menu-card__item c-color--bg-overlay-white-80">
				<h3 class="p-menu-card__subtitle"><?php esc_html_e( 'Eat In2', 'hamburger' ); ?></h3>
				<p class="p-menu-card__text">
					<?php esc_html_e( '店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです', 'hamburger' ); ?>
				</p>
			</div>
		<?php endif; ?>
		</div>
	</a>
	</div>

	<section class="p-access">
	<div class="p-access__bg">
		<iframe 
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7479757770916!2d139.74285797578673!3d35.658580472594515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bbd9009ec09%3A0x481a93f0d2a409dd!2z5p2x5Lqs44K_44Ov44O8!5e0!3m2!1sja!2sjp!4v1767680159506!5m2!1sja!2sjp" 
			width="100%" 
			height="100%" 
			style="border:0;" 
			allowfullscreen="" 
			loading="lazy" 
			referrerpolicy="no-referrer-when-downgrade"
			title="<?php esc_attr_e( '店舗周辺の地図', 'hamburger' ); ?>">
		</iframe>
	</div>

	<div class="p-access__overlay1 c-color--bg-overlay-black-40"></div>
	<div class="p-access__overlay2 c-color--bg-overlay-black-30"></div>

<div class="p-access__inner">
	<?php
	// 設定用固定ページのスラッグを指定.
	$settings_page = get_page_by_path( 'front-page-settings' );
	$page_id = $settings_page ? $settings_page->ID : null;

	// ACFが有効化されているか確認.
	if ( function_exists( 'get_field' ) && $page_id ) {
		$access_title = get_field( 'access_title', $page_id );
		$access_text  = get_field( 'access_text', $page_id );
	} else {
		// ACFがない場合のフォールバック.
		$access_title = esc_html__( '見出しが入ります', 'hamburger' );
		$access_text  = esc_html__( 'テキストが入ります。...', 'hamburger' );
	}

	// デフォルト値の設定.
	if ( empty( $access_title ) ) {
		$access_title = esc_html__( '見出しが入ります', 'hamburger' );
	}
	if ( empty( $access_text ) ) {
		$access_text = esc_html__( 'テキストが入ります。...', 'hamburger' );
	}
	?>
	<h2 class="p-access__title c-color--text-inverse c-underline">
		<?php echo esc_html( $access_title ); ?>
	</h2>
	<p class="p-access__text c-font--bold c-color--text-inverse">
		<?php echo wp_kses_post( $access_text ); ?>
	</p>
</div>
<?php
get_sidebar();
get_footer();