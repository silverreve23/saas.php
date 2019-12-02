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
    #--------------------------------------------------------------------------
    # @method createConfig
    # @access public
    # @params void
    # @return void
    # Metod create config for mysql sub app
    #--------------------------------------------------------------------------
    public function createConfig(){
        $isStatusOk = $this->runProgramCommand(
            new ProgramCommandMysqlCheck
        );
        if($isStatusOk){
            $isConfigured = $this->setConfig(
                new ProgramConfiguratorMysqlServer(
                    new ProgramConfigCreateDBMysqlServer
                )
            );
            return $isConfigured;
        }
    }
    #--------------------------------------------------------------------------
    # @method flushConfig
    # @access public
    # @params void
    # @return void
    # Metod remove config for mysql sub app
    #--------------------------------------------------------------------------
    public function flushConfig(){
        $mysqlConfigurator = new ProgramConfiguratorMysqlServer(
            new ProgramConfigRemoveDBMysqlServer
        );
        return $mysqlConfigurator->flushConfig();
    }
}
