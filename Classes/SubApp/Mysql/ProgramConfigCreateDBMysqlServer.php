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
    #--------------------------------------------------------------------------
    # @method getConfig
    # @access public
    # @params void
    # @return object
    # Method get mysql config program
    #--------------------------------------------------------------------------
    public function getConfig(){
        return "
            CREATE DATABASE SAAS_DB_TEST;
            CREATE USER 'saas_user_test'@'localhost' IDENTIFIED BY 'password';
            GRANT ALL PRIVILEGES ON SAAS_DB_TEST.* TO 'saas_user_test'@'localhost';
            FLUSH PRIVILEGES;
        ";
    }
}
