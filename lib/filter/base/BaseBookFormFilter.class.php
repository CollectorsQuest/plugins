<?php

/**
 * Book filter form base class.
 *
 * @package    Plugins
 * @subpackage filter
 * @author     IcePique Ltd.
 */
abstract class BaseBookFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'    => new sfWidgetFormPropelChoice(array('model' => 'Author', 'add_empty' => true)),
      'publisher_id' => new sfWidgetFormPropelChoice(array('model' => 'Publisher', 'add_empty' => true)),
      'title'        => new sfWidgetFormFilterInput(),
      'isbn'         => new sfWidgetFormFilterInput(),
      'price'        => new sfWidgetFormFilterInput(),
      'eblob'        => new sfWidgetFormFilterInput(),
      'deleted_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'author_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Author', 'column' => 'id')),
      'publisher_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Publisher', 'column' => 'id')),
      'title'        => new sfValidatorPass(array('required' => false)),
      'isbn'         => new sfValidatorPass(array('required' => false)),
      'price'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'eblob'        => new sfValidatorPass(array('required' => false)),
      'deleted_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('book_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Book';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'author_id'    => 'ForeignKey',
      'publisher_id' => 'ForeignKey',
      'title'        => 'Text',
      'isbn'         => 'Text',
      'price'        => 'Number',
      'eblob'        => 'Text',
      'deleted_at'   => 'Date',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
