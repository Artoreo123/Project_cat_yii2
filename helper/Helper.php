<?php
namespace app\Helper;

class Helper
{

    public static function changeDateFormat($date)
    {
        if ($date)
        {
            $date = strtotime("$date");
           return date("d/m/Y H:i:s",$date);
        }
        return "-";
    }

    public static function changeReFormat($date)
    {
        if ($date)
        {
            $keep = explode('/',$date);
            $newdate = $keep[2].'-'.$keep[1].'-'.$keep[0];
//            split('/',$date);
//            date("'Y-m-d H:i:s",$date);
            return $newdate;
        }

        return "-";
    }

}