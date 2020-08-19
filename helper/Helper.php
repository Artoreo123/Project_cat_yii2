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
    public static function changeDateFormatFull($date)
    {
        if ($date)
        {
            $date = strtotime("$date");
            return date("d M Y",$date);
        }
        return "-";
    }
    public static function DateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
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
    public static function convertData($data){

        $array = [];
        foreach($data as $item){
            $array[$item['year']][$item['month']][$item['day']] = ['amount_cat' => $item['amount_cat'],'amount_order' => $item['amount_order'],'text_date' => self::changeDateFormatFull($item['text_date'])];
        }
        return $array;

    }

}