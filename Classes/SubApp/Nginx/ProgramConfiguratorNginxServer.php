<?php

namespace Classes\SubApp\Nginx;

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
        $siteAppConfigName = 'saas_test';
        $siteAppConfig = $this->nginxConfig->getConfig();
        $siteConfigFile =
            $this->nginxConfig->siteAvaliadlePath
            .$siteAppConfigName;
        $isCreated = file_put_contents($siteConfigFile, $siteAppConfig);
        var_dump($isCreated);
        return $isCreated;
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
