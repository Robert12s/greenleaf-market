<?php

    /**
     * @author Robert Twelves
     * @created 005/02/2025
    **/

    require __DIR__ . '/smarty-4.2.1/libs/Smarty.class.php';
    
    define('TPL_INT', true);

    $templatesDir = __DIR__ . '/../templates';

    $smarty = new Smarty;

    $smarty->setTemplateDir($templatesDir);
    $smarty->setCompileDir($templatesDir . '/templates_c');
    $smarty->addPluginsDir(__DIR__ . '/smarty-4.2.1/plugins');
    $smarty->setCaching(0);
    
    $smarty->setErrorReporting(E_ALL & ~E_NOTICE);
    $smarty->setDebugging(false);

?>