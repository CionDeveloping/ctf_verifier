<?php
//JOHANSEN DATA @ 2022 | SCOREBOARD SYSTEM

//JOHANSEN DATA @ 2022 | CODE VERIFICATION SOFTWARE
$navn = $_POST['navn'];
$kode = $_POST['kode'];
$webhookurl = "discordwebhook"; //endre denne

$filename = 'kode1.txt'; //filnavn for å sjekke rett kode
$f = fopen($filename, 'r');
$contents = fread($f, filesize($filename));
fclose($f);


if (trim($contents) === trim($kode)){
    echo '<h1 style="color: green;"> Koden er korrekt!</h1><br>';
    echo '<p>Legger deg til scoreboard og setter ny kode nå. Bep bop bap</p>';
    echo '<p>Suksess</p>';
    exec('wget http://localhost/tibakestill.php'); //tilbakestiller kode
    // JOHANSEN DATA @ 2022 | NOTIFIER
    $timestamp = date("c", strtotime("now"));

    $json_data = json_encode([

        "username" => "JD-SCOREBOARD",


        "tts" => false,


        "embeds" => [
            [

                "title" => $navn,


                "type" => "rich",


                "description" => "CTF FULLFØRT",

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
                    "name" => "JD CTF1",
                ],

        ]
        ]

    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

    $ch = curl_init( $webhookurl );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec( $ch );
    curl_close( $ch );
    }
else{
    echo '<h1 style="color:red">Kode er feil</h1><br>';
    echo "<p>Husk, en kode kan kun brukes en gang</p>";

}

