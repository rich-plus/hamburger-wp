<?php
/**
 * Search template file
 *
 * @package hamburger
 */

get_header(); ?>

		<main class="l-main p-archive">
		<section class="c-visual c-visual--center-y p-hero">
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/archive/archive--pc.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/archive/archive--tb.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-visual__img p-hero__img" src="<?php echo esc_url( get_theme_file_uri( '/images/archive/archive--sp.jpg' ) ); ?>" alt="<?php esc_attr_e( 'ゴマ付きバンズのハンバーガー', 'hamburger' ); ?>">
			</picture>
			<div class="p-hero__overlay c-color--bg-overlay-black-50"></div>
			<div class="c-visual__content p-hero__content c-layout__inner c-color--text-inverse">
				<h1 class="p-hero__title c-font--xl"><?php esc_html_e( 'Search:', 'hamburger' ); ?></h1>
				<h2 class="p-hero__subtitle c-font--s">
					<!-- 検索キーワードを取得して表示する -->
					<?php echo esc_html( get_search_query() ); ?>
				</h2>
			</div>
		</section>

		<section class="p-archive__body">
			<div class="p-archive__header">
			<?php
				global $wp_query; // 検索結果のクエリ情報を取得.
				$search_count = (int) $wp_query->found_posts; // 検索結果の総件数(整数).
				$search_query = get_search_query(); // 検索キーワード.
			?>

			<h2 class="p-archive__title">
				<?php if ( 0 < $search_count ) : ?>
					<?php
					// 検索結果が1件以上ある場合のタイトル.
					printf(
						/* translators: %1$s: search keyword, %2$d: number of results */
						esc_html__( '「%1$s」の検索結果：%2$d件', 'hamburger' ),
						esc_html( $search_query ),
						absint( $search_count )
					);
					?>
				<?php else : ?>
					<?php
					// 検索結果が0件の場合のタイトル.
					esc_html_e( '検索結果が見つかりませんでした', 'hamburger' );
					?>
				<?php endif; ?>
			</h2>

			<p class="p-archive__text">
				<?php if ( 0 < $search_count ) : ?>
					<?php
					// 検索結果が1件以上ある場合の説明文.
					printf(
						/* translators: %s: search keyword */
						esc_html__( '検索キーワード「%s」に一致する投稿を表示しています。', 'hamburger' ),
						esc_html( $search_query )
					);
					?>
				<?php else : ?>
					<?php
					// 検索結果が0件の場合の説明文.
					printf(
						/* translators: %s: search keyword */
						esc_html__( '申し訳ございませんが、検索キーワード「%s」に一致する投稿は見つかりませんでした。', 'hamburger' ),
						esc_html( $search_query )
					);
					?>
					<br>
					<?php esc_html_e( '別のキーワードで検索してください。', 'hamburger' ); ?>
				<?php endif; ?>
			</p>
			</div>

			<!-- 並び替えボタン -->
			<?php get_template_part( 'template-parts/archive/sort' ); ?>

			<div class="p-archive__list">
			<!-- 投稿があるか確認 -->
			<?php if ( have_posts() ) : ?>
				<!-- 投稿を1つずつ処理 -->
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<?php get_template_part( 'template-parts/content', 'archive' ); ?>
			<?php endwhile; ?>
			<!-- 投稿がない場合のメッセージは、検索結果ヘッダー側に表示しているためここでは未設定 -->
			<?php endif; ?>
			</div>
		</section>

		<?php
		// ページネーション.
		hamburger_pagination();
		?>
		</main>
<?php
get_sidebar();
get_footer();