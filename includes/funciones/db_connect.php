<?php 
    define('GDLWEBCAMP_HOST', 'badl3ucmudvmmtz46xmk-mysql.services.clever-cloud.com');
    define('GDLWEBCAMP_DB_USUARIO', 'uruf31onibgt4hrq');
    define('GDLWEBCAMP_DB_PASSWORD', 'vAro82r8VKRfz68Fd4Vf');
    define('GDLWEBCAMP_DB_DATABASE', 'badl3ucmudvmmtz46xmk');

    $conn = new mysqli(GDLWEBCAMP_HOST, GDLWEBCAMP_DB_USUARIO, GDLWEBCAMP_DB_PASSWORD, GDLWEBCAMP_DB_DATABASE);

    if($conn->connect_error) {
      echo $conn->connect_error;
    }
?>