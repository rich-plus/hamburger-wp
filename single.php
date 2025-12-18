<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="RaiseTechの最終課題で作成するハンバーガーショップサイトです。">
  <title>最終課題 | Hamburger</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

  <link rel="icon" href="./images/favicon.png" type="image/png">
  <link href="./css/ress.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet">
</head>

<body>
  <div class="c-layout__wrapper">
    <div class="c-layout__wrapper-inner">
      <header class="l-header c-color--bg-tertiary">
        <div class="p-header">
          <a class="p-header__logo" href="/index.html">
            <img src="./images/logo/logo.png" alt="ハンバーガーショップ">
          </a>

          <form class="p-search" action="/archive-search.html" method="get" role="search">
            <label for="search" class="u-visually-hidden">
              サイト内検索
            </label>
            <input type="search" id="search" name="s" class="p-search__input c-font--bold c-color--text-secondary c-border--primary" placeholder="チーズバーガー" aria-label="検索キーワードを入力">
            <button type="submit" class="c-button--grad c-color--text-secondary">検索</button>
          </form>
        </div>
        <!-- Menuボタン（Tablet/Mobile） -->
        <button type="button" class="p-hamburger c-font--accent c-color--text-secondary js-hamburger">
          <span class="p-hamburger__menu">Menu</span>
        </button>
      </header>

      <main class="l-main p-single">
        <section class="c-visual c-visual--center-y p-single__mv">
          <picture>
            <source srcset="./images/single/single--pc.jpg" media="( min-width: 1024px )">
            <source srcset="./images/single/single--tb.jpg" media="( min-width: 768px )">
            <img class="c-visual__img p-single__mv-img" src="./images/single/single--sp.jpg" alt="チーズバーガー">
          </picture>
          <h1 class="c-visual__title p-single__mv-title c-font--xl c-color--text-inverse">h1 チーズバーガー</h1>
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
              <source srcset="./images/single/burgset--pc-wide.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-wide.jpg" media="( min-width: 768px )">
              <img class="c-media__img c-border--primary" src="./images/single/burgset--sp-wide.jpg" alt="チーズバーガーとポテトセット">
            </picture>
          </div>
          <article class="c-media__article-right">
            <picture>
              <source srcset="./images/single/burgset--pc-article.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-article.jpg" media="( min-width: 768px )">
              <img class="c-media__img c-border--primary" src="./images/single/burgset--sp-article.jpg" alt="チーズバーガーとポテトセット">
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
              <source srcset="./images/single/burgset--pc-article.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-article.jpg" media="( min-width: 768px )">
              <img class="c-media__img c-border--primary" src="./images/single/burgset--sp-article.jpg" alt="チーズバーガーとポテトセット">
            </picture>
          </article>
          <div class="c-media__center">
            <picture>
              <source srcset="./images/single/burgset--pc-center.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-center.jpg" media="( min-width: 768px )">
              <img class="c-media__img c-border--primary" src="./images/single/burgset--sp-center.jpg" alt="チーズバーガーとポテトセット">
            </picture>
          </div>

          <div class="c-grid">
            <picture>
              <source srcset="./images/single/burgset--pc-grid.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-grid.jpg" media="( min-width: 768px )">
              <img class="c-grid__img c-border--primary" src="./images/single/burgset--sp-grid.jpg" alt="チーズバーガーとポテトセット">
            </picture>
            <picture>
              <source srcset="./images/single/burgset--pc-grid.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-grid.jpg" media="( min-width: 768px )">
              <img class="c-grid__img c-border--primary" src="./images/single/burgset--sp-grid.jpg" alt="チーズバーガーとポテトセット">
            </picture>
            <picture>
              <source srcset="./images/single/burgset--pc-grid.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-grid.jpg" media="( min-width: 768px )">
              <img class="c-grid__img c-border--primary" src="./images/single/burgset--sp-grid.jpg" alt="チーズバーガーとポテトセット">
            </picture>
            <picture>
              <source srcset="./images/single/burgset--pc-grid.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-grid.jpg" media="( min-width: 768px )">
              <img class="c-grid__img c-border--primary" src="./images/single/burgset--sp-grid.jpg" alt="チーズバーガーとポテトセット">
            </picture>
            <picture>
              <source srcset="./images/single/burgset--pc-grid.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-grid.jpg" media="( min-width: 768px )">
              <img class="c-grid__img c-border--primary" src="./images/single/burgset--sp-grid.jpg" alt="チーズバーガーとポテトセット">
            </picture>
            <picture>
              <source srcset="./images/single/burgset--pc-grid.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-grid.jpg" media="( min-width: 768px )">
              <img class="c-grid__img c-border--primary" src="./images/single/burgset--sp-grid.jpg" alt="チーズバーガーとポテトセット">
            </picture>
            <picture>
              <source srcset="./images/single/burgset--pc-grid.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-grid.jpg" media="( min-width: 768px )">
              <img class="c-grid__img c-border--primary" src="./images/single/burgset--sp-grid.jpg" alt="チーズバーガーとポテトセット">
            </picture>
            <picture>
              <source srcset="./images/single/burgset--pc-grid.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-grid.jpg" media="( min-width: 768px )">
              <img class="c-grid__img c-border--primary" src="./images/single/burgset--sp-grid.jpg" alt="チーズバーガーとポテトセット">
            </picture>
            <picture>
              <source srcset="./images/single/burgset--pc-grid.jpg" media="( min-width: 1024px )">
              <source srcset="./images/single/burgset--tb-grid.jpg" media="( min-width: 768px )">
              <img class="c-grid__img c-border--primary" src="./images/single/burgset--sp-grid.jpg" alt="チーズバーガーとポテトセット">
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
    </div>
    <aside class="l-aside c-layout__aside">
      <nav class="p-sidemenu c-color--text-secondary c-color--bg-secondary" aria-label="サイドメニュー">
        <!-- Menu (PC) -->
        <h2 class="p-sidemenu__title c-font--accent">Menu</h2>

        <!-- Menu List (共通) -->
        <ul class="p-sidemenu__nav-list">
          <li class="p-sidemenu__category">
            <a href="/archive.html" class="p-sidemenu__item js-fade-link">バーガー</a>
            <ul class="p-sidemenu__sub-list">
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">ハンバーガー</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">チーズバーガー</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">テリヤキバーガー</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">アボカドバーガー</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">フィッシュバーガーフィッシュバーガー</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">ベーコンバーガー</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">チキンバーガー</a>
              </li>
            </ul>
          </li>
          <li class="p-sidemenu__category">
            <a href="/archive.html" class="p-sidemenu__item js-fade-link">サイド</a>
            <ul class="p-sidemenu__sub-list">
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">ポテト</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">サラダ</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">ナゲット</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">コーン</a>
              </li>
            </ul>
          </li>
          <li class="p-sidemenu__category">
            <a href="/archive.html" class="p-sidemenu__item js-fade-link">ドリンク</a>
            <ul class="p-sidemenu__sub-list">
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">コーラ</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">ファンタ</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">オレンジ</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">アップル</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">紅茶（Ice/Hot）</a>
              </li>
              <li class="p-sidemenu__subitem">
                <a href="" class="p-sidemenu__link">コーヒー（Ice/Hot）</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <div class="p-sidemenu__overlay c-color--bg-overlay-black-50"></div>
    </aside>
  </div>

  <footer class="l-footer">
    <div class="p-footer c-color--text-inverse">
      <nav class="p-footer__nav" aria-label="フッターメニュー">
        <ul class="p-footer__nav-list">
          <li class="p-footer__item"><a href="/page.html" class="p-footer__link js-fade-link">ショップ情報</a></li>
          <li class="p-footer__item"><a href="" class="p-footer__link">ヒストリー</a></li>
        </ul>
      </nav>
      <small class="p-footer__copy">Copyright: RaiseTech</small>
    </div>
  </footer>
  <script src="./js/jquery-3.7.1.min.js"></script>
  <script src="./js/main.js"></script>
</body>

</html>