<?php
/**
 * @file
 * borgernes_hus_event_calender.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function borgernes_hus_event_calender_user_default_roles() {
  $roles = array();

  // Exported role: Borgerneshus event cordinator.
  $roles['Borgerneshus event cordinator'] = array(
    'name' => 'Borgerneshus event cordinator',
    'weight' => 3,
  );

  return $roles;
}
