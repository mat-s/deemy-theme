<?php

/**
 * deemy-theme (Hello Elementor Child)
 */

// Enqueue parent and child styles
add_action('wp_enqueue_scripts', function () {
  // Parent
  wp_enqueue_style(
    'hello-elementor-parent-style',
    get_template_directory_uri() . '/style.css',
    [],
    wp_get_theme(get_template())->get('Version')
  );

  // Child: nach Elementor laden (falls registriert)
  $deps = ['hello-elementor-parent-style'];
  if (wp_style_is('elementor-frontend', 'registered')) {
    $deps[] = 'elementor-frontend';
  }

  wp_enqueue_style(
    'deemy-theme-style',
    get_stylesheet_uri(),
    $deps,
    wp_get_theme()->get('Version')
  );
}, 100);


// Basic theme setup (optional extensions can be added later)
add_action('after_setup_theme', function () {
  load_child_theme_textdomain('deemy-theme', get_stylesheet_directory() . '/languages');
});

// Autoload all PHP files from /inc
$deemy_inc_dir = __DIR__ . '/inc';
if (is_dir($deemy_inc_dir)) {
  foreach (glob($deemy_inc_dir . '/*.php') as $deemy_file) {
    require_once $deemy_file;
  }
}
