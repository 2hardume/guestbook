<?php
/*
 * Настройка для отображения всех ошибок.
 * ini_set('error_reporting', E_ALL);
 * ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
*/
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
require_once 'config.php';
require_once 'application/bootstrap.php';
