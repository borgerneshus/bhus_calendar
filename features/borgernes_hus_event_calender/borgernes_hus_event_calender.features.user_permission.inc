<?php
/**
 * @file
 * borgernes_hus_event_calender.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function borgernes_hus_event_calender_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'create bhus_events content'.
  $permissions['create bhus_events content'] = array(
    'name' => 'create bhus_events content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'delete any bhus_events content'.
  $permissions['delete any bhus_events content'] = array(
    'name' => 'delete any bhus_events content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'delete own bhus_events content'.
  $permissions['delete own bhus_events content'] = array(
    'name' => 'delete own bhus_events content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'edit any bhus_events content'.
  $permissions['edit any bhus_events content'] = array(
    'name' => 'edit any bhus_events content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'edit own bhus_events content'.
  $permissions['edit own bhus_events content'] = array(
    'name' => 'edit own bhus_events content',
    'roles' => array(),
    'module' => 'node',
  );

  return $permissions;
}
