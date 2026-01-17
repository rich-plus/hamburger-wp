<?php
/**
 * Sort buttons for archive/search list.
 *
 * @package hamburger
 */

if ( $wp_query->found_posts > 1 ) : ?>
<!-- 投稿がある場合のみ並び替えボタンを表示. -->
<div class="p-archive__sort">
	<span class="p-archive__sort-label"><?php esc_html_e( '並び替え:', 'hamburger' ); ?></span>
	<div class="p-archive__sort-buttons">
		<?php
		// URLパラメータから現在の並び替え条件を取得・サニタイズ.
		// orderby: 並び替えの基準（date, menu_order, title など）.
		// order: 並び替えの順序（ASC: 昇順, DESC: 降順）.
		$current_orderby = isset( $_GET['orderby'] ) ? sanitize_text_field( wp_unslash( $_GET['orderby'] ) ) : '';
		$current_order   = isset( $_GET['order'] ) ? strtoupper( sanitize_text_field( wp_unslash( $_GET['order'] ) ) ) : '';

		// 現在のURLを取得し、ページネーション部分（/page/XX/）を除去.
		// 並び替えリンクを作成するためのベースURLを準備.
		$request_uri = filter_input( INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL );
		$request_uri = $request_uri ? wp_unslash( $request_uri ) : '';
		$request_uri = esc_url_raw( $request_uri );
		$current_url = home_url( $request_uri );
		$base_url    = preg_replace( '/\/page\/\d+\/?/', '/', $current_url );
		$base_url    = remove_query_arg( array( 'orderby', 'order', 'paged' ), $base_url );
		?>
		<!-- 新着順（日付降順）の並び替えボタン -->
		<a href="
		<?php
		echo esc_url(
			add_query_arg(
				array(
					'orderby' => 'date',
					'order'   => 'DESC',
				),
				$base_url
			)
		);
		?>
		"
		class="p-archive__sort-button <?php echo ( empty( $current_orderby ) || ( 'date' === $current_orderby && 'DESC' === $current_order ) ) ? 'is-active' : ''; ?>">
			<?php esc_html_e( '新着順', 'hamburger' ); ?>
		</a>
		<!-- メニュー順（メニュー順序昇順）の並び替えボタン -->
		<a href="
		<?php
		echo esc_url(
			add_query_arg(
				array(
					'orderby' => 'menu_order',
					'order'   => 'ASC',
					'paged'   => false,
				),
				$base_url
			)
		);
		?>
		"
		class="p-archive__sort-button <?php echo ( 'menu_order' === $current_orderby ) ? 'is-active' : ''; ?>">
			<?php esc_html_e( 'メニュー順', 'hamburger' ); ?>
		</a>
		<!-- タイトル順（タイトル昇順）の並び替えボタン -->
		<a href="
		<?php
		echo esc_url(
			add_query_arg(
				array(
					'orderby' => 'title',
					'order'   => 'ASC',
				),
				$base_url
			)
		);
		?>
		"
		class="p-archive__sort-button <?php echo ( 'title' === $current_orderby ) ? 'is-active' : ''; ?>">
			<?php esc_html_e( 'タイトル順', 'hamburger' ); ?>
		</a>
		<!-- 古い順（日付昇順）の並び替えボタン -->
		<a href="
		<?php
		echo esc_url(
			add_query_arg(
				array(
					'orderby' => 'date',
					'order'   => 'ASC',
				),
				$base_url
			)
		);
		?>
		"
		class="p-archive__sort-button <?php echo ( 'date' === $current_orderby && 'ASC' === $current_order ) ? 'is-active' : ''; ?>">
			<?php esc_html_e( '古い順', 'hamburger' ); ?>
		</a>
	</div>
</div>
<?php endif; ?>