<?php

namespace Classes\Program\Interfaces;

#------------------------------------------------------------------------------
# @interface ProgramConfig
# Interface for sub app configurations
#------------------------------------------------------------------------------
interface ProgramConfig {
    #--------------------------------------------------------------------------
    # @method getConfig
    # @access public
    # @params void
    # @return string
    # Metod get config for program sub app
    #--------------------------------------------------------------------------
    public function getConfig();
}
