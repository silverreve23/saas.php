<?php

namespace Classes\Program;

use Classes\Program\Interfaces\ProgramCommand;
use Classes\Program\Interfaces\ProgramMain;
use Classes\Program\Interfaces\ProgramConfig;
use Classes\Program\Interfaces\ProgramConfigurator;


#------------------------------------------------------------------------------
# @class Program
# @extends none
# @implements ProgramMain
# Class extends program for nginx sub app
#------------------------------------------------------------------------------
class Program implements ProgramMain {
    #--------------------------------------------------------------------------
    # @method ProgramNginx
    # @access public
    # @params ProgramCommand
    # @return object
    # Method run given command
    #--------------------------------------------------------------------------
    public function runCommand(ProgramCommand $program){
        $commandResult = exec($program->getCommand(), $execOutput, $execReturned);
        return (object) array(
            'response' => $execOutput,
            'status' => $execReturned
        );
    }
    #--------------------------------------------------------------------------
    # @method setConfig
    # @access public
    # @params ProgramConfig
    # @return boolean
    # Method set config for program
    #--------------------------------------------------------------------------
    public function setConfig(ProgramConfigurator $configurator){
        return $configurator->setConfig();
    }
}
