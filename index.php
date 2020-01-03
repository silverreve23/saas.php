<?php

require_once 'vendor/autoload.php';
require_once "vendor/larapack/dd/src/helper.php";

use Classes\SubApp\Nginx\ProgramNginx;
use Classes\SubApp\Mysql\ProgramMysql;

$subAppPrograms = array();
$data = (object) array(
    'id' => 80,
    'name' => 'test'
);

try{
    array_push($subAppPrograms, new ProgramNginx($data));
    array_push($subAppPrograms, new ProgramMysql($data));
    foreach($subAppPrograms as $program){
        $program->createConfig();
        // $program->flushConfig();
    }
    echo "Created http://192.168.0.200:80{$data->id}\n";
}catch(Exception $e){
    dd($e);
    echo $e->getMessage();
}
