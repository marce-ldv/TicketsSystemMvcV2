<?php

namespace config;


define("DB_NAME", "dbusers");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_HOST", "localhost");

//Constantes front
define('ROOT',  dirname(__DIR__) . "/");
define('FRONT_VIEW', '/TicketsSystemMvcV2'); //raiz del proyecto FRONT_VIEW
define("URL_VIEW",  ROOT . '/View/');
define("URL_CSS", FRONT_VIEW . '/content/css/');
define("URL_JS", FRONT_VIEW . '/content/js/');
define("URL_IMG", FRONT_VIEW . '/content/img/');
define("URL_VENDOR", FRONT_VIEW . '/content/vendor/');
define("URL_BOOTSTRAP", FRONT_VIEW . '/content/css/bootstrap.min.css');
define("NODE_DIR", FRONT_VIEW . "/node_modules/");
define("JQUERYJS", NODE_DIR . "jquery/dist/jquery.min.js");
define("BOOTSTRAPJS", NODE_DIR . "bootstrap/dist/js/bootstrap.min.js");
define("BOOTSTRAPCSS", NODE_DIR . "bootstrap/dist/css/bootstrap.min.css");
