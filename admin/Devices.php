<?php






?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                </ul><span></span>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="manageuser.php"><span><i class="fas fa-user"></i>&nbsp;Users</span></a></li>

                     <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span><i class="fas fa-lightbulb"></i>&nbsp;Tips</span></a></li>
                      <li class="nav-item" role="presentation"><a class="nav-link active" href="messages.php"><span><i class="fas fa-envelope"></i>&nbsp;Messages</span></a></li>
                       <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span><i class="fas fa-list-ul"></i>&nbsp;Post/News</span></a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span><i class="fas fa-building"></i>&nbsp;Offices</span></a></li>
                          <li class="nav-item" role="presentation"><a class="nav-link active" href="Devices.php"><span><i class="fas fa-desktop"></i>&nbsp;Devices</span></a></li>
                          <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><i class="fas fa-info-circle"></i><span>About</span></a></li>

                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Devices</h3>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>



                                            <th>#</th>
                                            <th>Device Name</th>
                                            <th>Office Name</th>
                                            <th>Mode Name</th>
                                            <th>Last Date Checked</th>
                                            <th>Functionality</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                            <?php  

include 'conn.php';
$a = 1;

$sql = mysqli_query($conn, "SELECT * FROM devices");
while ($data = mysqli_fetch_assoc($sql)) {
   
$id = $data['id'];
?>

                                            <td><?php echo $a++; ?></td>
                                            <td><?php echo $data['Device_name']; ?></td>
                                            <td><?php echo $data['Office_name']; ?></td>
                                            <td><?php echo $data['Model_name']; ?></td>
                                            <td><?php echo $data['Last_date_checked'] ?></td>
                                            <td><?php echo $data['Functionality'] ?></td>
                                            <td><a href="edit_devices.php?id=<?php echo $id;?>"><button class="btn btn-primary btn-md">Edit</button></a><a href="delete_devices.php?id=<?php echo $id;?>" onClick="return confirm('Do you really want to delete');"><button class="btn btn-danger btn-md">Delete</button></a></td>
                                        </tr>

                                    <?php } ?>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="add_devices.php"> <div class="form-group"><button class="btn btn-lg btn-primary" style="width: 50%;margin-left: 25%;">Register Device</button></div> </a>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>