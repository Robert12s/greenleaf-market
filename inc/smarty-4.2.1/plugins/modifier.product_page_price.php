<?php

    /**
     * @author Dave Steer
     * @created 03/01/2023
    **/
    
    function smarty_modifier_product_page_price($pricing) {
        $viewMode = $_SESSION['viewModeEnhanced'] ?? '';

        $returnHtml = '';

        if (!empty($_SESSION['user']->is_staff)) {
            $viewMode = 'staff';
        }

        // Use the next line to force a viewMode [trade, retail, distributor or staff]
        // $viewMode = 'retail'; // staff | retail | distributor | staff

        // Use this to emulate special offers
        // $pricing->prices->presale_trade_price = 2.49;
        // $pricing->prices->presale_retail_price = 4.49;
        // $pricing->prices->offer_name = 'Test Offer';

        // The next line can be used to debug the pricing object
        // $returnHtml .= '<pre>' . print_r($pricing, true) . '</pre>';

        switch ($viewMode) {
            case 'staff':
                return $returnHtml . product_page_display_staff_price($pricing->prices);
            break;

            case 'distributor':
                if (empty($pricing->prices->distributor_price)) {
                    return $returnHtml . ' <strong>TBC</strong>';
                }

                return $returnHtml . '<strong>' . $pricing->prices->distributor_price . ' ' . $pricing->prices->currency . '</strong>';
            break;

            /////////////////////////

            case 'trade':
                return $returnHtml . product_page_display_trade_price($pricing->prices);
            break;

            default:
                $returnHtml .= '<h2>';

                if ($pricing->prices->presale_retail_price) {
                    $returnHtml .= '<del>' . currencySymbol($pricing->prices->currency) . $pricing->prices->presale_retail_price . '</del> <span class="text-danger">';
                }

                if (!empty($pricing->prices->retail_price)) {
                    $returnHtml .= currencySymbol($pricing->prices->currency) . $pricing->prices->retail_price;
                } else {    
                    $returnHtml .= 'TBC';
                }

                if ($pricing->prices->presale_retail_price) {
                    if ($pricing->prices->offer_name) {
                        $returnHtml .= ' ' . $pricing->prices->offer_name;   
                    }
                    $returnHtml .= '</span>';
                }

                $returnHtml .= '</h2>';

                return $returnHtml;
        }
    }


    function product_page_display_staff_price($price) {
        // Trade prices
        $returnHtml = '<h2><span class="text-muted">Trade:</span> ';

        if ($price->presale_trade_price) {
            $returnHtml .= '<del>' . currencySymbol($price->currency) . $price->presale_trade_price . '</del> <span class="text-danger">';
        }
                
        if (!empty($price->trade_price)) {
            $returnHtml .= currencySymbol($price->currency) . $price->trade_price;
        } else {    
            $returnHtml .= 'TBC';
        }

        if ($price->presale_trade_price) {
            if ($price->offer_name) {
                $returnHtml .= ' ' . $price->offer_name;   
            }
            $returnHtml .= '</span>';
        }

        // Retail prices
        $returnHtml .= '<br><span class="text-muted">Retail:</span> ';

        if ($price->presale_retail_price) {
            $returnHtml .= '<del>' . currencySymbol($price->currency) . $price->presale_retail_price . '</del> <span class="text-danger">';
        }

        if (!empty($price->retail_price)) {
            $returnHtml .= currencySymbol($price->currency) . $price->retail_price;
        } else {    
            $returnHtml .= 'TBC';
        }

        if ($price->presale_retail_price) {
            if ($price->offer_name) {
                $returnHtml .= ' ' . $price->offer_name;   
            }
            $returnHtml .= '</span>';
        }

        $returnHtml .= '</h2>';

        return $returnHtml;
    }


    function product_page_display_trade_price($price) {
        $returnHtml = '<h3><small class="text-muted">RRP: ';

        // Show retail price as RRP
        switch (true) {
            case !empty($price->presale_retail_price):
                $returnHtml .= currencySymbol($price->currency) . $price->presale_retail_price;
            break;

            case !empty($price->retail_price):
                $returnHtml .= currencySymbol($price->currency) . $price->presale_retail_price;
            break;

            default:
                $returnHtml .= 'TBC';
        }

        $returnHtml .= '</small></h3><h2>';

        if ($price->presale_trade_price) {
            $returnHtml .= '<del>' . currencySymbol($price->currency) . $price->presale_trade_price . '</del> <span class="text-danger">';
        }
                
        if (!empty($price->trade_price)) {
            $returnHtml .= currencySymbol($price->currency) . $price->trade_price;
        } else {    
            $returnHtml .= 'TBC';
        }

        if ($price->presale_trade_price) {
            if ($price->offer_name) {
                $returnHtml .= ' ' . $price->offer_name;   
            }
            $returnHtml .= '</span>';
        }

        $returnHtml .= '</h2>';

        return $returnHtml;
    }