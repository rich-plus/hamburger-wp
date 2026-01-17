<?php
/**
 * Page template file
 *
 * @package hamburger
 */

get_header(); ?>

		<main class="l-main p-single">
		<!-- 固定ページ用 メインビジュアル -->
		<section class="c-visual c-visual--center-y p-single__mv">
			<?php if ( has_post_thumbnail() ) : ?>
				<picture>
					<?php
					$thumbnail_id = get_post_thumbnail_id(); // アイキャッチ画像のIDを取得.
					// functions.php で定義したカスタム画像サイズを取得.
					$thumbnail_pc = wp_get_attachment_image_src( $thumbnail_id, 'single-mv-pc' );
					$thumbnail_tb = wp_get_attachment_image_src( $thumbnail_id, 'single-mv-tb' );
					$thumbnail_sp = wp_get_attachment_image_src( $thumbnail_id, 'single-mv-sp' );
					// アイキャッチ画像に設定された alt テキストを取得.
					$image_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
					// alt が未設定の場合は投稿タイトルを取得.
					$alt_text = $image_alt ? $image_alt : sprintf(
						/* translators: %s: post title */
						__( '%sの画像', 'hamburger' ),
						get_the_title()
					);
					?>
					<?php if ( $thumbnail_pc ) : ?>
						<source srcset="<?php echo esc_url( $thumbnail_pc[0] ); ?>" media="( min-width: 1024px )">
					<?php endif; ?>
					<?php if ( $thumbnail_tb ) : ?>
						<source srcset="<?php echo esc_url( $thumbnail_tb[0] ); ?>" media="( min-width: 768px )">
					<?php endif; ?>
					<?php if ( $thumbnail_sp ) : ?>
						<img class="c-visual__img p-single__mv-img" src="<?php echo esc_url( $thumbnail_sp[0] ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>">
					<?php endif; ?>
				</picture>
			<?php else : ?>
				<!-- アイキャッチ未設定時のデフォルト画像 -->
				<picture>
					<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/shop/shop--pc.jpg' ) ); ?>" media="( min-width: 1024px )">
					<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/shop/shop--tb.jpg' ) ); ?>" media="( min-width: 768px )">
					<img class="c-visual__img p-single__mv-img" src="<?php echo esc_url( get_theme_file_uri( '/images/shop/shop--sp.jpg' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
				</picture>
			<?php endif; ?>

			<!-- 固定ページのタイトル -->
			<h1 class="c-visual__title p-single__mv-title c-font--xl c-color--text-inverse"><?php the_title(); ?></h1>
		</section>
		
		<!-- 固定ページの本文 -->
		<article <?php post_class( 'p-single__body' ); ?>>
			<?php
			// 固定ページの内容を取得して表示.
			the_content();
			?>
		</article>
		</main>

<?php
get_sidebar();
get_footer();