<?php

namespace Drupal\automatic_field_saver\FieldSaver;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Plugin\PluginBase;

/**
 * Class FieldSaverPluginBase.
 *
 * @package Drupal\automatic_field_saver\FieldSaver
 */
abstract class FieldSaverPluginBase extends PluginBase implements PluginInspectionInterface {

  /**
   * {@inheritdoc}
   */
  public function getEntityType() {
    return $this->pluginDefinition['entityType'];
  }

  /**
   * {@inheritdoc}
   */
  public function getBundle() {
    return $this->pluginDefinition['bundle'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFields() {
    return $this->pluginDefinition['fields'];
  }

  /**
   * {@inheritdoc}
   */
  public function setFields(EntityInterface $entity) {
    foreach ($this->getFields() as $field) {
      $this->setField($entity, $field);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function setField(EntityInterface $entity, $field) {
    $fieldValue = $this->getFieldValue($entity);
    if ($fieldValue) {
      $entity->set($field, $fieldValue);
    }
  }

}
