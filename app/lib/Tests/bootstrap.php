<?php

ini_set('display_startup_errors', '1');
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

require __DIR__ . "/../../../vendor/autoload.php";

//Differentiating test database configs for local and circleci
//if(getenv('APP_ENV')=='circleci')
//$config=  require_once __DIR__.'/../../config/circleci/database.php';
//else
$config =  require_once __DIR__.'/../../config/database.php';

use Illuminate\Database\Capsule\Manager as Capsule;  

$capsule = new Capsule; 

$capsule->addConnection($config['connections']['mysql']);

$capsule->bootEloquent();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

