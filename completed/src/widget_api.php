<?php
// Setup Database User "vagrant":
/*
 * From a terminal window:
 *
    $ mysql -u root -p
    <enter password "vagrant">
    mysql> CREATE DATABASE php_unit_jumpstart;
    mysql> USE course;
    mysql> SOURCE course.sql;
    mysql> GRANT ALL PRIVILEGES ON * To 'vagrant'@'localhost' IDENTIFIED BY 'vagrant';
    mysql> exit;
*/

// To Run API Simulator:
/*
 * #1: cd /path/to/source/completed/api
 * #2: php -S localhost:8080 index.php
 * #3: from any client: "http://localhost:8080/api/widget/xxx" where "xxx" = the name of the widget
 *
 * Look in /path/to/source/completed/api/data.txt for widgets
 */

include __DIR__ . '/vendor/autoload.php';
use Completed\Widget\ {WidgetApi,WidgetStorage,WidgetApiWrapper};

echo "\n----------------------------------------\n";
echo 'Call API directly';
echo "\n----------------------------------------\n";

// makes direct call to WidgetApi

$api = new WidgetApi();
var_dump($api->findByName('test'));
echo PHP_EOL;

echo "\n----------------------------------------\n";
echo 'Call API wrapper';
echo "\n----------------------------------------\n";

// makes call to WidgetApiWrapper::callByName()
$dsn = 'mysql:host=localhost;dbname=course';
$pdo = new \PDO($dsn, 'vagrant', 'vagrant');
$storage = new WidgetStorage($pdo);
$wrapper = new WidgetApiWrapper(WidgetApi::API_URL, $api, $storage);
var_dump($wrapper->callByName('test'));
