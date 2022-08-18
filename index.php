<?php

require('config.php');
require('./lang/en.php'); //uk.php

$task = 'showProduct';
if (isset($_POST['task'])) {
    $task = htmlspecialchars($_POST['task']);
}
require('./general_view.php');

$gv = new generalView();
$data = [];
$content = '';


switch ($task) {

    case 'showProduct';
        require('model_product.php');
        $model = new modelProduct($cnf);
        $res = $model->getProducts($data, $cnf, $lang);
        //var_dump($res);
        require('view_product.php');
        $view = new productView();
        $content = $view->makeProductTable($res, $cnf, $lang);
        break;

    case 'updateProduct';
        break;

    case 'deleteProduct';
        break;

    case 'createProduct';
        break;

    default:
        break;
}
$page = $gv->makeHeader($data, $cnf, $lang);
$page .= $content;
$page .= $gv->makeFooter($data, $cnf, $lang);
echo $page;
