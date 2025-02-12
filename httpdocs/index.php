<?php
	/** 
	 * @author Robert Twelves
	 * @created 05/02/2025
	 */

    error_reporting(E_ALL);
    ini_set("display_errors", "On");

    class Index extends Common{
        public function __construct() {
            parent::__construct();
            $this->init();
            $this->proccess();   
        }

        public function init() {
            $this->get("/get/all/users");
        }

        public function proccess(){
            $this->display('index/main.tpl'); 
        }

    }

new Index();
