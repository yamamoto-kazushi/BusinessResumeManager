<?php
namespace App\Http\Controllers;

class Common
{
    /**
     * 改行をカンマに変える
     * @param string $str
     * @return string
     */
    public static function indentToComma($str) {
        return str_replace(array("\r\n", "\r", "\n"), ',', $str);
    }

}

?>