<?php

namespace AppName\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppName\Model\User as UserModel;

class Auth {
	function login(\Silex\Application $app, Request $request){
		return $app['view']->render('Auth/login.html.php', array(
			'error' => $app['security.last_error']($request),
			'last_username' => $app['session']->get('_security.last_username')
		));
	}

	function createPassword(\Silex\Application $app, Request $request){
		
		// find the encoder for a UserInterface instance
		$password = $app['security.encoder.digest']->encodePassword('password', '');

		echo $password;

		return '';
	}
}
