<?php
/**
 * File to hold the overrides for fields.
 */

/**
 * Strip some markup.
 */
function vso_bare_strip_fields($variables) {
  $output = '';
  // Render the items.
  foreach ($variables['items'] as $delta => $item) {
    $output .= drupal_render($item);
  }

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_components_pre($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_components_post($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_slideshow_image($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_slideshow_video($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_slideshow_description($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_trip_ideas_videos($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_trip_ideas_articles($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_photo_tour($variables) {
  return vso_bare_strip_fields($variables);
}



/**
 * Implements theme_field().
 */
function vso_bare_field__field_listing_listings($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_listing_social($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__body($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_body_image($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__title_field($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 *
 * Add a custom separator between the terms and strip all the other markup.
 */
function vso_bare_field__field_area($variables) {
  $output = '';
  $count = count($variables['items']);
  // Render the items.
  foreach ($variables['items'] as $delta => $item) {
    $separator = ' & ';
    if ($delta == $count -1) {
      $separator = '';
    }
    $output .= drupal_render($item) . $separator;
  }

  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';
  return $output;
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_image($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
// function vso_bare_field__field_subtitle($variables) {
//   // return vso_bare_strip_fields($variables);
//   // Output all subtitle fields as h2
//   $output = '';
//   // Render the items.
//   foreach ($variables['items'] as $delta => $item) {
//     $output .= drupal_render($item);
//   }

//   // Render the top-level DIV.
//   $output = '<h2 class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</h2>';

//   return $output;
// }

/**
 * Implements theme_field().
 */
function vso_bare_field__field_caption($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_slideshow($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_left_column_text($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_right_column_text($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_subtitle($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_description($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_cta($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_content_slideshow($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_article($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_event($variables) {
  return vso_bare_strip_fields($variables);
}

/**
 * Implements theme_field().
 */
function vso_bare_field__field_start_date($variables) {
  return vso_bare_strip_fields($variables);
}

function vso_bare_field__field_end_date($variables) {
  return vso_bare_strip_fields($variables);
}

function vso_bare_field__field_image_top($variables) {
  return vso_bare_strip_fields($variables);
}

function vso_bare_field__field_image_mid_right($variables) {
  return vso_bare_strip_fields($variables);
}

function vso_bare_field__field_image_mid_left($variables) {
  return vso_bare_strip_fields($variables);
}

function vso_bare_field__field_image_bottom($variables) {
  return vso_bare_strip_fields($variables);
}

function vso_bare_field__field_promo($variables) {
  return vso_bare_strip_fields($variables);
}

function vso_bare_field__field_venue($variables) {
  return vso_bare_strip_fields($variables);
}
