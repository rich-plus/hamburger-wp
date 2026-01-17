<?php
/**
 * Archive/Search post card template.
 *
 * Displays a single post card for archive-type pages
 * such as archive.php and search.php.
 *
 * @package hamburger
 */

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
