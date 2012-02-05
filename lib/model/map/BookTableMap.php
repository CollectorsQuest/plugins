<?php



/**
 * This class defines the structure of the 'book' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class BookTableMap extends TableMap
{

  /**
   * The (dot-path) name of this class
   */
  const CLASS_NAME = 'lib.model.map.BookTableMap';

  /**
   * Initialize the table attributes, columns and validators
   * Relations are not initialized by this method since they are lazy loaded
   *
   * @return     void
   * @throws     PropelException
   */
  public function initialize()
  {
    // attributes
    $this->setName('book');
    $this->setPhpName('Book');
    $this->setClassname('Book');
    $this->setPackage('lib.model');
    $this->setUseIdGenerator(true);
    // columns
    $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
    $this->addForeignKey('AUTHOR_ID', 'AuthorId', 'INTEGER', 'author', 'ID', false, null, null);
    $this->addForeignKey('PUBLISHER_ID', 'PublisherId', 'INTEGER', 'publisher', 'ID', false, null, null);
    $this->addColumn('TITLE', 'Title', 'VARCHAR', false, 255, null);
    $this->addColumn('ISBN', 'Isbn', 'VARCHAR', false, 24, null);
    $this->addColumn('PRICE', 'Price', 'FLOAT', false, null, null);
    $this->addColumn('EBLOB', 'Eblob', 'LONGVARCHAR', false, null, null);
    $this->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null, null);
    $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
    $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    // validators
  }

  /**
   * Build the RelationMap objects for this table relationships
   */
  public function buildRelations()
  {
    $this->addRelation('Author', 'Author', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), null, null);
    $this->addRelation('Publisher', 'Publisher', RelationMap::MANY_TO_ONE, array('publisher_id' => 'id', ), null, null);
  }

  /**
   *
   * Gets the list of behaviors registered for this table
   *
   * @return array Associative array (name => parameters) of behaviors
   */
  public function getBehaviors()
  {
    return array(
      'soft_delete' => array('deleted_column' => 'deleted_at', ),
      'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
      'symfony' => array('form' => 'true', 'filter' => 'true', ),
      'symfony_behaviors' => array(),
      'alternative_coding_standards' => array('brackets_newline' => 'true', 'remove_closing_comments' => 'true', 'use_whitespace' => 'true', 'tab_size' => '2', 'strip_comments' => 'false', ),
    );
  }

}
