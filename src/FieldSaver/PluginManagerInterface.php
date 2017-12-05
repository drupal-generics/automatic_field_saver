<?php

namespace Drupal\automatic_field_saver\FieldSaver;

/**
 * Class PluginManagerInterface.
 *
 * @package Drupal\automatic_field_saver\FieldSaver
 */
interface PluginManagerInterface {

  /**
   * Returns an array of definitions.
   *
   * @param string $entityType
   *   The entity type.
   * @param string $bundle
   *   The bundle.
   *
   * @return array
   *   An array of plugin instances.
   */
  public function getFieldSaverDefinitions(string $entityType, string $bundle);

}
