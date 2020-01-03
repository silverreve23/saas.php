<?php

namespace Classes\SubApp\Mysql;

use Classes\Program\Interfaces\ProgramCommandFactory;
use Classes\SubApp\Mysql\ProgramCommandMysqlCheck;
use Classes\SubApp\Mysql\ProgramCommandMysqlReload;

#------------------------------------------------------------------------------
# @class ProgramCommandMysqlFactory
# @extends none
# @implements ProgramCommandFactory
# Class make mysql commands
#------------------------------------------------------------------------------
class ProgramCommanMysqldFactory implements ProgramCommandFactory {
    protected $commands = array(
        'check' => ProgramCommandMysqlCheck::class,
        'reload' => ProgramCommandMysqlReload::class
    );
    #--------------------------------------------------------------------------
    # @method getCommand
    # @access public
    # @params none
    # @return string
    # Metod return mysql command
    #--------------------------------------------------------------------------
    public function getCommand($commandName = 'check'){
        if(key_exists($commandName, $this->commands))
            return new $this->commands[$commandName];
        throw new Exception('Command not exists');
    }
}
