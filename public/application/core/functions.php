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
