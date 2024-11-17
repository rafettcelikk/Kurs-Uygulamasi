<?php
    require "libs/variables.php";
    require "libs/functions.php";
?>
<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<?php
    $baslik = $baslikErr = "";
    $altBaslik = $altBaslikErr = "";
    $resim = $resimErr= "";
    $aciklama = $aciklamaErr = "";
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["baslik"])){
            $baslikErr = "Zorunlu alan";
        }
        else{
            $baslik = safe_html($_POST["baslik"]);
        }
        
        if(empty($_POST["altBaslik"])){
            $altBaslikErr = "Zorunlu alan";
        }
        else{
            $altBaslik = safe_html($_POST["altBaslik"]);
        }

        if(empty($_POST["aciklama"])){
            $aciklamaErr = "Zorunlu alan";
        }
        else{
            $aciklama = safe_html($_POST["aciklama"]);
        }

        if(empty($_FILES["imageFile"]["name"])){
            $resimErr = "Dosya Yükleyiniz";
        }
        else{
            uploadImage($_FILES["imageFile"]);
            $resim = $_FILES["imageFile"]["name"];
        }

        if(empty($baslikErr) && empty($altBaslikErr) && empty($resimErr) ){
            createCourse($baslik, $altBaslik, $aciklama, $resim,);
            $_SESSION["message"] = $baslik." isimli kurs eklendi.";
            $_SESSION["type"] = "success";
            header("Location: admin-courses.php");
        }
    }
?>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="baslik">Başlık</label>
                            <input type="text" name="baslik" class="form-control" value="<?php echo $baslik;?>">
                            <div class="text-danger"><?php echo $baslikErr; ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="altBaslik">Alt Başlık</label>
                            <textarea name="altBaslik" class="form-control"><?php echo $altBaslik;?></textarea>
                            <div class="text-danger"><?php echo $altBaslikErr; ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="aciklama">Açıklama</label>
                            <input type="text" name="aciklama" class="form-control" value="<?php echo $aciklama;?>">
                            <div class="text-danger"><?php echo $aciklamaErr; ?></div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="imageFile" id="imageFile" class="form-control">
                            <label for="imageFile" class="input-group-text">Yükle</label>
                        </div>
                        <div class="text-danger"><?php echo $resimErr; ?></div>
                        <button type="submit" class="btn btn-success">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "partials/_editor.php" ?>                
<?php include "partials/_footer.php" ?>