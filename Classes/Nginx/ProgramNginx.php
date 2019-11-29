<?php

namespace Classes\Nginx;

use Classes\Program\Program;
use Classes\Program\Interfaces\ProgramCommand;
use Classes\Nginx\ProgramCommandNginxCheck;
use Classes\Nginx\ProgramCommandNginxReload;
use Classes\Nginx\ProgramConfigNginxServer;
use Classes\Nginx\ProgramConfiguratorNginxServer;

#------------------------------------------------------------------------------
# @class ProgramNginx
# @extends Program
# @implements ProgramConfig
# Class hundle nginx configuration for sub app
#------------------------------------------------------------------------------
class ProgramNginx extends Program {
    protected const STATUS_ERROR = -1;
    #--------------------------------------------------------------------------
    # @method createConfig
    # @access public
    # @params void
    # @return void
    # Metod create config for nginx sub app
    #--------------------------------------------------------------------------
    public function createConfig(){
        $statusReloadOk = self::STATUS_ERROR;
        $isStatusOk = $this->runNginxCommand(
            new ProgramCommandNginxCheck
        );
        if($isStatusOk){
            $cunfigured = $this->setConfig(
                new ProgramConfiguratorNginxServer(
                    new ProgramConfigNginxServer
                )
            );
            $isStatusOk = $this->runNginxCommand(
                new ProgramCommandNginxCheck
            );
            if($cunfigured && $isStatusOk){
                $isStatusReloadOk = $this->runNginxCommand(
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
            return $this->runNginxCommand(
                new ProgramCommandNginxReload
            );
    }
    #--------------------------------------------------------------------------
    # @method runNginxCommand
    # @access public
    # @params ProgramCommand
    # @return boolean
    # Metod check nginx server status
    #--------------------------------------------------------------------------
    private function runNginxCommand(ProgramCommand $command){
        $commandNginxCheckResult = $this->runCommand(
            $command
        );
        return ($commandNginxCheckResult->status == 0);
    }
}
