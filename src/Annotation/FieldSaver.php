<?php

namespace Drupal\automatic_field_saver\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Class FieldSaver.
 *
 * Annotation for plugins that perform automatic saves on entity fields.
 *
 * @package Drupal\automatic_field_saver\Annotation
 *
 * @Annotation
 */
class FieldSaver extends Plugin {

  /**
   * The id of the plugin.
   *
   * @var string
   */
  public $id;

  /**
   * The entity type on which the plugin does its magic.
   *
   * @var string
   */
  public $entityType;

  /**
   * The bundle of the entity type on which the plugin does its magic.
   *
   * @var string
   */
  public $bundle;

  /**
   * The fields that the plugin is saving.
   *
   * @var array
   */
  public $fields = [];

}
