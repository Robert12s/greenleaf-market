<?php
	/** 
	 * @author Robert Twelves
	 * @created 05/02/2025
	 */

    require_once('../configs/common.php');

    use MyProject\Common;
    
    class Index extends Common {
    
        public function __construct() {
            parent::__construct(); // Ensure Common constructor runs
            $this->init();
            $this->proccess();
        }
    
        public function init() {
            // Fetch products data from the API
            $products = $this->get('products');

            die($products);
        
            // Assign products to Smarty template
            $this->products = $products;
        }
    
        public function proccess() {
            $this->display('index/main.tpl'); 
        }
    }
    
    new Index();