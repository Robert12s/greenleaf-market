<?php

    /**
     * @author Dave Steer
     * @created 02/11/2022
    **/

    function smarty_modifier_prettyshortdate($timestring) {
        return date('jS M Y', strtotime($timestring));
    }