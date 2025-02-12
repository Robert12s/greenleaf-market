<?php

    /**
     * @author Dave Steer
     * @created 25/11/2022
    **/

    function smarty_modifier_money($price) {
        return number_format($price, 2, '.', ',');
    }