<?php

require('config.php');
require('./lang/en.php'); //uk.php

$task = 'showCategorys';
if (isset($_POST['task'])){
    $task = htmlspecialchars($_POST['task']);
}
require('./general_view.php');

$gv = new generalView();
$data = [];
$content ='';


switch ($task){

    case 'showCategorys';
        require('model_category.php');
        $model = new Model_Category($cnf);
        $res = $model->getCategory($data,$cnf,$lang);
        //var_dump($res);
        require('view_category.php');
        $view = new categoryView;
        $content = $view->makeCategoryTable($res, $cnf, $lang);
    break;

    case 'updateCategory';
    break;

    case 'deleteCategory';
    break;

    case 'createCategory';
    break;

    default:
break;
}
$page = $gv->makeHeader($data, $cnf, $lang);
$page.= $content;
$page .= $gv->makeFooter($data, $cnf, $lang);
echo $page;
