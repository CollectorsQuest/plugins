<?php

$_time_start = microtime(true);

list($subdomain, $tdl) = explode('.bookstore.', $_SERVER['HTTP_HOST']);

if ($subdomain == 'www' && trim($_SERVER['REQUEST_URI'], '/ ') == '')
{
  $regex_match  = "/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
  $regex_match .= "htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
  $regex_match .= "blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
  $regex_match .= "symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
  $regex_match .= "jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
  $regex_match .= ")/i";

  if (!empty($_COOKIE['mobile']) && preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT'])))
  {
    header("HTTP/1.1 302 Moved Temporarily");
    header("Location: http://m.bookstore.". $tdl);

    exit;
  }
}

require dirname(__FILE__) .'/../config/bootstrap.php';
sfContext::createInstance($configuration)->dispatch();

