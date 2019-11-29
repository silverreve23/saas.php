<?php
$root_dir =
spl_autoload_register(function($class_name){
    include getcwd().'/'.str_replace('\\', DIRECTORY_SEPARATOR, $class_name).'.php';
});

use Classes\Nginx\ProgramNginx;

$programNginx = new ProgramNginx();

echo $programNginx->createConfig();
echo $programNginx->flushConfig();
