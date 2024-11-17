<?php
    const title = "Popüler Kurslar";
    // const db_email = "blaxdrafet@gmail.com";
    // const db_password = "Hulk6169.";

    const db_user = array(
        "email" => "blaxdrafet@gmail.com",
        "password" => "Hulk6169.",
        "username" => "Rafet"
    );
    $kategoriler = array(
        array("kategori-adi" => "Yazılım Geliştirme", "aktif" => true),
        array("kategori-adi" => "Web Proglamlama", "aktif" => false),
        array("kategori-adi" => "Veri Analizi", "aktif" => false),
        array("kategori-adi" => "Veri Bilimi", "aktif" => false),
        array("kategori-adi" => "Mobil Geliştirme", "aktif" => false)
    );

    $sehirler = array(
        "06" => "Ankara",
        "34" => "İstanbul",
        "35" => "İzmir",
        "61" => "Trabzon",
        "69" => "Bayburt"
    );

    $hobiler = array(
        "1" => "Oyun",
        "2" => "Resim",
        "3" => "Spor"
    );
    
    $kurslar = array(
        "1" => array(
            "baslik" => "Php Kursu",
            "altBaslik" => "Sıfırdan ileri seviye Php ile web geliştirme",
            "resim" => "php.jpg",
            "yayinTarihi" => "16.10.2024",
            "begeniSayisi" => 20,
            "yorumSayisi" => 0,
            "onay" => true
        ),
        "2" => array(
            "baslik" => "Python Kursu",
            "altBaslik" => "Sıfırdan ileri seviye Python ile web geliştirme",
            "resim" => "python.png",
            "yayinTarihi" => "16.10.2024",
            "begeniSayisi" => 25,
            "yorumSayisi" => 20,
            "onay" => true
        ),
        "3" => array(
            "baslik" => "Javascript Kursu",
            "altBaslik" => "Sıfırdan ileri seviye Javascript ile web geliştirme",
            "resim" => "javascript.png",
            "yayinTarihi" => "16.10.2024",
            "begeniSayisi" => 56,
            "yorumSayisi" => 61,
            "onay" => true
        ),
        "4" => array(
            "baslik" => "React Kursu",
            "altBaslik" => "Sıfırdan ileri seviye React ile web geliştirme",
            "resim" => "react.jpg",
            "yayinTarihi" => "16.10.2024",
            "begeniSayisi" => 85,
            "yorumSayisi" => 69,
            "onay" => true
        )
    );
?>