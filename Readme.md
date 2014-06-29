# Silex/Yeoman/Angular Skeleton

## What is this?

This is a skeleton which runs a small test app using Silex and Yeoman (specifically the Angular/Bootstrap 
generator) including Bower and Grunt, with an Angular frontend. It sets up:

- An integrated environment for using new frontend development tools, like yeoman, bower, and grunt with PHP backend. 
- Livereloading for any style, js, or php file changes
- A build system for both server and frontend assets
- An Angular test app
- A setup for front end testing (with jasmine)
- A PHP backend using the Silex framework, and ActiveRecord for db access.

## Requirements

The skeleton assumes you're using apache, and have ruby and node.js installed. 


## Installation

```
composer create-project dlancea/silex-yeoman-skeleton [app_path]
```

then run `bin/install.sh`. This will require sudo to install yeoman globally. If you don't want to do this 
(you don't actually need yeoman for this app) you can just run commands from that file manually, though you'll
need to be sure you have all the prerequisites yourself.

That's it! 'grunt bwatch' should still be running and doing the livereloading.

You do not need to create a subdomain for this app to work, just load the *web/* directory being served by apache in your browser.

### Login
Username is "user", password is "password"


## Customize
To make this app your own, you'll need to replace the generic "app name" in a few files:

- Change package name in the following files:
	- package.json - name
	- composer.json - name and description
	- bower.json - name
	- web/index.php - namespace - AppName
	- web/scripts/main.js - appName
	- Optional
		- bin/build.sh
	- Global
		- appNameApp - Angular app name
		- AppName PHP Namespace

There's also a rudimentary build script at bin/build.sh. You can customize this to your needs. 

### Using Yeoman

The skeleton was built using the yeoman angular generator, so you can create angular files using the yo command:

```
yo angular:controller [new_controller]
```

### Using Grunt

The `grunt serve` command in grunt doesn't do much since the server side is handled by apache. However, there's a 
`grunt bwatch` which will build the server side (copy files, compile sass, etc.) and start a Livereload *watch* session. 


## Todo
- Make example app CRUDdier. The Data controller has actions and routes for CRUD, but they
aren't being used in the UI.
- Better user system - full CRUD for users.
- web/styles folder is confusing, having built css and sass in the same folder?
- Gruntfile.js rev section. Images and fonts don't revision properly.
- Yeoman generator?
- Improve testing
