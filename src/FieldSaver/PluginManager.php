<?php

namespace Drupal\automatic_field_saver\FieldSaver;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Class PluginManager.
 *
 * @package Drupal\automatic_field_saver\FieldSaver
 */
class PluginManager extends DefaultPluginManager implements PluginManagerInterface {

  /**
   * PluginManager constructor.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   The cache backend.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   */
  public function __construct(
    \Traversable $namespaces,
    CacheBackendInterface $cache_backend,
    ModuleHandlerInterface $module_handler) {
    parent::__construct(
      'Plugin/FieldSaver',
      $namespaces,
      $module_handler,
      'Drupal\automatic_field_saver\FieldSaver\PluginInspectionInterface',
      'Drupal\automatic_field_saver\Annotation\FieldSaver');
    $this->alterInfo('automatic_field_saver_info');
    $this->setCacheBackend($cache_backend, 'automatic_field_saver');
  }

  /**
   * {@inheritdoc}
   */
  public function getFieldSaverDefinitions(string $entityType, string $bundle) {
    $definitions = $this->getDefinitions();
    $fieldSaverDefinitions = [];
    foreach ($definitions as $definition) {
      if ($definition['entityType'] == $entityType && $definition['bundle'] == $bundle) {
        $fieldSaverDefinitions[] = $this->createInstance($definition['id']);
      }
    }

    return $fieldSaverDefinitions;
  }

}
