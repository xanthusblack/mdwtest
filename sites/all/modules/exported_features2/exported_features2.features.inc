<?php
/**
 * @file
 * exported_features2.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function exported_features2_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "feeds" && $api == "feeds_importer_default") {
    return array("version" => "1");
  }
}
