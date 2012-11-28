<?php

date_default_timezone_set('America/New_York');

define('SF_LIB_DIR', '/usr/lib/php/symfony');
require_once __DIR__.'/../plugins/iceLibsPlugin/lib/autoload/IceCoreAutoload.class.php';
require_once __DIR__.'/../plugins/iceLibsPlugin/lib/autoload/IceClassLoader.class.php';

IceClassLoader::initialize();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    mb_language('English');
    mb_internal_encoding('UTF-8');

    setlocale(LC_ALL, 'en_US.utf8');
    iconv_set_encoding('input_encoding', 'UTF-8');
    iconv_set_encoding('output_encoding', 'UTF-8');
    iconv_set_encoding('internal_encoding', 'UTF-8');

    $this->enablePlugins('sfPropelORMPlugin');
    $this->enablePlugins(array(
      'iceMultimediaPlugin', 'iceBehaviorsPlugin', 'iceLibsPlugin',
      'iceTaggablePlugin', 'iceGeoLocationPlugin'
    ));
  }

  public function setupPlugins()
  {
    parent::setupPlugins();

    foreach ($this->plugins as $plugin)
    {
      // check for project's prefix
      if (0 === strpos($plugin, 'ice'))
      {
        $this->pluginConfigurations[$plugin]->connectTests();
      }
    }
  }
}
