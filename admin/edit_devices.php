
 <?php 

session_start();

include 'conn.php';

$id = $_GET['id'];


if (isset($_POST['submit'])){
    $Device_name = $_POST['Device_name'];
    $Office_name = $_POST['Office_name'];
    $Model_name = $_POST['Model_name'];
    $Last_date_checked = $_POST['Last_date_checked'];
    $Functionality = $_POST['Functionality'];

$sql = mysqli_query($conn, "UPDATE `devices` SET `Device_name`='$Device_name',`Office_name`='$Office_name',`Model_name`='$Model_name',`Last_date_checked`='$Last_date_checked',`Functionality`='$Functionality' where id = '$id'");


//    $sql = mysqli_query($conn, "INSERT INTO `Devices`(`Device_name`, `Office_name`, `Model_name`, `Last_date_checked`, `Functionality`) VALUES ('$Device_name', '$Office_name', '$Model_name', '$Last_date_checked', '$Functionality')");
    
    if ($sql==true) {

   echo "<script> alert('Device Edited successfully'); </script>";

    } 
    else
        echo "<script> alert('Device Not Edited'); </script>";

    header('location:Devices.php');

}
?> 

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>RAS ICT - IPRS || Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span>ICT - IPRS</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.html"><i class="fas fa-lightbulb"></i><span>Tips</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.html"><i class="fas fa-list"></i><span>Posts/News</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.html"><i class="fas fa-info-circle"></i><span>About</span></a></li>

                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                           <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="shadow" style="width: 100%;min-height: 630px;margin-top: 119px;background-color: rgba(255,255,255,0.79);">
                                <form style="padding-top: 70px;" method="post">
                                    <div class="form-group">
                                        <h1 class="text-center">Edit a Device</h1>
                                    </div>
                                    <div class="form-group">
                           <?php

$sql = mysqli_query($conn, "SELECT * FROM devices where id = '$id'");
$data = mysqli_fetch_assoc($sql);
 ?>
                                        <input class="form-control form-control-lg" type="text" style="width: 50%;margin-left: 25%;" value="<?php echo $data['Device_name']; ?>" name="Device_name" placeholder="Device Name" required></div>
                                    <div class="form-group"><input class="form-control form-control-lg" type="text" style="width: 50%;margin-left: 25%;" value="<?php echo $data['Office_name']; ?>" name="Office_name" placeholder="Office Name"></div>
                                    <div class="form-group"><input class="form-control form-control-lg" type="tel" style="width: 50%;margin-left: 25%;" name="Model_name" placeholder="Model Name" value="<?php echo $data['Model_name']; ?>" required></div>
                                    <div class="form-group"><input class="form-control form-control-lg" type="datetime-local" style="width: 50%;margin-left: 25%;" value="<?php echo $data['Last_date_checked']; ?>" name="Last_date_checked" placeholder="Last Date Checked" required></div>
                                    <div class="form-group">                                    <select class="form-control form-control-lg" name="Functionality" style="width: 50%;margin-left: 25%;">
                                      <option>--SELECT FUCTIONALITY--</option>  
                                      <option>Working</option>
                                      <option>Not Working</option>
                                      <option>Under Maintenance</option>

                                   

                                    </select>


                                    </div>
                                    <div class="form-group"><button class="btn btn-lg btn-primary" style="width: 50%;margin-left: 25%;" name="submit" type="submit">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © RAS IPRS 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>