<?php
function spacelaunch_widget_shortcode($atts = []) {
  $a = shortcode_atts([
    'limit'    => '5',
    'provider' => '',
  ], $atts);

  // Guard: force integer >=1
  $limit = max(1, intval($a['limit']));

  $attrs = sprintf(
    'data-limit="%s"%s',
    esc_attr($limit),
    $a['provider'] !== '' ? ' data-provider="'.esc_attr($a['provider']).'"' : ''
  );

  // Enqueue script only when shortcode is actually used
  wp_enqueue_script(
    'spacelaunch-widget',
    'https://spacelaunch.dev/embedable.js',
    [],
    null,
    true
  );

  return '<div class="space-launch-widget" '.$attrs.'></div>';
}
add_shortcode('spacelaunch', 'spacelaunch_widget_shortcode');
