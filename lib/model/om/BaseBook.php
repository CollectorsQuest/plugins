<?php


/**
 * Base class that represents a row from the 'book' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBook extends BaseObject  implements Persistent
{

  /**
   * Peer class name
   */
  const PEER = 'BookPeer';

  /**
   * The Peer class.
   * Instance provides a convenient way of calling static methods on a class
   * that calling code may not be able to identify.
   * @var        BookPeer
   */
  protected static $peer;

  /**
   * The value for the id field.
   * @var        int
   */
  protected $id;

  /**
   * The value for the author_id field.
   * @var        int
   */
  protected $author_id;

  /**
   * The value for the publisher_id field.
   * @var        int
   */
  protected $publisher_id;

  /**
   * The value for the title field.
   * @var        string
   */
  protected $title;

  /**
   * The value for the isbn field.
   * @var        string
   */
  protected $isbn;

  /**
   * The value for the price field.
   * @var        double
   */
  protected $price;

  /**
   * The value for the eblob field.
   * @var        string
   */
  protected $eblob;

  /**
   * The value for the deleted_at field.
   * @var        string
   */
  protected $deleted_at;

  /**
   * The value for the created_at field.
   * @var        string
   */
  protected $created_at;

  /**
   * The value for the updated_at field.
   * @var        string
   */
  protected $updated_at;

  /**
   * @var        Author
   */
  protected $aAuthor;

  /**
   * @var        Publisher
   */
  protected $aPublisher;

  /**
   * Flag to prevent endless save loop, if this object is referenced
   * by another object which falls in this transaction.
   * @var        boolean
   */
  protected $alreadyInSave = false;

  /**
   * Flag to prevent endless validation loop, if this object is referenced
   * by another object which falls in this transaction.
   * @var        boolean
   */
  protected $alreadyInValidation = false;

  /**
   * Get the [id] column value.
   * 
   * @return     int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the [author_id] column value.
   * 
   * @return     int
   */
  public function getAuthorId()
  {
    return $this->author_id;
  }

  /**
   * Get the [publisher_id] column value.
   * 
   * @return     int
   */
  public function getPublisherId()
  {
    return $this->publisher_id;
  }

  /**
   * Get the [title] column value.
   * 
   * @return     string
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Get the [isbn] column value.
   * 
   * @return     string
   */
  public function getIsbn()
  {
    return $this->isbn;
  }

  /**
   * Get the [price] column value.
   * 
   * @return     double
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Get the [eblob] column value.
   * 
   * @return     string
   */
  public function getEblob()
  {
    return $this->eblob;
  }

  /**
   * Get the [optionally formatted] temporal [deleted_at] column value.
   * 
   *
   * @param      string $format The date/time format string (either date()-style or strftime()-style).
   *              If format is NULL, then the raw DateTime object will be returned.
   * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
   * @throws     PropelException - if unable to parse/validate the date/time value.
   */
  public function getDeletedAt($format = 'Y-m-d H:i:s')
  {
    if ($this->deleted_at === null)
    {
      return null;
    }


    if ($this->deleted_at === '0000-00-00 00:00:00')
    {
      // while technically this is not a default value of NULL,
      // this seems to be closest in meaning.
      return null;
    }
    else
    {
      try
      {
        $dt = new DateTime($this->deleted_at);
      }
      catch (Exception $x)
      {
        throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->deleted_at, true), $x);
      }
    }

    if ($format === null)
    {
      // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
      return $dt;
    }
    elseif (strpos($format, '%') !== false)
    {
      return strftime($format, $dt->format('U'));
    }
    else
    {
      return $dt->format($format);
    }
  }

  /**
   * Get the [optionally formatted] temporal [created_at] column value.
   * 
   *
   * @param      string $format The date/time format string (either date()-style or strftime()-style).
   *              If format is NULL, then the raw DateTime object will be returned.
   * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
   * @throws     PropelException - if unable to parse/validate the date/time value.
   */
  public function getCreatedAt($format = 'Y-m-d H:i:s')
  {
    if ($this->created_at === null)
    {
      return null;
    }


    if ($this->created_at === '0000-00-00 00:00:00')
    {
      // while technically this is not a default value of NULL,
      // this seems to be closest in meaning.
      return null;
    }
    else
    {
      try
      {
        $dt = new DateTime($this->created_at);
      }
      catch (Exception $x)
      {
        throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
      }
    }

    if ($format === null)
    {
      // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
      return $dt;
    }
    elseif (strpos($format, '%') !== false)
    {
      return strftime($format, $dt->format('U'));
    }
    else
    {
      return $dt->format($format);
    }
  }

  /**
   * Get the [optionally formatted] temporal [updated_at] column value.
   * 
   *
   * @param      string $format The date/time format string (either date()-style or strftime()-style).
   *              If format is NULL, then the raw DateTime object will be returned.
   * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
   * @throws     PropelException - if unable to parse/validate the date/time value.
   */
  public function getUpdatedAt($format = 'Y-m-d H:i:s')
  {
    if ($this->updated_at === null)
    {
      return null;
    }


    if ($this->updated_at === '0000-00-00 00:00:00')
    {
      // while technically this is not a default value of NULL,
      // this seems to be closest in meaning.
      return null;
    }
    else
    {
      try
      {
        $dt = new DateTime($this->updated_at);
      }
      catch (Exception $x)
      {
        throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
      }
    }

    if ($format === null)
    {
      // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
      return $dt;
    }
    elseif (strpos($format, '%') !== false)
    {
      return strftime($format, $dt->format('U'));
    }
    else
    {
      return $dt->format($format);
    }
  }

  /**
   * Set the value of [id] column.
   * 
   * @param      int $v new value
   * @return     Book The current object (for fluent API support)
   */
  public function setId($v)
  {
    if ($v !== null)
    {
      $v = (int) $v;
    }

    if ($this->id !== $v)
    {
      $this->id = $v;
      $this->modifiedColumns[] = BookPeer::ID;
    }

    return $this;
  }

  /**
   * Set the value of [author_id] column.
   * 
   * @param      int $v new value
   * @return     Book The current object (for fluent API support)
   */
  public function setAuthorId($v)
  {
    if ($v !== null)
    {
      $v = (int) $v;
    }

    if ($this->author_id !== $v)
    {
      $this->author_id = $v;
      $this->modifiedColumns[] = BookPeer::AUTHOR_ID;
    }

    if ($this->aAuthor !== null && $this->aAuthor->getId() !== $v)
    {
      $this->aAuthor = null;
    }

    return $this;
  }

  /**
   * Set the value of [publisher_id] column.
   * 
   * @param      int $v new value
   * @return     Book The current object (for fluent API support)
   */
  public function setPublisherId($v)
  {
    if ($v !== null)
    {
      $v = (int) $v;
    }

    if ($this->publisher_id !== $v)
    {
      $this->publisher_id = $v;
      $this->modifiedColumns[] = BookPeer::PUBLISHER_ID;
    }

    if ($this->aPublisher !== null && $this->aPublisher->getId() !== $v)
    {
      $this->aPublisher = null;
    }

    return $this;
  }

  /**
   * Set the value of [title] column.
   * 
   * @param      string $v new value
   * @return     Book The current object (for fluent API support)
   */
  public function setTitle($v)
  {
    if ($v !== null)
    {
      $v = (string) $v;
    }

    if ($this->title !== $v)
    {
      $this->title = $v;
      $this->modifiedColumns[] = BookPeer::TITLE;
    }

    return $this;
  }

  /**
   * Set the value of [isbn] column.
   * 
   * @param      string $v new value
   * @return     Book The current object (for fluent API support)
   */
  public function setIsbn($v)
  {
    if ($v !== null)
    {
      $v = (string) $v;
    }

    if ($this->isbn !== $v)
    {
      $this->isbn = $v;
      $this->modifiedColumns[] = BookPeer::ISBN;
    }

    return $this;
  }

  /**
   * Set the value of [price] column.
   * 
   * @param      double $v new value
   * @return     Book The current object (for fluent API support)
   */
  public function setPrice($v)
  {
    if ($v !== null)
    {
      $v = (double) $v;
    }

    if ($this->price !== $v)
    {
      $this->price = $v;
      $this->modifiedColumns[] = BookPeer::PRICE;
    }

    return $this;
  }

  /**
   * Set the value of [eblob] column.
   * 
   * @param      string $v new value
   * @return     Book The current object (for fluent API support)
   */
  public function setEblob($v)
  {
    if ($v !== null)
    {
      $v = (string) $v;
    }

    if ($this->eblob !== $v)
    {
      $this->eblob = $v;
      $this->modifiedColumns[] = BookPeer::EBLOB;
    }

    return $this;
  }

  /**
   * Sets the value of [deleted_at] column to a normalized version of the date/time value specified.
   * 
   * @param      mixed $v string, integer (timestamp), or DateTime value.
   *               Empty strings are treated as NULL.
   * @return     Book The current object (for fluent API support)
   */
  public function setDeletedAt($v)
  {
    $dt = PropelDateTime::newInstance($v, null, 'DateTime');
    if ($this->deleted_at !== null || $dt !== null)
    {
      $currentDateAsString = ($this->deleted_at !== null && $tmpDt = new DateTime($this->deleted_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
      $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
      if ($currentDateAsString !== $newDateAsString)
      {
        $this->deleted_at = $newDateAsString;
        $this->modifiedColumns[] = BookPeer::DELETED_AT;
      }
    }

    return $this;
  }

  /**
   * Sets the value of [created_at] column to a normalized version of the date/time value specified.
   * 
   * @param      mixed $v string, integer (timestamp), or DateTime value.
   *               Empty strings are treated as NULL.
   * @return     Book The current object (for fluent API support)
   */
  public function setCreatedAt($v)
  {
    $dt = PropelDateTime::newInstance($v, null, 'DateTime');
    if ($this->created_at !== null || $dt !== null)
    {
      $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
      $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
      if ($currentDateAsString !== $newDateAsString)
      {
        $this->created_at = $newDateAsString;
        $this->modifiedColumns[] = BookPeer::CREATED_AT;
      }
    }

    return $this;
  }

  /**
   * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
   * 
   * @param      mixed $v string, integer (timestamp), or DateTime value.
   *               Empty strings are treated as NULL.
   * @return     Book The current object (for fluent API support)
   */
  public function setUpdatedAt($v)
  {
    $dt = PropelDateTime::newInstance($v, null, 'DateTime');
    if ($this->updated_at !== null || $dt !== null)
    {
      $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
      $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
      if ($currentDateAsString !== $newDateAsString)
      {
        $this->updated_at = $newDateAsString;
        $this->modifiedColumns[] = BookPeer::UPDATED_AT;
      }
    }

    return $this;
  }

  /**
   * Indicates whether the columns in this object are only set to default values.
   *
   * This method can be used in conjunction with isModified() to indicate whether an object is both
   * modified _and_ has some values set which are non-default.
   *
   * @return     boolean Whether the columns in this object are only been set with default values.
   */
  public function hasOnlyDefaultValues()
  {
    // otherwise, everything was equal, so return TRUE
    return true;
  }

  /**
   * Hydrates (populates) the object variables with values from the database resultset.
   *
   * An offset (0-based "start column") is specified so that objects can be hydrated
   * with a subset of the columns in the resultset rows.  This is needed, for example,
   * for results of JOIN queries where the resultset row includes columns from two or
   * more tables.
   *
   * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
   * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
   * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
   * @return     int next starting column
   * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
   */
  public function hydrate($row, $startcol = 0, $rehydrate = false)
  {
    try
    {

      $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
      $this->author_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
      $this->publisher_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
      $this->title = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
      $this->isbn = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
      $this->price = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
      $this->eblob = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
      $this->deleted_at = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
      $this->created_at = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
      $this->updated_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
      $this->resetModified();

      $this->setNew(false);

      if ($rehydrate)
      {
        $this->ensureConsistency();
      }

      return $startcol + 10; // 10 = BookPeer::NUM_HYDRATE_COLUMNS.

    }
    catch (Exception $e)
    {
      throw new PropelException("Error populating Book object", $e);
    }
  }

  /**
   * Checks and repairs the internal consistency of the object.
   *
   * This method is executed after an already-instantiated object is re-hydrated
   * from the database.  It exists to check any foreign keys to make sure that
   * the objects related to the current object are correct based on foreign key.
   *
   * You can override this method in the stub class, but you should always invoke
   * the base method from the overridden method (i.e. parent::ensureConsistency()),
   * in case your model changes.
   *
   * @throws     PropelException
   */
  public function ensureConsistency()
  {

    if ($this->aAuthor !== null && $this->author_id !== $this->aAuthor->getId())
    {
      $this->aAuthor = null;
    }
    if ($this->aPublisher !== null && $this->publisher_id !== $this->aPublisher->getId())
    {
      $this->aPublisher = null;
    }
  }

  /**
   * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
   *
   * This will only work if the object has been saved and has a valid primary key set.
   *
   * @param      boolean $deep (optional) Whether to also de-associated any related objects.
   * @param      PropelPDO $con (optional) The PropelPDO connection to use.
   * @return     void
   * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
   */
  public function reload($deep = false, PropelPDO $con = null)
  {
    if ($this->isDeleted())
    {
      throw new PropelException("Cannot reload a deleted object.");
    }

    if ($this->isNew())
    {
      throw new PropelException("Cannot reload an unsaved object.");
    }

    if ($con === null)
    {
      $con = Propel::getConnection(BookPeer::DATABASE_NAME, Propel::CONNECTION_READ);
    }

    // We don't need to alter the object instance pool; we're just modifying this instance
    // already in the pool.

    $stmt = BookPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
    $row = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if (!$row)
    {
      throw new PropelException('Cannot find matching row in the database to reload object values.');
    }
    $this->hydrate($row, 0, true); // rehydrate

    if ($deep) {  // also de-associate any related objects?

      $this->aAuthor = null;
      $this->aPublisher = null;
    }
  }

  /**
   * Removes this object from datastore and sets delete attribute.
   *
   * @param      PropelPDO $con
   * @return     void
   * @throws     PropelException
   * @see        BaseObject::setDeleted()
   * @see        BaseObject::isDeleted()
   */
  public function delete(PropelPDO $con = null)
  {
    if ($this->isDeleted())
    {
      throw new PropelException("This object has already been deleted.");
    }

    if ($con === null)
    {
      $con = Propel::getConnection(BookPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
    }

    $con->beginTransaction();
    try
    {
      $deleteQuery = BookQuery::create()
        ->filterByPrimaryKey($this->getPrimaryKey());
      $ret = $this->preDelete($con);
      // soft_delete behavior
      if (!empty($ret) && BookQuery::isSoftDeleteEnabled())
      {
        $this->keepUpdateDateUnchanged();
        $this->setDeletedAt(time());
        $this->save($con);
        $this->postDelete($con);
        $con->commit();
        BookPeer::removeInstanceFromPool($this);
        return;
      }

      // symfony_behaviors behavior
      foreach (sfMixer::getCallables('BaseBook:delete:pre') as $callable)
      {
        if (call_user_func($callable, $this, $con))
        {
          $con->commit();
          return;
        }
      }

      if ($ret)
      {
        $deleteQuery->delete($con);
        $this->postDelete($con);
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables('BaseBook:delete:post') as $callable)
        {
          call_user_func($callable, $this, $con);
        }

        $con->commit();
        $this->setDeleted(true);
      }
      else
      {
        $con->commit();
      }
    }
    catch (PropelException $e)
    {
      $con->rollBack();
      throw $e;
    }
  }

  /**
   * Persists this object to the database.
   *
   * If the object is new, it inserts it; otherwise an update is performed.
   * All modified related objects will also be persisted in the doSave()
   * method.  This method wraps all precipitate database operations in a
   * single transaction.
   *
   * @param      PropelPDO $con
   * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
   * @throws     PropelException
   * @see        doSave()
   */
  public function save(PropelPDO $con = null)
  {
    if ($this->isDeleted())
    {
      throw new PropelException("You cannot save an object that has been deleted.");
    }

    if ($con === null)
    {
      $con = Propel::getConnection(BookPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
    }

    $con->beginTransaction();
    $isInsert = $this->isNew();
    try
    {
      $ret = $this->preSave($con);
      // symfony_behaviors behavior
      foreach (sfMixer::getCallables('BaseBook:save:pre') as $callable)
      {
        if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
        {
          $con->commit();
          return $affectedRows;
        }
      }

      if ($isInsert)
      {
        $ret = $ret && $this->preInsert($con);
        // timestampable behavior
        if (!$this->isColumnModified(BookPeer::CREATED_AT))
        {
          $this->setCreatedAt(time());
        }
        if (!$this->isColumnModified(BookPeer::UPDATED_AT))
        {
          $this->setUpdatedAt(time());
        }
      }
      else
      {
        $ret = $ret && $this->preUpdate($con);
        // timestampable behavior
        if ($this->isModified() && !$this->isColumnModified(BookPeer::UPDATED_AT))
        {
          $this->setUpdatedAt(time());
        }
      }
      if ($ret)
      {
        $affectedRows = $this->doSave($con);
        if ($isInsert)
        {
          $this->postInsert($con);
        }
        else
        {
          $this->postUpdate($con);
        }
        $this->postSave($con);
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables('BaseBook:save:post') as $callable)
        {
          call_user_func($callable, $this, $con, $affectedRows);
        }

        BookPeer::addInstanceToPool($this);
      }
      else
      {
        $affectedRows = 0;
      }
      $con->commit();
      return $affectedRows;
    }
    catch (PropelException $e)
    {
      $con->rollBack();
      throw $e;
    }
  }

  /**
   * Performs the work of inserting or updating the row in the database.
   *
   * If the object is new, it inserts it; otherwise an update is performed.
   * All related objects are also updated in this method.
   *
   * @param      PropelPDO $con
   * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
   * @throws     PropelException
   * @see        save()
   */
  protected function doSave(PropelPDO $con)
  {
    $affectedRows = 0; // initialize var to track total num of affected rows
    if (!$this->alreadyInSave)
    {
      $this->alreadyInSave = true;

      // We call the save method on the following object(s) if they
      // were passed to this object by their coresponding set
      // method.  This object relates to these object(s) by a
      // foreign key reference.

      if ($this->aAuthor !== null)
      {
        if ($this->aAuthor->isModified() || $this->aAuthor->isNew())
        {
          $affectedRows += $this->aAuthor->save($con);
        }
        $this->setAuthor($this->aAuthor);
      }

      if ($this->aPublisher !== null)
      {
        if ($this->aPublisher->isModified() || $this->aPublisher->isNew())
        {
          $affectedRows += $this->aPublisher->save($con);
        }
        $this->setPublisher($this->aPublisher);
      }

      if ($this->isNew() )
      {
        $this->modifiedColumns[] = BookPeer::ID;
      }

      // If this object has been modified, then save it to the database.
      if ($this->isModified())
      {
        if ($this->isNew())
        {
          $criteria = $this->buildCriteria();
          if ($criteria->keyContainsValue(BookPeer::ID) )
          {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BookPeer::ID.')');
          }

          $pk = BasePeer::doInsert($criteria, $con);
          $affectedRows += 1;
          $this->setId($pk);  //[IMV] update autoincrement primary key
          $this->setNew(false);
        }
        else
        {
          $affectedRows += BookPeer::doUpdate($this, $con);
        }

        $this->resetModified(); // [HL] After being saved an object is no longer 'modified'
      }

      $this->alreadyInSave = false;

    }
    return $affectedRows;
  }

  /**
   * Array of ValidationFailed objects.
   * @var        array ValidationFailed[]
   */
  protected $validationFailures = array();

  /**
   * Gets any ValidationFailed objects that resulted from last call to validate().
   *
   *
   * @return     array ValidationFailed[]
   * @see        validate()
   */
  public function getValidationFailures()
  {
    return $this->validationFailures;
  }

  /**
   * Validates the objects modified field values and all objects related to this table.
   *
   * If $columns is either a column name or an array of column names
   * only those columns are validated.
   *
   * @param      mixed $columns Column name or an array of column names.
   * @return     boolean Whether all columns pass validation.
   * @see        doValidate()
   * @see        getValidationFailures()
   */
  public function validate($columns = null)
  {
    $res = $this->doValidate($columns);
    if ($res === true)
    {
      $this->validationFailures = array();
      return true;
    }
    else
    {
      $this->validationFailures = $res;
      return false;
    }
  }

  /**
   * This function performs the validation work for complex object models.
   *
   * In addition to checking the current object, all related objects will
   * also be validated.  If all pass then <code>true</code> is returned; otherwise
   * an aggreagated array of ValidationFailed objects will be returned.
   *
   * @param      array $columns Array of column names to validate.
   * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
   */
  protected function doValidate($columns = null)
  {
    if (!$this->alreadyInValidation)
    {
      $this->alreadyInValidation = true;
      $retval = null;

      $failureMap = array();


      // We call the validate method on the following object(s) if they
      // were passed to this object by their coresponding set
      // method.  This object relates to these object(s) by a
      // foreign key reference.

      if ($this->aAuthor !== null)
      {
        if (!$this->aAuthor->validate($columns))
        {
          $failureMap = array_merge($failureMap, $this->aAuthor->getValidationFailures());
        }
      }

      if ($this->aPublisher !== null)
      {
        if (!$this->aPublisher->validate($columns))
        {
          $failureMap = array_merge($failureMap, $this->aPublisher->getValidationFailures());
        }
      }


      if (($retval = BookPeer::doValidate($this, $columns)) !== true)
      {
        $failureMap = array_merge($failureMap, $retval);
      }



      $this->alreadyInValidation = false;
    }

    return (!empty($failureMap) ? $failureMap : true);
  }

  /**
   * Retrieves a field from the object by name passed in as a string.
   *
   * @param      string $name name
   * @param      string $type The type of fieldname the $name is of:
   *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
   *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
   * @return     mixed Value of field.
   */
  public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
  {
    $pos = BookPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
    $field = $this->getByPosition($pos);
    return $field;
  }

  /**
   * Retrieves a field from the object by Position as specified in the xml schema.
   * Zero-based.
   *
   * @param      int $pos position in xml schema
   * @return     mixed Value of field at $pos
   */
  public function getByPosition($pos)
  {
    switch($pos)
    {
      case 0:
        return $this->getId();
        break;
      case 1:
        return $this->getAuthorId();
        break;
      case 2:
        return $this->getPublisherId();
        break;
      case 3:
        return $this->getTitle();
        break;
      case 4:
        return $this->getIsbn();
        break;
      case 5:
        return $this->getPrice();
        break;
      case 6:
        return $this->getEblob();
        break;
      case 7:
        return $this->getDeletedAt();
        break;
      case 8:
        return $this->getCreatedAt();
        break;
      case 9:
        return $this->getUpdatedAt();
        break;
      default:
        return null;
        break;
    }
  }

  /**
   * Exports the object as an array.
   *
   * You can specify the key type of the array by passing one of the class
   * type constants.
   *
   * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
   *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
   *                    Defaults to BasePeer::TYPE_PHPNAME.
   * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
   * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
   * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
   *
   * @return    array an associative array containing the field names (as keys) and field values
   */
  public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
  {
    if (isset($alreadyDumpedObjects['Book'][$this->getPrimaryKey()]))
    {
      return '*RECURSION*';
    }
    $alreadyDumpedObjects['Book'][$this->getPrimaryKey()] = true;
    $keys = BookPeer::getFieldNames($keyType);
    $result = array(
      $keys[0] => $this->getId(),
      $keys[1] => $this->getAuthorId(),
      $keys[2] => $this->getPublisherId(),
      $keys[3] => $this->getTitle(),
      $keys[4] => $this->getIsbn(),
      $keys[5] => $this->getPrice(),
      $keys[6] => $this->getEblob(),
      $keys[7] => $this->getDeletedAt(),
      $keys[8] => $this->getCreatedAt(),
      $keys[9] => $this->getUpdatedAt(),
    );
    if ($includeForeignObjects)
    {
      if (null !== $this->aAuthor)
      {
        $result['Author'] = $this->aAuthor->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
      }
      if (null !== $this->aPublisher)
      {
        $result['Publisher'] = $this->aPublisher->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
      }
    }
    return $result;
  }

  /**
   * Sets a field from the object by name passed in as a string.
   *
   * @param      string $name peer name
   * @param      mixed $value field value
   * @param      string $type The type of fieldname the $name is of:
   *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
   *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
   * @return     void
   */
  public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
  {
    $pos = BookPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
    return $this->setByPosition($pos, $value);
  }

  /**
   * Sets a field from the object by Position as specified in the xml schema.
   * Zero-based.
   *
   * @param      int $pos position in xml schema
   * @param      mixed $value field value
   * @return     void
   */
  public function setByPosition($pos, $value)
  {
    switch($pos)
    {
      case 0:
        $this->setId($value);
        break;
      case 1:
        $this->setAuthorId($value);
        break;
      case 2:
        $this->setPublisherId($value);
        break;
      case 3:
        $this->setTitle($value);
        break;
      case 4:
        $this->setIsbn($value);
        break;
      case 5:
        $this->setPrice($value);
        break;
      case 6:
        $this->setEblob($value);
        break;
      case 7:
        $this->setDeletedAt($value);
        break;
      case 8:
        $this->setCreatedAt($value);
        break;
      case 9:
        $this->setUpdatedAt($value);
        break;
    }
  }

  /**
   * Populates the object using an array.
   *
   * This is particularly useful when populating an object from one of the
   * request arrays (e.g. $_POST).  This method goes through the column
   * names, checking to see whether a matching key exists in populated
   * array. If so the setByName() method is called for that column.
   *
   * You can specify the key type of the array by additionally passing one
   * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
   * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
   * The default key type is the column's phpname (e.g. 'AuthorId')
   *
   * @param      array  $arr     An array to populate the object from.
   * @param      string $keyType The type of keys the array uses.
   * @return     void
   */
  public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
  {
    $keys = BookPeer::getFieldNames($keyType);

    if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
    if (array_key_exists($keys[1], $arr)) $this->setAuthorId($arr[$keys[1]]);
    if (array_key_exists($keys[2], $arr)) $this->setPublisherId($arr[$keys[2]]);
    if (array_key_exists($keys[3], $arr)) $this->setTitle($arr[$keys[3]]);
    if (array_key_exists($keys[4], $arr)) $this->setIsbn($arr[$keys[4]]);
    if (array_key_exists($keys[5], $arr)) $this->setPrice($arr[$keys[5]]);
    if (array_key_exists($keys[6], $arr)) $this->setEblob($arr[$keys[6]]);
    if (array_key_exists($keys[7], $arr)) $this->setDeletedAt($arr[$keys[7]]);
    if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
    if (array_key_exists($keys[9], $arr)) $this->setUpdatedAt($arr[$keys[9]]);
  }

  /**
   * Build a Criteria object containing the values of all modified columns in this object.
   *
   * @return     Criteria The Criteria object containing all modified values.
   */
  public function buildCriteria()
  {
    $criteria = new Criteria(BookPeer::DATABASE_NAME);

    if ($this->isColumnModified(BookPeer::ID)) $criteria->add(BookPeer::ID, $this->id);
    if ($this->isColumnModified(BookPeer::AUTHOR_ID)) $criteria->add(BookPeer::AUTHOR_ID, $this->author_id);
    if ($this->isColumnModified(BookPeer::PUBLISHER_ID)) $criteria->add(BookPeer::PUBLISHER_ID, $this->publisher_id);
    if ($this->isColumnModified(BookPeer::TITLE)) $criteria->add(BookPeer::TITLE, $this->title);
    if ($this->isColumnModified(BookPeer::ISBN)) $criteria->add(BookPeer::ISBN, $this->isbn);
    if ($this->isColumnModified(BookPeer::PRICE)) $criteria->add(BookPeer::PRICE, $this->price);
    if ($this->isColumnModified(BookPeer::EBLOB)) $criteria->add(BookPeer::EBLOB, $this->eblob);
    if ($this->isColumnModified(BookPeer::DELETED_AT)) $criteria->add(BookPeer::DELETED_AT, $this->deleted_at);
    if ($this->isColumnModified(BookPeer::CREATED_AT)) $criteria->add(BookPeer::CREATED_AT, $this->created_at);
    if ($this->isColumnModified(BookPeer::UPDATED_AT)) $criteria->add(BookPeer::UPDATED_AT, $this->updated_at);

    return $criteria;
  }

  /**
   * Builds a Criteria object containing the primary key for this object.
   *
   * Unlike buildCriteria() this method includes the primary key values regardless
   * of whether or not they have been modified.
   *
   * @return     Criteria The Criteria object containing value(s) for primary key(s).
   */
  public function buildPkeyCriteria()
  {
    $criteria = new Criteria(BookPeer::DATABASE_NAME);
    $criteria->add(BookPeer::ID, $this->id);

    return $criteria;
  }

  /**
   * Returns the primary key for this object (row).
   * @return     int
   */
  public function getPrimaryKey()
  {
    return $this->getId();
  }

  /**
   * Generic method to set the primary key (id column).
   *
   * @param      int $key Primary key.
   * @return     void
   */
  public function setPrimaryKey($key)
  {
    $this->setId($key);
  }

  /**
   * Returns true if the primary key for this object is null.
   * @return     boolean
   */
  public function isPrimaryKeyNull()
  {
    return null === $this->getId();
  }

  /**
   * Sets contents of passed object to values from current object.
   *
   * If desired, this method can also make copies of all associated (fkey referrers)
   * objects.
   *
   * @param      object $copyObj An object of Book (or compatible) type.
   * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
   * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
   * @throws     PropelException
   */
  public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
  {
    $copyObj->setAuthorId($this->getAuthorId());
    $copyObj->setPublisherId($this->getPublisherId());
    $copyObj->setTitle($this->getTitle());
    $copyObj->setIsbn($this->getIsbn());
    $copyObj->setPrice($this->getPrice());
    $copyObj->setEblob($this->getEblob());
    $copyObj->setDeletedAt($this->getDeletedAt());
    $copyObj->setCreatedAt($this->getCreatedAt());
    $copyObj->setUpdatedAt($this->getUpdatedAt());
    if ($makeNew)
    {
      $copyObj->setNew(true);
      $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
    }
  }

  /**
   * Makes a copy of this object that will be inserted as a new row in table when saved.
   * It creates a new object filling in the simple attributes, but skipping any primary
   * keys that are defined for the table.
   *
   * If desired, this method can also make copies of all associated (fkey referrers)
   * objects.
   *
   * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
   * @return     Book Clone of current object.
   * @throws     PropelException
   */
  public function copy($deepCopy = false)
  {
    // we use get_class(), because this might be a subclass
    $clazz = get_class($this);
    $copyObj = new $clazz();
    $this->copyInto($copyObj, $deepCopy);
    return $copyObj;
  }

  /**
   * Returns a peer instance associated with this om.
   *
   * Since Peer classes are not to have any instance attributes, this method returns the
   * same instance for all member of this class. The method could therefore
   * be static, but this would prevent one from overriding the behavior.
   *
   * @return     BookPeer
   */
  public function getPeer()
  {
    if (self::$peer === null)
    {
      self::$peer = new BookPeer();
    }
    return self::$peer;
  }

  /**
   * Declares an association between this object and a Author object.
   *
   * @param      Author $v
   * @return     Book The current object (for fluent API support)
   * @throws     PropelException
   */
  public function setAuthor(Author $v = null)
  {
    if ($v === null)
    {
      $this->setAuthorId(NULL);
    }
    else
    {
      $this->setAuthorId($v->getId());
    }

    $this->aAuthor = $v;

    // Add binding for other direction of this n:n relationship.
    // If this object has already been added to the Author object, it will not be re-added.
    if ($v !== null)
    {
      $v->addBook($this);
    }

    return $this;
  }


  /**
   * Get the associated Author object
   *
   * @param      PropelPDO Optional Connection object.
   * @return     Author The associated Author object.
   * @throws     PropelException
   */
  public function getAuthor(PropelPDO $con = null)
  {
    if ($this->aAuthor === null && ($this->author_id !== null))
    {
      $this->aAuthor = AuthorQuery::create()->findPk($this->author_id, $con);
      /* The following can be used additionally to
        guarantee the related object contains a reference
        to this object.  This level of coupling may, however, be
        undesirable since it could result in an only partially populated collection
        in the referenced object.
        $this->aAuthor->addBooks($this);
       */
    }
    return $this->aAuthor;
  }

  /**
   * Declares an association between this object and a Publisher object.
   *
   * @param      Publisher $v
   * @return     Book The current object (for fluent API support)
   * @throws     PropelException
   */
  public function setPublisher(Publisher $v = null)
  {
    if ($v === null)
    {
      $this->setPublisherId(NULL);
    }
    else
    {
      $this->setPublisherId($v->getId());
    }

    $this->aPublisher = $v;

    // Add binding for other direction of this n:n relationship.
    // If this object has already been added to the Publisher object, it will not be re-added.
    if ($v !== null)
    {
      $v->addBook($this);
    }

    return $this;
  }


  /**
   * Get the associated Publisher object
   *
   * @param      PropelPDO Optional Connection object.
   * @return     Publisher The associated Publisher object.
   * @throws     PropelException
   */
  public function getPublisher(PropelPDO $con = null)
  {
    if ($this->aPublisher === null && ($this->publisher_id !== null))
    {
      $this->aPublisher = PublisherQuery::create()->findPk($this->publisher_id, $con);
      /* The following can be used additionally to
        guarantee the related object contains a reference
        to this object.  This level of coupling may, however, be
        undesirable since it could result in an only partially populated collection
        in the referenced object.
        $this->aPublisher->addBooks($this);
       */
    }
    return $this->aPublisher;
  }

  /**
   * Clears the current object and sets all attributes to their default values
   */
  public function clear()
  {
    $this->id = null;
    $this->author_id = null;
    $this->publisher_id = null;
    $this->title = null;
    $this->isbn = null;
    $this->price = null;
    $this->eblob = null;
    $this->deleted_at = null;
    $this->created_at = null;
    $this->updated_at = null;
    $this->alreadyInSave = false;
    $this->alreadyInValidation = false;
    $this->clearAllReferences();
    $this->resetModified();
    $this->setNew(true);
    $this->setDeleted(false);
  }

  /**
   * Resets all references to other model objects or collections of model objects.
   *
   * This method is a user-space workaround for PHP's inability to garbage collect
   * objects with circular references (even in PHP 5.3). This is currently necessary
   * when using Propel in certain daemon or large-volumne/high-memory operations.
   *
   * @param      boolean $deep Whether to also clear the references on all referrer objects.
   */
  public function clearAllReferences($deep = false)
  {
    if ($deep)
    {
    }

    $this->aAuthor = null;
    $this->aPublisher = null;
  }

  /**
   * Return the string representation of this object
   *
   * @return string
   */
  public function __toString()
  {
    return (string) $this->exportTo(BookPeer::DEFAULT_STRING_FORMAT);
  }

  // soft_delete behavior
  
  /**
   * Bypass the soft_delete behavior and force a hard delete of the current object
   */
  public function forceDelete(PropelPDO $con = null)
  {
    if($isSoftDeleteEnabled = BookPeer::isSoftDeleteEnabled())
    {
      BookPeer::disableSoftDelete();
    }
    $this->delete($con);
    if ($isSoftDeleteEnabled)
    {
      BookPeer::enableSoftDelete();
    }
  }
  
  /**
   * Undelete a row that was soft_deleted
   *
   * @return     int The number of rows affected by this update and any referring fk objects' save() operations.
   */
  public function unDelete(PropelPDO $con = null)
  {
    $this->setDeletedAt(null);
    return $this->save($con);
  }

  // timestampable behavior
  
  /**
   * Mark the current object so that the update date doesn't get updated during next save
   *
   * @return     Book The current object (for fluent API support)
   */
  public function keepUpdateDateUnchanged()
  {
    $this->modifiedColumns[] = BookPeer::UPDATED_AT;
    return $this;
  }

  /**
   * Catches calls to virtual methods
   */
  public function __call($name, $params)
  {
    
    // symfony_behaviors behavior
    if ($callable = sfMixer::getCallable('BaseBook:' . $name))
    {
      array_unshift($params, $this);
      return call_user_func_array($callable, $params);
    }

    return parent::__call($name, $params);
  }

}
