<?php
class product
{
    public $id;
    public $Name;
    public $Description;
    public $Price;
    public $Qyantity;
}
class modelProduct
{

    private $db = null;
    public function __construct($cnf)
    {
        $this->db = new PDO($cnf->dbserver, $cnf->dbuser, $cnf->dbpassword);
    }

    public function getProducts($data, $conf, $lang)
    {
        $result = [];

        $sql = "SELECT id, Name, Description, Price, Quantity  FROM {$conf->producttable}";
        $sth = $this->db->prepare($sql);

        $params = array();
        if ($sth->execute($params) == true) {
            $result = $sth->fetchAll(PDO::FETCH_CLASS, 'product');
        }
        return $result;
    }
}
