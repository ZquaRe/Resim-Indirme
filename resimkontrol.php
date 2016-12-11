<?php

/*
  _____           _                 ____                _       
 |  ___|   _ _ __| | ____ _ _ __   / ___|  ___ ______ _(_)_ __  
 | |_ | | | | '__| |/ / _` | '_ \  \___ \ / _ \_  / _` | | '_ \ 
 |  _|| |_| | |  |   < (_| | | | |  ___) |  __// / (_| | | | | |
 |_|   \__,_|_|  |_|\_\__,_|_| |_| |____/ \___/___\__, |_|_| |_|
                                                  |___/      
*/


indir("http://resimdiyari.com/upload/2014/06/18/20140618121439-338f255e.jpg");


function indir($adres)
{
    $ch = curl_init("$adres");
    if (!$ch) {
        die("Oturum açılamadı");
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);

$file = get_headers($adres);

if($file['0'] == 'HTTP/1.0 200 OK') {

$IlkSayi = rand(1000, 10000);

if(!file_exists('images/'.$IlkSayi.'.'.uzanti($adres)))
{

    $islem = fopen("images/".$IlkSayi.'.'.uzanti($adres), "a+");
    ?>
    <img src="<?php echo'images/'.$IlkSayi.'.'.uzanti($adres);  ?>"> 
    <?php
    fwrite($islem, $data);
    fclose($islem);
    if ($islem) {
     echo 'OK';
    } else {

echo 'Dosya Yüklenenemedi.';
    }
}
else
{

$IlkSayi = rand(1000, 10000);
  $islem = fopen("images/".$IlkSayi.'.'.uzanti($adres), "a+");
    ?>
    <img src="<?php echo'images/'.$IlkSayi.'.'.uzanti($adres);  ?>">
    <?php
    fwrite($islem, $data);
    fclose($islem);
    if ($islem) {
     echo 'OK';
    } else {

echo 'Dosya Yüklenenemedi.';
    }
}
}
else
{
echo 'Resim uzak sunucuda bulunamadı.';

}
}

function uzanti($link) {
$uzanti = pathinfo($link);
$uzanti = $uzanti["extension"];
return $uzanti;
}

?>




