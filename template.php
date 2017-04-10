<?php

/**
 * @file
 * Controls local theme overrides.
 */

require_once dirname(__FILE__) . '/includes/field_overrides.inc';

/**
 * Implements hook_preprocess_html().
 */
function mmg_bare_preprocess_html(&$vars) {
  // Viewport setting.
  $viewport = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'initial-scale=1.0',
    ),
  );
  drupal_add_html_head($viewport, 'viewport');

  // Force IE to use most up-to-date render engine.
  $xua = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'X-UA-Compatible',
      'content' => 'IE=edge',
    ),
  );
  drupal_add_html_head($xua, 'x-ua-compatible');
}

function mmg_bare_preprocess_page(&$vars) {
  $vars['logo_header'] = drupal_get_path('theme', 'mmg_bare') . '/mmg_logo.png';
  // SVG Logo Option: Deleate above line & uncomment below to use svg logo instead
  // $vars['logo_header'] = file_get_contents(drupal_get_path('theme', 'mmg_bare') . '/images-min/logo.svg');

  // Render Main Menu - twice
  // One for desktop, one for mobile
  $main_menu = menu_tree_output(menu_tree_all_data('main-menu'));
  $vars['main_menu_large'] = $main_menu;
  $vars['main_menu_small'] = $main_menu;

  // Render Quick Links Menu - twice
  // One for desktop, one for mobile
  // Replace 'main-menu' with the machine name of your secondary menu
  $secondary_menu = menu_tree_output(menu_tree_all_data('user-menu'));
  $vars['secondary_menu_small'] = $secondary_menu;
  $vars['secondary_menu_large'] = $secondary_menu;

  // Search form.
  $search_form = block_load('search', 'form');
  $vars['search_form'] = _block_get_renderable_array(_block_render_blocks(array($search_form)));
}


function mmg_bare_preprocess_node(&$vars) {
  // Add generic "listings" class to help with theming
  $listing_nodes = array('profile', 'event', 'deal');
  $current_node_type = $vars['node']->type;

   // Node-type specific class
  $vars['classes_array'][] = drupal_html_class('node--' . $vars['type'] . '--' . $vars['view_mode']);
  if (in_array($current_node_type, $listing_nodes)) {
    $vars['classes_array'][] = drupal_html_class('node--listing--' . $vars['view_mode']);
  }
  // add a template suggestion for related deals and events view mode
  // usage: node--article--teaser.tpl.php
  if ($vars['view_mode'] == 'teaser') {
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '__teaser';
  }
  if ($vars['view_mode'] == 'related') {
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '__related';
  }
}

/**
 * Implements theme_menu_link()
 */
function mmg_bare_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  // Add a 'depth' helper class name
  $element['#attributes']['class'][] = 'level-' . $element['#original_link']['depth'];
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

