/**
 * Hover時のopacityがコントラストに与える影響を確認するスクリプト
 * ブラウザのコンソールで実行してください
 */

(function() {
  'use strict';

  /**
   * 相対輝度を計算する関数（WCAG 2.1準拠）
   * @param {number} r - Red (0-255)
   * @param {number} g - Green (0-255)
   * @param {number} b - Blue (0-255)
   * @returns {number} 相対輝度
   */
  function getRelativeLuminance(r, g, b) {
    const [rs, gs, bs] = [r, g, b].map(val => {
      val = val / 255;
      return val <= 0.04045 
        ? val / 12.92 
        : Math.pow((val + 0.055) / 1.055, 2.4);
    });
    return 0.2126 * rs + 0.7152 * gs + 0.0722 * bs;
  }

  /**
   * コントラスト比を計算する関数
   * @param {number} l1 - 色1の相対輝度
   * @param {number} l2 - 色2の相対輝度
   * @returns {number} コントラスト比
   */
  function getContrastRatio(l1, l2) {
    const lighter = Math.max(l1, l2);
    const darker = Math.min(l1, l2);
    return (lighter + 0.05) / (darker + 0.05);
  }

  /**
   * RGB文字列をRGB値に変換
   * @param {string} rgb - "rgb(r, g, b)" または "rgba(r, g, b, a)"
   * @returns {Object} {r, g, b, a}
   */
  function parseRGB(rgb) {
    const match = rgb.match(/rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*([\d.]+))?\)/);
    if (!match) return null;
    return {
      r: parseInt(match[1]),
      g: parseInt(match[2]),
      b: parseInt(match[3]),
      a: match[4] ? parseFloat(match[4]) : 1
    };
  }

  /**
   * 16進数カラーコードをRGB値に変換
   * @param {string} hex - "#RRGGBB" または "#RGB"
   * @returns {Object} {r, g, b}
   */
  function hexToRgb(hex) {
    const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex) ||
                   /^#?([a-f\d])([a-f\d])([a-f\d])$/i.exec(hex);
    if (!result) return null;
    return {
      r: parseInt(result[1].length === 1 ? result[1] + result[1] : result[1], 16),
      g: parseInt(result[2].length === 1 ? result[2] + result[2] : result[2], 16),
      b: parseInt(result[3].length === 1 ? result[3] + result[3] : result[3], 16)
    };
  }

  /**
   * 色の合成（opacity適用後の色を計算）
   * @param {Object} foreground - 前景色 {r, g, b, a}
   * @param {Object} background - 背景色 {r, g, b}
   * @param {number} opacity - opacity値（0-1）
   * @returns {Object} 合成後の色 {r, g, b}
   */
  function blendColors(foreground, background, opacity) {
    return {
      r: Math.round(foreground.r * opacity + background.r * (1 - opacity)),
      g: Math.round(foreground.g * opacity + background.g * (1 - opacity)),
      b: Math.round(foreground.b * opacity + background.b * (1 - opacity))
    };
  }

  /**
   * 要素の計算された色を取得
   * @param {Element} element - DOM要素
   * @returns {Object} {color, backgroundColor}
   */
  function getComputedColors(element) {
    const style = window.getComputedStyle(element);
    return {
      color: style.color,
      backgroundColor: style.backgroundColor
    };
  }

  /**
   * コントラストチェックを実行
   * @param {Element|string} selector - チェックする要素またはセレクタ
   * @param {number} opacity - hover時のopacity値（デフォルト: 0.85）
   */
  function checkContrast(selector, opacity = 0.85) {
    const element = typeof selector === 'string' 
      ? document.querySelector(selector) 
      : selector;

    if (!element) {
      console.error('要素が見つかりません:', selector);
      return null;
    }

    // 通常状態の色を取得
    const normalColors = getComputedColors(element);
    
    // hover状態をシミュレート
    element.style.opacity = opacity.toString();
    const hoverColors = getComputedColors(element);
    
    // 元に戻す
    element.style.opacity = '';

    // 色をRGBに変換
    const fgNormal = parseRGB(normalColors.color);
    const bgNormal = parseRGB(normalColors.backgroundColor);
    
    if (!fgNormal || !bgNormal) {
      console.error('色の解析に失敗しました');
      return null;
    }

    // hover時の合成色を計算
    const fgHover = blendColors(fgNormal, bgNormal, opacity);

    // 相対輝度を計算
    const bgLuminance = getRelativeLuminance(bgNormal.r, bgNormal.g, bgNormal.b);
    const fgNormalLuminance = getRelativeLuminance(fgNormal.r, fgNormal.g, fgNormal.b);
    const fgHoverLuminance = getRelativeLuminance(fgHover.r, fgHover.g, fgHover.b);

    // コントラスト比を計算
    const normalRatio = getContrastRatio(fgNormalLuminance, bgLuminance);
    const hoverRatio = getContrastRatio(fgHoverLuminance, bgLuminance);

    // WCAG基準をチェック
    const checkWCAG = (ratio) => ({
      AA_normal: ratio >= 4.5,
      AA_large: ratio >= 3,
      AAA_normal: ratio >= 7,
      AAA_large: ratio >= 4.5
    });

    const result = {
      element: element,
      normal: {
        color: normalColors.color,
        backgroundColor: normalColors.backgroundColor,
        ratio: normalRatio,
        wcag: checkWCAG(normalRatio)
      },
      hover: {
        opacity: opacity,
        blendedColor: `rgb(${fgHover.r}, ${fgHover.g}, ${fgHover.b})`,
        ratio: hoverRatio,
        wcag: checkWCAG(hoverRatio),
        ratioChange: hoverRatio - normalRatio,
        ratioChangePercent: ((hoverRatio - normalRatio) / normalRatio * 100).toFixed(1)
      }
    };

    // 結果をコンソールに出力
    console.group('コントラストチェック結果: ' + selector);
    console.log('【通常状態】');
    console.log('  テキスト色:', normalColors.color);
    console.log('  背景色:', normalColors.backgroundColor);
    console.log('  コントラスト比:', normalRatio.toFixed(2) + ':1');
    console.log('  WCAG AA (通常):', result.normal.wcag.AA_normal ? '✓ 合格' : '✗ 不合格');
    console.log('  WCAG AA (大):', result.normal.wcag.AA_large ? '✓ 合格' : '✗ 不合格');
    
    console.log('\n【Hover状態 (opacity: ' + opacity + ')】');
    console.log('  合成後の色:', result.hover.blendedColor);
    console.log('  コントラスト比:', hoverRatio.toFixed(2) + ':1');
    console.log('  変化:', result.hover.ratioChange >= 0 ? '+' : '', 
                result.hover.ratioChange.toFixed(2), 
                `(${result.hover.ratioChangePercent}%)`);
    console.log('  WCAG AA (通常):', result.hover.wcag.AA_normal ? '✓ 合格' : '✗ 不合格');
    console.log('  WCAG AA (大):', result.hover.wcag.AA_large ? '✓ 合格' : '✗ 不合格');
    
    if (hoverRatio < normalRatio) {
      console.warn('⚠️ コントラスト比が低下しています！');
    }
    
    console.groupEnd();

    return result;
  }

  /**
   * 複数の要素を一括チェック
   * @param {string} selector - セレクタ
   * @param {number} opacity - opacity値
   */
  function checkMultiple(selector, opacity = 0.85) {
    const elements = document.querySelectorAll(selector);
    if (elements.length === 0) {
      console.warn('要素が見つかりません:', selector);
      return [];
    }

    console.log(`\n${elements.length}個の要素をチェック中...\n`);
    const results = [];
    elements.forEach((el, index) => {
      console.log(`\n--- 要素 ${index + 1} ---`);
      results.push(checkContrast(el, opacity));
    });

    return results;
  }

  // グローバルに公開
  window.ContrastChecker = {
    check: checkContrast,
    checkMultiple: checkMultiple,
    // 便利なヘルパー関数も公開
    getContrastRatio: function(color1, color2) {
      const c1 = parseRGB(color1) || hexToRgb(color1);
      const c2 = parseRGB(color2) || hexToRgb(color2);
      if (!c1 || !c2) return null;
      
      const l1 = getRelativeLuminance(c1.r, c1.g, c1.b);
      const l2 = getRelativeLuminance(c2.r, c2.g, c2.b);
      return getContrastRatio(l1, l2);
    }
  };

  // 使用例をコンソールに表示
  console.log('%cコントラストチェッカーが読み込まれました！', 
              'color: #4CAF50; font-size: 14px; font-weight: bold;');
  console.log('\n使用例:');
  console.log('  ContrastChecker.check(".c-button")');
  console.log('  ContrastChecker.check(".p-footer__link", 0.85)');
  console.log('  ContrastChecker.checkMultiple(".c-button, .c-button--grad")');
  console.log('\n直接要素を指定することもできます:');
  console.log('  const btn = document.querySelector(".c-button");');
  console.log('  ContrastChecker.check(btn);');
})();


