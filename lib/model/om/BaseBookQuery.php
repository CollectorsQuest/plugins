<?php


/**
 * Base class that represents a query for the 'book' table.
 *
 * 
 *
 * @method     BookQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BookQuery orderByAuthorId($order = Criteria::ASC) Order by the author_id column
 * @method     BookQuery orderByPublisherId($order = Criteria::ASC) Order by the publisher_id column
 * @method     BookQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     BookQuery orderByIsbn($order = Criteria::ASC) Order by the isbn column
 * @method     BookQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     BookQuery orderByEblob($order = Criteria::ASC) Order by the eblob column
 * @method     BookQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 * @method     BookQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     BookQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     BookQuery groupById() Group by the id column
 * @method     BookQuery groupByAuthorId() Group by the author_id column
 * @method     BookQuery groupByPublisherId() Group by the publisher_id column
 * @method     BookQuery groupByTitle() Group by the title column
 * @method     BookQuery groupByIsbn() Group by the isbn column
 * @method     BookQuery groupByPrice() Group by the price column
 * @method     BookQuery groupByEblob() Group by the eblob column
 * @method     BookQuery groupByDeletedAt() Group by the deleted_at column
 * @method     BookQuery groupByCreatedAt() Group by the created_at column
 * @method     BookQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     BookQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BookQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BookQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     BookQuery leftJoinAuthor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Author relation
 * @method     BookQuery rightJoinAuthor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Author relation
 * @method     BookQuery innerJoinAuthor($relationAlias = null) Adds a INNER JOIN clause to the query using the Author relation
 *
 * @method     BookQuery leftJoinPublisher($relationAlias = null) Adds a LEFT JOIN clause to the query using the Publisher relation
 * @method     BookQuery rightJoinPublisher($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Publisher relation
 * @method     BookQuery innerJoinPublisher($relationAlias = null) Adds a INNER JOIN clause to the query using the Publisher relation
 *
 * @method     Book findOne(PropelPDO $con = null) Return the first Book matching the query
 * @method     Book findOneOrCreate(PropelPDO $con = null) Return the first Book matching the query, or a new Book object populated from the query conditions when no match is found
 *
 * @method     Book findOneById(int $id) Return the first Book filtered by the id column
 * @method     Book findOneByAuthorId(int $author_id) Return the first Book filtered by the author_id column
 * @method     Book findOneByPublisherId(int $publisher_id) Return the first Book filtered by the publisher_id column
 * @method     Book findOneByTitle(string $title) Return the first Book filtered by the title column
 * @method     Book findOneByIsbn(string $isbn) Return the first Book filtered by the isbn column
 * @method     Book findOneByPrice(double $price) Return the first Book filtered by the price column
 * @method     Book findOneByEblob(string $eblob) Return the first Book filtered by the eblob column
 * @method     Book findOneByDeletedAt(string $deleted_at) Return the first Book filtered by the deleted_at column
 * @method     Book findOneByCreatedAt(string $created_at) Return the first Book filtered by the created_at column
 * @method     Book findOneByUpdatedAt(string $updated_at) Return the first Book filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Book objects filtered by the id column
 * @method     array findByAuthorId(int $author_id) Return Book objects filtered by the author_id column
 * @method     array findByPublisherId(int $publisher_id) Return Book objects filtered by the publisher_id column
 * @method     array findByTitle(string $title) Return Book objects filtered by the title column
 * @method     array findByIsbn(string $isbn) Return Book objects filtered by the isbn column
 * @method     array findByPrice(double $price) Return Book objects filtered by the price column
 * @method     array findByEblob(string $eblob) Return Book objects filtered by the eblob column
 * @method     array findByDeletedAt(string $deleted_at) Return Book objects filtered by the deleted_at column
 * @method     array findByCreatedAt(string $created_at) Return Book objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Book objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBookQuery extends ModelCriteria
{
    
  // soft_delete behavior
  protected static $softDelete = true;
  protected $localSoftDelete = true;

    /**
     * Initializes internal state of BaseBookQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Book', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BookQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return    BookQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BookQuery) {
            return $criteria;
        }
        $query = new BookQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }
        return $query;
    }

    /**
     * Find object by primary key
     * Use instance pooling to avoid a database query if the object exists
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return    Book|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ((null !== ($obj = BookPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
            // the object is alredy in the instance pool
            return $obj;
        } else {
            // the object has not been requested yet, or the formatter is not an object formatter
            $criteria = $this->isKeepQuery() ? clone $this : $this;
            $stmt = $criteria
                ->filterByPrimaryKey($key)
                ->getSelectStatement($con);
            return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
        }
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        return $this
            ->filterByPrimaryKeys($keys)
            ->find($con);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        return $this->addUsingAlias(BookPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        return $this->addUsingAlias(BookPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }
        return $this->addUsingAlias(BookPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the author_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthorId(1234); // WHERE author_id = 1234
     * $query->filterByAuthorId(array(12, 34)); // WHERE author_id IN (12, 34)
     * $query->filterByAuthorId(array('min' => 12)); // WHERE author_id > 12
     * </code>
     *
     * @see       filterByAuthor()
     *
     * @param     mixed $authorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByAuthorId($authorId = null, $comparison = null)
    {
        if (is_array($authorId)) {
            $useMinMax = false;
            if (isset($authorId['min'])) {
                $this->addUsingAlias(BookPeer::AUTHOR_ID, $authorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($authorId['max'])) {
                $this->addUsingAlias(BookPeer::AUTHOR_ID, $authorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(BookPeer::AUTHOR_ID, $authorId, $comparison);
    }

    /**
     * Filter the query on the publisher_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPublisherId(1234); // WHERE publisher_id = 1234
     * $query->filterByPublisherId(array(12, 34)); // WHERE publisher_id IN (12, 34)
     * $query->filterByPublisherId(array('min' => 12)); // WHERE publisher_id > 12
     * </code>
     *
     * @see       filterByPublisher()
     *
     * @param     mixed $publisherId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByPublisherId($publisherId = null, $comparison = null)
    {
        if (is_array($publisherId)) {
            $useMinMax = false;
            if (isset($publisherId['min'])) {
                $this->addUsingAlias(BookPeer::PUBLISHER_ID, $publisherId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($publisherId['max'])) {
                $this->addUsingAlias(BookPeer::PUBLISHER_ID, $publisherId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(BookPeer::PUBLISHER_ID, $publisherId, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }
        return $this->addUsingAlias(BookPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the isbn column
     *
     * Example usage:
     * <code>
     * $query->filterByIsbn('fooValue');   // WHERE isbn = 'fooValue'
     * $query->filterByIsbn('%fooValue%'); // WHERE isbn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $isbn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByIsbn($isbn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isbn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $isbn)) {
                $isbn = str_replace('*', '%', $isbn);
                $comparison = Criteria::LIKE;
            }
        }
        return $this->addUsingAlias(BookPeer::ISBN, $isbn, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(BookPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(BookPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(BookPeer::PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the eblob column
     *
     * Example usage:
     * <code>
     * $query->filterByEblob('fooValue');   // WHERE eblob = 'fooValue'
     * $query->filterByEblob('%fooValue%'); // WHERE eblob LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eblob The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByEblob($eblob = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eblob)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eblob)) {
                $eblob = str_replace('*', '%', $eblob);
                $comparison = Criteria::LIKE;
            }
        }
        return $this->addUsingAlias(BookPeer::EBLOB, $eblob, $comparison);
    }

    /**
     * Filter the query on the deleted_at column
     *
     * Example usage:
     * <code>
     * $query->filterByDeletedAt('2011-03-14'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt('now'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt(array('max' => 'yesterday')); // WHERE deleted_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $deletedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByDeletedAt($deletedAt = null, $comparison = null)
    {
        if (is_array($deletedAt)) {
            $useMinMax = false;
            if (isset($deletedAt['min'])) {
                $this->addUsingAlias(BookPeer::DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedAt['max'])) {
                $this->addUsingAlias(BookPeer::DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(BookPeer::DELETED_AT, $deletedAt, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(BookPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(BookPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(BookPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(BookPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(BookPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(BookPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Author object
     *
     * @param     Author|PropelCollection $author The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByAuthor($author, $comparison = null)
    {
        if ($author instanceof Author) {
            return $this
                ->addUsingAlias(BookPeer::AUTHOR_ID, $author->getId(), $comparison);
        } elseif ($author instanceof PropelCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
            return $this
                ->addUsingAlias(BookPeer::AUTHOR_ID, $author->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAuthor() only accepts arguments of type Author or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Author relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function joinAuthor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Author');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Author');
        }

        return $this;
    }

    /**
     * Use the Author relation Author object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return    AuthorQuery A secondary query class using the current class as primary query
     */
    public function useAuthorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAuthor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Author', 'AuthorQuery');
    }

    /**
     * Filter the query by a related Publisher object
     *
     * @param     Publisher|PropelCollection $publisher The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByPublisher($publisher, $comparison = null)
    {
        if ($publisher instanceof Publisher) {
            return $this
                ->addUsingAlias(BookPeer::PUBLISHER_ID, $publisher->getId(), $comparison);
        } elseif ($publisher instanceof PropelCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
            return $this
                ->addUsingAlias(BookPeer::PUBLISHER_ID, $publisher->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPublisher() only accepts arguments of type Publisher or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Publisher relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function joinPublisher($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Publisher');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Publisher');
        }

        return $this;
    }

    /**
     * Use the Publisher relation Publisher object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return    PublisherQuery A secondary query class using the current class as primary query
     */
    public function usePublisherQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPublisher($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Publisher', 'PublisherQuery');
    }

    /**
     * Exclude object from result
     *
     * @param     Book $book Object to remove from the list of results
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function prune($book = null)
    {
        if ($book) {
            $this->addUsingAlias(BookPeer::ID, $book->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Code to execute before every SELECT statement
     *
     * @param     PropelPDO $con The connection object used by the query
     */
    protected function basePreSelect(PropelPDO $con)
    {
    // soft_delete behavior
    if (BookQuery::isSoftDeleteEnabled() && $this->localSoftDelete)
    {
      $this->addUsingAlias(BookPeer::DELETED_AT, null, Criteria::ISNULL);
    }
    else
    {
      BookPeer::enableSoftDelete();
    }

        return $this->preSelect($con);
    }

    /**
     * Code to execute before every DELETE statement
     *
     * @param     PropelPDO $con The connection object used by the query
     */
    protected function basePreDelete(PropelPDO $con)
    {
    // soft_delete behavior
    if (BookQuery::isSoftDeleteEnabled() && $this->localSoftDelete)
    {
      return $this->softDelete($con);
    }
    else
    {
      return $this->hasWhereClause() ? $this->forceDelete($con) : $this->forceDeleteAll($con);
    }

        return $this->preDelete($con);
    }

  // soft_delete behavior
  
  /**
   * Temporarily disable the filter on deleted rows
   * Valid only for the current query
   *
   * @see BookQuery::disableSoftDelete() to disable the filter for more than one query
   *
   * @return BookQuery The current query, for fluid interface
   */
  public function includeDeleted()
  {
    $this->localSoftDelete = false;
    return $this;
  }
  
  /**
   * Soft delete the selected rows
   *
   * @param      PropelPDO $con an optional connection object
   *
   * @return    int Number of updated rows
   */
  public function softDelete(PropelPDO $con = null)
  {
    return $this->update(array('DeletedAt' => time()), $con);
  }
  
  /**
   * Bypass the soft_delete behavior and force a hard delete of the selected rows
   *
   * @param      PropelPDO $con an optional connection object
   *
   * @return    int Number of deleted rows
   */
  public function forceDelete(PropelPDO $con = null)
  {
    return BookPeer::doForceDelete($this, $con);
  }
  
  /**
   * Bypass the soft_delete behavior and force a hard delete of all the rows
   *
   * @param      PropelPDO $con an optional connection object
   *
   * @return    int Number of deleted rows
   */
  public function forceDeleteAll(PropelPDO $con = null)
  {
    return BookPeer::doForceDeleteAll($con);}
  
  /**
   * Undelete selected rows
   *
   * @param      PropelPDO $con an optional connection object
   *
   * @return    int The number of rows affected by this update and any referring fk objects' save() operations.
   */
  public function unDelete(PropelPDO $con = null)
  {
    return $this->update(array('DeletedAt' => null), $con);
  }
  
  /**
   * Enable the soft_delete behavior for this model
   */
  public static function enableSoftDelete()
  {
    self::$softDelete = true;
  }
  
  /**
   * Disable the soft_delete behavior for this model
   */
  public static function disableSoftDelete()
  {
    self::$softDelete = false;
  }
  
  /**
   * Check the soft_delete behavior for this model
   *
   * @return boolean true if the soft_delete behavior is enabled
   */
  public static function isSoftDeleteEnabled()
  {
    return self::$softDelete;
  }

  // timestampable behavior
  
  /**
   * Filter by the latest updated
   *
   * @param      int $nbDays Maximum age of the latest update in days
   *
   * @return     BookQuery The current query, for fluid interface
   */
  public function recentlyUpdated($nbDays = 7)
  {
    return $this->addUsingAlias(BookPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
  }
  
  /**
   * Filter by the latest created
   *
   * @param      int $nbDays Maximum age of in days
   *
   * @return     BookQuery The current query, for fluid interface
   */
  public function recentlyCreated($nbDays = 7)
  {
    return $this->addUsingAlias(BookPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
  }
  
  /**
   * Order by update date desc
   *
   * @return     BookQuery The current query, for fluid interface
   */
  public function lastUpdatedFirst()
  {
    return $this->addDescendingOrderByColumn(BookPeer::UPDATED_AT);
  }
  
  /**
   * Order by update date asc
   *
   * @return     BookQuery The current query, for fluid interface
   */
  public function firstUpdatedFirst()
  {
    return $this->addAscendingOrderByColumn(BookPeer::UPDATED_AT);
  }
  
  /**
   * Order by create date desc
   *
   * @return     BookQuery The current query, for fluid interface
   */
  public function lastCreatedFirst()
  {
    return $this->addDescendingOrderByColumn(BookPeer::CREATED_AT);
  }
  
  /**
   * Order by create date asc
   *
   * @return     BookQuery The current query, for fluid interface
   */
  public function firstCreatedFirst()
  {
    return $this->addAscendingOrderByColumn(BookPeer::CREATED_AT);
  }

}