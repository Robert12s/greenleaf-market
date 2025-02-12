<?php

    /**
     * @author Dave Steer
     * @created 02/03/2023
    **/
    
    function smarty_modifier_product_raw_price($pricing) {
        $viewMode = $_SESSION['viewModeEnhanced'] ?? '';

        switch ($viewMode) {
            case 'distributor':
                return $pricing->prices->distributor_price;
            break;

            case 'trade':
                return $pricing->prices->trade_price;
            break;

            default:
                return $pricing->prices->retail_price;
        }
    }