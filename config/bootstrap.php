<?php

require_once dirname(__FILE__).'/ProjectConfiguration.class.php';

$app = isset($_SERVER['SF_APP']) ? $_SERVER['SF_APP'] : 'frontend';
$env = isset($_SERVER['SF_ENV']) ? $_SERVER['SF_ENV'] : 'dev';

if (isset($_COOKIE['sf_debug']) && $_COOKIE['sf_debug'] == '1' && $env == 'prod')
{
  $env = 'prod_debug';
}

define('SF_APP', $app);
define('SF_ENV', $env);

if (!defined('SVN_REVISION'))
{
  // For the dev environment, generate a random version to avoid problems with caching
  if ($env != 'prod')
  {
    define('SVN_REVISION', rand(1, 99999));
  }
  else if (file_exists(dirname(__FILE__).'/../REVISION'))
  {
    define('SVN_REVISION', (int) file_get_contents(dirname(__FILE__).'/../REVISION'));
  }
  else
  {
    $svn = file(dirname(__FILE__).'/../.svn/entries');
    define('SVN_REVISION', (int) $svn[3]); unset($svn);
  }
}

$configuration = ProjectConfiguration::getApplicationConfiguration($app, $env, $env != 'prod');

// Start the page request timer
IceTimer::getInstance()->startTimer();
