<?php

namespace Classes\Program\Interfaces;

use Classes\Program\Interfaces\ProgramConfig;

#------------------------------------------------------------------------------
# @interface ProgramConfigurator
# Interface for sub app configurator
#------------------------------------------------------------------------------
interface ProgramConfigurator {
    #--------------------------------------------------------------------------
    # @method __construct
    # @access public
    # @params ProgramConfig
    # @return void
    # Metod set config for configurator program sub app
    #--------------------------------------------------------------------------
    function __construct(ProgramConfig $config);
    #--------------------------------------------------------------------------
    # @method getConfig
    # @access public
    # @params ProgramConfig
    # @return string
    # Metod get config for program sub app
    #--------------------------------------------------------------------------
    public function setConfig();
    #--------------------------------------------------------------------------
    # @method flushConfig
    # @access public
    # @params void
    # @return boolean
    # Metod remove config for program sub app
    #--------------------------------------------------------------------------
    public function flushConfig();
}
