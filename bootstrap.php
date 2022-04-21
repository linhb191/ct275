<?php

define('PATH_VIEW', __DIR__ . '/src/views');
session_start();

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dbManager = new Illuminate\Database\Capsule\Manager;
$dbManager->addConnection([
	'driver' => 'mysql',
	'host' => $_ENV['DB_HOST'],
	'database' => $_ENV['DB_NAME'],
	'username' => $_ENV['DB_USER'],
	'password' => $_ENV['DB_PASS'],
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix' => '',
]);

$dbManager->setAsGlobal();
$dbManager->bootEloquent();
