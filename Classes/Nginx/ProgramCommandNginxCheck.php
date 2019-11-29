<?php

namespace Classes\Nginx;

use Classes\Program\Interfaces\ProgramCommand;

#------------------------------------------------------------------------------
# @class ProgramCommandNginxCheck
# @extends none
# @implements ProgramCommand
# Class hundle nginx command: nginx -t
#------------------------------------------------------------------------------
class ProgramCommandNginxCheck implements ProgramCommand {
    #--------------------------------------------------------------------------
    # @method getCommand
    # @access public
    # @params none
    # @return void
    # Metod hundle ...
    #--------------------------------------------------------------------------
    public function getCommand(){
        return 'sudo nginx -t';
    }
}
