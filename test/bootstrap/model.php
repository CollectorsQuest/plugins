<?php

include dirname(__FILE__).'/unit.php';

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'test', true);
new sfDatabaseManager($configuration);

// Set the default culture for the tests
sfPropel::setDefaultCulture('en_US');

// Get the Propel connection and temporarily turn off foreign key checks
$connection = Propel::getConnection('propel');
$connection->exec('SET FOREIGN_KEY_CHECKS = 0;');

$loader = new sfPropelData();

/**
 * If we do do not TRUNCATE TABLE, the primary keys are not started from 0 on each test
 * so instead of creating a new class from sfPropelData, we do the truncating here
 */
if (is_dir(sfConfig::get('sf_test_dir').'/fixtures/common'))
{
  $files = $loader->getFiles(sfConfig::get('sf_test_dir').'/fixtures/common');
  foreach ($files as $file)
  {
    $data = sfYaml::load($file);

    if ($data === null)
    {
      // no data
      continue;
    }

    $classes = array_keys($data);
    foreach (array_reverse($classes) as $class)
    {
      $class = trim($class);

      // Check that peer class exists before calling doDeleteAll()
      if (class_exists(constant($class.'::PEER')))
      {
        $table = constant(constant($class.'::PEER')."::TABLE_NAME");
        $connection->exec('TRUNCATE TABLE '. $table);
      }
    }
  }
}

// Run all the init SQL queries against the test database
if (is_file(dirname(__FILE__).'/../../data/sql/lib.model.init.sql'))
{
  $queries = file(dirname(__FILE__).'/../../data/sql/lib.model.init.sql');
  foreach ($queries as $query)
  {
    if ($query = trim($query))
    {
      $connection->exec($query);
    }
  }
}

// Load the fixtures
if (is_dir(sfConfig::get('sf_test_dir').'/fixtures/common'))
{
  $loader->loadData(array(
    sfConfig::get('sf_test_dir').'/fixtures/common'
  ));
}

// Set the foreign key checks to 1 again and start logging the mysql queries for debugging
$connection->exec('SET FOREIGN_KEY_CHECKS = 1;');
