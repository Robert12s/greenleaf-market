<?php

    /**
     * @author Dave Steer
     * @created 02/11/2022
    **/

    use Llexeter\Functions\TimeSince;

    function smarty_modifier_timesince($date, $small = false) {
        if ($small) {
            return (new Timesince)->createSmall($date, true);
        }

        return (new Timesince)->create($date, true);
    }