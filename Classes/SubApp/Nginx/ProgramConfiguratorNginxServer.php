<?php

namespace Classes\SubApp\Nginx;

use Classes\Program\Interfaces\ProgramConfig;
use Classes\Program\Interfaces\ProgramConfigurator;

#------------------------------------------------------------------------------
# @class ProgramConfiguratorNginxServer
# @extends none
# @implements ProgramConfigurator
# Class configurator for nginx sub app
#------------------------------------------------------------------------------
class ProgramConfiguratorNginxServer implements ProgramConfigurator {
    public function __construct(ProgramConfig $nginxConfig){
        $this->nginxConfig = $nginxConfig;
        $this->availableFile = $this->nginxConfig->siteAvailablePath;
        $this->enableLink = $this->nginxConfig->siteEnabledPath;
    }
    #--------------------------------------------------------------------------
    # @method setConfig
    # @access public
    # @params void
    # @return object
    # Method set nginx program config
    #--------------------------------------------------------------------------
    public function setConfig(){
        return (
            $this->putConfigFile()
            && $this->putConfigLink()
        );
    }
    #--------------------------------------------------------------------------
    # @method flushConfig
    # @access public
    # @params void
    # @return object
    # Method remove nginx program config
    #--------------------------------------------------------------------------
    public function flushConfig(){
        return $this->removeConfig();
    }
    #--------------------------------------------------------------------------
    # @method putConfigFile
    # @access private
    # @params string
    # @return boolean
    # Metod write file config for nginx web server
    #--------------------------------------------------------------------------
    private function putConfigFile(){
        return file_put_contents(
            $this->availableFile,
            $this->nginxConfig->getConfig()
        );
    }
    #--------------------------------------------------------------------------
    # @method putConfigLink
    # @access private
    # @params void
    # @return boolean
    # Metod create file link of config file nginx web server
    #--------------------------------------------------------------------------
    private function putConfigLink(){
        return @symlink(
            $this->availableFile,
            $this->enableLink
        );
    }
    #--------------------------------------------------------------------------
    # @method removeConfig
    # @access private
    # @params void
    # @return boolean
    # Metod remove file and link of config file nginx web server
    #--------------------------------------------------------------------------
    private function removeConfig(){
        return (
            unlink($this->availableFile)
            && unlink($this->enableLink)
        );
    }
}
