<?php
class Category
{
    public $Id;
    public $Name;
    public $Description;
}
class Model_Category{

    private $db=null;
    public function __construct($cnf){
        $this->db = new PDO ($cnf->dbserver,$cnf->dbuser,$cnf->dbpassword);
    }
        
    public function getCategory($data, $conf, $lang){
        $result = [];

        $sql ="SELECT Id,Name,Description FROM {$conf->categorytable}";
        $sth = $this->db->prepare($sql);

        $params = array();
        if ($sth->execute($params) == true){
        $result = $sth->fetchAll(PDO::FETCH_CLASS,'category');
        }
        return $result;
    }
}
