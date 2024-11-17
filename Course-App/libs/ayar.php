<?php
    
    $baglanti = mysqli_connect("localhost", "root", "", "coursedb"); // mysql bağlantısını sağlar
    
    if(mysqli_connect_errno() > 0){ // mysql bağlantı hatası kodunu söyler
        die("hata".mysqli_connect_errno());
    }
?>