<?php

namespace Classes\SubApp\Mysql;

use Classes\Program\Interfaces\ProgramConfig;

#------------------------------------------------------------------------------
# @class ProgramConfigRemoveDBMysqlServer
# @extends none
# @implements ProgramConfig
# Class config of remove db mysql for sub app
#------------------------------------------------------------------------------
class ProgramConfigRemoveDBMysqlServer implements ProgramConfig {
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
            DROP DATABASE saas_db_{$this->configData->name};
            DROP USER 'saas_user_{$this->configData->name}'@'localhost';
            FLUSH PRIVILEGES;
        ";
    }
}
