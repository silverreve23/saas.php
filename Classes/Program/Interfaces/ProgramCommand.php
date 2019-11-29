<?php

namespace Classes\Program\Interfaces;

#------------------------------------------------------------------------------
# @interface ProgramCommand
# Interface for sub app program
#------------------------------------------------------------------------------
interface ProgramCommand {
    #--------------------------------------------------------------------------
    # @method getCommand
    # @access public
    # @params void
    # @return string
    # Method get program command for sub program app
    #--------------------------------------------------------------------------
    public function getCommand();
}
