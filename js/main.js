
// ====================================================
//  ページ遷移時のフェードアウト
// ====================================================
//  「.js-fade-link」が付いたリンクをクリック 
// → 300msでフェードアウトして遷移
// ─────────────────────────────────────────────────────
jQuery(function ($) {
  $(".js-fade-link").on("click", function (e) {
    e.preventDefault();
    var href = $(this).attr("href"); //デフォルトのリンク遷移を停止

    $("body").fadeOut(300, function () {
      window.location.href = href;
    });
  });
});

// ====================================================
//  ハンバーガーメニュー（スマホ・タブレット用）
// ====================================================
// ・ハンバーガーボタンでサイドメニュー開閉  
// ・背景のオーバーレイクリックで閉じる  
// ・ウィンドウ幅が1024px以上（PC）になったら自動で閉じる
// ─────────────────────────────────────────────────────

jQuery(function ($) {
  const $hamburger = $('.js-hamburger'); //メニューボタン
  const $sidemenu = $('.p-sidemenu');  //サイドメニュー本体
  const $overlay = $('.p-sidemenu__overlay'); //サイドメニュー背景（黒透過背景）
  const $body = $('body'); //スクロール制御（固定⇔解除）


  // メニュー開閉  
  $hamburger.on("click", function () {
    $(this).toggleClass("is-open");
    $sidemenu.toggleClass("is-open");
    $overlay.toggleClass("is-open");
    $body.toggleClass("is-open");
  });

  // オーバーレイクリックで閉じる 
  $overlay.on("click", function () {
    $hamburger.removeClass("is-open");
    $sidemenu.removeClass("is-open");
    $(this).removeClass("is-open");
    $body.removeClass("is-open");
  });

  // ウィンドウ幅が1024px以上（PC）で閉じる
  $(window).on('resize', function () {
    if ($(window).width() >= 1024) {
      $hamburger.removeClass('is-open');
      $sidemenu.removeClass('is-open');
      $overlay.removeClass('is-open');
      $body.removeClass('is-open');
    }
  });
});

// =======================================================================
//  検索フォームに検索キーワードを自動入力
// =======================================================================
// 検索結果ページのURLパラメータ「?s=検索ワード」を入力欄に反映
// 例：archive-search.html?s=チーズバーガー → 入力欄に「チーズバーガー」と入る
// ───────────────────────────────────────────────────────────────────────

jQuery(function ($) {
  const params = new URLSearchParams(window.location.search);
  const word = params.get('s');

  if (word !== null) {
    $('input[name="s"]').val(word);
  }
});

