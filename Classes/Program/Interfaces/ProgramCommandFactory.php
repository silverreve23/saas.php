<?php

namespace Classes\Program\Interfaces;
use Classes\Program\Interfaces\ProgramCommand;

#------------------------------------------------------------------------------
# @interface ProgramCommand
# Interface for sub app program
#------------------------------------------------------------------------------
interface ProgramCommandFactory {
    #--------------------------------------------------------------------------
    # @method getCommand
    # @access public
    # @params void
    # @return string
    # Method get program command for sub program app
    #--------------------------------------------------------------------------
    public function getCommand(): ProgramCommand;
}
