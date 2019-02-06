<?php

/**
 * Classe parsant un fichier xml et crée une news adaptée.
 */
class XmlParser {

    private $co;

    private $path;
    private $result;

    private $bTitle = false;
    private $bItem = false;
    private $blink = false;
    private $bDate = false;
    private $bDes = false;

    private $title = "undefined";
    private $link = "undefined";
    private $date = "undefined";
    private $des = "undefined";

    private $news;

    private  $ref;


    public function __construct($path, $ref)
    {
        $this->news = new News("dd","","","","");
        $this -> path =$path;
        $this -> news->setSiteRef($ref);
        global $base,$login,$mdp;
        $this->co = new Connection($base,$login,$mdp);

    }
/*
    private function init(){
        $this->title = "undefined";jvd
        $this->link = "undefined";
        $this->date = "undefined";
        $this->news = "undefined";
        $this->des = "undefined";
    }
*/
    public function getResult() {
        return $this->result;
    }

    /**
     * Parse le fichier et met le resultat dans Result
     */

    public function parse()
    {
        ob_start();
        $xml_parser = xml_parser_create();
        xml_set_object($xml_parser, $this);
        xml_set_element_handler($xml_parser, "startElement", "endElement");
        xml_set_character_data_handler($xml_parser, 'characterData');
        if (!($fp = fopen($this -> path, "r"))) {
            die("could not open XML input");
        }
        while ($data = fread($fp, 4096)) {
            if (!xml_parse($xml_parser, $data, feof($fp))) {
                die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
            }
        }

        $this -> result = ob_get_contents();
        ob_end_clean();
        fclose($fp);
        xml_parser_free($xml_parser);
    }

    private function startElement($parser, $name, $attrs)
    {

        switch($name){
            case "ITEM":
                $this->bItem = true;
                break;
            case "TITLE":
                $this->bTitle = true;
                break;
            case  "LINK" :
                $this->blink = true;
                break;
            case "PUBDATE":
                $this->bDate = true;
                break;
            case "DESCRIPTION":
                $this->bDes = true;
                break;
            default :
                continue;
        }


    }

    //si item il crée la news
    private function endElement($parser, $name)
    {
        if($name == "ITEM"){
            $querry='Select * from News where url=:url';
            $this->co->executeQuery($querry, array(':url' => array($this->link,PDO::PARAM_STR)));
            $result = $this->co->getResults();
            if (!isset ($result[0])){
                $gt = new NewsGt();
                $gt->insertNewsbyNews($this->news);
            }
            //$this->init();

        }

    }

    private function characterData($parser, $data)
    {
        if ($this->bItem == true){
            $this->news = new News("dd","",$this->ref,"","");
            $this->bItem = false;
        }
        if ($this->blink == true){
            $this->news->setUrl($data);
            $this->blink = false;
            echo $data;
        }
        if ($this->bDate == true){
            $this->news->setQuand($data);
            $this->bDate = false;
        }
        if ($this->bTitle == true){
            $this->news->setTitre($data);
            $this->bTitle = false;
        }
        if ($this->bDes == true){
            $this->news->setDes($data);
            $this->bDes = false;
        }

    }
}
?>
