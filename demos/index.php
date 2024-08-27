<?php

session_start();

include 'conn.php'; // Include your database connection

// Initialize success message variable
$successMessage = "";

//check for success message in session
if (isset($_SESSION['successMessage'])){
  $successMessage = $_SESSION['successMessage'];
  unset($_SESSION['successMessage']);
}

// Fetch problem categories from the database
$sql = "SELECT * FROM problem_categories";
$result = mysqli_query($conn, $sql);


// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input to prevent SQL injection
    $staff_name = mysqli_real_escape_string($conn, $_POST['staff_name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $device_name = mysqli_real_escape_string($conn, $_POST['device_name']);
    $problem_category = mysqli_real_escape_string($conn, $_POST['problem_category']);
    $problem_description = mysqli_real_escape_string($conn, $_POST['problem_description']);
    $report_date = mysqli_real_escape_string($conn, $_POST['report_date']);

    // Insert data into the database
    $insert_sql = "INSERT INTO problem_reports (staff_name, department, device_name, problem_category, problem_description, report_date) VALUES ('$staff_name', '$department', '$device_name', '$problem_category', '$problem_description', '$report_date')";
    
    if (mysqli_query($conn, $insert_sql)) {
        $_SESSION['successMessage'] = "Problem reported successfully!";
        header("location: ". $_SERVER['PHP_SELF']);
        exit();
    } else {
        $successMessage = "Error: " . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,SCSS,HTML,RWD,Dashboard">
    <title>RAS || IPRS</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="css/examples.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom styling for the form */
        body {
    background-color: #f4f4f9;
    font-family: 'Roboto', sans-serif;
}

h1, h2, h3 {
    font-family: 'Montserrat', sans-serif;
}
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        .form-group label {
            font-weight: bold;
            color: #555;
        }
        .btn-primary {
            background-color: #2680bb;
            border-color: #2680bb;
            width: 100%;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #1f6da3;
            border-color: #1f6da3;
        }
    </style>


    <script src="js/config.js"></script>
    <!-- <script src="js/color-modes.js"></script> -->
    <!-- Google Tag Manager-->
    <script>
      (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-KX4JH47');
    </script>
    <!-- End Google Tag Manager-->
    <link href="vendors/%40coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
  </head>
  <body>
    <!-- Google Tag Manager (noscript)-->
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KX4JH47" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript)-->
    <div class="sidebar sidebar-fixed sidebar-dark bg-dark-gradient border-end" id="sidebar">
      <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
          <svg class="sidebar-brand-full" width="110" height="32" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
          </svg>
          <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#signet"></use>
          </svg>
        </div>

      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="index.php">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg><span data-coreui-i18n="dashboard">Dashboard</span></a></li>
        <li class="nav-title" data-coreui-i18n="theme">Features</li>
        <li class="nav-item"><a class="nav-link" href="index.php">
           <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
            </svg><span data-coreui-i18n="colors">Home</span></a></li>
        <li class="nav-item"><a class="nav-link" href="feedback.php">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
            </svg><span data-coreui-i18n="typography"> feedback</span></a></li> 

            <li class="nav-item"><a class="nav-link" href="About.php">
              <svg class="nav-icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
              </svg><span data-coreui-i18n="typography">About</span></a></li> 
         
       
    </div> 
    <div class="sidebar sidebar-light sidebar-lg sidebar-end sidebar-overlaid border-start" id="aside">
      <div class="sidebar-header p-0 position-relative">
       

        
      </div>
     
      </div>
    </div>
  
    <div class="wrapper d-flex flex-column min-vh-100">
     <header class="header header-sticky p-0 mb-4">
        <div class="container-fluid px-4">
          
          <!-- <button class="header-toggler d-lg-none" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
          </button> -->
          <!-- <form class="d-none d-sm-flex" role="search">
            <div class="input-group"><span class="input-group-text bg-body-secondary border-0 px-1" id="search-addon">
                <svg class="icon icon-lg my-1 mx-2 text-body-secondary">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-search"></use>
                </svg></span>
                
              <input class="form-control bg-body-secondary border-0" type="text" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" data-coreui-i18n="[placeholder]search">
            </div>
          </form> -->
          <h1 style="text-align: center; display: block; margin: auto;"><b>MAINTENANCE REPORTING SYSTEM</b></h1>

          <!-- <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#aside')).show()" style="margin-inline-end: -12px">
            <svg class="icon icon-lg"> -->
              
              <!-- <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use> -->
            </svg>
          </button>
        </div>
      </header>
      <!-- <div class="body flex-grow-1">
        <div class="container-lg px-4">
          <div class="fs-2 fw-semibold" data-coreui-i18n="dashboard">Dashboard</div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="#" data-coreui-i18n="home">Home</a>
              </li>
              <li class="breadcrumb-item active"><span data-coreui-i18n="dashboard">Dashboard</span>
              </li>
            </ol>
          </nav>

          <div class="container">
            <div class="row">
                <div class="col">
                    <div class="shadow" style="width: 100%;min-height: 630px;margin-top: 119px;background-color: rgba(255,255,255,0.79);">
                        <form style="padding-top: 70px;" action="" method="post">
                            <div class="form-group">
                                <h1 class="text-center">Submit your problem here!</h1>
                            </div>

                            <div class="form-group"><input class="form-control form-control-lg" type="text" style="width: 50%;margin-left: 25%;" name="sname" placeholder="Staff Name" required></div>

                            <div class="form-group"><input class="form-control form-control-lg" type="text" style="width: 50%;margin-left: 25%;" name="dname" placeholder="Department" required></div>

                            <div class="form-group"><input class="form-control form-control-lg" type="text" style="width: 50%;margin-left: 25%;" name="name" placeholder="Device Name" required></div>

                            
<div class="form-group">
<select class="form-control form-control-lg" type="text" style="width: 50%;margin-left: 25%;" name="name">
<option selected disabled>Choose Problem Category</option>
<option value="category1">Hardware</option>
<option value="category2">Software</option>
<option value="category3">Network</option>
</select>
</div>

                           
                            <div class="form-group"><textarea class="form-control form-control-lg" style="width: 50%;margin-left: 25%;min-height: 100px;" name="message" placeholder="Problem Description" required></textarea></div>
                            <div class="form-group"><button class="btn btn-lg btn-primary" style="width: 50%;margin-left: 25%;" name="submit" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

   

    <div class="container form-container">
        <h2>Report a Problem</h2>

        <!-- Display success or error message below the heading -->
        <?php if (!empty($successMessage)) : ?>
            <div class="alert alert-success">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Staff Name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="department" name="department" placeholder="Department" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="device_name" name="device_name" placeholder="Device Name" required>
            </div>
            <div class="form-group">
                <select class="form-control" id="problem_category" name="problem_category" required>
                <option selected disabled>Choose Problem Category</option>
                    <?php
                    // Populate the dropdown with problem categories
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['category_name'] . "'>" . $row['category_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="problem_description" name="problem_description" rows="3" placeholder="Problem Description" required></textarea>
            </div>
            <div class="form-group">
            <label for="submission_time">Submission Time:</label>
            <input type="datetime-local" class="form-control" id="submission_time" name="report_date" required>
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
          
    <footer class="bg-white sticky-footer">
      <div class="container my-auto">
          
      </div>
  </footer>
    </div> 
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/%40coreui/coreui-pro/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <script src="vendors/i18next/js/i18next.min.js"></script>
    <script src="vendors/i18next-http-backend/js/i18nextHttpBackend.js"></script>
    <script src="vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js"></script>
    <script src="js/i18next.js"></script>
    <script>
      const header = document.querySelector('header.header');

      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
    </script>
    <!-- Plugins and scripts required by this view-->
    <script src="vendors/chart.js/js/chart.umd.js"></script>
    <script src="vendors/%40coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="vendors/%40coreui/utils/js/index.js"></script>
    <script src="js/main.js"></script>
    <script>
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </body>
</html>