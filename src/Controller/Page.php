<?php

namespace AppName\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class Page {
	function index(\Silex\Application $app){

		$subRequest = Request::create('/data');
		$data_json = $app->handle($subRequest, HttpKernelInterface::SUB_REQUEST, false)->getContent();

		return $app['view']->render('Page/index.html.php', array('data_json' => $data_json));
	}
}
