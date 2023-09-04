<?php

    // function get_IP_address(){
    //     foreach (array('HTTP_CLIENT_IP',
    //                 'HTTP_X_FORWARDED_FOR',
    //                 'HTTP_X_FORWARDED',
    //                 'HTTP_X_CLUSTER_CLIENT_IP',
    //                 'HTTP_FORWARDED_FOR',
    //                 'HTTP_FORWARDED',
    //                 'REMOTE_ADDR') as $key){
    //         if (array_key_exists($key, $_SERVER) === true){
    //             foreach (explode(',', $_SERVER[$key]) as $IPaddress){
    //                 $IPaddress = trim($IPaddress); // Just to be safe

    //                 if (filter_var($IPaddress,
    //                             FILTER_VALIDATE_IP,
    //                             FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
    //                     !== false) {

    //                     return $IPaddress;
    //                 }
    //             }
    //         }
    //     }
    // }

    // $ipaddress = '';
    // if ($_SERVER['HTTP_CLIENT_IP'] != '127.0.0.1')
    //     $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    // else if ($_SERVER['HTTP_X_FORWARDED_FOR'] != '127.0.0.1')
    //     $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    // else if ($_SERVER['HTTP_X_FORWARDED'] != '127.0.0.1')
    //     $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    // else if ($_SERVER['HTTP_FORWARDED_FOR'] != '127.0.0.1')
    //     $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    // else if ($_SERVER['HTTP_FORWARDED'] != '127.0.0.1')
    //     $ipaddress = $_SERVER['HTTP_FORWARDED'];
    // else if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1')
    //     $ipaddress = $_SERVER['REMOTE_ADDR'];
    // else
    //     $ipaddress = 'UNKNOWN';


    // $ip = getenv('HTTP_CLIENT_IP')?:
    // getenv('HTTP_X_FORWARDED_FOR')?:
    // getenv('HTTP_X_FORWARDED')?:
    // getenv('HTTP_FORWARDED_FOR')?:
    // getenv('HTTP_FORWARDED')?:
    // getenv('REMOTE_ADDR');


    // $ip = get_IP_address();
    // $ip = $_SERVER['REMOTE_HOST'];
    // $ip = getenv('REMOTE_ADDR');

    echo '<pre>';
    print_r( $_SERVER );
   echo '</pre>';
    echo $ip;

    #GET LATITUDE AND LONGITUDE OF CLIENT
    $loc = file_get_contents("http://ip-api.com/json/$ip");
    echo $loc;
    $loc_open = json_decode($loc);
    $latitude = $loc_open->lat;
    $longitude = $loc_open->lon;
    $user_location = $latitude.','.$longitude;
    echo $user_location;

?>