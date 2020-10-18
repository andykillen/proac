<?php
/* 
Plugin Name: ProAc Product Import
Description: Imports from old site into db
Author: Andrew Killen
Version: 1.0.1
*/

require dirname(__FILE__) . "/vendor/autoload.php";

$importer = new ProductImport\Rest();
$importer->init();