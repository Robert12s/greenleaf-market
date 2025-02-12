<?php

    /**
     * @author Dave Steer
     * @created 10/02/2023
    **/

    function smarty_modifier_llexeterComment($comment) {
        if (isLlexeter()) {
            return '<!-- ' . $comment . ' -->';
        }
    }