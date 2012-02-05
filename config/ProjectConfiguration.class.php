<?php

date_default_timezone_set('America/New_York');

require_once '/www/libs/symfony-1.4.x/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

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

    $this->enablePlugins(array());
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

  public function enablePlugins($plugins)
  {
    $plugins = array_keys($this->getAllPluginPaths());

    sort($plugins, SORT_STRING);
    $plugins = array_reverse($plugins);
    $plugins[] = 'sfPropelORMPlugin';
    $plugins = array_reverse($plugins);

    parent::enablePlugins($plugins);
    $this->disablePlugins(array('sfPropelPlugin', 'sfPropel15Plugin', 'sfDoctrinePlugin'));
  }
}
