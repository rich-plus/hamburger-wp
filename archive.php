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
			<img class="c-visual__img p-hero__img" src="<?php echo esc_url( get_theme_file_uri( '/images/archive/archive--sp.jpg' ) ); ?>" alt=""> <!-- alt空欄 -->
			</picture>
			<div class="p-hero__overlay c-color--bg-overlay-black-50"></div>
			<div class="c-visual__content p-hero__content c-layout__inner c-color--text-inverse">
			<h1 class="p-hero__title c-font--xl">Menu:</h1>
			<h2 class="p-hero__subtitle c-font--s"><?php echo esc_html( get_the_archive_title() ); ?></h2>
			</div>
		</section>

		<section class="p-archive__body">
			<div class="p-archive__header">
			<?php
			// カスタムフィールドからタイトルとテキストを取得
			$term = get_queried_object();
			if ( $term && isset( $term->term_id ) ) {
				$archive_title = get_term_meta( $term->term_id, 'archive_title', true );
				$archive_text  = get_term_meta( $term->term_id, 'archive_text', true );
			} else {
				$archive_title = '';
				$archive_text  = '';
			}

			// カスタムフィールドが空の場合は、デフォルト値または説明文を使用
			if ( empty( $archive_title ) ) {
				$archive_description = get_the_archive_description();
				if ( $archive_description ) {
					// 説明文の最初の部分をタイトルとして使用
					$archive_title = wp_trim_words( $archive_description, 10, '' );
					$title_lines   = explode( "\n", $archive_title );
					$archive_title = trim( $title_lines[0] );
					if ( strpos( $archive_title, '。' ) !== false ) {
						$archive_title = strstr( $archive_title, '。', true ) . '。';
					} elseif ( strpos( $archive_title, '.' ) !== false ) {
						$archive_title = strstr( $archive_title, '.', true ) . '.';
					}
				} else {
					$archive_title = '小見出しが入ります';
				}
			}

			if ( empty( $archive_text ) ) {
				$archive_description = get_the_archive_description();
				if ( $archive_description ) {
					$archive_text = $archive_description;
				} else {
					$archive_text = 'テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。';
				}
			}
			?>
			<h2 class="p-archive__title"><?php echo esc_html( $archive_title ); ?></h2>
			<p class="p-archive__text">
				<?php echo esc_html( $archive_text ); ?>
			</p>
			</div>
			<div class="p-archive__list">
			<!-- 投稿があるか確認 -->
			<?php if ( have_posts() ) : ?>
				<!-- 投稿を1つずつ処理 -->
				<?php while ( have_posts() ) : ?>
					<!-- 現在の投稿をセット -->
					<?php the_post(); ?>
			<!-- 各投稿カードの表示 -->
			<article class="c-card">
				<!-- 画像の表示 -->
				<picture class="c-card__picture">
					<?php if ( has_post_thumbnail() ) : ?>
						<!-- 投稿にアイキャッチ画像がある場合 -->
						<!-- PC/Tablet/SP用の画像サイズを取得して表示(functions.phpにカスタムサイズを設定) -->
						<?php
						$thumbnail_id = get_post_thumbnail_id();
						$thumbnail_pc = wp_get_attachment_image_src( $thumbnail_id, 'archive-card-pc' );
						$thumbnail_tb = wp_get_attachment_image_src( $thumbnail_id, 'archive-card-tb' );
						$thumbnail_sp = wp_get_attachment_image_src( $thumbnail_id, 'archive-card-sp' );
						?>
						<?php if ( $thumbnail_pc ) : ?>
							<source srcset="<?php echo esc_url( $thumbnail_pc[0] ); ?>" media="( min-width: 1024px )">
						<?php endif; ?>
						<?php if ( $thumbnail_tb ) : ?>
							<source srcset="<?php echo esc_url( $thumbnail_tb[0] ); ?>" media="( min-width: 768px )">
						<?php endif; ?>
						<?php if ( $thumbnail_sp ) : ?>
							<img class="c-card__img" src="<?php echo esc_url( $thumbnail_sp[0] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
						<?php endif; ?>
					<?php else : ?>
						<!-- アイキャッチ画像がない場合 -->
						<!-- デフォルト画像を表示 -->
						<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/archive/card--pc.jpg' ) ); ?>" media="( min-width: 1024px )">
						<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/archive/card--tb.jpg' ) ); ?>" media="( min-width: 768px )">
						<img class="c-card__img" src="<?php echo esc_url( get_theme_file_uri( '/images/archive/card--sp.jpg' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
					<?php endif; ?>
				</picture>
				<div class="c-card__content c-color--bg-accent">
				<div class="c-card__body c-color--text-inverse">
					<!-- 投稿タイトル -->
					<h3 class="c-card__title"><?php the_title(); ?></h3>
					<!-- 抜粋（抜粋がない場合は、非表示） -->
					<?php if ( has_excerpt() ) : ?>
							<h4 class="c-card__subtitle"><?php the_excerpt(); ?></h4>
					<?php endif; ?>
					<!-- 投稿テキスト（最大80文字を表示） -->
						<p class="c-card__text">
						<?php echo esc_html( wp_trim_words( get_the_content(), num_words: 80, more: '...' ) ); ?>
						</p>
				</div>
				<div class="c-card__footer">
					<a href="<?php the_permalink(); ?>" class="c-card__button c-button c-color--text-secondary c-color--bg-surface js-fade-link">詳しく見る</a>
				</div>
				</div>
			</article>
			<?php endwhile; ?>
			<?php else : ?>
				<!-- 投稿がない場合のメッセージ -->
				<p class="p-archive__no-posts">投稿が見つかりませんでした。</p>
			<?php endif; ?>
			</div>
		</section>

		<?php
		// ページネーション（プラグイン対応）
		if ( function_exists( 'wp_pagenavi' ) ) {
			// WP-PageNaviプラグインが有効な場合
			wp_pagenavi();
		} elseif ( function_exists( 'the_posts_pagination' ) ) {
			// WordPress標準のページネーション
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
