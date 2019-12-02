<?php

namespace Classes\SubApp\Mysql;

use Classes\Program\Interfaces\ProgramCommand;

#------------------------------------------------------------------------------
# @class ProgramCommandMysqlReload
# @extends none
# @implements ProgramCommand
# Class hundle nginx command: service nginx reload
#------------------------------------------------------------------------------
class ProgramCommandMysqlReload implements ProgramCommand {
    #--------------------------------------------------------------------------
    # @method getCommand
    # @access public
    # @params none
    # @return string
    # Metod return reload mysql command
    #--------------------------------------------------------------------------
    public function getCommand(){
        return 'sudo service mysql reload';
    }
}
