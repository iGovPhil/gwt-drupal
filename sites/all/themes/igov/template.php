<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function igov_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  igov_preprocess_html($variables, $hook);
  igov_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function igov_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function igov_preprocess_page(&$variables, $hook) {

  $variables['content_class'] = '';
  $variables['sidebar_first_class'] = ' large-3';
  $variables['sidebar_second_class'] = ' large-3';
  // if both sidbars are present set the content css for 3 column layout
  if($variables['page']['sidebar_first'] && $variables['page']['sidebar_second']){
    $variables['content_class'] .= ' large-6 push-3';
    $variables['sidebar_first_class'] .= ' pull-6';
    // $variables['sidebar_second_class'] .= '';
  }
  // if left sidebar only
  elseif($variables['page']['sidebar_first'] && !$variables['page']['sidebar_second']){
    $variables['content_class'] .= ' large-9 push-3';
    $variables['sidebar_first_class'] .= ' pull-9';
    //$variables['sidebar_second_class'] .= '';
  }
  // if right sidebar only
  elseif(!$variables['page']['sidebar_first'] && $variables['page']['sidebar_second']){
    $variables['content_class'] .= ' large-9';
    //$variables['sidebar_first_class'] .= ' pull-9';
    //$variables['sidebar_second_class'] .= '';
  }
  // if no sidebars present
  else{
    $variables['content_class'] .= ' large-12';
  }

  // create a dynamic column on banner
  $variables['banner_class'] = ' large-12';
  $variables['banner_2_class'] = '';
  $variables['banner_3_class'] = '';
  // if both banner are available
  if($variables['page']['banner_2'] && $variables['page']['banner_3']){
    $variables['banner_class'] = ' large-6';
    $variables['banner_2_class'] = ' large-3';
    $variables['banner_3_class'] = ' large-3';
  }
  elseif($variables['page']['banner_2'] && !$variables['page']['banner_3']){
    $variables['banner_class'] = ' large-9';
    $variables['banner_2_class'] = ' large-3';
    //$variables['banner_3_class'] = '';
  }
  elseif(!$variables['page']['banner_2'] && $variables['page']['banner_3']){
    $variables['banner_class'] = ' large-9';
    //$variables['banner_2_class'] = '';
    $variables['banner_3_class'] = ' large-3';
  }

  // create a dynamic column on agency footer
  $variables['footer_class'] = ' large-12';
  $variables['footer_2_class'] = '';
  $variables['footer_3_class'] = '';
  $variables['footer_4_class'] = '';
  if($variables['page']['footer_2']){
    $variables['footer_class'] = ' large-6';
    $variables['footer_2_class'] = ' large-6';
    $variables['footer_3_class'] = ' large-3';
    $variables['footer_4_class'] = ' large-3';
    if($variables['page']['footer_3'] && $variables['page']['footer_4']){
      $variables['footer_class'] = ' large-3';
      $variables['footer_2_class'] = ' large-3';
    }
    elseif(!$variables['page']['footer_3'] && $variables['page']['footer_4']){
      $variables['footer_2_class'] = ' large-3';
      $variables['footer_3_class'] = '';
      $variables['footer_4_class'] = '';
      $variables['footer_4_class'] = ' large-3';
    }
    elseif($variables['page']['footer_3'] && !$variables['page']['footer_4']){
      $variables['footer_2_class'] = ' large-3';
      $variables['footer_3_class'] = ' large-3';
      $variables['footer_4_class'] = '';
    }
    elseif(!$variables['page']['footer_3'] && !$variables['page']['footer_4']){
      $variables['footer_2_class'] = ' large-3';
      $variables['footer_3_class'] = '';
      $variables['footer_4_class'] = '';
    }
  }
  else{
    $variables['footer_class'] = ' large-6';
    $variables['footer_2_class'] = '';
    $variables['footer_3_class'] = ' large-3';
    $variables['footer_4_class'] = ' large-3';
    if(!$variables['page']['footer_3'] && $variables['page']['footer_4']){
      $variables['footer_3_class'] = ' large-6';
      $variables['footer_4_class'] = '';
    }
    elseif($variables['page']['footer_3'] && !$variables['page']['footer_4']){
      $variables['footer_3_class'] = '';
      $variables['footer_4_class'] = ' large-6';
    }
    elseif(!$variables['page']['footer_3'] && !$variables['page']['footer_4']){
      $variables['footer_class'] = ' large-12';
      $variables['footer_3_class'] = '';
      $variables['footer_4_class'] = '';
    }
  }

  // TODO: load the color used for masthead
  $igov_masthead_bg = theme_get_setting('igov_masthead_background_color');
  if($igov_masthead_bg){
    $igov_masthead_bg = 'background: '.$igov_masthead_bg.';';
  }
  $variables['igov_masthead_bg'] = $igov_masthead_bg;

  $igov_banner_bg = theme_get_setting('igov_banner_background_color');
  if($igov_banner_bg){
    $igov_banner_bg = 'background: '.$igov_banner_bg.';';
  }
  $variables['igov_banner_bg'] = $igov_banner_bg;
  /*
  // mandatory transparency seal configuration settings 
  $variables['igov_trans_seal_left'] = '';
  $variables['igov_trans_seal_right'] = '';

  $trans_seal = path_to_theme().'/images/transparency-seal.png';
  $trans_seal = '<div class="transparency-seal">'.theme_image(
    array(
      'path' => $trans_seal,
      'attributes' => array(
        'alt' => 'transparency-seal',
      ),
    )).'</div>';
  // check if both pages are present
  if(isset($variables['page']['sidebar_first']) && isset($variables['page']['sidebar_second'])){
    if(theme_get_setting('igov_trans_seal') == 0){
      $variables['igov_trans_seal_left'] = $trans_seal;
    }
    else{
      $variables['igov_trans_seal_right'] = $trans_seal;
    }
  }
  elseif(isset($variables['page']['sidebar_first']) && !isset($variables['page']['sidebar_second'])){
    $variables['igov_trans_seal_left'] = $trans_seal;
  }
  else{
    $variables['igov_trans_seal_right'] = $trans_seal;
  }
  */

  // $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function igov_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // igov_preprocess_node_page() or igov_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function igov_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function igov_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
  if ($variables['region'] == 'top_bar_right') {
  }
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function igov_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
  //print_r($variables);
  if(isset($variables['block']->region)){
    if($variables['block']->region == 'top_bar_right'){
    }
  }
}
// */

