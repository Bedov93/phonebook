<?php

if (!function_exists('dd')) {
    function dd()
    {
        array_map(function($x) {
            echo "<pre>";
            var_dump($x);
            echo "</pre>";
        }, func_get_args());
        die;
    }
}

function captcha() {
    session_start();

    $captcha = rand(1000, 9999);
    $_SESSION['captcha'] = md5($captcha);

    //generate image
    $im = imagecreatetruecolor(90, 32);

    //colors:
    $white = imagecolorallocate($im, 255, 255, 255);
    $grey = imagecolorallocate($im, 128, 128, 128);
    $black = imagecolorallocate($im, 0, 0, 0);

    imagefilledrectangle($im, 0, 0, 200, 35, $black);

    $font = 'fonts/arial.ttf';

    imagettftext($im, 24, 0, 12, 26, $grey, $font, $captcha);
    imagettftext($im, 24, 0, 8, 28, $white, $font, $captcha);

    // prevent client side  caching
    header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    //send image to browser
    header ("Content-type: image/gif");
    imagegif($im);
    imagedestroy($im);

}

function phone2string ($number){

    $smallNumbers=array(
        array('ноль'),
        array('','один','два','три','четыре','пять','шесть','семь','восемь','девять'),
        array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать',
            'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать'),
        array('','','двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят','восемьдесят','девяносто'),
        array('','сто','двести','триста','четыреста','пятьсот','шестьсот','семьсот','восемьсот','девятьсот'),
        array('','одна','две')
    );
    $degrees=array(
        array('','','а','ов'),
        array('тысяч','а','и',''),
        array('миллион','','а','ов'),
        array('миллиард','','а','ов'),
        array('триллион','','а','ов'),
        array('квадриллион','','а','ов'),
        array('квинтиллион','','а','ов'),
        array('секстиллион','','а','ов'),
        array('септиллион','','а','ов'),
        array('октиллион','','а','ов'),
        array('нониллион','','а','ов'),
        array('дециллион','','а','ов')
    );

    if ($number==0) return $smallNumbers[0][0];
    $sign = '';
    if ($number<0) {
        $sign = 'минус ';
        $number = substr ($number,1);
    }
    $result=array();


    $digitGroups = array_reverse(
        str_split(
            str_pad(
                $number,
                ceil(
                    strlen($number)/3)*3,
                    '0',
                STR_PAD_LEFT),
            3)
    );
    foreach($digitGroups as $key=>$value){
        $result[$key]=array();
        //Преобразование трёхзначного числа прописью по-русски
        foreach ($digit=str_split($value) as $key3=>$value3) {
            if (!$value3) continue;
            else {
                switch ($key3) {
                    case 0:
                        $result[$key][] = $smallNumbers[4][$value3];
                        break;
                    case 1:
                        if ($value3==1) {
                            $result[$key][]=$smallNumbers[2][$digit[2]];
                            break 2;
                        }
                        else $result[$key][]=$smallNumbers[3][$value3];
                        break;
                    case 2:
                        if (($key==1)&&($value3<=2)) $result[$key][]=$smallNumbers[5][$value3];
                        else $result[$key][]=$smallNumbers[1][$value3];
                        break;
                }
            }
        }
        $value*=1;
        if (!$degrees[$key]) $degrees[$key]=reset($degrees);


        if ($value && $key) {
            $index = 3;
            if (preg_match("/^[1]$|^\\d*[0,2-9][1]$/",$value)) $index = 1;
            else if (preg_match("/^[2-4]$|\\d*[0,2-9][2-4]$/",$value)) $index = 2;
            $result[$key][]=$degrees[$key][0].$degrees[$key][$index];
        }
        $result[$key]=implode(' ',$result[$key]);
    }

    return $sign.implode(' ',array_reverse($result));
}
