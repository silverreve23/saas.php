<?php

namespace Classes\SubApp\Mysql;

use Classes\Program\Interfaces\ProgramConfig;
use Classes\Program\Interfaces\ProgramConfigurator;
use mysqli as Mysqli;

#------------------------------------------------------------------------------
# @class ProgramConfiguratorMysqlServer
# @extends none
# @implements ProgramConfigurator
# Class configurator for mysql sub app
#------------------------------------------------------------------------------
class ProgramConfiguratorMysqlServer implements ProgramConfigurator {
    #--------------------------------------------------------------------------
    # @method __construct
    # @access public
    # @params ProgramConfigurator
    # @return void
    # Metod get configurator for mysql program sub app
    #--------------------------------------------------------------------------
    function __construct(ProgramConfig $mysqlConfig){
        $this->mysqlConfig = $mysqlConfig;
    }
    #--------------------------------------------------------------------------
    # @method setConfig
    # @access public
    # @params void
    # @return object
    # Method set mysql program config
    #--------------------------------------------------------------------------
    public function setConfig(){
        $createMysqlConfig = $this->mysqlConfig->getConfig();
        $resultStatement = $this->runDBStatement($createMysqlConfig);
        return $resultStatement;
    }
    #--------------------------------------------------------------------------
    # @method flushConfig
    # @access public
    # @params void
    # @return object
    # Method remove mysql program config
    #--------------------------------------------------------------------------
    public function flushConfig(){
        $removeMysqlConfig = $this->mysqlConfig->getConfig();
        $resultStatement = $this->runDBStatement($removeMysqlConfig);
        return $resultStatement;
    }
    #--------------------------------------------------------------------------
    # @method runDBStatement
    # @access private
    # @params string
    # @return boolean
    # Method run given db mysql statemend
    #--------------------------------------------------------------------------
    private function runDBStatement($statement){
        $mysqli = new Mysqli("localhost", "root", "vmbn");
        if($mysqli->connect_errno) die($mysqli->connect_error);
        $result = $mysqli->multi_query($statement);
        $mysqli->close();
        return $result;
    }
}
