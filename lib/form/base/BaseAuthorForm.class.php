<?php

/**
 * Author form base class.
 *
 * @method Author getObject() Returns the current form's model object
 *
 * @package    Plugins
 * @subpackage form
 * @author     IcePique Ltd.
 */
abstract class BaseAuthorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'first_name' => new sfWidgetFormInputText(),
      'last_name'  => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'age'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'first_name' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'last_name'  => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'age'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('author[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Author';
  }


}
