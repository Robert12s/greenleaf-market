<?php

    /**
     * @author Dave Steer
     * @created 02/11/2022
    **/

    function smarty_modifier_shortdate($timestring) {
        return date('j M y', strtotime($timestring));
    }