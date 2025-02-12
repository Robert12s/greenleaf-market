<?php

    /**
     * @author Robert Twelves
     * @created 05/02/2025
    **/
	require_once('libs/Smarty.class.php');

    session_start();
	$_SESSION['autoload'] = array();
	date_default_timezone_set("Europe/London");

    class Common{
        public function __construct() {
            global $smarty;

            $smarty = new Smarty;
            $smarty->setTemplateDir(__DIR__ . '/../templates');
            $smarty->setCompileDir(__DIR__ . '/../templates/templates_c');
            $smarty->addPluginsDir(__DIR__ . '/../inc/smarty-4.2.1/plugins');
            $smarty->setCaching(0);
            $smarty->setErrorReporting(E_ALL & ~E_NOTICE);
            $smarty->setDebugging(false);
        }


        public function display($template) {
            global $smarty;

            $smarty->display($template);
        }

        public function restApi($url, $data = false) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            $result = curl_exec($curl);
            curl_close($curl);
            return $result;
        }

        public function get($url) {
            $result = $this->restApi($url);
            return json_decode($result, true);
        }

        public function post($url, $data) {
            $result = $this->restApi($url, $data);
            return json_decode($result, true);
        }
    }

?>


