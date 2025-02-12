<?php

    /**
     * @author Dave Steer
     * @created 23/11/2022
    **/
    
    function smarty_modifier_display_price($pricing) {
        $viewMode = $_SESSION['viewModeEnhanced'] ?? '';

        if (!empty($_SESSION['user']->is_staff)) {
            $viewMode = 'staff';
        }

        switch ($viewMode) {
            case 'staff':
                $prices = '<small class="text-muted">T:</small> <strong>';

                if (!empty($pricing->prices->trade_price)) {
                    $prices .= currencySymbol($pricing->prices->currency) . $pricing->prices->trade_price;
                } else {    
                    $prices .= 'TBC';
                }

                $prices .= '</strong><br><small class="text-muted">R:</small> <strong>';

                if (!empty($pricing->prices->retail_price)) {
                    $prices .= currencySymbol($pricing->prices->currency) . $pricing->prices->retail_price;
                } else {    
                    $prices .= 'TBC';
                }

                $prices .= '</strong>';

                return $prices;
            break;

            case 'distributor':
                if (empty($pricing->prices->distributor_price)) {
                    return '<strong>TBC</strong>';
                }

                return '<strong>' . $pricing->prices->distributor_price . ' ' . $pricing->prices->currency . '</strong>';
            break;

            /////////////////////////

            case 'trade':
                if (empty($pricing->prices->trade_price)) {
                    return '<strong>TBC</strong>';
                }

                $price = currencySymbol($pricing->prices->currency) . $pricing->prices->trade_price;

                if (!empty($pricing->prices->retail_price)) {
                    $price .= ' <small class="text-muted">RRP: ' . currencySymbol($pricing->prices->currency) . $pricing->prices->retail_price . '</small>';
                }

                return $price;
            break;

            default:
                if (empty($pricing->prices->retail_price)) {
                    return '<strong>TBC</strong>';
                }

                return '<strong>' . currencySymbol($pricing->prices->currency) . $pricing->prices->retail_price . '</strong>';
        }
    }