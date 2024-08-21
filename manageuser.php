<?php

session_start();



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ICT -</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                </ul>
                <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="User.php"><span><i class="fas fa-user"></i>&nbsp;Users</span></a></li>

                     <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span><i class="fas fa-lightbulb"></i>&nbsp;Tips</span></a></li>
                      <li class="nav-item" role="presentation"><a class="nav-link active" href="messages.php"><span><i class="fas fa-envelope"></i>&nbsp;Messages</span></a></li>
                       <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span><i class="fas fa-list-ul"></i>&nbsp;Post/News</span></a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span><i class="fas fa-building"></i>&nbsp;Offices</span></a></li>
                          <li class="nav-item" role="presentation"><a class="nav-link active" href="Dashboard.php"><span><i class="fas fa-desktop"></i>&nbsp;Devices</span></a></li>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button></div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Users</h3>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>UserName</th>
                                            <th>OfficeNme</th>
                                            <th>Email</th>
                                            <th>MobileNo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cell 1</td>
                                            <td>Cell 2</td>
                                            <td>Cell 2</td>
                                            <td>Cell 2</td>
                                            <td>Cell 2</td>
                                        </tr>
                                        <tr>
                                            <td>Cell 3</td>
                                            <td>Cell 4</td>
                                            <td>Cell 4</td>
                                            <td>Cell 4</td>
                                            <td>Cell 4</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © ICT IPRS 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>