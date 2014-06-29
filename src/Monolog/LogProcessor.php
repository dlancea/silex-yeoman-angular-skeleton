<?php

namespace AppName\Monolog;

use Symfony\Component\HttpFoundation\Request;

/**
 * Add a processor to monolog which logs the user's username and ip
 *
 * @author Dave Lancea
 */
class LogProcessor {

	protected $security_service = null;

	function __construct($security_service) {
		$this->security_service = $security_service;
	}

	function logProcessor($record) {
		$token = $this->security_service->getToken();

		// Log username, if available
		if (null !== $token) {
			$user = $token->getUser();
			$record['extra']['user'] = $user->getUsername();
		}

		// Log IP
		$record['extra']['ip'] = $_SERVER['REMOTE_ADDR'];

		return $record;
	}

}
