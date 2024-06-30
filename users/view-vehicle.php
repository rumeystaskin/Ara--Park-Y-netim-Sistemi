<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsuid'] == 0)) {
    header('location:logout.php');
} else {
?>
<!doctype html>
<html class="no-js" lang="tr">
<head>
    <title>Araç Park Detaylarını Görüntüle</title>
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <!-- Sol Panel -->
    <?php include_once('includes/sidebar.php');?>

    <!-- Sağ Panel -->
    <?php include_once('includes/header.php');?>

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Kontrol Paneli</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="dashboard.php">Kontrol Paneli</a></li>
                                <li><a href="view-vehicle.php">Araç Park Detaylarını Görüntüle</a></li>
                                <li class="active">Araç Park Detaylarını Görüntüle</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Araç Park Detaylarını Görüntüle (Kayıtlı Mobil No'ya göre)</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Park Numarası</th>
                                        <th>Sahip Adı</th>
                                        <th>Araç Kayıt Numarası</th>
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ownerno = $_SESSION['vpmsumn'];
                                    $ret = mysqli_query($con, "SELECT tblregusers.FirstName, tblregusers.LastName, tblregusers.MobileNumber, tblregusers.Email, tblvehicle.ParkingNumber, tblvehicle.VehicleCategory, tblvehicle.VehicleCompanyname, tblvehicle.RegistrationNumber, tblvehicle.OwnerName, tblvehicle.ID as vehid, tblvehicle.OwnerContactNumber, tblvehicle.InTime, tblvehicle.OutTime FROM tblvehicle JOIN tblregusers ON tblregusers.MobileNumber = tblvehicle.OwnerContactNumber WHERE tblvehicle.OwnerContactNumber = '$ownerno'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row['ParkingNumber']; ?></td>
                                        <td><?php echo $row['OwnerName']; ?></td>
                                        <td><?php echo $row['RegistrationNumber']; ?></td>
                                        <td>
                                            <a href="view-detail.php?viewid=<?php echo $row['vehid']; ?>" class="btn btn-primary">Görüntüle</a>
                                            <a href="print.php?vid=<?php echo $row['vehid']; ?>" style="cursor:pointer" target="_blank" class="btn btn-warning">Yazdır</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $cnt++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

<?php include_once('includes/footer.php');?>

</div><!-- /#right-panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../admin/assets/js/main.js"></script>

</body>
</html>
<?php } ?>
