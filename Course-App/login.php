<?php
    include "libs/ayar.php";
    require "libs/variables.php";
    require "libs/functions.php";

    if(isLoggedIn()){
        header("Location: app.php");
    }
    
    $usernameErr = $passwordErr = $loginErr = "";
    $username = $password = "";

    if(isset($_POST["login"])){
        if(empty($_POST["username"])){
            $usernameErr = "Doldurulması zorunlu alan.";
        }
        else{
            $username= safe_html($_POST["username"]);
        }

        if(empty($_POST["password"])){
            $passwordErr = "Doldurulması zorunlu alan.";
        }
        else{
            $password = safe_html($_POST["password"]);
        }

        if(empty($usernameErr) && empty($passwordErr)){
            $sql = "SELECT id, username, password, user_type from kullanicilar WHERE username=?";

            if($stmt = mysqli_prepare($baglanti, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $username);

                 if(mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        mysqli_stmt_bind_result($stmt, $id, $username,$hashed_password, $user_type);

                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                $_SESSION["loggedIn"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;
                                $_SESSION["user_type"] = $user_type;

                                header("Location: app.php");
                            }
                            else{
                                $loginErr = "Şifre yanlış.";
                            }
                        }
                    }
                    else{
                        $loginErr = "Kullanıcı adı yanlış.";
                    }
                }
                else{
                    $loginErr = "Hata oluştu";
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($baglanti);
        }
    }
?>
<?php

    if(!empty($loginErr)) {
        echo "<div class='alert alert-danger'>".$loginErr."</div>";
    }
?>
<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username">Kullanıcı Adı</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
                        <div class="text-danger"><?php echo $usernameErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="password">Şifre</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $password;?>">
                        <div class="text-danger"><?php echo $passwordErr; ?></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="login">Giriş Yap</button>
                </form>
            </div>
        </div>
    </div>                
<?php include "partials/_footer.php" ?>