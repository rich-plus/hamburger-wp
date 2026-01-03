
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
				<h1 class="p-hero__title c-font--xl">Search:</h1>
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
						$search_count
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
			<div class="p-archive__list">
			<!-- 投稿があるか確認 -->
			<?php if ( have_posts() ) : ?>
				<!-- 投稿を1つずつ処理 -->
				<?php
				while ( have_posts() ) :
					the_post();
					?>
			<!-- 投稿カードの表示 -->
			<article class="c-card">
			<!-- 画像の表示 -->
					<?php if ( has_post_thumbnail() ) : ?>
				<picture class="c-card__picture">
					<!-- 投稿にアイキャッチ画像がある場合 -->
					<!-- PC/Tablet/SP用の画像サイズを取得して表示( functions.php にカスタム画像サイズを設定) -->
						<?php
						$thumbnail_id = get_post_thumbnail_id(); // アイキャッチ画像のIDを取得.
						// functions.php で定義したカスタム画像サイズを取得.
						$thumbnail_pc = wp_get_attachment_image_src( $thumbnail_id, 'archive-card-pc' );
						$thumbnail_tb = wp_get_attachment_image_src( $thumbnail_id, 'archive-card-tb' );
						$thumbnail_sp = wp_get_attachment_image_src( $thumbnail_id, 'archive-card-sp' );
						// アイキャッチ画像に設定された alt テキストを取得.
						$image_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
						// alt が未設定の場合は投稿タイトルを取得.
						$alt_text = $image_alt ? $image_alt : sprintf(
							/* translators: %s: post title */
							__( '%sの画像', 'hamburger' ),
							get_the_title()
						);
						?>
					<!-- 画面サイズに応じて取得した画像サイズのURLを出力（返り値は配列：[0]=>URL, [1]=>幅, [2]=>高さ） -->
						<?php if ( $thumbnail_pc ) : ?>
						<source srcset="<?php echo esc_url( $thumbnail_pc[0] ); ?>" media="( min-width: 1024px )">
						<?php endif; ?>
						<?php if ( $thumbnail_tb ) : ?>
						<source srcset="<?php echo esc_url( $thumbnail_tb[0] ); ?>" media="( min-width: 768px )">
						<?php endif; ?>
						<img
							class="c-card__img"
							src="<?php echo esc_url( $thumbnail_sp ? $thumbnail_sp[0] : ( $thumbnail_tb ? $thumbnail_tb[0] : $thumbnail_pc[0] ) ); ?>"
							alt="<?php echo esc_attr( $alt_text ); ?>">
				</picture>
					<?php else : ?>
				<picture class="c-card__picture">
					<!-- 投稿にアイキャッチ画像がない場合 -->
					<!-- デフォルト画像（No image画像）を取得して表示 -->
					<img class="c-card__img" src="<?php echo esc_url( get_theme_file_uri( '/images/archive/noimage.jpg' ) ); ?>" alt="<?php esc_attr_e( '画像が登録されていません', 'hamburger' ); ?>">
				</picture>
			<?php endif; ?>
				<div class="c-card__content c-color--bg-accent">
				<div class="c-card__body c-color--text-inverse">
					<!-- 投稿タイトルを表示 -->
					<h3 class="c-card__title"><?php the_title(); ?></h3>

					<!-- 抜粋をカード本文用のテキストとして表示（未入力時は自動生成） -->
					<p class="c-card__text">
						<?php echo esc_html( wp_trim_words( get_the_excerpt(), 80, '...' ) ); ?>
					</p>
				</div>
				<div class="c-card__footer">
					<!-- この投稿の詳細ページ（single.php）へ遷移するボタン型リンク -->
					<a href="<?php the_permalink(); ?>" class="c-card__button c-button c-color--text-secondary c-color--bg-surface js-fade-link">詳しく見る</a>
				</div>
				</div>
			</article>
			<?php endwhile; ?>
			<!-- 投稿がない場合のメッセージは、検索結果ヘッダー側に表示しているためここでは未設定 -->
			<?php endif; ?>
			</div>
		</section>

		<?php
		// ページネーション（プラグイン対応）.
		if ( function_exists( 'wp_pagenavi' ) ) {
			// WP-PageNavi プラグインが有効な場合.
			wp_pagenavi();
		} elseif ( function_exists( 'the_posts_pagination' ) ) {
			// WP-PageNavi が利用できない場合は、WordPress 標準のページネーションを使用.
			the_posts_pagination(
				array(
					'mid_size'  => 2,
					'prev_text' => '前へ',
					'next_text' => '次へ',
				)
			);
		}
		?>
			</main>
<?php
get_sidebar();
get_footer();