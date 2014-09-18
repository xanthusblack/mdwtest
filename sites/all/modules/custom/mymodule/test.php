<?php
    $crl = curl_init();
    $url = "http://129.15.14.238/mdw/?q=node/2434";
    curl_setopt($crl, CURLOPT_URL, $url);
    //curl_setopt($crl, CURLOPT_COOKIEFILE, "/tmp/cookie1.txt");
    curl_setopt($crl, CURLOPT_COOKIEJAR, "/tmp/cookie1.txt");
    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crl, CURLOPT_BINARYTRANSFER, 1);
    //curl_setopt($crl, CURLOPT_FAILONERROR, 1);
    curl_setopt($crl, CURLOPT_HEADER, 1);
    curl_setopt($crl, CURLOPT_ENCODING, "");
    curl_setopt($crl, CURLOPT_POST, 1);
    //curl_setopt($crl, CURLOPT_TCP_KEEPIDLE,15);
    //curl_setopt($crl, CURLOPT_TIMEOUT, 800);
    curl_setopt($crl, CURLOPT_AUTOREFERER, 1);
    $postdata=array(
      "name" => "admin",
      "pass" => "VT2zDtKMdr!",
      "form_id" => "user_login",
      "op" => "Log in",
    );
    curl_setopt($crl, CURLOPT_HTTPHEADER, array(
    'Connection: Keep-Alive',
    'Keep-Alive: 30'
    ));
    curl_setopt ($crl, CURLOPT_POSTFIELDS, $postdata);
    $result=curl_exec($crl);
    $headers = curl_getinfo($crl);
    $err = curl_errno($crl);
    $errmsg = curl_error($crl);    
    curl_close($crl);
    
    if ($headers['url'] == $url) {
        die("Cannot login.");
    }
    //print $result;
    print $headers;
    print $err;
    print $errmsg;
    
?>
