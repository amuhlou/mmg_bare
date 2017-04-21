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
  // Set up path to your logo, png or svg
  $logo_header_file = drupal_get_path('theme', 'mmg_bare') . '/logo.png';
  // Uncomment below to use svg logo
  // It's still a good idea to have a png version for maintenance pages.
  //$logo_header_file = drupal_get_path('theme', 'mmg_bare') . '/images-min/logo.svg';
  // Check file extension and render logo accordingly
  if ($logo_header_file) {
    $info = new SplFileInfo($logo_header_file);
    if ($info->getExtension() == 'svg') {
      $rendered_logo = file_get_contents($logo_header_file);
    } else {
      $rendered_logo = '<img src="/' . $logo_header_file . '" alt="' . variable_get('site_name') .  " " . t('Logo') .'"/>';
    }
    $vars['logo_header'] = $rendered_logo;
  }

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
/**
 * Implements theme_pager()
 */
function mmg_bare_pager($vars) {
  $tags = $vars['tags'];
  $element = $vars['element'];
  $parameters = $vars['parameters'];
  $quantity = $vars['quantity'];
  global $pager_page_array, $pager_total;
  $tags[3] = 'Next';
  $tags[1] = 'Previous';

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.


  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('pager-current'),
            'data' => '<span>' . $i . '</span>',
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }

    return '<h2 class="element-invisible">' . t('Pages') . '</h2>' . theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pager')),
    ));
  }
}
