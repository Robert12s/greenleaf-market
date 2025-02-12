<?php

    /**
     * @author Dave Steer
     * @created 23/11/2022
    **/
    
    function smarty_modifier_part_image($input) {
        return '/assets/images/partimages/' . $input . '_600.jpg';
    }