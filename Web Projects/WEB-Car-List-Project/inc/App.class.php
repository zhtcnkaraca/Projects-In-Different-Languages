<?php
class App {
    public $appname = "Örnek Proje";
    public $appversion = "v0.1";

    public function name() {
        echo $this->getName();
    }
    public function getName() {
        return $this->appname;
    }
    public function version() {
        echo $this->getVersion();
    }
    public function getVersion() {
        return $this->appversion;
    }
}