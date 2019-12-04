<?php

namespace Classes\SubApp\Mysql;

use Classes\Program\Program;
use Classes\Program\Interfaces\ProgramCommand;
use Classes\SubApp\Interfaces\ProgramSubApp;
use Classes\SubApp\Mysql\ProgramCommandMysqlCheck;
use Classes\SubApp\Mysql\ProgramCommandMysqlReload;
use Classes\SubApp\Mysql\ProgramConfigCreateDBMysqlServer;
use Classes\SubApp\Mysql\ProgramConfigRemoveDBMysqlServer;
use Classes\SubApp\Mysql\ProgramConfiguratorMysqlServer;

#------------------------------------------------------------------------------
# @class ProgramMysql
# @extends Program
# @implements ProgramSubApp
# Class hundle mysql configuration for sub app
#------------------------------------------------------------------------------
class ProgramMysql extends Program implements ProgramSubApp {
    public function __construct(Object $data){
        $this->configData = $data;
    }
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
                $configType = 'create'
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
        return $this->getMysqlConfigurator(
            $configType = 'remove'
        )->flushConfig();
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
            new ProgramCommandMysqlCheck
        );
    }
    #--------------------------------------------------------------------------
    # @method getMysqlConfigurator
    # @access private
    # @params void
    # @return Object
    # Metod return mysql configurator Object
    #--------------------------------------------------------------------------
    private function getMysqlConfigurator($configType = 'create'){
        $configClass = ($configType == 'create')
            ? ProgramConfigCreateDBMysqlServer::class
            : ProgramConfigRemoveDBMysqlServer::class;
        return new ProgramConfiguratorMysqlServer(
            new $configClass(
                $this->configData
            )
        );
    }
}
