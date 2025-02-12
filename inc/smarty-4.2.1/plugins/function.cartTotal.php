<?php

    /**
     * @author Dave Steer
     * @created 25/11/2022
    **/

    use Classes\Cart;

    function smarty_function_cartTotal() {
        return Cart::getCartTotal();
    }