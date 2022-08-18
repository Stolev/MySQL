<?php

class productView
{
    public function makeProductTable($data, $conf, $lang)
    {
        $html = '<table><thead>';
        foreach ($data[0] as $key => $value) {
            $html .= "<th>{$lang->$key}</th>";
        }
        $html .= '</thead><tbody>';
        foreach ($data as $product) {
            $html .= '<tr>';
            foreach ($product as $value) {
                $html .= "<td>{$value}</td>";
            }
            $html .= '</tr>';
        }
        $html .= '<tbody></table>';
        return $html;
    }
}
