<?php

require_once(sfConfig::get('sf_plugins_dir') .'/iceLibsPlugin/lib/test/IceWebTestResponse.class.php');
require_once(sfConfig::get('sf_plugins_dir') .'/iceLibsPlugin/lib/test/IceWebTestRequest.class.php');

$configuration = $configuration->getApplicationConfiguration('frontend', 'test', true);
$context = sfContext::createInstance($configuration, 'default');
