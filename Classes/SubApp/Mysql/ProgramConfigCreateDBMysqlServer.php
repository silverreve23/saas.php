<?php

namespace Classes\SubApp\Mysql;

use Classes\Program\Interfaces\ProgramConfig;

#------------------------------------------------------------------------------
# @class ProgramConfigCreateDBMysqlServer
# @extends none
# @implements ProgramConfig
# Class config of create db mysql for sub app
#------------------------------------------------------------------------------
class ProgramConfigCreateDBMysqlServer implements ProgramConfig {
    public function __construct(Object $data){
        $this->configData = $data;
    }
    #--------------------------------------------------------------------------
    # @method getConfig
    # @access public
    # @params void
    # @return object
    # Method get mysql config program
    #--------------------------------------------------------------------------
    public function getConfig(){
        return "
            CREATE DATABASE saas_db_{$this->configData->name};
            CREATE USER 'saas_user_{$this->configData->name}'@'localhost' IDENTIFIED BY 'password';
            GRANT ALL PRIVILEGES ON saas_db_{$this->configData->name}.* TO 'saas_user_{$this->configData->name}'@'localhost';
            FLUSH PRIVILEGES;
        ";
    }
}
