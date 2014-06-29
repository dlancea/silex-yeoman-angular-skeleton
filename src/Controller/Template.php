<?php

namespace AppName\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class Template {
	function load(\Silex\Application $app, $templateFile){
		// This is safe. 
		// Symfony Template Engine will only load files that are within the template folder.
		return $app['view']->render('Template/'.$templateFile.'.php');
	}
}
