<?php


/**
 * Base class that represents a query for the 'bookstore' table.
 *
 * 
 *
 * @method     BookstoreQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BookstoreQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     BookstoreQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     BookstoreQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 *
 * @method     BookstoreQuery groupById() Group by the id column
 * @method     BookstoreQuery groupByName() Group by the name column
 * @method     BookstoreQuery groupByLocation() Group by the location column
 * @method     BookstoreQuery groupByWebsite() Group by the website column
 *
 * @method     BookstoreQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BookstoreQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BookstoreQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Bookstore findOne(PropelPDO $con = null) Return the first Bookstore matching the query
 * @method     Bookstore findOneOrCreate(PropelPDO $con = null) Return the first Bookstore matching the query, or a new Bookstore object populated from the query conditions when no match is found
 *
 * @method     Bookstore findOneById(int $id) Return the first Bookstore filtered by the id column
 * @method     Bookstore findOneByName(string $name) Return the first Bookstore filtered by the name column
 * @method     Bookstore findOneByLocation(string $location) Return the first Bookstore filtered by the location column
 * @method     Bookstore findOneByWebsite(string $website) Return the first Bookstore filtered by the website column
 *
 * @method     array findById(int $id) Return Bookstore objects filtered by the id column
 * @method     array findByName(string $name) Return Bookstore objects filtered by the name column
 * @method     array findByLocation(string $location) Return Bookstore objects filtered by the location column
 * @method     array findByWebsite(string $website) Return Bookstore objects filtered by the website column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBookstoreQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseBookstoreQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Bookstore', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BookstoreQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return    BookstoreQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BookstoreQuery) {
            return $criteria;
        }
        $query = new BookstoreQuery();
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
     * @return    Bookstore|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ((null !== ($obj = BookstorePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
     * @return    BookstoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        return $this->addUsingAlias(BookstorePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return    BookstoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        return $this->addUsingAlias(BookstorePeer::ID, $keys, Criteria::IN);
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
     * @return    BookstoreQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }
        return $this->addUsingAlias(BookstorePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookstoreQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }
        return $this->addUsingAlias(BookstorePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the location column
     *
     * Example usage:
     * <code>
     * $query->filterByLocation('fooValue');   // WHERE location = 'fooValue'
     * $query->filterByLocation('%fooValue%'); // WHERE location LIKE '%fooValue%'
     * </code>
     *
     * @param     string $location The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookstoreQuery The current query, for fluid interface
     */
    public function filterByLocation($location = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($location)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $location)) {
                $location = str_replace('*', '%', $location);
                $comparison = Criteria::LIKE;
            }
        }
        return $this->addUsingAlias(BookstorePeer::LOCATION, $location, $comparison);
    }

    /**
     * Filter the query on the website column
     *
     * Example usage:
     * <code>
     * $query->filterByWebsite('fooValue');   // WHERE website = 'fooValue'
     * $query->filterByWebsite('%fooValue%'); // WHERE website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $website The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookstoreQuery The current query, for fluid interface
     */
    public function filterByWebsite($website = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($website)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $website)) {
                $website = str_replace('*', '%', $website);
                $comparison = Criteria::LIKE;
            }
        }
        return $this->addUsingAlias(BookstorePeer::WEBSITE, $website, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param     Bookstore $bookstore Object to remove from the list of results
     *
     * @return    BookstoreQuery The current query, for fluid interface
     */
    public function prune($bookstore = null)
    {
        if ($bookstore) {
            $this->addUsingAlias(BookstorePeer::ID, $bookstore->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}