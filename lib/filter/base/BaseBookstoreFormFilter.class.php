<?php

/**
 * Bookstore filter form base class.
 *
 * @package    Plugins
 * @subpackage filter
 * @author     IcePique Ltd.
 */
abstract class BaseBookstoreFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(),
      'location' => new sfWidgetFormFilterInput(),
      'website'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'location' => new sfValidatorPass(array('required' => false)),
      'website'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bookstore_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bookstore';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'location' => 'Text',
      'website'  => 'Text',
    );
  }
}
