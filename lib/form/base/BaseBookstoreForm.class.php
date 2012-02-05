<?php

/**
 * Bookstore form base class.
 *
 * @method Bookstore getObject() Returns the current form's model object
 *
 * @package    Plugins
 * @subpackage form
 * @author     IcePique Ltd.
 */
abstract class BaseBookstoreForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'name'     => new sfWidgetFormInputText(),
      'location' => new sfWidgetFormInputText(),
      'website'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'location' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'website'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bookstore[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bookstore';
  }


}
