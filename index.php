<?php

require_once 'vendor/autoload.php';

use Classes\SubApp\Nginx\ProgramNginx;
use Classes\SubApp\Mysql\ProgramMysql;

$subAppPrograms = array();

array_push($subAppPrograms, new ProgramNginx());
array_push($subAppPrograms, new ProgramMysql());

foreach($subAppPrograms as $program){
    echo $program->createConfig();
    echo $program->flushConfig();
}
