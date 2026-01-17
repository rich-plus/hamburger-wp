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
			$archive_title       = '';
			$archive_text        = '';
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