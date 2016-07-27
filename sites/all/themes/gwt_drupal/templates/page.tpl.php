<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>
<div id="a11y-links"> 
<?php print $accesibility; ?> 
</div> 
<div id="a11y-shortcuts"> 
<?php print $accesibility_shortcut; ?> 
</div> 
<div class="reveal large" id="a11y-modal" data-reveal>
  <textarea class="statement-textarea" readonly rows="20">
Shortcut Keys Combination Activation

Combination keys used for each browser.

Chrome for Linux press (Alt+Shift+shortcut_key)
Chrome for Windows press (Alt+shortcut_key)
Chrome for MAC OS press (ctrl+opt+shortcut_key)
Safari for MAC OS press (ctrl+opt+shortcut_key)
For Firefox press (Alt+Shift+shortcut_key)
For Internet Explorer press (Alt+Shift+shortcut_key) then press (enter)
 

Accessibility Statement (Combination + 0): Statement page that will show the available accessibility keys.
Home Page (Combination + H): Accessibility key for redirecting to homepage.
Main Content (Combination + R): Shortcut for viewing the content section of the current page.
FAQ (Combination + Q): Shortcut for FAQ page.
Contact (Combination + C): Shortcut for contact page or form inquiries.
Feedback (Combination + K): Shortcut for feedback page.
Site Map (Combination + M): Shortcut for site map (footer agency) section of the page.
Search (Combination + S): Shortcut for search page.
Press esc, or click the close the button to close this dialog box.
  </textarea>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="off-canvas-wrapper">
  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
    <div class="off-canvas position-right hide-for-large" id="offCanvas" data-off-canvas data-position="right">
      <div id="a11y-container-mobile" class="float-right">
        <button class="button float-right a11y-dropdown-button" type="button" data-toggle="a11y-dropdown-mobile">
          <span class="show-for-sr">Accessibility Button</span>
          <i class="fa fa-universal-access"></i>
        </button>
        <div class="dropdown-pane bottom" id="a11y-dropdown-mobile" data-dropdown data-hover-pane="true">
          <ul class="menu vertical" id="a11y-buttons-mobile">
            <li><a class="button" type="button" data-toggle="a11y-modal" accesskey="0">
              <span class="show-for-sr">Accessibility Statement</span>
              <i class="fa fa-file-text-o fa-2x"></i>
            </a></li>
            <li><a class="button a11y-skip-to-content" href="#main">
              <span class="show-for-sr">Skip to content</span>
              <i class="fa fa-chevron-down fa-2x"></i>
            </a></li>
            <li><a class="button a11y-toggle-contrast" href="#">
              <span class="show-for-sr">High Contrast</span>
              <i class="fa fa-low-vision fa-2x"></i>
            </a></li>
            <li><a class="a11y-skip-to-content" href="#main">
              <span class="show-for-sr">Skip to content</span>
              <i class="fa fa-angle-down fa-2x"></i>
            </a></li>
            <li><a class="a11y-skip-to-footer" href="#footer">
              <span class="show-for-sr">Skip to footer</span>
              <i class="fa fa-angle-double-down fa-2x"></i>
            </a></li>
            <!-- <li><a class="button a11y-toggle-grayscale">
              <span class="show-for-sr">Grayscale</span>
              <i class="fa fa-adjust fa-2x"></i>
            </a></li> -->
          </ul>
        </div>
      </div>
      <?php if ($page['top_bar_search']): ?>
        <?php $topbar_search = render($page['top_bar_search']); ?>
        <?php print $topbar_search; ?>
      <?php endif; ?>
        <?php if ($main_menu_mobile): ?>
          <h6 class="menu-title">Main Menu</h6>
          <?php
          print theme('links__system_main_menu_mobile', array(
            'links' => $main_menu_mobile,
            'attributes' => array(
              'id' => 'main-nav-mobile',
              'class' => array('menu'),
            ),
            'parent_attr' => array(
              'class' => array('vertical menu'),
              'data-drilldown' => '',
              'data-parent-link' => 'true'
            ),
          )); ?>
        <?php endif; ?>
        <?php if ($menu_auxiliary_mobile): ?>
          <h6 class="menu-title">Auxiliary Menu</h6>
            <?php
            print theme('links__menu_auxiliary_mobile', array(
              'links' => $menu_auxiliary_mobile,
              'attributes' => array(
                'id' => 'auxiliary-nav-mobile',
                'class' => array('menu'),
              ),
              'parent_attr' => array(
                'class' => array('vertical menu'),
                'data-drilldown' => '',
                'data-parent-link' => 'true'
              ),
            )); ?>
        <?php endif; ?>
    </div>

    <div class="off-canvas-content" data-off-canvas-content>
      <div class="title-bar hide-for-large" id="mobile-top-bar">
        <div class="title-bar-left">
          <a href="http://www.gov.ph" class="title-bar-title" target="_blank">GOVPH</a>
        </div>
        <div class="title-bar-right">
          <span class="title-bar-title">Menu</span>
          <button class="menu-icon" type="button" data-open="offCanvas"><span class="button-inner"></span></button>
        </div>
      </div>

