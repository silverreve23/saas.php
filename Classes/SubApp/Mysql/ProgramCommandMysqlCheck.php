<?php

namespace Classes\SubApp\Mysql;

use Classes\Program\Interfaces\ProgramCommand;

#------------------------------------------------------------------------------
# @class ProgramCommandMysqlCheck
# @extends none
# @implements ProgramCommand
# Class hundle mysql command: service mysql status
#------------------------------------------------------------------------------
class ProgramCommandMysqlCheck implements ProgramCommand {
    #--------------------------------------------------------------------------
    # @method getCommand
    # @access public
    # @params none
    # @return string
    # Metod return mysql status command
    #--------------------------------------------------------------------------
    public function getCommand(){
        return 'sudo service mysql status';
    }
}
