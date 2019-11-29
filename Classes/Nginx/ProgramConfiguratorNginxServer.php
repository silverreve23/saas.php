<?php

namespace Classes\Nginx;

use Classes\Program\Interfaces\ProgramConfig;
use Classes\Program\Interfaces\ProgramConfigurator;

#------------------------------------------------------------------------------
# @class ProgramConfiguratorNginxServer
# @extends none
# @implements ProgramConfigurator
# Class configurator for nginx sub app
#------------------------------------------------------------------------------
class ProgramConfiguratorNginxServer implements ProgramConfigurator {
    #--------------------------------------------------------------------------
    # @method __construct
    # @access public
    # @params ProgramConfigurator
    # @return void
    # Metod get configurator for nginx program sub app
    #--------------------------------------------------------------------------
    function __construct(ProgramConfig $nginxConfig){
        $this->nginxConfig = $nginxConfig;
    }
    #--------------------------------------------------------------------------
    # @method setConfig
    # @access public
    # @params void
    # @return object
    # Method set nginx program config
    #--------------------------------------------------------------------------
    public function setConfig(){
        return $this->nginxConfig->getConfig();
    }
    #--------------------------------------------------------------------------
    # @method flushConfig
    # @access public
    # @params void
    # @return object
    # Method remove nginx program config
    #--------------------------------------------------------------------------
    public function flushConfig(){
        return true;
    }
}
