<?php

require_once 'vendor/autoload.php';
require_once "vendor/larapack/dd/src/helper.php";

use Classes\SubApp\Nginx\ProgramNginx;
use Classes\SubApp\Mysql\ProgramMysql;

$subAppPrograms = array();

$data = (object) array('name' => 'saas_test');

// array_push($subAppPrograms, new ProgramNginx($data));
array_push($subAppPrograms, new ProgramMysql($data));
try{
    foreach($subAppPrograms as $program){
        echo $program->createConfig();
        echo $program->flushConfig();
    }
}catch(Exception $e){
    echo $e->getMessage();
}
