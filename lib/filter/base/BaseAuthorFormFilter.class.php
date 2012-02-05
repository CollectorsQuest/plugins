<?php

/**
 * Author filter form base class.
 *
 * @package    Plugins
 * @subpackage filter
 * @author     IcePique Ltd.
 */
abstract class BaseAuthorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name' => new sfWidgetFormFilterInput(),
      'last_name'  => new sfWidgetFormFilterInput(),
      'email'      => new sfWidgetFormFilterInput(),
      'age'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'first_name' => new sfValidatorPass(array('required' => false)),
      'last_name'  => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
      'age'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('author_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Author';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'first_name' => 'Text',
      'last_name'  => 'Text',
      'email'      => 'Text',
      'age'        => 'Number',
    );
  }
}
