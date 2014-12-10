<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
global $base_url;
?>

<div id="page">


  <div id="navigation">
    <div class="row">
      <?php
      /**
       * mandatory region
       */
      ?>
      <div class="small-12 large-12 columns toplayer">
        <nav id="top-bar" role="navigation" class="top-bar nomargin" tabindex="-1" data-topbar>
          <?php /** TODO: add a static gov.ph link **/ ?>
          <ul id="main-static-link" class="links inline clearfix">
            <li><a href="http://www.gov.ph"><img src="<?php echo $base_url.'/'.drupal_get_path('theme', 'igov'); ?>/images/seal-govph.png"></a></li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>
          <section class="top-bar-section">
            <?php if ($main_menu): ?>
              <?php
              print theme('links__system_main_menu', array(
                'links' => $main_menu,
                'attributes' => array(
                  'class' => array('links', 'inline', 'clearfix', 'left'),
                ),
                'heading' => array(
                  'text' => t('Main menu'),
                  'level' => 'h2',
                  'class' => array('element-invisible'),
                ),
              )); ?>
            <?php endif; ?>
            <?php if ($page['top_bar_right']): ?>
             <?php print render($page['top_bar_right']); ?>
            <?php endif; ?>
          </section>
        </nav>
      </div>
    </div>
  </div>

  <header class="header" id="header" style="<?php echo $igov_masthead_bg; ?>">
    <div class="row">
      <section class="header-section large-12 columns">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
        <?php endif; ?>

        <?php if ($site_name || $site_slogan): ?>
          <div class="header__name-and-slogan" id="name-and-slogan">
            <?php if ($site_name): ?>
              <h1 class="header__site-name" id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>

            <?php if ($site_slogan): ?>
              <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php print render($page['header']); ?>
      </section>
    </div>
  </header>

  <?php if(isset($page['banner'])): ?>
  <div id="banner" style="<?php echo $igov_banner_bg; ?>">
    <div class="row">
      <div class="columns<?php print $banner_class ?>">
        <?php print render($page['banner']); ?>
      </div>
      <?php if($banner_2 = render($page['banner_2'])): ?>
        <div class="columns<?php print $banner_2_class ?>">
          <?php print $banner_2; ?>
        </div>
      <?php endif ?>
      <?php if($banner_3 = render($page['banner_3'])): ?>
      <div class="columns<?php print $banner_3_class ?>">
        <?php print $banner_3; ?>
      </div>
      <?php endif ?>
    </div>
  </div>
  <?php endif; ?>

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
        <?php print $breadcrumb; ?>
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

  <footer id="footer">
    <div class="row">
      <div class="columns<?php print $footer_class ?>">
        <?php print render($page['footer']); ?>
      </div>
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
  <?php print render($page['footer_standard']); ?>
<div><a href="#page" id="back-to-top">Back to Top</a></div>
</div>

<?php print render($page['bottom']); ?>
