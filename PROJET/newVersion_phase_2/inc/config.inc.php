<?php
/**
 * Created by PhpStorm.
 * User: Grégory
 * Date: 21-05-16
 * Time: 14:20
 */

class Config{
    public $name;
    public $defaultName = "inc/config.ini.php";
    public $data;
    public $writer = "inc/writeConfig.php";
    function __construct($nom = ""){
        if($nom == "")$this->name = $this->defaultName;
        $this->load();
    }
    function load(){
        $this->data=parse_ini_file($this->name, true);
    }
    public function getData($g, $n){
        if(isset($this->data[$g][$n])) return $this->data[$g][$n];
        else return "[$g][$n] inconnu";
    }
    public function getForm(){
        if(!isset($this->data)) return('config not loaded');
        $data = $this->data;
        $out[] = "<form id='conf' name='config' method=\"post\" action=\"$this->writer\">";
        foreach($data as $group=>$property){
            if($group!="erreur")$out[]=$this->handleGroup($group, $property);
        }
        $out[]= "<input id='send' name='send' type=\"submit\" value=\"Envoyer\">";
        $out[]= "</form>";
        return implode("\n", $out);
    }
    function handleGroup($g, $p){
        $tmp = "<fieldset>
                  <legend>" . $g . "</legend>";
        if(isset($p["comment"])) $tmp .= "<p id=comment>".$p["comment"]."</p>";
        foreach($p as $k => $v){
            if($k!="comment"&&$k!="type"&&$k!="choix"&&$k!="min"&&$k!="max"){
                if(is_numeric($v)) {
                    $tmp .= "<p><label for='" . $g."[".$k . "]' style='text-transform : capitalize;'>"
                        . $k . " : </label><input type=number value='"
                        . $v . "' step='1' id='" . $g."[".$k . "]' name='"
                        . $g."[".$k . "]'";
                    if (isset($p["min"])) {
                        $tmp .= " min='" . $p["min"] . "'";
                    }
                    if (isset($p["max"])) {
                        $tmp .= " max='" . $p["max"] . "'";
                    }
                    $tmp .= ">";
                    if(isset($p["min"])&&isset($p["max"])){
                        if($p["min"]==$p["max"]){
                            $tmp .= " (non modifiable) <script>document.getElementById(\"".$g."[".$k."]\").disabled = true;</script>";
                        }else{
                            $tmp .= " min($p[min]) max ($p[min]) step(1)";
                        }
                    }
                    $tmp .= "</p>";
                }else{
                    $tmp .= "<p><label for='" . $g."[".$k . "]' style='text-transform : capitalize;'>" . $k . " : </label><input type=text value='" .$v . "' id='" . $g."[".$k . "]' name='" . $g."[".$k . "]'></p>";
                }
            }
        }
        if (isset($p["type"])&&isset($p["choix"])) {
            $tmp .= "<p style='text-transform : capitalize;'>type : ";
            foreach ($p["type"] as $v) {
                $tmp .= "<input type='checkbox' name='" . $g."[".$v . "]' id='" . $g."[".$v . "]' style='margin-left : 10px;'><label for='" . $v . "'>" . $v . "</label>";
            }
            $tmp .= "</p>";
            foreach ($p["choix"] as $v) {
                $tmp .= "<script> document.getElementById('" . $g."[".$v . "]').checked = true; </script>";
            }
        }
        $tmp .= "</fieldset>";
        return $tmp;
    }
    public function writeConfig(){
        unlink($this->name);
        $monfichier = fopen($this->name, 'a+');
        fputs($monfichier, "[erreur]\n");
        fputs($monfichier, "interdit = \"<?php echo 'Vous n\\'êtes pas autorisé à voir ce contenu.\"'; exit; ?>\"\n");
        fputs($monfichier, "comment = \"; Les commentaires commencent par ';', comme dans php.ini\"\n\n");
        foreach($this->data as $k => $v){
            $isArrayDone = 0;
            if($k != "erreur") {
                fputs($monfichier, "[" . $k . "]\n");
                foreach ($v as $k2 => $v2) {
                    if(is_array($v2)){
                        if($isArrayDone==0) {
                            foreach ($v2 as $i) {
                                if (is_numeric($i)) {
                                    fputs($monfichier, $k2 . "[] = $i\n");
                                } else {
                                    fputs($monfichier, $k2 . "[] = \"$i\"\n");
                                }
                            }
                            foreach ($v2 as $i) {
                                if (isset($_POST[$k][$i])) {
                                    if (is_numeric($i)) {
                                        fputs($monfichier, "choix[] = $i\n");
                                    } else {
                                        fputs($monfichier, "choix[] = \"$i\"\n");
                                    }
                                }
                            }
                            $isArrayDone = 1;
                        }
                    }else if(isset($_POST[$k][$k2])){
                        if(is_numeric($_POST[$k][$k2])){
                            fputs($monfichier, $k2 . " = " . $_POST[$k][$k2]."\n");
                        }else{
                            fputs($monfichier, $k2 . " = \"" . $_POST[$k][$k2]."\"\n");
                        }
                    }else{
                        if(is_numeric($v2)){
                            fputs($monfichier, $k2 . " = ".$v2."\n");
                        }else{
                            fputs($monfichier, $k2 . " = \"".$v2."\"\n");
                        }
                    }
                }
                fputs($monfichier, "\n");
            }
        }
        fclose($monfichier);
        $this->load();
        return "Configuration sauvegardée";
    }
}

?>