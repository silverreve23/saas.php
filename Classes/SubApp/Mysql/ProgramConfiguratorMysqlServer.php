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
        return $this->runDBStatement(
            $this->mysqlConfig->getConfig()
        );
    }
    #--------------------------------------------------------------------------
    # @method flushConfig
    # @access public
    # @params void
    # @return object
    # Method remove mysql program config
    #--------------------------------------------------------------------------
    public function flushConfig(){
        return $this->runDBStatement(
            $this->mysqlConfig->getConfig()
        );
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
