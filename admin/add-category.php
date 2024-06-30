<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
} else {
  if(isset($_POST['submit'])) {
    $catname = $_POST['catename'];
    $query = mysqli_query($con, "insert into tblcategory(VehicleCat) value('$catname')");
    if ($query) {
      echo "<script>alert('Kategori başarıyla eklendi');</script>";
      echo "<script>window.location.href='manage-category.php'</script>";
    } else {
      echo "<script>alert('Bir hata oluştu. Lütfen tekrar deneyin');</script>";
    }
  }
?>
<!doctype html>
<html class="no-js" lang="">
<head>
  <title>Kategori Ekle</title>
  <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
  <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
  <?php include_once('includes/sidebar.php');?>
  <?php include_once('includes/header.php');?>
  <div class="breadcrumbs">
    <div class="breadcrumbs-inner">
      <div class="row m-0">
        <div class="col-sm-4">
          <div class="page-header float-left">
            <div class="page-title">
              <h1>Gösterge Paneli</h1>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="page-header float-right">
            <div class="page-title">
              <ol class="breadcrumb text-right">
                <li><a href="dashboard.php">Gösterge Paneli</a></li>
                <li><a href="add-category.php">Kategori</a></li>
                <li class="active">Kategori Ekle</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-6">
          <div class="card"></div>
        </div>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <strong>Kategori </strong> Ekle
            </div>
            <div class="card-body card-block">
              <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class="form-control-label">Kategori Adı</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="catename" name="catename" class="form-control" placeholder="Araç Kategorisi" required="true"></div>
                </div>
                <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit">Ekle</button></p>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6"></div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <?php include_once('includes/footer.php');?>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
<?php } ?>
