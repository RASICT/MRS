
 <?php 

session_start();

include 'conn.php';

if (array_key_exists('submit', $_POST)){
    $name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $User = $_POST['User'];
    $Pass = $_POST['Password'];

    if (empty($name) || empty($User) || empty($Pass)) {
        echo "<script> alert('fill all required fields'); </script>";

    } else{
        mysqli_query($conn, "INSERT INTO `user`(`userName`, `OfficeName`, `Email`, `MobileNumber`, `Password`) VALUES ('".$User."','".$name."','".$Email."','".$Phone."','".md5($Pass)."')");
        echo "<script> alert('User registered successfully'); </script>";
    }

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

                    <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="manageuser.php"><span><i class="fas fa-user"></i>&nbsp;Users</span></a></li>

                     <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span><i class="fas fa-lightbulb"></i>&nbsp;Tips</span></a></li>
                      <li class="nav-item" role="presentation"><a class="nav-link active" href="messages.php"><span><i class="fas fa-envelope"></i>&nbsp;Messages</span></a></li>
                       <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span><i class="fas fa-list-ul"></i>&nbsp;Post/News</span></a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span><i class="fas fa-building"></i>&nbsp;Offices</span></a></li>
                          <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span><i class="fas fa-desktop"></i>&nbsp;Devices</span></a></li>

                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                           <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="shadow" style="width: 100%;min-height: 630px;margin-top: 119px;background-color: rgba(255,255,255,0.79);">
                                <form style="padding-top: 70px;" method="post" action="user.php">
                                    <div class="form-group">
                                        <h1 class="text-center">Register user here !</h1>
                                    </div>
                                    <div class="form-group"><input class="form-control form-control-lg" type="text" style="width: 50%;margin-left: 25%;" name="Name" placeholder="Office Name" required></div>
                                    <div class="form-group"><input class="form-control form-control-lg" type="email" style="width: 50%;margin-left: 25%;" name="Email" placeholder="Email"></div>
                                    <div class="form-group"><input class="form-control form-control-lg" type="tel" pattern="[0-9]{10}"style="width: 50%;margin-left: 25%;" name="Phone" placeholder="Phone number eg. 0782xxxxx" required></div>
                                    <div class="form-group"><input class="form-control form-control-lg" type="text" style="width: 50%;margin-left: 25%;" name="User" placeholder="User name" required></div>
                                    <div class="form-group"><input class="form-control form-control-lg" type="text" style="width: 50%;margin-left: 25%;" name="Password" placeholder="Password" required></div>
                                    <div class="form-group"><button class="btn btn-lg btn-primary" style="width: 50%;margin-left: 25%;" name="submit" type="submit">Register</button></div>
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