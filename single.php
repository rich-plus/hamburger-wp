<?php
/**
 * Single template file
 *
 * @package hamburger
 */

get_header(); ?>

		<main class="l-main p-single">
		<section class="c-visual c-visual--center-y p-single__mv">
			<?php if ( has_post_thumbnail() ) : ?>
				<picture>
					<?php
					$thumbnail_id = get_post_thumbnail_id();
					$thumbnail_pc = wp_get_attachment_image_src( $thumbnail_id, 'full' );
					$thumbnail_tb = wp_get_attachment_image_src( $thumbnail_id, 'large' );
					$thumbnail_sp = wp_get_attachment_image_src( $thumbnail_id, 'medium_large' );
					$image_alt    = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
					$alt_text     = $image_alt ? $image_alt : get_the_title() . 'の画像';
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
				<picture>
					<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/single--pc.jpg' ) ); ?>" media="( min-width: 1024px )">
					<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/single--tb.jpg' ) ); ?>" media="( min-width: 768px )">
					<img class="c-visual__img p-single__mv-img" src="<?php echo esc_url( get_theme_file_uri( '/images/single/single--sp.jpg' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
				</picture>
			<?php endif; ?>
			<h1 class="c-visual__title p-single__mv-title c-font--xl c-color--text-inverse"><?php the_title(); ?></h1>
		</section>

		<article class="p-single__body" <?php post_class(); ?>>
			<?php
			// 投稿内容を取得して表示.
			the_content();

			// ページ区切りリンクを表示.
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hamburger' ),
					'after'  => '</div>',
				)
			);
			?>
		</article>
		</main>

<?php
get_sidebar();
get_footer();