<nav id="top-bar" class="show-for-large top-bar nomargin" role="navigation"  tabindex="-1" data-topbar>
  <div data-sticky-container>
    <div class="sticky" data-sticky data-margin-top="0">
      <div class="row">
      <div class="columns large-12"></div>
      <?php
      /**
       * mandatory region
       */
      ?>
      <div id="a11y-container" class="top-bar-right">
        <button class="button float-right a11y-dropdown-button" type="button" data-toggle="a11y-dropdown">
          <span class="show-for-sr">Accessibility Button</span>
          <i class="fa fa-universal-access fa-2x"></i>
        </button>
        <div class="dropdown-pane" id="a11y-dropdown" data-dropdown>
          <ul class="menu vertical" id="a11y-buttons">
            <li><a data-toggle="a11y-modal">
              <span class="show-for-sr">Accessibility Statement</span>
              <i class="fa fa-file-text-o fa-2x"></i>
            </a></li>
            <li><a class="button a11y-toggle-contrast" href="#">
              <span class="show-for-sr">High Contrast</span>
              <i class="fa fa-low-vision fa-2x"></i>
            </a></li>
            <!-- <li><a class="a11y-toggle-grayscale">
              <span class="show-for-sr">Grayscale</span>
              <i class="fa fa-adjust fa-2x"></i>
            </a></li> -->
            <li><a class="a11y-skip-to-content" href="#main">
              <span class="show-for-sr">Skip to content</span>
              <i class="fa fa-angle-down fa-2x"></i>
            </a></li>
            <li><a class="a11y-skip-to-footer" href="#footer">
              <span class="show-for-sr">Skip to footer</span>
              <i class="fa fa-angle-double-down fa-2x"></i>
            </a></li>
          </ul>
        </div>
      </div>
      <div class="top-bar-right">
        <?php if ($page['top_bar_search']): ?>
          <?php print $topbar_search; ?>
        <?php endif; ?>
      </div>
      <?php if ($main_menu): ?>
        <ul class="menu gov-ph" class="top-bar-left"><li><a class="title-bar-title" href="http://www.gov.ph" target="_blank">GOVPH</a></li></ul>
        <?php
        print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-nav',
            'class' => array('dropdown menu top-bar-left'),
            'data-dropdown-menu' => '',
          ),
        )); ?>
      <?php endif; ?>
      <?php if ($page['top_bar_right'] || $menu_top_right): ?>
        <?php if ($menu_top_right): ?>
          <?php
          print theme('links__menu_top_right', array(
            'links' => $menu_top_right,
            'attributes' => array(
              'id' => array('menu-top-right'),
              'class' => array('dropdown menu top-bar-right'),
              'data-dropdown-menu' => '',
            ),
          )); ?>
        <?php endif; ?>
        <?php if($page['top_bar_right']): ?>
          <?php print render($page['top_bar_right']); ?>
        <?php endif; ?>
      <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<div id="page">
  <?php if ($logo || $site_name || $site_slogan): ?>
  <header id="header" <?php print $gwt_drupal_masthead_styles; ?>>
    <section class="header-section row">
      <a class="columns<?php print $name_slogan_class; ?>" href="<?php print $front_page; ?>" title="<?php print $name_alt_text; ?>" alt="<?php print $name_alt_text; ?>" rel="<?php print $name_alt_text; ?>" id="logo-link">
        <?php if ($logo): ?>
          <div id="logo-container"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></div>
        <?php endif; ?>
        <?php if($site_name): ?>
          <div id="site-name-container">
          <h4 id="republic-text">Republic of the Philippines</h4>
          <h1 id="site-name"><span><?php print $site_name; ?></span></h1>
          <?php if ($site_slogan): ?>
            <h2 id="site-slogan"><?php print $site_slogan; ?></h2>
          <?php endif; ?>
          </div>
        <?php endif; ?>
      </a>
        <?php print render($page['header']); ?>
      <?php //if(!$site_name): ?>
        <?php if($ear_content = render($page['ear_content'])): ?>
          <div class="columns<?php print $ear_content_class ?>">
            <div class="ear-content content-container">
            <?php print $ear_content; ?>
            </div>
          </div>
        <?php endif ?>
        <?php if($ear_content_2 = render($page['ear_content_2'])): ?>
          <div class="columns<?php print $ear_content_2_class ?>">
            <div class="ear-content content-container">
            <?php print $ear_content_2; ?>
            </div>
          </div>
        <?php endif ?>
      <?php //endif ?>
    </section>
  </header>
  <?php endif ?>

  <?php
  // show banner area only if banner exists or feature banner_2 and 3 exists but banner is not in full width
  if(($page['banner']) ||
    (($page['banner_2'] || $page['banner_3']) && !$banner_is_full_width)
    ):
  ?>
  <div id="banner" <?php print $gwt_drupal_banner_styles; ?>>
    <div<?php print !$banner_is_full_width ? ' class="row"' : '' ?>>
      <?php if($banner = render($page['banner'])): ?>
      <div class="<?php print $banner_class ?>">
        <?php print $banner; ?>
      </div>
      <?php endif ?>
      <?php if(!$banner_is_full_width): ?>
        <?php if($banner_2 = render($page['banner_2'])): ?>
          <div class="<?php print $banner_2_class ?> content-container">
            <div class="banner-content">
            <?php print $banner_2; ?>
            </div>
          </div>
        <?php endif ?>
        <?php if($banner_3 = render($page['banner_3'])): ?>
        <div class="<?php print $banner_3_class ?> content-container">
          <div class="banner-content">
          <?php print $banner_3; ?>
          </div>
        </div>
        <?php endif ?>
      <?php endif ?>
    </div>
  </div>
  <?php endif; ?>

