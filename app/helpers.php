<?php

 if (!function_exists('getRusDate'))
 {
    function getRusDate(/*$dateTime */ $timestamp, $format = '%DAYWEEK%, d %MONTH% Y H:i', $offset = 0)
    {
        $monthArray = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
        $daysArray = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];

        //$timestamp = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->timestamp; // преобразует дату в метку времени
        $timestamp += 3600 * $offset;   // Смещение на указанное число часов

        $findArray = ['/%MONTH%/i', '/%DAYWEEK%/i'];
        $replaceArray = [$monthArray[date("m", $timestamp) - 1], $daysArray[date("N", $timestamp) - 1]];
        $format = preg_replace($findArray, $replaceArray, $format);

        return date($format, $timestamp);
    }
}

if (!function_exists('getArray'))
{
    function getArray($array)
    {
        $temp = [];
        foreach ($array as $key => $value){
            $n = mb_strtoupper(mb_substr($value, 0, 1, 'UTF-8')); // Получаем первую букву слова в верхнем регистре
            data_set($temp, "{$n}.{$key}", $value);
        }
        return $temp;
    }
}

if (!function_exists('getArrayToMenu'))
{
    function getArrayToMenu($array)
    {
        $array = getArray($array);
        $temp = [];
        $i = 0;
        $j = 1;
        foreach ($array as $key => $value)
        {
            $i ++;
            data_set($temp, "{$j}.{$key}", $value);
            if( $i == $j * ceil(count($array) / 4)) $j ++;
        }
        return $temp;
    }
}

if (! function_exists('wp_strip_all_tags'))
{
    function wp_strip_all_tags($string, $remove_breaks = false)
    {
        $string = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $string );
        $string = strip_tags($string);
        if ( $remove_breaks )
            $string = preg_replace('/[\r\n\t ]+/', ' ', $string);
        return trim( $string );
    }
}

if (! function_exists('getTree'))
{
    function getTree($data)
    {
        $tree = [];
        foreach ($data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }
}

if (! function_exists('is_admin'))
{
    function is_admin()
    {
       return Auth::check() && Auth::user()->role == 3 ? true : false;
    }
}

if (! function_exists('strReplaceStrong'))
{
    function strReplaceStrong($search, $str)
    {
        $arr = explode(" ", $search);
        foreach ($arr as $key=>$value)
        {
            if(mb_strlen($value, 'UTF-8') < 2) continue;
            $str = preg_replace("/$value/iu", "<strong>$0</strong>", $str);
        }
        return $str;
    }
}

