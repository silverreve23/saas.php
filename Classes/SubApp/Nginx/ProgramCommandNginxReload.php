<?php

namespace Classes\SubApp\Nginx;

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
    # @return string
    # Metod return reload nginx command
    #--------------------------------------------------------------------------
    public function getCommand(){
        return '
            sudo service nginx stop;
            sudo service nginx start;
        ';
    }
}
