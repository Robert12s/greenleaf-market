<?php

/**
 * @author Robert Twelves
 * @created 05/02/2025
**/

namespace MyProject;

require_once __DIR__ . '/../inc/smarty/libs/Smarty.class.php';
use Smarty\Smarty;

class Common {
    protected $smarty;

    public function __construct() {
        $this->smarty = new Smarty();

        // Set Smarty directories
        $this->smarty->setTemplateDir(__DIR__ . '/../templates/');
        $this->smarty->setCompileDir(__DIR__ . '/templates_c/');
        $this->smarty->setCacheDir(__DIR__ . '/cache/');
        $this->smarty->setConfigDir(__DIR__ . '/configs/');
    }

    public function __set($name, $value) {
        $this->smarty->assign($name, $value);
    }

    public function display($template) {
        $this->smarty->display($template);
    }

    public function get($endpoint) {
        $apiUrl = "http://localhost/API/index.php/" . $endpoint;
        // Initialize cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Execute the API call and store the response
        $response = curl_exec($ch);
        curl_close($ch);

        // Decode and return the response data
        return json_decode($response, true);
    }
}