<?php

    /**
     * @author Dave Steer
     * @created 02/11/2022
    **/

    use Llexeter\Functions\Date;

    function smarty_modifier_standarddatetime($timestamp) {
        return Date::standard($timestamp);
    }