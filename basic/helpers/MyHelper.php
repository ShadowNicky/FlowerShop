<?php


namespace app\helpers;


class MyHelper
{
    /**
     * Склонение числительныхфывфывфывф
     * @param int $numberof — склоняемое число
     * @param string $value — первая часть слова (можно назвать корнем)
     * @param array $suffix — массив возможных окончаний слов
     * @return string
     *
     */
    public static function numberof($numberof, $value, $suffix)
    {
        $keys = array(2, 0, 1, 1, 1, 2);
        $mod = $numberof % 100;
        $suffix_key = $mod > 4 && $mod < 20 ? 2 : $keys[min($mod % 10, 5)];

        return $value . $suffix[$suffix_key];
    }

}