<?php

namespace AppName;

use Silex\Provider\SessionServiceProvider;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\Helper\SlotsHelper;

/**
 * Description of Bootstrap
 *
 * @author Dave Lancea
 */
class Bootstrap {

	static function setup($app) {
		// Set debug setting
		$app['debug'] = $app['config']['debug'];


		// Setup logging
		$app->register(new \Silex\Provider\MonologServiceProvider(), array(
			'monolog.logfile' => $app['root_path'] . '/app/logs/AppName.log',
			'monolog.level' => $app['debug'] ? \Monolog\Logger::DEBUG : \Monolog\Logger::NOTICE,
			'monolog.name' => 'AppName'
		));

		// Setup sessions
		$app->register(new SessionServiceProvider());

		// Setup PHP Activerecord DB connection
		if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
			// Windows
			// I couldn't get an absolute path to work on windows. Using relative.
			$path = 'sqlite://windows(../app/db/db.sqlite)';
		}else{
			// Unix-like
			$path = 'sqlite://unix('.$app['root_path'] . '/app/db/db.sqlite)';
		}
		$app['activerecord.cfg'] = \ActiveRecord\Config::instance();
		$app['activerecord.cfg']->set_connections(
			array(
				'prod' => $path,
			)
		);

		\ActiveRecord\Config::initialize(function($cfg){
			$cfg->set_default_connection('prod');
		});

		// Setup symfony php template views
		$app['view'] = $app->share(function ($app) {
			$loader = new FilesystemLoader($app['root_path'] . '/app/template/%name%');
			$templating = new PhpEngine(new TemplateNameParser(), $loader);

			// Initialise the slots helper
			$templating->set(new SlotsHelper());

			return $templating;
		});

		// Setup basic app authentication
		$app->register(new \Silex\Provider\SecurityServiceProvider());
		$app->register(new \Silex\Provider\RememberMeServiceProvider());

		$app['security.firewalls'] = array(
			'login' => array(
				'pattern' => '^/login$',
				'anonymous' => true,
			),
			
			'create_password' => array(
				'pattern' => '^/create_password',
				'users' => $app->share(function () use ($app) {
					return new \AppName\Security\UserProvider();
				}),
				'anonymous' => true,
			),
			'main' => array(
				'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
				'logout' => array('logout_path' => '/logout'),
				'pattern' => '^/',
				'users' => $app->share(function () use ($app) {
					return new \AppName\Security\UserProvider();
				}),
				'remember_me' => array(
					'key' => 'j34krjh23lk4jh23lktc3ktjh',
					'name' => 'AppName',
					'always_remember_me' => true
				),
			),
		);

		// Conveinience function to get username
		$app['current_username'] = $app->share(function ($app) {
			$token = $app['security']->getToken();

			// Return username, if available
			if (null !== $token) {
				$user = $token->getUser();
				return $user->getUsername();
			}else{
				return 'anon';
			}
		});

		// Need to boot app here due to security bundle needing to be initialized before being used.
//		$app->boot();

		// Setup custom logging processor. Sets username and IP for every log message
//		$app['monolog']->pushProcessor(array(new \AppName\Monolog\LogProcessor($app['security']), 'logProcessor'));

		/**
		 * Accept JSON Requests
		 */
		$app->before(function (Request $request) {
			if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
				$data = json_decode($request->getContent(), true);
				$request->request->replace(is_array($data) ? $data : array());
			}
		});

		/**
		 * Error handler. Return a JSON object with error info
		 */
		// $app->error(function(\Exception $e) use ($app){

		// 	// Let this type of exception pass through, it will prompt for authentication.
		// 	if($e instanceof \Symfony\Component\Security\Core\Exception\AuthenticationCredentialsNotFoundException)
		// 		return;
		// 	// Let 404 errors go through
		// 	if($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException)
		// 		return;

		// 	$return = array('message' => $e->getMessage());
		// 	$return['class'] = get_class($e);

		// 	if($app['debug']){
		// 		$return['trace'] = $e->getTrace();
		// 		$return['file'] = $e->getFile();
		// 		$return['line'] = $e->getLine();
		// 		$return['code'] = $e->getCode();
		// 	}

		// 	return $app->json($return, 500);
		// }, 0);

		// Debug controllers
		if($app['debug']) $app->get('/make_error/', function (Request $request) use ($app) {
			throw new Exception('Test exception');

			return '';
		});

		return $app;
	}
}
