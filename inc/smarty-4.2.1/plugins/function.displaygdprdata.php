<?php

    /**
     * @author Zak Keen
     * @created 14/12/2022
    **/
    
	use Llexeter\Classes\Tpl;
	use Llexeter\Request\Flynn;

    function smarty_function_displaygdprdata($params, $smarty){
		$identifier = $params['identifier'];
		$identifier = base64_encode($identifier);		
		$gdprContent = (new Flynn)->get('gdpr/gdprversion/' . $identifier);
		
		if(isset($gdprContent->result) && $gdprContent->result == "ok" && isset($gdprContent->data)) {
			Tpl::bulk_assign([
				'BOOTSTRAP_VERSION'      => 5,
				"identifier"			 => $params['identifier'],
				"requireConsentRequired" => $params['requireConsentRequired'],
				"requireConsent"         => $params['requireConsent'],
				"gdprContent"            => $gdprContent->data
			]);

			$filepath = __DIR__ . "/../../../../shared-assets/tpl/gdpr";

			Tpl::display($filepath, __FILE__, __CLASS__, __FUNCTION__, __LINE__);
		}
	}