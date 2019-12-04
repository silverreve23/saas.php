<?php

namespace Classes\Program\Interfaces;

#------------------------------------------------------------------------------
# @interface ProgramConfig
# Interface for sub app configurations
#------------------------------------------------------------------------------
interface ProgramConfig {
    #--------------------------------------------------------------------------
    # @method __construct
    # @access public
    # @params object
    # @return void
    # Metod constructor for program config sub app
    # Method given site app user data
    #--------------------------------------------------------------------------
    public function __construct(Object $data);
    #--------------------------------------------------------------------------
    # @method getConfig
    # @access public
    # @params void
    # @return string
    # Metod get config for program config sub app
    #--------------------------------------------------------------------------
    public function getConfig();
}
