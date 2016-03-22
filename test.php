<?php
    header("Content-type:text/html;charset=utf-8");
    $ipinfo=file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip='.$_GET['ip']);
    $placeinfo=json_decode($ipinfo,true);
    var_dump($placeinfo);
?>