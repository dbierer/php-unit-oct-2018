<?php
namespace Sandbox\Widget;

/**
 * Simulates making call to external web service
 */
 
// To Run API Simulator:
/*
 * #1: cd /path/to/source/completed/api
 * #2: php -S localhost:8080 index.php
 * #3: from any client: "http://localhost:8080/api/widget/xxx" where "xxx" = the name of the widget
 *
 * Look in /path/to/source/completed/api/data.txt for widgets
 */

class WidgetApi
{

    const API_URL = 'http://localhost:8080/api/widget';

    /**
     * Returns JSON response from query for widget $name
     *
     * @param string $name = name of widget
     * @return string $json = JSON result from API call
     */
    public function findByName($name)
    {
        $json = file_get_contents(self::API_URL . '/' . $name);
        return $json;
    }
}
