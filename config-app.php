<?php

$protocolo = "http://";
$serverName = $_SERVER['HTTP_HOST'];
$appName = "/comcasec/";
$root =  $protocolo . $serverName . $appName;
$rootAjax = $_SERVER['DOCUMENT_ROOT'] . $appName;

//chamadas via request comum
define("ROOT", $root);
define("URL_BASE", ROOT);
define("DB_PATH", URL_BASE . "db/");
define("VIEWS_PATH", URL_BASE . "views/");
define("MODELS_PATH", URL_BASE . "models/");
define("CSS_PATH", URL_BASE . "css/");
define("IMG_PATH", URL_BASE . "img/");

//Para chamadas feitas via ajax
define("AJAX_URL_BASE", $rootAjax);
define("AJAX_DB_PATH", AJAX_URL_BASE . "db/");
define("AJAX_VIEWS_PATH", AJAX_URL_BASE . "views/");
define("AJAX_MODELS_PATH", AJAX_URL_BASE . "models/");
define("AJAX_CSS_PATH", AJAX_URL_BASE . "css/");
define("AJAX_IMG_PATH", AJAX_URL_BASE . "img/");

?>
