<?php

/**
 * HybridAuth
 * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
 * (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
 */
// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return
		array(
			"base_url" => "http://127.0.0.1/helpdesk/UserAuth/hybridauth_endpoint",
			"providers" => array(
				"GitHub" => array(
					"enabled" => true,
					"keys" => array("id" => "310f4cbd5a7b64a697a3", "secret" => "ba481d3de16800f285cc65ce680b297f03d21ef7")
				),
			),
			"debug_mode" => false,
			// Path to file writable by the web server. Required if 'debug_mode' is not false
			"debug_file" => "",
);
