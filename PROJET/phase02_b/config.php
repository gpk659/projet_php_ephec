<?php
/**
 * Created by PhpStorm.
 * User: Grégory
 * Date: 02-05-16
 * Time: 17:50
 */
class Config
{
    var $tabconfig;
    function config(){
        return $tabconfig = parse_ini_file("INC/config.ini.php", true);
    }
    function construct($nom = ""){
        if ($nom == "") $this->name = $this->defaultName;
        $this->load();
    }
    function getData($g,$n){
        if (isset($this->data[$g][$n]))return $this->data[$g][$n];
        else return "[$g][$n] inconnu";
    }
}

?>