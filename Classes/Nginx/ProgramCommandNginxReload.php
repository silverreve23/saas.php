<?php

namespace Classes\Nginx;

use Classes\Program\Interfaces\ProgramCommand;

#------------------------------------------------------------------------------
# @class ProgramCommandNginxReload
# @extends none
# @implements ProgramCommand
# Class hundle nginx command: service nginx reload
#------------------------------------------------------------------------------
class ProgramCommandNginxReload implements ProgramCommand {
    #--------------------------------------------------------------------------
    # @method getCommand
    # @access public
    # @params none
    # @return void
    # Metod hundle ...
    #--------------------------------------------------------------------------
    public function getCommand(){
        return 'sudo service nginx reload';
    }
}
