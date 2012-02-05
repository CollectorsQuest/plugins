<?php

/**
 * Skeleton subclass for representing a row from the 'book' table.
 *
 * @package    propel.generator.lib.model
 */
class Book extends BaseBook 
{
  public
    $_multimedia = array(),
    $_counts = array();
}

sfPropelBehavior::add('Book', array('IceMultimediaBehavior'));
sfPropelBehavior::add('Book', array('IceTaggableBehavior'));
sfPropelBehavior::add('Book', array('PropelActAsEblobBehavior' => array('column' => 'eblob')));
