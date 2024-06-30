<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $contno = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $ret = mysqli_query($con, "select Email from tblregusers where Email='$email' || MobileNumber='$contno'");
    $result = mysqli_fetch_array($ret);
    if ($result > 0) {
        echo '<script>alert("Bu email veya telefon numarası başka bir hesapla ilişkilendirilmiş")</script>';
    } else {
        $query = mysqli_query($con, "insert into tblregusers(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password')");
        if ($query) {
            echo '<script>alert("Başarıyla kayıt oldunuz")</script>';
        } else {
            echo '<script>alert("Bir hata oluştu. Lütfen tekrar deneyin")</script>';
        }
    }
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <title>Kayıt Sayfası</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
    function checkpass() {
        if (document.signup.password.value != document.signup.repeatpassword.value) {
            alert('Şifre ve Şifreyi Tekrarla alanı eşleşmiyor');
            document.signup.repeatpassword.focus();
            return false;
        }
        return true;
    }
    </script>
</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <h2 style="color: #fff">Hesabınızı Oluşturun</h2>
                    </a>
                </div>
                <div class="login-form">
                    <form method="post" onsubmit="return checkpass();">
                        <div class="form-group">
                            <label>Ad</label>
                            <input type="text" name="firstname" placeholder="Adınız..." required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Soyad</label>
                            <input type="text" name="lastname" placeholder="Soyadınız..." required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Telefon Numarası</label>
                            <input type="text" name="mobilenumber" maxlength="10" pattern="[0-9]{10}" placeholder="Telefon Numarası" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email Adresi</label>
                            <input type="email" name="email" placeholder="Email Adresi" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Şifre</label>
                            <input type="password" name="password" placeholder="Şifrenizi Girin" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Şifreyi Tekrarla</label>
                            <input type="password" name="repeatpassword" placeholder="Şifreyi Tekrarla" required="true" class="form-control">
                        </div>
                        <div class="checkbox">
                            <label class="pull-right">
                                <a href="forgot-password.php">Şifremi Unuttum?</a>
                            </label>
                            <label class="pull-left">
                                <a href="login.php">Giriş Yap</a>
                            </label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">KAYIT OL</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../admin/assets/js/main.js"></script>
</body>
</html>
