<?php

namespace App;

use Roots\Sage\Container;
use Illuminate\Contracts\Container\Container as ContainerContract;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param ContainerContract $container
 * @return ContainerContract|mixed
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
function sage($abstract = null, $parameters = [], ContainerContract $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->make($abstract, $parameters)
        : $container->make("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

// get contents with curl
function curl_get_contents($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

/**
 * @param $filename
 * @return string
 */
function inline_svg($filename) {
  return curl_get_contents( asset_path($filename) );

}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/**
 * Page titles
 * @return string
 */
function title()
{
    if (is_home()) {
        if ($home = get_option('page_for_posts', true)) {
            return get_the_title($home);
        }
        return __('Latest Posts', 'sage');
    }
    if (is_archive()) {
        return get_the_archive_title();
    }
    if (is_search()) {
        return sprintf(__('Search Results for "%s"', 'sage'), get_search_query());
    }
    if (is_404()) {
        return __('Not Found', 'sage');
    }
    return get_the_title();
}

/**
 * Media credit
 */
function get_media_credit_html($id, $include_default_credit = false) {
    if (!is_numeric($id)):
        return false;
    endif;

    return function_exists('the_media_credit_html') ? the_media_credit_html($id) : '';
}

function get_image_from_url($image_url) {
  global $wpdb;
  preg_match('/uploads[\d]?\/(.+)/', $image_url, $path);
  if(isset($path[1])) {
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value like '%s';", "{$path[1]}"));
    return isset($attachment[0]) ? $attachment[0] : '';
  }
  else {
    return '';
  }
}

function issue_link($categories = []) {
    if(count($categories) > 0) {
        $category = array_shift($categories);
        return "<a href='/carnegie-magazine/issue/{$category->slug}'>{$category->name}</a>";
    }
    else {
        return "<a href='/carnegie-magazine/carnegie-magazine-archive'>Carnegie Magazine</a>";
    }
}
