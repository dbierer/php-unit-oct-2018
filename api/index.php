<?php
// To Run API Simulator:
/*
 * #1: cd /path/to/source/completed/api
 * #2: php -S localhost:8080 index.php
 * #3: from any client: "http://localhost:8080/api/widget/xxx" where "xxx" = the name of the widget
 *
 * Look in /path/to/source/completed/api/data.txt for widgets
 */
define('API_URI', '/api/widget');
define('DATA_FILE', __DIR__ . '/data.txt');
$output = [];
if (strpos($_SERVER['REQUEST_URI'], API_URI) !== 0) {
    $status = 404;
    $output = ['error' => 'Route Not Found'];
} else {
    $status = 200;
    $query = explode('/', $_SERVER['REQUEST_URI']);
    $widget = array_pop($query);
    $obj = new SplFileObject(DATA_FILE, 'r');
    while (!$obj->eof()) {
        $row = $obj->fgetcsv();
        if (count($row) == 3) {
            $data[$row[0]] = ['widget' => $row[0], 'price' => $row[1], 'date' => $row[2]];
        }
    }
    if (isset($data[$widget])) {
        $output = $data[$widget];
    } else {
        $output = ['error' => 'Widget Not Found'];
    }
}
header('Content-Type: application/json', TRUE, $status);
echo json_encode($output);
exit;
