<?php

    /**
     * @author Dave Steer
     * @created 02/11/2022
    **/

    /* NOTE: There is also a plural function in the common/class file */
    
    function smarty_modifier_plural($string, $count) {
        if ($count > 1 || empty($count)) {
            if (preg_match('/y$/', $string)) {
                $string = substr($string, 0, (strlen($string) - 1)) . 'ies';
            } else {
                $string .= 's';
            }
        }
        return $string;
    }