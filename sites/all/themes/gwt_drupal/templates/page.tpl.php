<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>
<div id="accessibility-links">
<?php print $accesibility; ?>
</div>
<div id="accessibility-shortcuts">
<?php print $accesibility_shortcut; ?>
</div>
<?php if($accessibility_widget): ?>
<div id="accessibility-widget">
  <ul>
    <li><a href="#" id="accessibility-mode" title="Accessibility Menu"><span class="offscreen">Toggle Accessibility Menu</span></a></li>
    <li><a href="#" id="accessibility-statement" title="Accessibility Statement" class="toggle-statement" title="Toggle Accessibility Statement"><span class="offscreen">Toggle Accessibility Statement</span></a></li>
    <li><a href="#" id="accessibility-contrast" class="toggle-contrast" title="Toggle High Contrast"><span class="offscreen">Toggle High Contrast</span></a></li>
    <li><a href="#" id="accessibility-grayscale" class="toggle-grayscale" title="Toggle Grey Scale"><span class="offscreen">Toggle Grayscale</span></a></li>
    <!-- <li><a href="#" id="accessibility-fontsize" class="toggle-fontsize" title="Toggle Font Size"><span class="offscreen">Toggle Font size</span></a></li> -->
  </ul>
</div>
<?php endif; ?>

<div id="accessibility-statement-content" title="Accessibility Statement" role="dialog">
  <textarea class="statement-textarea" readonly>
Shortcut Keys Combination Activation

Combination keys used for each browser.

Chrome for Linux press (Alt+Shift+shortcut_key)
Chrome for Windows press (Alt+shortcut_key)
For Firefox press (Alt+Shift+shortcut_key)
For Internet Explorer press (Alt+Shift+shortcut_key) then press (enter)
 

Accessibility Statement (Combination + 0): Statement page that will show the available accessibility keys.
Home Page (Combination + 1): Accessibility key for redirecting to homepage.
Main Content (Combination + R): Shortcut for viewing the content section of the current page.
FAQ (Combination + 5): Shortcut for FAQ page.
Contact (Combination + C): Shortcut for contact page or form inquiries.
Feedback (Combination + K): Shortcut for feedback page.
Site Map (Combination + M): Shortcut for site map (footer agency) section of the page.
Search (Combination + S): Shortcut for search page.
Press esc, or click the close the button to close this dialog box.
  </textarea>
  <input type="button" value="close" class="toggle-statement"/>
</div>

