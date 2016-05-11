<?php
// add template js and css for the inputs
drupal_add_js(drupal_get_path('theme', 'gwt_drupal') .'/js/spectrum/spectrum.js');
drupal_add_css(drupal_get_path('theme', 'gwt_drupal') .'/js/spectrum/spectrum.css');

define('GWT_DRUPAL_FONT_SANS_SERIF', 'Sans-serif');
define('GWT_DRUPAL_FONT_SERIF', '"Times New Roman", Times, serif');

/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function gwt_drupal_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL)  {
  global $base_url;

  // drupal_set_message('<pre>'.print_r($form, 1).'</pre>');

  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }
  // Create the form using Forms API
  $form['breadcrumb'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Breadcrumb settings'),
  );
  $form['breadcrumb']['gwt_drupal_breadcrumb'] = array(
    '#type'          => 'select',
    '#title'         => t('Display breadcrumb'),
    '#default_value' => theme_get_setting('gwt_drupal_breadcrumb'),
    '#options'       => array(
                          'yes'   => t('Yes'),
                          'admin' => t('Only in admin section'),
                          'no'    => t('No'),
                        ),
  );
  $form['breadcrumb']['breadcrumb_options'] = array(
    '#type' => 'container',
    '#states' => array(
      'invisible' => array(
        ':input[name="gwt_drupal_breadcrumb"]' => array('value' => 'no'),
      ),
    ),
  );
  $form['breadcrumb']['breadcrumb_options']['gwt_drupal_breadcrumb_separator'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Breadcrumb separator'),
    '#description'   => t('Text only. Don’t forget to include spaces.'),
    '#default_value' => theme_get_setting('gwt_drupal_breadcrumb_separator'),
    '#size'          => 5,
    '#maxlength'     => 10,
  );
  $form['breadcrumb']['breadcrumb_options']['gwt_drupal_breadcrumb_home'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show home page link in breadcrumb'),
    '#default_value' => theme_get_setting('gwt_drupal_breadcrumb_home'),
  );
  $form['breadcrumb']['breadcrumb_options']['gwt_drupal_breadcrumb_trailing'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append a separator to the end of the breadcrumb'),
    '#default_value' => theme_get_setting('gwt_drupal_breadcrumb_trailing'),
    '#description'   => t('Useful when the breadcrumb is placed just before the title.'),
    '#states' => array(
      'disabled' => array(
        ':input[name="gwt_drupal_breadcrumb_title"]' => array('checked' => TRUE),
      ),
    ),
  );
  $form['breadcrumb']['breadcrumb_options']['gwt_drupal_breadcrumb_title'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append the content title to the end of the breadcrumb'),
    '#default_value' => theme_get_setting('gwt_drupal_breadcrumb_title'),
    '#description'   => t('Useful when the breadcrumb is not placed just before the title.'),
  );

  // Create the form using Forms API: http://api.drupal.org/api/7

  /* -- Delete this line if you want to use this setting
  $form['gwt_drupal_example'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('gwt_drupal sample setting'),
    '#default_value' => theme_get_setting('gwt_drupal_example'),
    '#description'   => t("This option doesn't do anything; it's just an example."),
  );
  // */

  // Remove some of the base theme's settings.
  /* -- Delete this line if you want to turn off this setting.
  unset($form['themedev']['gwt_drupal_wireframes']); // We don't need to toggle wireframes on this site.
  // */

  // TODO: on enable of site name or by default, display the field
  // theme_get_setting('site_name')
  $display_site_name = (bool)$form['theme_settings']['toggle_name']['#default_value'] ? '' : 'display: none;';
  $display_site_slogan = (bool)$form['theme_settings']['toggle_slogan']['#default_value'] ? '' : 'display: none;';
  $form['logo']['site_republic_text'] = array(
    '#type' => 'textfield',
    '#title' => 'Republic Text',
    '#default_value' => theme_get_setting('site_republic_text') ? theme_get_setting('site_republic_text') : 'REPUBLIC OF THE PHILIPPINES',
    '#prefix' => '<div style="'.$display_site_slogan.'" id="site-republic-container">',
    '#suffix' => '</div>',
  );
  $form['logo']['site_name'] = array(
    '#type' => 'textfield',
    '#title' => 'Site Name',
    '#default_value' => theme_get_setting('site_name'),
    '#prefix' => '<div style="'.$display_site_name.'" id="site-name-container">',
    '#suffix' => '</div>',
  );
  // TODO: on enable of site name or by default, display the field
  $form['logo']['site_slogan'] = array(
    '#type' => 'textfield',
    '#title' => 'Site Tagline/Site Slogan',
    '#default_value' => theme_get_setting('site_slogan'),
    '#prefix' => '<div style="'.$display_site_slogan.'" id="site-slogan-container">',
    '#suffix' => '</div>',
  );

  $form['gwt_drupal_header'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Header and Banner settings'),
  );

  $form['gwt_drupal_header']['gwt_drupal_masthead_bg_color'] = array(
    '#type' => 'textfield', 
    '#title' => t('Masthead Background Color:'), 
    '#default_value' => theme_get_setting('gwt_drupal_masthead_bg_color'),
    '#size' => 10, 
    '#maxlength' => 30, 
    '#description' => t('Select the background color of the Masthead region. Select "X" to disable the color and use the default background color.'), 
    '#field_prefix' => '<div class="colorpicker-container">',
    '#field_suffix' => '</div>',
  );

  $form['gwt_drupal_header']['gwt_drupal_masthead_font_color'] = array(
    '#type' => 'textfield', 
    '#title' => t('Masthead Font Color:'), 
    '#default_value' => theme_get_setting('gwt_drupal_masthead_font_color'),
    '#size' => 10, 
    '#maxlength' => 30, 
    '#description' => t('Select the font color of the Masthead region. Select "X" to disable the color and use the default background color.'), 
    '#field_prefix' => '<div class="colorpicker-container">',
    '#field_suffix' => '</div>',
  );

  $form['gwt_drupal_header']['gwt_drupal_masthead_bg_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Masthead background image:'),
    '#default_value' => theme_get_setting('gwt_drupal_masthead_bg_image'),
    '#upload_location' => 'public://theme/',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
    '#description' => t('Background of the masthead, allowed extensions: jpg, jpeg, png, gif<br/><strong>Note:</strong> The masthead background is different from the Logo.'),
  );

  $form['gwt_drupal_header']['gwt_drupal_banner_bg_color'] = array(
    '#type' => 'textfield', 
    '#title' => t('Banner Background Color:'), 
    '#default_value' => theme_get_setting('gwt_drupal_banner_bg_color'),
    '#size' => 10, 
    '#maxlength' => 30, 
    '#description' => t('Select the background color of the Masthead region. Select "X" to disable the color and use the default background color.'), 
    '#field_prefix' => '<div class="colorpicker-container">',
    '#field_suffix' => '</div>',
  );

  $banner_font = theme_get_setting('gwt_drupal_banner_font_color');
  $form['gwt_drupal_header']['gwt_drupal_banner_font_color'] = array(
    '#type' => 'textfield', 
    '#title' => t('Banner Font Color:'), 
    '#default_value' => $banner_font ? $banner_font: '#666666',
    '#size' => 10, 
    '#maxlength' => 30, 
    '#description' => t('Select the font color of the Masthead region. Select "X" to disable the color and use the default background color.'), 
    '#field_prefix' => '<div class="colorpicker-container">',
    '#field_suffix' => '</div>',
  );

  $form['gwt_drupal_header']['gwt_drupal_banner_bg_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Banner background image'),
    '#default_value' => theme_get_setting('gwt_drupal_banner_bg_image'),
    //'#element_validate' => array('_gwt_drupal_banner_background_image_validate'),
    '#description' => t('Upload a file, allowed extensions: jpg, jpeg, png, gif<br/>Background of the banner.'),
    '#upload_location' => 'public://theme/',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );

  $form['gwt_drupal_content'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Content settings'),
  );
  $form['gwt_drupal_content']['gwt_drupal_content_border_position'] = array(
    '#type' => 'select',
    '#title' => t('Content Border Position'),
    '#default_value' => theme_get_setting('gwt_drupal_content_border_position'),
    '#options' => array(
      0 => 'No Border (Default)',
      1 => 'Full Border',
      2 => 'Border-top only',
      3 => 'Bodder-bottom only',
    ),
    '#description' => 'Set to <strong>No Border</strong> to revert to original.',
  );
  $form['gwt_drupal_content']['gwt_drupal_content_border'] = array(
    '#type' => 'select',
    '#title' => t('Content Border Width'),
    '#default_value' => theme_get_setting('gwt_drupal_content_border'),
    '#options' => array(
      1,
      2,
      3,
      4,
      5,
    ),
  );
  $form['gwt_drupal_content']['gwt_drupal_content_border_radius'] = array(
    '#type' => 'select',
    '#title' => t('Content Border Radius'),
    '#default_value' => theme_get_setting('gwt_drupal_content_border_radius'),
    '#options' => array(
      '0',
      '2px',
      '4px',
      '6px',
      '8px',
      '10px',
      '12px',
      '14px',
      '16px',
      '18px',
      '20px',
    ),
  );
  $form['gwt_drupal_content']['gwt_drupal_content_border_color'] = array(
    '#type' => 'textfield', 
    '#title' => t('Content Border Color:'), 
    '#default_value' => theme_get_setting('gwt_drupal_content_border_color'),
    '#size' => 10, 
    '#maxlength' => 30, 
    '#description' => t('Select the border color of the content region. Select "X" to disable the color and use the default background color.'), 
    '#field_prefix' => '<div class="colorpicker-container">',
    '#field_suffix' => '</div>',
  );
  $form['gwt_drupal_content']['gwt_drupal_content_heading_font'] = array(
    '#type' => 'select',
    '#title' => t('Content Heading Size'),
    '#default_value' => theme_get_setting('gwt_drupal_content_heading_font'),
    '#options' => array(
      t('Smaller'),
      t('Normal'),
      t('Larger'),
    ),
    '#description' => t('Size of headings font for content.'),
  );
  $form['gwt_drupal_content']['gwt_drupal_content_bg_color'] = array(
    '#type' => 'textfield', 
    '#title' => t('Content Background Color:'), 
    '#default_value' => theme_get_setting('gwt_drupal_content_bg_color'),
    '#size' => 10, 
    '#maxlength' => 30, 
    '#description' => t('Select the background color of the content region. Select "X" to disable the color and use the default background color.'), 
    '#field_prefix' => '<div class="colorpicker-container">',
    '#field_suffix' => '</div>',
  );
  $form['gwt_drupal_content']['gwt_drupal_footer_bg_color'] = array(
    '#type' => 'textfield', 
    '#title' => t('Agency Footer Background Color:'), 
    '#default_value' => theme_get_setting('gwt_drupal_footer_bg_color'),
    '#size' => 10, 
    '#maxlength' => 30, 
    '#description' => t('Select the background color of the footer region. Select "X" to disable the color and use the default background color.'), 
    '#field_prefix' => '<div class="colorpicker-container">',
    '#field_suffix' => '</div>',
  );

  $form['gwt_drupal_header']['gwt_drupal_logo_font'] = array(
    '#type' => 'radios',
    '#title' => t('Font Family Selection'),
    '#options' => array(
      GWT_DRUPAL_FONT_SANS_SERIF => 'Sans-serif',
      GWT_DRUPAL_FONT_SERIF => 'Serif',
    ),
    '#default_value' => theme_get_setting('gwt_drupal_logo_font'),
  );

  $form['gwt_drupal_header']['form_script'] = array(
    '#markup' => '<script type="text/javascript">
    jQuery(document).ready(function($){
      $(\'.colorpicker-container input[type="text"]\').spectrum({
          showInput: true,
          allowEmpty:true,
          preferredFormat: "hex",
          clickoutFiresChange: true,
          showButtons: false
      });
      var siteName = $(\'#site-name-container\');
      var siteRepublic = $(\'#site-republic-container\');
      $(\'#edit-toggle-name\').click(function(){
        if($(this).is(":checked")) {
          siteName.show();
          siteRepublic.show();
        }
        else{
          siteName.hide();
          siteRepublic.hide();
        }
      });
      var siteSlogan = $(\'#site-slogan-container\');
      $(\'#edit-toggle-slogan\').click(function(){
        if($(this).is(":checked")) {
          siteSlogan.show();
        }
        else{
          siteSlogan.hide();
        }
      });
    });
    </script>'
  );

  /*
  $form['gwt_drupal_acc'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Accessibility settings'),
  );

  $form['gwt_drupal_acc']['gwt_drupal_acc_widget'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Accessibility Widget'), 
    '#default_value' => theme_get_setting('gwt_drupal_acc_widget'),
    '#description' => t('Check to show the accesssibility widget.'), 
  );

  $form['gwt_drupal_acc']['gwt_drupal_acc_label'] = array(
    '#markup' => "
    <label>Shortcut Keys Combination Activation</label>
    <p>Combination keys used for each browser.</p>
    <ul>
    <li>Chrome for Linux press (Alt+Shift+shortcut_key)</li>
    <li>Chrome for Windows press (Alt+shortcut_key)</li>
    <li>For Firefox press (Alt+Shift+shortcut_key)</li>
    <li>For Internet Explorer press (Alt+Shift+shortcut_key) then press (enter)</li>
    </ul>
    "
  );
  $form['gwt_drupal_acc']['gwt_drupal_acc_statement'] = array(
    '#type' => 'textfield', 
    '#title' => t('Accessibility Statement (Combination + 0):'), 
    '#default_value' => theme_get_setting('gwt_drupal_acc_statement'),
    '#field_prefix' => $base_url.'/',
    '#description' => t(''), 
  );

  $form['gwt_drupal_acc']['gwt_drupal_acc_home'] = array(
    '#type' => 'textfield', 
    '#title' => t('Home Page (Combination + 1):'), 
    '#default_value' => theme_get_setting('gwt_drupal_acc_home') ? theme_get_setting('gwt_drupal_acc_home') : '',
    '#field_prefix' => $base_url.'/',
    '#description' => t('<strong>Default value</strong>: home'), 
  );

  $form['gwt_drupal_acc']['gwt_drupal_acc_maincontent'] = array(
    '#type' => 'textfield', 
    '#title' => t('Main Content (Combination + R):'), 
    '#default_value' => theme_get_setting('gwt_drupal_acc_maincontent') ? theme_get_setting('gwt_drupal_acc_maincontent') : '#main-content',
    '#description' => t(''), 
    '#field_prefix' => '{current_url}/',
  );

  $form['gwt_drupal_acc']['gwt_drupal_acc_faq'] = array(
    '#type' => 'textfield', 
    '#title' => t('FAQ (Combination + 5):'), 
    '#default_value' => theme_get_setting('gwt_drupal_acc_faq'),
    '#field_prefix' => $base_url.'/',
    '#description' => t(''), 
  );

  $form['gwt_drupal_acc']['gwt_drupal_acc_contact'] = array(
    '#type' => 'textfield', 
    '#title' => t('Contact (Combination + C):'), 
    '#default_value' => theme_get_setting('gwt_drupal_acc_contact'),
    '#maxlength' => 30,
    '#field_prefix' => $base_url.'/',
    '#description' => t(''), 
  );

  $form['gwt_drupal_acc']['gwt_drupal_acc_feedback'] = array(
    '#type' => 'textfield', 
    '#title' => t('Feedback (Combination + K):'), 
    '#default_value' => theme_get_setting('gwt_drupal_acc_feedback'),
    '#maxlength' => 30,
    '#field_prefix' => $base_url.'/',
    '#description' => t(''), 
  );

//  TODO: create a settings for sitemap(page) and sitemap(agency footer)
  $form['gwt_drupal_acc']['gwt_drupal_acc_sitemap'] = array(
    '#type' => 'textfield', 
    '#title' => t('Site Map (Combination + M):'), 
    '#default_value' => theme_get_setting('gwt_drupal_acc_sitemap') ? theme_get_setting('gwt_drupal_acc_sitemap') : '#footer',
    '#maxlength' => 30,
    '#description' => t(''), 
    '#field_prefix' => '{current_url}/',
  );

  $form['gwt_drupal_acc']['gwt_drupal_acc_search'] = array(
    '#type' => 'textfield', 
    '#title' => t('Search (Combination + S):'), 
    '#default_value' => theme_get_setting('gwt_drupal_acc_search') ? theme_get_setting('gwt_drupal_acc_search') : 'search/node/',
    '#maxlength' => 30,
    '#description' => t(''), 
    '#field_prefix' => $base_url.'/',
  );
*/
/*
  $form['#validate'][] = 'gwt_drupal_settings_validate';
  $form['#submit'][] = 'gwt_drupal_settings_submit';
*/
  // We are editing the $form in place, so we don't need to return anything.
}