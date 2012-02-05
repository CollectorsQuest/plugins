<?php

/**
 * Book form base class.
 *
 * @method Book getObject() Returns the current form's model object
 *
 * @package    Plugins
 * @subpackage form
 * @author     IcePique Ltd.
 */
abstract class BaseBookForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'author_id'    => new sfWidgetFormPropelChoice(array('model' => 'Author', 'add_empty' => true)),
      'publisher_id' => new sfWidgetFormPropelChoice(array('model' => 'Publisher', 'add_empty' => true)),
      'title'        => new sfWidgetFormInputText(),
      'isbn'         => new sfWidgetFormInputText(),
      'price'        => new sfWidgetFormInputText(),
      'eblob'        => new sfWidgetFormTextarea(),
      'deleted_at'   => new sfWidgetFormDateTime(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'author_id'    => new sfValidatorPropelChoice(array('model' => 'Author', 'column' => 'id', 'required' => false)),
      'publisher_id' => new sfValidatorPropelChoice(array('model' => 'Publisher', 'column' => 'id', 'required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'isbn'         => new sfValidatorString(array('max_length' => 24, 'required' => false)),
      'price'        => new sfValidatorNumber(array('required' => false)),
      'eblob'        => new sfValidatorString(array('required' => false)),
      'deleted_at'   => new sfValidatorDateTime(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('book[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Book';
  }


}