<div id="navigation">
  <div class="row">
    <?php
    /**
     * mandatory region
     */
    ?>
    <div class="small-12 large-12 columns toplayer">
      <nav id="top-bar" role="navigation" class="top-bar nomargin" tabindex="-1" data-topbar>
        <ul id="main-static-link" class="links inline clearfix">
          <li id="static-link-gov"><h3><a href="http://www.gov.ph">GOVPH</a></h3></li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
          <?php if ($page['top_bar_right']): ?>
           <?php print render($page['top_bar_right']); ?>
          <?php endif; ?>
          <?php if ($main_menu): ?>
            <?php
            print theme('links__system_main_menu', array(
              'links' => $main_menu,
              'attributes' => array(
                // 'id' => 'main-nav',
                'class' => array('links', 'clearfix'),
              ),
              'heading' => array(
                'text' => t('Main menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
              ),
            )); ?>
          <?php endif; ?>
        </section>
      </nav>
    </div>
  </div>
</div>
<div id="nav-megamenu">
<?php if(isset($gwt_mega_menu)): ?>
<?php echo $gwt_mega_menu; ?>
<?php endif; ?>
</div>
<div id="page">

  <?php if ($logo || $site_name || $site_slogan): ?>
  <header class="header" id="header" <?php print $gwt_drupal_masthead_styles; ?>>
    <section class="header-section row">
      <div class="columns<?php print $name_slogan_class ?>">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
        <?php endif; ?>

        <?php if ($site_name || $site_slogan): ?>
          <div class="header__name-and-slogan" id="name-and-slogan">
            <?php if ($site_name): ?>
              <h1 class="header__site-name" id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
              <?php if ($site_slogan): ?>
                <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
              <?php endif; ?>
            <?php endif; ?>

          </div>
        <?php endif; ?>

        <?php print render($page['header']); ?>
      </div>
      <?php if($ear_content = render($page['ear_content'])): ?>
        <div class="columns<?php print $ear_content_class ?>">
          <div class="ear-content">
          <?php print $ear_content; ?>
          </div>
        </div>
      <?php endif ?>
      <?php if($ear_content_2 = render($page['ear_content_2'])): ?>
      <div class="columns<?php print $ear_content_2_class ?>">
        <div class="ear-content">
        <?php print $ear_content_2; ?>
        </div>
      </div>
      <?php endif ?>
    </section>
  </header>
  <?php endif ?>

  <?php
  if($page['banner'] ||
    $page['banner_2'] ||
    $page['banner_3']):
?>
  <div id="banner" <?php print $gwt_drupal_banner_styles; ?> class="show-for-medium-up">
    <div class="row collapse<?php print $banner_container_class ?>">
      <?php if($banner = render($page['banner'])): ?>
      <div class="columns<?php print $banner_class ?>">
        <?php print $banner; ?>
      </div>
      <?php endif ?>
      <?php if($banner_2 = render($page['banner_2'])): ?>
        <div class="columns<?php print $banner_2_class ?>">
          <div class="banner-content">
          <?php print $banner_2; ?>
          </div>
        </div>
      <?php endif ?>
      <?php if($banner_3 = render($page['banner_3'])): ?>
      <div class="columns<?php print $banner_3_class ?>">
        <div class="banner-content">
        <?php print $banner_3; ?>
        </div>
      </div>
      <?php endif ?>
    </div>
  </div>
  <?php endif; ?>

  <div id="auxiliary">
    <div class="row">
      <div class="large-12 columns">
          <?php if ($menu_auxiliary_menu): ?>
        <div class="aux-nav-btn-container hide-for-medium-up" >
          <button id="aux-nav-btn" data-dropdown="aux-nav">Auxiliary Menu</button>
        </div>
          <?php endif; ?>
        <div id="aux-nav" class="show-for-medium-up" data-dropdown-content>
          <section>
          <?php if ($menu_auxiliary_menu): ?>
            <?php
            print theme('links__menu_auxiliary_menu', array(
              'links' => $menu_auxiliary_menu,
              'attributes' => array(
                'class' => array('links', 'clearfix'),
                // 'id' => array('aux-nav'),
                // 'data-dropdown-content' => '',
              ),
              'heading' => array(
                'text' => t('Auxiliary Menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
              ),
            )); ?>
          <?php endif; ?>
          <?php if (isset($page['auxiliary_left'])): ?>
          <?php print render($page['auxiliary_left']); ?>
          <?php endif; ?>
          <?php if (isset($page['auxiliary_right'])): ?>
          <?php print render($page['auxiliary_right']); ?>
          <?php endif; ?>
          </section>
        </div>
      </div>
    </div>
  </div>
  <?php
  if($breadcrumb || $page['breadcrumbs']):
    ?>
  <div id="breadcrumbs">
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

  <div id="panel-top">
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
  
  <div id="main" role="document">
    <div class="row">
      <?php
        // Render the sidebars to see if there's anything in them.
        $sidebar_first  = render($page['sidebar_first']);
        $sidebar_second = render($page['sidebar_second']);
      ?>

      <div id="content" class="columns column<?php print $content_class ?>" role="main">
        <?php print $messages; ?>
        <div class="panel">
        <?php print render($page['highlighted']); ?>
        <a id="main-content"></a>
        <?php print render($tabs); ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
          <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
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

  <div id="panel-bottom">
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
  <footer id="footer">
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
      js.src = "//igovphil.github.io/gwt-footer/footer.js";
      gjs.parentNode.insertBefore(js, gjs);
  }(document, 'script', 'gwt-footer-jsdk'));
  </script>
  <div><a href="#page" id="back-to-top">Back to Top</a></div>
</div>
<div id="darklight"></div>
<?php print render($page['bottom']); ?>