<?php 

session_start();

include 'conn.php';

$sql = mysqli_query($conn, "SELECT ID FROM user");
$count_users = mysqli_num_rows($sql);

$sql2 = mysqli_query($conn, "SELECT ID FROM tips");
$count_tips = mysqli_num_rows($sql2);

$sql3 = mysqli_query($conn, "SELECT ID FROM message");
$count_messages = mysqli_num_rows($sql3);

$sql4 = mysqli_query($conn, "SELECT ID FROM post_news");
$count_news = mysqli_num_rows($sql4);

$sql5 = mysqli_query($conn, "SELECT distinct OfficeName FROM User");
$count_offices = mysqli_num_rows($sql5);

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
    <link rel="stylesheet" href="assets/css/Animation-Cards-1.css">
    <link rel="stylesheet" href="assets/css/Animation-Cards.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <style type="text/css">
       

 .badge {

    position: absolute;
    top: -10px;
    right: -10px;
    padding: 5px 10px;
    border-radius: 50%;
    background-color: gray;
    color: white;
   }


   </style>

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
                          <li class="nav-item" role="presentation"><a class="nav-link active" href="Devices.php"><span><i class="fas fa-desktop"></i>&nbsp;Devices</span></a></li>
                          <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><i class="fas fa-info-circle"></i><span>About</span></a></li>

            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        
                    
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Sign Out</span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"
                                        role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a
                                            class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                                </li>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Admin Panel !</h3>
                    </div><span><strong>Welcome Admin !</strong></span>
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success" role="alert"><span><strong>Notification !</strong></span></div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="row space-rows">
                               
                                <div class="col">
                                    <div class="card cards-shadown cards-hover" data-aos="slide-right" data-aos-duration="950">
                                        <div class="card-body">
                                            <p class="card-text cardbody-sub-text"><i class="fas fa-user"></i>&nbsp;Users</p>
                                            <span class="badge"><?php echo $count_users; ?></span>
                                            <p class="card-text cardbody-sub-text"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card cards-shadown cards-hover" data-aos="flip-up" data-aos-duration="950">
                                        <div class="card-body">
                                            <p class="card-text cardbody-sub-text"><i class="fas fa-lightbulb"></i>&nbsp;Tips</p>
                                            <span class="badge"><?php echo $count_tips; ?></span>
                                            <p class="card-text cardbody-sub-text"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row space-rows">
                                <div class="col">
                                    <div class="card cards-shadown cards-hover" data-aos="flip-left" data-aos-duration="950">
                                        <div class="card-body">
                                            <p class="card-text cardbody-sub-text"><i class="fas fa-envelope"></i>&nbsp;Messages</p>
                                            <span class="badge"><?php echo $count_messages; ?></span>
                                            <p class="card-text cardbody-sub-text"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card cards-shadown cards-hover" data-aos="flip-left" data-aos-duration="950">
                                        <div class="card-body">
                                            <p class="card-text cardbody-sub-text"><i class="fas fa-list-ul"></i>&nbsp;Post/News</p>
                                            <span class="badge"><?php echo $count_news; ?></span>
                                            <p class="card-text cardbody-sub-text"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card cards-shadown cards-hover" data-aos="slide-right" data-aos-duration="950">
                                        <div class="card-body">
                                            <p class="card-text cardbody-sub-text"><i class="fas fa-building"></i>&nbsp;Offices</p>
                                            <span class="badge"><?php echo $count_offices; ?></span>
                                            <p class="card-text cardbody-sub-text"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card cards-shadown cards-hover" data-aos="flip-up" data-aos-duration="950">
                                        <div class="card-body">
                                            <p class="card-text cardbody-sub-text"><i class="fas fa-desktop"></i>&nbsp;Devices</p>
                                            <span class="badge">4</span>
                                            <p class="card-text cardbody-sub-text"></p>
                                        </div>
                                    </div>
                                </div>
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
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>