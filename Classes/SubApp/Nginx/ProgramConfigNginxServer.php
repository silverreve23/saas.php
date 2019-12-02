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
    public $siteAvaliadlePath = '/etc/nginx/sites-available/';
    public $siteEnabledlePath = '/etc/nginx/sites-enable/';
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
