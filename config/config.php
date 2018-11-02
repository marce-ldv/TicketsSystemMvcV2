<?php

namespace config;


define("DB_NAME", "dbusers");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_HOST", "localhost");

// Constantes front
define('ROOT',  dirname(__DIR__) . "/");
define('VIEW_URL', '/TicketsSystemMvcV2'); // raiz del proyecto
define("URL_VIEW",  ROOT . '/View/');
define("URL_FONT_AWESOME", VIEW_URL . '/public_html/font-awesome/');
define("URL_FONTAWESOME", VIEW_URL . '/public_html/fontawesome/');
define("URL_CSS", VIEW_URL . '/public_html/css/');
define("URL_STYLE", VIEW_URL . '/public_html/estilo/');
define("URL_JS", VIEW_URL . '/public_html/js/');
define("URL_SLICK", VIEW_URL . '/public_html/slick/');
define("URL_IMG", VIEW_URL . '/public_html/img/');
define("URL_BOOTSTRAP", VIEW_URL . '/public_html/css/bootstrap.min.css');
define("NODE_DIR", VIEW_URL . "/node_modules/");
define("JQUERYJS", NODE_DIR . "jquery/dist/jquery.min.js");
define("BOOTSTRAPJS", NODE_DIR . "bootstrap/dist/js/bootstrap.min.js");
define("BOOTSTRAPCSS", NODE_DIR . "bootstrap/dist/css/bootstrap.min.css");
