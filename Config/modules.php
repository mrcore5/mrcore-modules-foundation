<?php

/**
 * Mrcore Modules Configuration File
 *
 * Do NOT use laravels env() function here as this is used by the asset manager.
 * This config does not allow partial overrides. You must publish
 * the entire script: ./artisan vendor:publish --tag="mrcore.modules.configs"
 * Access with Config::get('mrcore.xyz')
 */
return [

	/*
	|--------------------------------------------------------------------------
	| Mrcore Modules
	|--------------------------------------------------------------------------
	|
	| Define all mrcore modules.  Order does not matter here.  Path is relative
	| to your laravel root (no leading or trailing /).
	|
	*/

	'modules' => [

		'Foundation' => [
			'type' => 'foundation',
			'namespace' => 'Mrcore\Modules\Foundation',
			'controller_namespace' => 'Mrcore\Modules\Foundation\Http\Controllers',
			'provider' => 'Mrcore\Modules\Foundation\Providers\FoundationServiceProvider',
			'path' => 'vendor/mrcore/foundation',
			'routes' => 'Http/routes.php',
		],

		'Auth' =>  [
			'type' => 'module',
			'namespace' => 'Mrcore\Modules\Auth',
			'controller_namespace' => 'Mrcore\Modules\Auth\Http\Controllers',
			'provider' => 'Mrcore\Modules\Auth\Providers\AuthServiceProvider',
			'path' => 'vendor/mrcore/auth',
			'routes' => 'Http/routes.php',
			'route_prefix' => null,
			'views' => 'Views',
			'view_prefix' => null,
			'assets' => 'Assets',
			'enabled' => false,
		],

		'Wiki' => [
			'type' => 'module',
			'namespace' => 'Mrcore\Modules\Wiki',
			'controller_namespace' => 'Mrcore\Modules\Wiki\Http\Controllers',
			'provider' => 'Mrcore\Modules\Wiki\Providers\WikiServiceProvider',
			'path' => 'vendor/mrcore/wiki',
			'routes' => 'Http/routes.php',
			'route_prefix' => null,
			'views' => 'Views',
			'view_prefix' => null,
			'assets' => 'Assets',
			'enabled' => false,
		],		

		// Bootswatch Themes
		// default cerulean cosmo cyborg darkly flatly journal lumen paper
		// readable sandstone simplex slate spacelab superhero united yeti
		'BaseTheme' => [
			'type' => 'basetheme',
			'namespace' => 'Mrcore\Themes\Bootswatch',
			'controller_namespace' => null,
			'provider' => 'Mrcore\Themes\Bootswatch\Providers\ThemeServiceProvider',
			'path' => 'vendor/mrcore/bootswatch-theme',
			'routes' => null,
			'route_prefix' => null,
			'views' => 'Views',
			'view_prefix' => null,
			'assets' => 'Assets',
			'css' => ['css/bootstrap/simplex.min.css'],
			'container' => [
				'header' => true,
				'body' => true,
				'footer' => true,
			],
			'enabled' => false,
		],

		'SubTheme' => [
			'type' => 'subtheme',
			'namespace' => 'Mrcore\Themes\Example',
			'controller_namespace' => null,
			'provider' => 'Mrcore\Themes\Example\Providers\ThemeServiceProvider',
			'path' => 'vendor/mrcore/example-theme',
			'routes' => null,
			'route_prefix' => null,
			'views' => 'Views',
			'view_prefix' => null,
			'assets' => 'Assets',
			'css' => [
				'css/bootstrap/slate.min.css',
				'css/bootstrap/override/example.css',
			],
			'enabled' => false,
		],

		'Mreschke\Helpers' => [
			'type' => 'module',
			'namespace' => 'Mreschke\Helpers',
			'path' => 'vendor/mreschke/helpers',
			'enabled' => false,
		],

		'Mreschke\Dbal' => [
			'type' => 'module',
			'namespace' => 'Mreschke\Dbal',
			'provider' => 'Mreschke\Dbal\Providers\DbalServiceProvider',
			'path' => 'vendor/mreschke/dbal',
			'console_only' => false,
			'enabled' => false,
		],

	],

	/*
	|--------------------------------------------------------------------------
	| Loading Order / Override Management
	|--------------------------------------------------------------------------
	|
	| Defines the modules loading order for each item (assets, views, routes).
	| First item found wins. This fine grained control control over module
	| overrides giving you the control.
	| If you have the Mrcore\Modules\Wiki module enabled, then use %app% to define
	| the order of the dynamically loaded wiki application.  Usually apps are first
	| which allows an app to be primary override.  Your actual laravel app is not
	| listed, but always comes first (even above %app%) for assets, views and routes.
	|
	*/

	'assets' => [
		'%app%',
		'SubTheme',
		'Auth',
		'Wiki',
		'BaseTheme',
	],

	'views' => [
		'%app%',
		'SubTheme',
		'Auth',
		'Wiki',
		'BaseTheme',
	],

	'routes' => [
		'%app%',
		'Auth',
		'Wiki',
		'Foundation',
	],

	/*
	|--------------------------------------------------------------------------
	| Debug and Trace
	|--------------------------------------------------------------------------
	|
	| If enabled, each modules boot and register is added to a IoC array for
	| further dump and analysis using dd(Module::trace())
	|
	*/

	'debug' => false,

];