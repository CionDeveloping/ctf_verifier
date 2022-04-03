<?php
include = '../jd_conf.php';
// JOHANSEN DATA SOFTWARE @ 2022 | CTF CODE RESETTER AND VERIFIER
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length); //lager en random kode
}
$files = glob('/var/www/html/system/admin/uploads/*.php'); // Lokaliserer .php filer i uploads mappen
foreach($files as $file){ // 
  if(is_file($file)) {
    unlink($file); // Sletter alle .php filer fra uploads
  }
}


$nykode = generateRandomString(10);
$timestamp = date("c", strtotime("now"));

$json_data = json_encode([

    "content" => $nykode,
    
    "username" => "JD-SYS",


    "tts" => false,


    "embeds" => [
        [

            "title" => "JD - CTF 1",


            "type" => "rich",


            "description" => "KODE OPPDATERING",

            "timestamp" => $timestamp,

            "color" => hexdec( "3366ff" ),


            "footer" => [
                "text" => "System av Jonas Johansen",
                "icon_url" => ""
            ],


            "image" => [
                "url" => "https://i.ibb.co/vcJGmN1/logo-full.png"
            ],

            "author" => [
                "name" => "JD SYSTEMS",
                "url" => "http://192.168.1.152"
            ],

        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

$myfile = fopen($kode1, "w") or die("Unable to open file!");
$txt = $nykode;
fwrite($myfile, $txt);
fclose($myfile);

$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// FOR DEBUGGING 
// echo $response;
curl_close( $ch );

echo "<h1>Resettingen var en suksess. Ny kode er nå aktivert</h1>"
?>
