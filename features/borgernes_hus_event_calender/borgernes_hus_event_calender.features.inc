<?php
/**
 * @file
 * borgernes_hus_event_calender.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function borgernes_hus_event_calender_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function borgernes_hus_event_calender_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function borgernes_hus_event_calender_node_info() {
  $items = array(
    'bhus_events' => array(
      'name' => t('bhus events'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
