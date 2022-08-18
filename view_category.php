<?php

class categoryView{
    public function makeCategoryTable($data, $conf, $lang){
    $html ='<table><thead>';
        foreach ($data[0] as $key=>$value){
            $html .= "<th>{$lang->$key}</th>";
        }
        $html .= '</thead><tbody>';
    foreach($data as $category){
            $html .= '<tr>';
        foreach($category as $value){
                $html .= "<td>{$value}</td>";
        }
            $html .= '</tr>';
    }
    $html .='<tbody></table>';
    return $html;
    }

}