<div id="auxiliary-menu" class="show-for-large">
<div class="row">
  <?php if ($menu_auxiliary_menu || $menu_auxiliary_right_menu): ?>
    <?php if ($menu_auxiliary_menu): ?>
      <?php
      print theme('links__menu_auxiliary_menu', array(
        'links' => $menu_auxiliary_menu,
        'attributes' => array(
          'id' => array('menu-auxiliary-menu'),
          'class' => array('dropdown menu top-bar-left'),
          'data-dropdown-menu' => '',
        ),
      )); ?>
    <?php endif; ?>
    <?php if ($menu_auxiliary_right_menu): ?>
      <?php
      print theme('links__menu_auxiliary_right_menu', array(
        'links' => $menu_auxiliary_right_menu,
        'attributes' => array(
          'id' => array('menu-auxiliary-right-menu'),
          'class' => array('dropdown menu top-bar-right'),
          'data-dropdown-menu' => '',
        ),
      )); ?>
    <?php endif; ?>
    <?php if (isset($page['auxiliary_left'])): ?>
    <?php print render($page['auxiliary_left']); ?>
    <?php endif; ?>
    <?php if (isset($page['auxiliary_right'])): ?>
    <?php print render($page['auxiliary_right']); ?>
    <?php endif; ?>
  <?php endif; ?>
