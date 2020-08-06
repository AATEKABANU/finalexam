
<?php

    $dsn = 'mysql:host=172.31.22.43;dbname=Aatekabanu200447029';

    $user = 'Aatekabanu200447029';

    $password = '_dmw4L_5AV';

    $db = new PDO($dsn, $user, $password);

    //set error mode to exception

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
