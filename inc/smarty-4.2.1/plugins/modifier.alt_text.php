<?php

    /**
     * @author Dave Steer
     * @created 23/01/2023
    **/
    
    function smarty_modifier_alt_text($input) {
        $info = pathinfo($input);

        $file_name = $info['filename'] ?? $input;

        return str_replace(['-', '_', '+'], ' ', $file_name);
    }