<?php

require_once 'cpclienthours.civix.php';
// phpcs:disable
use CRM_Cpclienthours_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_links().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_links/
 */
function cpclienthours_civicrm_links($op, $objectName, $objectId, &$links, &$mask, &$values) {
  if (
    $op == 'view.contact.activity'
    && $objectName == 'Contact'
  ) {
    $contact = civicrm_api3('contact', 'getsingle', array(
      'id' => $objectId,
    ));

    $contactSubTypes = (array)$contact['contact_sub_type'];
    if (in_array('Team', $contactSubTypes)) {
      $links[] = array(
        'name' => ts('Batch Client Hours'),
        'url' => CRM_Utils_System::url('civicrm/cpclienthours/addhours', 'reset=1&cid=' . $objectId, NULL, NULL, NULL, NULL, TRUE),
        'title' => 'Enter Client Hours',
        'class' => 'crm-i fa-clock-o',
      );
    }

  }
}

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function cpclienthours_civicrm_config(&$config) {
  _cpclienthours_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function cpclienthours_civicrm_install() {
  _cpclienthours_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function cpclienthours_civicrm_enable() {
  _cpclienthours_civix_civicrm_enable();
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function cpclienthours_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function cpclienthours_civicrm_navigationMenu(&$menu) {
//  _cpclienthours_civix_insert_navigation_menu($menu, 'Mailings', array(
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ));
//  _cpclienthours_civix_navigationMenu($menu);
//}
