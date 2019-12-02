<?php

namespace Classes\SubApp\Nginx;

use Classes\Program\Program;
use Classes\Program\Interfaces\ProgramCommand;
use Classes\SubApp\Interfaces\ProgramSubApp;
use Classes\SubApp\Nginx\ProgramCommandNginxCheck;
use Classes\SubApp\Nginx\ProgramCommandNginxReload;
use Classes\SubApp\Nginx\ProgramConfigNginxServer;
use Classes\SubApp\Nginx\ProgramConfiguratorNginxServer;

#------------------------------------------------------------------------------
# @class ProgramNginx
# @extends Program
# @implements ProgramSubApp
# Class hundle nginx configuration for sub app
#------------------------------------------------------------------------------
class ProgramNginx extends Program implements ProgramSubApp {
    #--------------------------------------------------------------------------
    # @method createConfig
    # @access public
    # @params void
    # @return void
    # Metod create config for nginx sub app
    #--------------------------------------------------------------------------
    public function createConfig(){
        $isStatusReloadOk = self::STATUS_ERROR;
        $isStatusOk = $this->runProgramCommand(
            new ProgramCommandNginxCheck
        );
        if($isStatusOk){
            $isConfigured = $this->setConfig(
                new ProgramConfiguratorNginxServer(
                    new ProgramConfigNginxServer
                )
            );
            $isStatusOk = $this->runProgramCommand(
                new ProgramCommandNginxCheck
            );
            if($isConfigured && $isStatusOk){
                $isStatusReloadOk = $this->runProgramCommand(
                    new ProgramCommandNginxReload
                );
            }
            return $isStatusReloadOk;
        }
    }
    #--------------------------------------------------------------------------
    # @method flushConfig
    # @access public
    # @params void
    # @return void
    # Metod remove config for nginx sub app
    #--------------------------------------------------------------------------
    public function flushConfig(){
        $nginxConfigurator = new ProgramConfiguratorNginxServer(
            new ProgramConfigNginxServer
        );
        if($nginxConfigurator->flushConfig())
            return $this->runProgramCommand(
                new ProgramCommandNginxReload
            );
    }
}
