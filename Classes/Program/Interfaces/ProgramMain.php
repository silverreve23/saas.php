<?php

namespace Classes\Program\Interfaces;

use Classes\Program\Interfaces\ProgramCommand;
use Classes\Program\Interfaces\ProgramConfigurator;

#------------------------------------------------------------------------------
# @interface ProgramMain
# Interface for sub app program main
#------------------------------------------------------------------------------
interface ProgramMain {
    #--------------------------------------------------------------------------
    # @method setConfig
    # @access public
    # @params ProgramConfigurator
    # @return boolean
    # Method set configurator program
    #--------------------------------------------------------------------------
    public function setConfig(ProgramConfigurator $configurator);
    #--------------------------------------------------------------------------
    # @method runCommand
    # @access public
    # @params ProgramCommand
    # @return boolean
    # Method run command program
    #--------------------------------------------------------------------------
    public function runCommand(ProgramCommand $program);
}