/**
 * igov edit
 */
/**
 * theme override of link main menu
 */
function igov_links__system_main_menu($variables) {
  //$links = $variables['links'];

  //*
  $links = menu_tree_all_data('main-menu', null, 3);
  // $test = '<pre>'.print_r($links, 1).'</pre>';
  // return $test;
  // */


  // heading not needed in main menu
  $heading = $variables['heading'];
  global $language_url;
  $output = '';

  $output .= _igov_link_render($links, 0, $variables);

  return $output;
}

/**
 * helper function
 * render the link as li element
 */
function _igov_link_render($links, $levels_deep = 0, $variables = array()){
  if($levels_deep > 3){
    return;
  }

  $attributes = $variables['attributes'];

  if (count($links) > 0) {
    $output = '';

    // reset classes
    $attributes['class'] = array();
    $attributes['class'][] = 'level-'.$levels_deep;

    if($levels_deep == 0){
      $attributes['class'][] = 'left';
    }
    if($levels_deep > 0){
      $attributes['class'][] = 'dropdown';
    }
    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;
    foreach ($links as $key => $link_full) {
      // check if the key is really a link by checking if the key is an int
      $keys = explode(' ', $key);
      $menu_id = $keys[count($keys)-1];
      if(!is_numeric($menu_id)){
        break;
      }

      $link = $link_full['link'];
      $class = array('menu-'.$menu_id);
      $has_sub_menu = false;
      if(isset($link_full['below']) && !empty($link_full['below'])){
        $has_sub_menu = true;
        $class[] = 'has-dropdown';
        $class[] = 'not-click';
      }

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page())) && (empty($link['language']) || $link['language']->language == $language_url->language)) {
        $class[] = 'active';
      }
      // add custom divider for the links
      $output .= '<li class="divider"></li>';
      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        if($link['href'] == '<front>'){
          $output .= l($link['title'], '');
        }
        else{
          $output .= l($link['title'], $link['href'], $link);
        }
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
      }

      // recursion
      // check if there are submenu
      // support up to three levels
      if($has_sub_menu){
        $output .= _igov_link_render($link_full['below'], $levels_deep+1, $variables);
      }
      $i++;
      $output .= "</li>\n";
    }

    // add custom divider for the links
    $output .= '<li class="divider"></li>';

    $output .= '</ul>';
  }

  return $output;
}

/**
 * end igov edit
 */
