<?php

namespace Classes\SubApp\Nginx;

use Classes\Program\Program;
use Classes\Program\Interfaces\ProgramCommand;
use Classes\SubApp\Interfaces\ProgramSubApp;
use Classes\SubApp\Nginx\ProgramConfigNginxServer;
use Classes\SubApp\Nginx\ProgramConfiguratorNginxServer;
use Classes\SubApp\Nginx\ProgramCommandNginxFactory;

#------------------------------------------------------------------------------
# @class ProgramNginx
# @extends Program
# @implements ProgramSubApp
# Class hundle nginx configuration for sub app
#------------------------------------------------------------------------------
class ProgramNginx extends Program implements ProgramSubApp {
    private const NGINX_CHECK_COMMAND = self::CHECK_COMMAND_PROGRAM;
    private const NGINX_RELOAD_COMMAND = self::CHECK_RELOAD_PROGRAM;
    #--------------------------------------------------------------------------
    # @method createConfig
    # @access public
    # @params void
    # @return void
    # Metod create config for nginx sub app
    #--------------------------------------------------------------------------
    public function createConfig(){
        $this->setConfig(
            $this->getNginxConfigurator()
        );
        $this->checkNginx();
        $this->reloadNginx();
    }
    #--------------------------------------------------------------------------
    # @method flushConfig
    # @access public
    # @params void
    # @return void
    # Metod remove config for nginx sub app
    #--------------------------------------------------------------------------
    public function flushConfig(){
        $this->getNginxConfigurator()->flushConfig();
        return $this->reloadNginx();
    }
    #--------------------------------------------------------------------------
    # @method reloadNginx
    # @access private
    # @params void
    # @return boolean
    # Metod run reload nginx command and return status
    #--------------------------------------------------------------------------
    private function reloadNginx(){
        return $this->runProgramCommand(
            $this->getCommand(self::NGINX_RELOAD_COMMAND)
        );
    }
    #--------------------------------------------------------------------------
    # @method checkNginx
    # @access private
    # @params void
    # @return boolean
    # Metod run check status nginx command and return status
    #--------------------------------------------------------------------------
    private function checkNginx(){
        return $this->runProgramCommand(
            $this->getCommand(self::NGINX_CHECK_COMMAND)
        );
    }
    #--------------------------------------------------------------------------
    # @method getNginxConfigurator
    # @access private
    # @params void
    # @return Object
    # Metod return nginx configurator Object
    #--------------------------------------------------------------------------
    private function getNginxConfigurator(){
        return new ProgramConfiguratorNginxServer(
            new ProgramConfigNginxServer(
                $this->configData
            )
        );
    }
    #--------------------------------------------------------------------------
    # @method getCommand
    # @access private
    # @params string
    # @return Object
    # Metod return nginx command
    #--------------------------------------------------------------------------
    private function getCommand($commandName = self::NGINX_CHECK_COMMAND){
        $commandFactory = new ProgramCommandNginxFactory;
        return $commandFactory->getCommand(self::NGINX_CHECK_COMMAND);
    }
}
