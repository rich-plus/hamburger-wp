</div>

<aside class="c-layout__sidebar">
  <nav class="p-sidemenu c-color--text-secondary c-color--bg-secondary" aria-label="サイドメニュー">
    <!-- Menu (PC) -->
    <h2 class="p-sidemenu__title c-font--accent">Menu</h2>

    <!-- Menu List (共通) -->
    <?php
    wp_nav_menu(
      array(
        'theme_location' => 'category_nav',
        'container'      => false,
        'menu_class'     => 'p-sidemenu__nav-list',
        'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
        'fallback_cb'    => false,
        'walker'         => new Hamburger_Walker_Nav_Menu(),
      )
    );
    ?>
  </nav>
  <div class="p-sidemenu__overlay c-color--bg-overlay-black-50"></div>
</aside>