</div>
</div>
  <?php
  if($breadcrumb || $page['breadcrumbs']):
    ?>
  <div id="breadcrumbs" class="content-container">
    <div class="row">
      <div class="large-12 columns">
      <?php if (isset($breadcrumb)): ?>
      <?php print $breadcrumb; ?>
      <?php endif; ?>
      <?php if (isset($page['breadcrumbs'])): ?>
      <?php print render($page['breadcrumbs']); ?>
      <?php endif; ?>
      </div>
    </div>
  </div>
  <?php
    endif;
    ?>

  <div id="panel-top" class="content-container">
    <div class="row">
      <?php if($panel_top = render($page['panel_top'])): ?>
        <div class="columns<?php print $panel_top_class ?>">
          <div class="panel-top">
          <?php print $panel_top; ?>
          </div>
        </div>
      <?php endif ?>
      <?php if($panel_top_2 = render($page['panel_top_2'])): ?>
        <div class="columns<?php print $panel_top_2_class ?>">
          <div class="panel-top">
          <?php print $panel_top_2; ?>
          </div>
        </div>
      <?php endif ?>
      <?php if($panel_top_3 = render($page['panel_top_3'])): ?>
        <div class="columns<?php print $panel_top_3_class ?>">
          <div class="panel-top">
          <?php print $panel_top_3; ?>
          </div>
        </div>
      <?php endif ?>
      <?php if($panel_top_4 = render($page['panel_top_4'])): ?>
        <div class="columns<?php print $panel_top_4_class ?>">
          <div class="panel-top">
          <?php print $panel_top_4; ?>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>
  
  <div id="main" role="document" class="content-container">
    <div class="row">
      <?php
        // Render the sidebars to see if there's anything in them.
        $sidebar_first  = render($page['sidebar_first']);
        $sidebar_second = render($page['sidebar_second']);
      ?>

      <div id="content" class="columns column<?php print $content_class ?>" role="main">
        <?php print $messages; ?>
        <div id="content-inner" class="content-style">
        <?php print render($page['highlighted']); ?>
        <a id="main-content"></a>
        <?php print render($tabs); ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
          <h2 class="page__title title" id="page-title"><?php print $title; ?></h2>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
        </div>
      </div>

      <?php if ($sidebar_first): ?>
      <aside id="sidebar-first" class="columns sidebars<?php print $sidebar_first_class ?>" role="complementary">
        <?php print $sidebar_first; ?>
      </aside>
      <?php endif; ?>
      <?php if ($sidebar_second): ?>
      <aside id="sidebar-second" class="columns sidebars<?php print $sidebar_second_class ?>" role="complementary">
        <?php print $sidebar_second; ?>
      </aside>
      <?php endif; ?>
    </div>
  </div>

  <div id="panel-bottom" class="content-container">
    <div class="row">
      <?php if($panel_bottom = render($page['panel_bottom'])): ?>
        <div class="columns<?php print $panel_bottom_class ?>">
          <div class="panel-bottom">
          <?php print $panel_bottom; ?>
          </div>
        </div>
      <?php endif ?>
      <?php if($panel_bottom_2 = render($page['panel_bottom_2'])): ?>
        <div class="columns<?php print $panel_bottom_2_class ?>">
          <div class="panel-bottom">
          <?php print $panel_bottom_2; ?>
          </div>
        </div>
      <?php endif ?>
      <?php if($panel_bottom_3 = render($page['panel_bottom_3'])): ?>
        <div class="columns<?php print $panel_bottom_3_class ?>">
          <div class="panel-bottom">
          <?php print $panel_bottom_3; ?>
          </div>
        </div>
      <?php endif ?>
      <?php if($panel_bottom_4 = render($page['panel_bottom_4'])): ?>
        <div class="columns<?php print $panel_bottom_4_class ?>">
          <div class="panel-bottom">
          <?php print $panel_bottom_4; ?>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>

  <?php
  if(!empty($page['footer']) ||
    !empty($page['footer_2']) ||
    !empty($page['footer_3']) ||
    !empty($page['footer_4'])):
    ?>
  <footer id="footer" class="content-container">
    <div class="row">
      <?php if($footer_1 = render($page['footer'])): ?>
      <div class="columns<?php print $footer_class ?>">
        <?php print $footer_1; ?>
      </div>
      <?php endif ?>
      <?php if($footer_2 = render($page['footer_2'])): ?>
        <div class="columns<?php print $footer_2_class ?>">
          <?php print $footer_2; ?>
        </div>
      <?php endif ?>
      <?php if($footer_3 = render($page['footer_3'])): ?>
      <div class="columns<?php print $footer_3_class ?>">
        <?php print $footer_3; ?>
      </div>
      <?php endif ?>
      <?php if($footer_4 = render($page['footer_4'])): ?>
      <div class="columns<?php print $footer_4_class ?>">
        <?php print $footer_4; ?>
      </div>
      <?php endif ?>
    </div>
  </footer>
  <?php endif ?>
  <div id="gwt-standard-footer"></div>
  <script type="text/javascript">
  (function(d, s, id) {
    var js, gjs = d.getElementById('gwt-standard-footer');

      js = d.createElement(s); js.id = id;
      js.src = "//gwhs.i.gov.ph/gwt-footer/footer.js";
      gjs.parentNode.insertBefore(js, gjs);
  }(document, 'script', 'gwt-footer-jsdk'));
  </script>
  <div><a href="#page" id="back-to-top">
      <span class="show-for-sr">Back to Top</span>
      <i class="fa fa-arrow-circle-up fa-2x"></i>
  </a></div>
</div>

    </div><!-- /off-canvas  -->
  </div>
</div>

<?php print render($page['bottom']); ?>