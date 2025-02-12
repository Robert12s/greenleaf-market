<?php

    /**
     * @author Dave Steer
     * @created 09/01/2023
    **/

    function smarty_modifier_currencySymbol($currency = false) {
        if (empty($currency) && !empty($_SESSION['currency'])) {
            currencySymbol($_SESSION['currency']); 
        }

        return currencySymbol($currency ?? 'GBP');
    }