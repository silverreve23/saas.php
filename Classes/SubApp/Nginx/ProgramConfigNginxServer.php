<?php

namespace Classes\SubApp\Nginx;

use Classes\Program\Interfaces\ProgramConfig;

#------------------------------------------------------------------------------
# @class ProgramConfigNginxServer
# @extends none
# @implements ProgramConfig
# Class config for nginx sub app
#------------------------------------------------------------------------------
class ProgramConfigNginxServer implements ProgramConfig {
    public $siteAvailablePath = '/etc/nginx/sites-available/';
    public $siteEnabledPath = '/etc/nginx/sites-enabled/';
    private $configData = null;
    #--------------------------------------------------------------------------
    # @method __construct
    # @access public
    # @params object
    # @return void
    # Metod constructor for program nginx sub app
    # Method given site app nginx user data
    #--------------------------------------------------------------------------
    public function __construct(Object $data){
        $this->configData = $data;
        $this->siteAvailablePath .= $this->configData->name;
        $this->siteEnabledPath .= $this->configData->name;
    }
    #--------------------------------------------------------------------------
    # @method getConfig
    # @access public
    # @params void
    # @return object
    # Method get nginx config program
    #--------------------------------------------------------------------------
    public function getConfig(){
        return "
            server {
                listen localhost:8090;
                listen localhost:8090 ssl;

                ssl_certificate /etc/ssl/certs/nginx-self.crt;
                ssl_certificate_key /etc/ssl/private/nginx-self.key;

                root /home/sbk/Documents/web/delisaas/public;

                index index.php index.html index.htm;

                server_name _;

                location / {
                    try_files \$uri \$uri/ /index.php?\$query_string;
                }

                location ~ \.php$ {
                    include snippets/fastcgi-php.conf;
                    fastcgi_pass unix:/run/php/php5.6-fpm.sock;
                }

                location ~ /\.ht {
                    deny all;
                }
            }
        ";
    }
}
