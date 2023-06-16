<?php
    $post = [
        'username' => 'sterling',
        'password' => 'topsecret',
        'email'   => 'sterling@gmail.com',
    ];
    //transform array to json to be sent in request body
    $payload = json_encode($post);
    //local uri I used when testing.
    $ch = curl_init("http://localhost/sterling/Q1.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    $data = curl_exec($ch);
    curl_close($ch);
    echo $data;
?>