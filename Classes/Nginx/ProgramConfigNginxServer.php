<?php

namespace Classes\Nginx;

use Classes\Program\Interfaces\ProgramConfig;

#------------------------------------------------------------------------------
# @class ProgramConfigNginxServer
# @extends none
# @implements ProgramConfig
# Class config for nginx sub app
#------------------------------------------------------------------------------
class ProgramConfigNginxServer implements ProgramConfig {
    public $nginxConfigSiteAvaliadlePath = '/etc/nginx/site-avaliable';
    public $nginxConfigSiteEnabledlePath = '/etc/nginx/site-enable';
    #--------------------------------------------------------------------------
    # @method getConfig
    # @access public
    # @params void
    # @return object
    # Method get nginx config program
    #--------------------------------------------------------------------------
    public function getConfig(){
        return 'config';
    }
}
