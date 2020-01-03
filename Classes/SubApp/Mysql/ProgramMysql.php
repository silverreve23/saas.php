<?php

namespace Classes\SubApp\Mysql;

use Classes\Program\Program;
use Classes\Program\Interfaces\ProgramCommand;
use Classes\SubApp\Interfaces\ProgramSubApp;
use Classes\SubApp\Mysql\ProgramConfigCreateDBMysqlServer;
use Classes\SubApp\Mysql\ProgramConfigRemoveDBMysqlServer;
use Classes\SubApp\Mysql\ProgramConfiguratorMysqlServer;
use Classes\SubApp\Mysql\ProgramCommandMysqlFactory;

#------------------------------------------------------------------------------
# @class ProgramMysql
# @extends Program
# @implements ProgramSubApp
# Class hundle mysql configuration for sub app
#------------------------------------------------------------------------------
class ProgramMysql extends Program implements ProgramSubApp {
    private const MYSQL_CHECK_COMMAND = self::CHECK_COMMAND_PROGRAM;
    #--------------------------------------------------------------------------
    # @method createConfig
    # @access public
    # @params void
    # @return void
    # Metod create config for mysql sub app
    #--------------------------------------------------------------------------
    public function createConfig(){
        $this->checkMysql();
        return $this->setConfig(
            $this->getMysqlConfigurator(
                $configType = self::CREATE_CONFIG_TYPE
            )
        );
    }
    #--------------------------------------------------------------------------
    # @method flushConfig
    # @access public
    # @params void
    # @return void
    # Metod remove config for mysql sub app
    #--------------------------------------------------------------------------
    public function flushConfig(){
        return $this
            ->getMysqlConfigurator(self::REMOVE_CONFIG_TYPE)
            ->flushConfig();
    }
    #--------------------------------------------------------------------------
    # @method checkMysql
    # @access private
    # @params void
    # @return boolean
    # Metod run check status mysql command and return status
    #--------------------------------------------------------------------------
    private function checkMysql(){
        return $this->runProgramCommand(
            $this->getCommand(self::MYSQL_CHECK_COMMAND)
        );
    }
    #--------------------------------------------------------------------------
    # @method getMysqlConfigurator
    # @access private
    # @params void
    # @return Object
    # Metod return mysql configurator Object
    #--------------------------------------------------------------------------
    private function getMysqlConfigurator($configType = self::CREATE_CONFIG_TYPE){
        return new ProgramConfiguratorMysqlServer(
            $this->getConfig($configType == self::CREATE_CONFIG_TYPE)
        );
    }
    #--------------------------------------------------------------------------
    # @method getCommand
    # @access private
    # @params string
    # @return Object
    # Metod return mysql command
    #--------------------------------------------------------------------------
    private function getCommand($commandName = self::MYSQL_CHECK_COMMAND){
        $commandFactory = new ProgramCommandMysqlFactory;
        return $commandFactory->getCommand(self::MYSQL_CHECK_COMMAND);
    }
    #--------------------------------------------------------------------------
    # @method getConfig
    # @access private
    # @params string
    # @return Object
    # Metod return mysql config
    #--------------------------------------------------------------------------
    private function getConfig($configType = self::CREATE_CONFIG_TYPE){
        $configClass = ($configType == self::CREATE_CONFIG_TYPE)
            ? new ProgramConfigCreateDBMysqlServer($this->configData)
            : new ProgramConfigRemoveDBMysqlServer($this->configData);
        return $configClass;
    }
}
