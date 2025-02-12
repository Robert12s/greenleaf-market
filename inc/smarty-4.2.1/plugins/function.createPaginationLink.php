<?php

    /**
     * @author Dave Steer
     * @created 23/11/2022
    **/

    function smarty_function_createPaginationLink($vars) {
        $url = '';
        $query_string = '';
        
        $temp = explode('?', $vars['string']);
            if (isset($temp[1])) {
                $url = $temp[0];
                $query_string = $temp[1];
            } else {
                $query_string = $temp[0];
            }

            parse_str($query_string, $query);

            unset($query['pageno'], $query['pagesize']);
    
            if (defined('FORCE_PAGE_TITLE')) {
                return "?pageno=";
            }
    
            $final_query = http_build_query($query);

            return $url . '?' . ($final_query ? $final_query . '&pageno=' : 'pageno=');
    }