<?php

declare(strict_types=1);
require 'vendor/autoload.php';

use ccd\models\produit;
use Illuminate\Database\Capsule\Manager as DB;


session_start();

$db = new DB();
$db->addConnection( parse_ini_file('conf/conf.ini') );
$db->setAsGlobal();
$db->bootEloquent();


