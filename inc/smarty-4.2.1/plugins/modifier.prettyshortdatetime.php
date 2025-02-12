<?php

    /**
     * @author Dave Steer
     * @created 02/11/2022
    **/

    function smarty_modifier_prettyshortdatetime($timestring) {
        return date('jS M g:ia', strtotime($timestring));
    }