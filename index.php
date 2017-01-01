<?php
    include 'Ciqrcode.php';
    error_reporting(0);

    $params['data'] = 'retrofoodserver://server1/m1';
    $params['level'] = 'H';
    $params['size'] = 6;
    $params['savename'] = 'qr.png';
    $Ciqrcode = new Ciqrcode();
    $Ciqrcode->generate($params);



    $badge = imagecreatefrompng('logo.png');
    $image = imagecreatefrompng('qr.png');


    $center =  (imagesx($image)/2)-(imagesx($badge)/2);
    // Copy the stamp image onto our photo using the margin offsets and the photo
    // width to calculate positioning of the stamp.
    imagecopymerge_alpha($image, $badge , $center, $center, 0, 0, imagesx($badge), imagesy($badge),100);

    header('Content-type: image/png');
    imagealphablending( $image, false );
    imagesavealpha( $image, true );
    imagepng($image);
    imagedestroy($image);

 ?>
