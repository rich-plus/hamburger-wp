<?php
/**
 * Archive template file
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
			<h1 class="p-hero__title c-font--xl"><?php esc_html_e( 'Menu:', 'hamburger' ); ?></h1>
			<h2 class="p-hero__subtitle c-font--s">
				<?php
					// タームアーカイブ（カテゴリー・タグ・カスタム分類）の場合、ターム名を出力.
				if ( is_tax() ) {
					echo esc_html( single_term_title( '', false ) );
					// 投稿タイプアーカイブの場合、投稿タイプの表示名を出力.
				} else {
					echo esc_html( post_type_archive_title( '', false ) );
				}
				?>
			</h2>
			</div>
		</section>

		<section class="p-archive__body">
			<div class="p-archive__header">
			<?php
			// 変数の初期化（未定義エラー防止）.
			$archive_title = '';
			$archive_text  = '';
			$archive_description = '';

			// アーカイブの説明文を取得.
			$archive_description = get_the_archive_description();
			// 現在表示しているアーカイブの対象オブジェクトを取得（ターム・投稿タイプなど）.
			$queried_object = get_queried_object();

			// タームアーカイブの場合.
			if ( isset( $queried_object->name ) && is_tax() ) {

				// タイトル設定.
				$archive_title = sprintf(
					/* translators: %s: term name */
					esc_html__( '%sメニュー', 'hamburger' ),
					$queried_object->name
				);

				// 説明文設定.
				if ( ! empty( $archive_description ) ) {
					// 説明文が入力されている場合.
					$archive_text = $archive_description;
				} else {
					// 説明文が未入力の場合.
					$archive_text = sprintf(
						/* translators: %s: term name */
						esc_html__( '当店で提供している%sメニューの一覧です。', 'hamburger' ),
						$queried_object->name
					);
				}
				// 投稿タイプアーカイブの場合.
			} else {
				$archive_title = esc_html__( '当店のメニューについて', 'hamburger' );
				$archive_text  = esc_html__( '当店で提供しているメニューの一覧です。', 'hamburger' );
			}
			?>

			<!-- アーカイブページのタイトルと説明文（安全なHTMLタグの入力は可能）を出力 -->
			<?php if ( ! empty( $archive_title ) ) : ?>
				<h2 class="p-archive__title"><?php echo esc_html( $archive_title ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $archive_text ) ) : ?>
				<p class="p-archive__text"><?php echo wp_kses_post( $archive_text ); ?></p>
			<?php endif; ?>
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

					<?php
					/*
					 * NOTE:
					 * 一覧カード表示において、本文内の最初の見出し・本文を抽出する実装も行いましたが、
					 * 運用性と保守性を考慮し、ポートフォリオ版では WordPress 標準の「抜粋」を使用しています。
					 */

					/*
					// 投稿内容の最初の見出し（h1~h6）を小見出しとして表示するための処理.
					// 投稿内容を取得.
					$content = get_the_content();
					// WordPress標準のフィルターを適用.
					$content = apply_filters( 'the_content', $content );

					// 見出しレベルをカードの小見出し用（<h4 class="c-card__subtitle"></h4>）に調整.
					// h1～h6をh4に変換.
					$replace_map = array(
						'/<h([1-6])([^>]*)>/i' => '<h4$2>',
						'/<\/h([1-6])>/i'      => '</h4>',
					);
					$content     = preg_replace(
						array_keys( $replace_map ),
						array_values( $replace_map ),
						$content
					);

					// 変数の初期化（未定義エラー防止）.
					$subtitle_content = '';
					$text_content     = '';

					// 見出し（変換後のh4タグ：元のh1~h6）を最短一致で検索する.
					if ( preg_match( '/<h4[^>]*>(.*?)<\/h4>/is', $content, $matches ) ) {
						// 見出しが見つかった場合.
						// 見出し内のHTMLタグを除去して「カードの小見出し」に使用する文字だけにする.
						$subtitle_content = strip_tags( $matches[1] );
						// 見出しを削除した残りの内容を取得.
						$text_content = preg_replace( '/<h4[^>]*>.*?<\/h4>/is', '', $content );
						// HTMLタグを除去して「カードのテキスト」に使用する文字だけにする.
						$text_content = wp_strip_all_tags( $text_content );
						// 前後の空白を削除.
						$text_content = trim( $text_content );
					} else {
						// 見出しがない場合、内容全体をテキストとして使用.
						$text_content = wp_strip_all_tags( $content );
						$text_content = trim( $text_content );
						}
					<!-- 小見出しを表示 -->
					<?php if ( ! empty( $subtitle_content ) ) : ?>
						<h4 class="c-card__subtitle"><?php echo esc_html( $subtitle_content ); ?></h4>
						<?php endif; ?>
						<!-- 投稿テキストを表示（最大80文字） -->
						<?php if ( ! empty( $text_content ) ) : ?>
							<p class="c-card__text">
							<?php echo esc_html( wp_trim_words( $text_content, 80, '...' ) ); ?>
							</p>
						<?php endif; ?>
						*/
					?>
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
			<?php else : ?>
				<!-- 投稿がない場合のメッセージ -->
				<p class="p-archive__no-posts"><?php esc_html_e( '投稿が見つかりませんでした。', 'hamburger' ); ?></p>
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