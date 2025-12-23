<?php
/**
 * Page template file
 *
 * @package hamburger
 */

get_header(); ?>

		<main class="l-main p-single">
		<section class="c-visual c-visual--center-y p-single__mv">
			<picture>
			<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/shop/shop--pc.jpg' ) ); ?>" media="( min-width: 1024px )">
			<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/shop/shop--tb.jpg' ) ); ?>" media="( min-width: 768px )">
			<img class="c-visual__img p-single__mv-img" src="<?php echo esc_url( get_theme_file_uri( '/images/shop/shop--sp.jpg' ) ); ?>" alt="ハンバーガーショップの外観">
			</picture>
			<h1 class="c-visual__title p-single__mv-title c-font--xl c-color--text-inverse">ショップについて</h1>
		</section>

		<article class="p-single__body">
			<h2 class="c-font--l">見出しh2</h2>
			<p class="p-single__text">
			Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。
			</p>
			<h3 class="c-font--m">見出しh3</h3>
			<h4 class="c-font--s">見出しh4</h4>
			<h5 class="c-font--s">見出しh5</h5>
			<h6 class="c-font--s">見出しh6</h6>


			<figure class="c-blockquote c-color--bg-muted">
			<blockquote cite="#">
				<p>
				</p>
				Blockquote
				引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ
			</blockquote>
			<figcaption>
				出典元： <a href="#" class="c-blockquote__link c-color--text-link">○○○○○○○○○○○○</a>
			</figcaption>
			</figure>
			<div class="c-media__wide">
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-wide.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-wide.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-media__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-wide.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			</div>
			<article class="c-media__article-right">
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-article.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-article.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-media__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-article.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			<p>
				テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
				テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
				テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
				テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
			</p>
			</article>
			<article class="c-media__article-left">
			<p>
				テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
				テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
				テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
				テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
			</p>
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-article.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-article.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-media__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-article.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			</article>
			<div class="c-media__center">
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-center.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-center.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-media__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-center.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			</div>

			<div class="c-grid">
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-grid.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-grid.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-grid__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-grid.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-grid.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-grid.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-grid__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-grid.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-grid.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-grid.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-grid__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-grid.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-grid.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-grid.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-grid__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-grid.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-grid.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-grid.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-grid__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-grid.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-grid.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-grid.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-grid__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-grid.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-grid.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-grid.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-grid__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-grid.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-grid.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-grid.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-grid__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-grid.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--pc-grid.jpg' ) ); ?>" media="( min-width: 1024px )">
				<source srcset="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--tb-grid.jpg' ) ); ?>" media="( min-width: 768px )">
				<img class="c-grid__img c-border--primary" src="<?php echo esc_url( get_theme_file_uri( '/images/single/burgset--sp-grid.jpg' ) ); ?>" alt="チーズバーガーとポテトセット">
			</picture>
			</div>

			<div class="c-list">
			<div class="c-list__ordered">
				<ol class="c-list__item">
				<li>リストリストリスト</li>
				<li>リストリストリスト
					<ol class="c-list__nested">
					<li>リスト2リスト2リスト2</li>
					<li>リスト2リスト2リスト2</li>
					</ol>
				</li>
				</ol>
				<ol class="c-list__item">
				<li>リストリストリスト</li>
				<li>リストリストリスト</li>
				</ol>
			</div>
			<div class="c-list__unordered">
				<ul class="c-list__item">
				<li>リストリストリスト</li>
				<li>リストリストリスト
					<ul class="c-list__nested">
					<li>リスト2リスト2リスト2</li>
					<li>リスト2リスト2リスト2</li>
					</ul>
				</li>
				</ul>
				<ul class="c-list__item">
				<li>リストリストリスト</li>
				<li>リストリストリスト</li>
				</ul>
			</div>
			</div>

			<pre class="c-code c-color--bg-muted"><code>&lt;html&gt;
	&lt;head&gt;
	&lt;/head&gt;
	&lt;body&gt;
	&lt;/body&gt;
&lt;/html&gt;</code></pre>

			<table class="c-table c-color-bg--surface">
			<tbody>
				<tr>
				<td class="c-border--primary">テーブル</td>
				<td class="c-border--primary">テーブル</td>
				</tr>
				<tr>
				<td class="c-border--primary">テーブル</td>
				<td class="c-border--primary">テーブル</td>
				</tr>
				<tr>
				<td class="c-border--primary">テーブル</td>
				<td class="c-border--primary">テーブル</td>
				</tr>
				<tr>
				<td class="c-border--primary">テーブル</td>
				<td class="c-border--primary">テーブル</td>
				</tr>
				<tr>
				<td class="c-border--primary">テーブル</td>
				<td class="c-border--primary">テーブル</td>
				</tr>
			</tbody>
			</table>

			<button type="button" class="c-button--grad c-color--text-primary p-single__button">ボタン</button>

			<p class="c-font--bold">boldboldboldboldboldboldbold</p>
		</article>
		</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
