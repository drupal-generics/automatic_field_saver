<?php

namespace Drupal\automatic_field_saver\FieldSaver;

use Drupal\Core\Entity\EntityInterface;

/**
 * Interface PluginInspectionInterface.
 *
 * @package Drupal\automatic_field_saver\FieldSaver
 */
interface PluginInspectionInterface {

  /**
   * Returns the entity type declared on the plugin.
   *
   * @return string
   *   The entity type id.
   */
  public function getEntityType();

  /**
   * The bundle of the entity type.
   *
   * @return string
   *   The id of the bundle.
   */
  public function getBundle();

  /**
   * The fields that are declared on the plugin.
   *
   * @return array
   *   An array of fields on which operations are performed.
   */
  public function getFields();

  /**
   * The method that determines which value is saved on the fields.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The entity that is saved with the new values.
   *
   * @return mixed
   *   The value that is saved.
   */
  public function getFieldValue(EntityInterface $entity);

  /**
   * Sets the values on the fields.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The entity that is saved.
   */
  public function setFields(EntityInterface $entity);

  /**
   * Sets the value of a specific field on the entity.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The entity that is saved.
   * @param string $field
   *   The name of the field.
   */
  public function setField(EntityInterface $entity, $field);

}
