<?php

    /**
     * @author Dave Steer
     * @created 09/12/2022
    **/

    function smarty_modifier_order_format($order_number) {
        $order_number = str_replace('P', '', $order_number);
        $order_number = substr_replace($order_number, '-', strlen($order_number) -4, 0);
        
        return $order_number;
    }