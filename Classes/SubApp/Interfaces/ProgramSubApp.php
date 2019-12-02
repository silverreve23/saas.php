<?php

namespace Classes\SubApp\Interfaces;

use Classes\Program\Interfaces\ProgramCommand;
use Classes\Program\Interfaces\ProgramConfigurator;

#------------------------------------------------------------------------------
# @interface ProgramSubApp
# Interface for sub app program
#------------------------------------------------------------------------------
interface ProgramSubApp {
    #--------------------------------------------------------------------------
    # @method createConfig
    # @access public
    # @params void
    # @return boolean
    # Method create config for sub app program
    #--------------------------------------------------------------------------
    public function createConfig();
    #--------------------------------------------------------------------------
    # @method flushConfig
    # @access public
    # @params void
    # @return boolean
    # Method flush config for sub app program
    #--------------------------------------------------------------------------
    public function flushConfig();
}
