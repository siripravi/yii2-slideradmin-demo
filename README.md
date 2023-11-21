<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Slider Admin Template</h1>
    <br>
</p>

This project is an application template built with Yii 2 Basic Project Template [Yii 2](https://www.yiiframework.com/].

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.4.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](https://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following instructions:
1. Clone this repository using the command:
   ~~~
   git clone https://github.com/siripravi/yii2-slideradmin-demo.git
   ~~~
2. Install the required composer depencies by issuing the command:
   ~~~
   cd yii2-slideradmin-demo
   composer update
   ~~~
3. Specify the Database connection details in the file located at "config/db.php". And run the command:
   ~~~
   php yii migrate --migrationPath="@vendor/siripravi/yii2-slideradmin/migrations"
   ~~~
   This will create all necessary tables in your database.
4.
   ~~~
    composer create-project --prefer-dist yiisoft/yii2-app-basic basic
   ~~~
5. Now you should be able to access the application through the following URL, assuming `yii2-slideradmin-demo` is the directory
   directly under the Web root.
    ~~~
    http://localhost/yii2-slideradmin-demo/web/
    ~~~

