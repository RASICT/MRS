<?php
// problems.php

// Start the session
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect to login page
    exit();
}

// Your page content here


include 'conn.php'; // Include your database connection

// Initialize variables
$searchQuery = '';
$successMessage = '';
$a = 1; // For numbering the table rows
$itemsPerPage = isset($_GET['items_per_page']) ? (int)$_GET['items_per_page'] : 5; // Default items per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
$offset = ($page - 1) * $itemsPerPage; // Offset for SQL query

// Handle search query
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}

// Build SQL query
$sql = "SELECT * FROM problem_reports";

// Modify SQL query to include search
if (!empty($searchQuery)) {
    $sql .= " WHERE staff_name LIKE '%$searchQuery%' 
                OR department LIKE '%$searchQuery%' 
                OR device_name LIKE '%$searchQuery%' 
                OR problem_category LIKE '%$searchQuery%' 
                OR problem_description LIKE '%$searchQuery%' 
                OR report_date LIKE '%$searchQuery%'";
}

// Count total records for pagination
$totalRecordsResult = $conn->query($sql);
$totalRecords = $totalRecordsResult->num_rows;

// Add LIMIT clause to SQL query for pagination
$sql .= " LIMIT $offset, $itemsPerPage";
$result = $conn->query($sql);

// Handle delete operation
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    // Delete all rows in `feedback` table that reference this `report_id`
    $deleteFeedbackStmt = $conn->prepare("DELETE FROM feedback WHERE report_id = ?");
    $deleteFeedbackStmt->bind_param("i", $deleteId);
    $deleteFeedbackStmt->execute();

    // Now delete the row from `problem_reports` table
    $deleteStmt = $conn->prepare("DELETE FROM problem_reports WHERE id = ?");
    $deleteStmt->bind_param("i", $deleteId);
    $deleteResult = $deleteStmt->execute();

    if ($deleteResult) {
        $successMessage = "Record deleted successfully.";

        // Redirect to the same page without any query parameters to reset the form
        header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
        exit();
    } else {
        $successMessage = "Error deleting record.";
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
    <link href="styles/about.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom CSS for the About page */
body {
    background-color: #f4f4f9;
    
}
.about-container {
    max-width: 800px;
    margin: 50px auto;
    background: #fff;
    padding: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}
.about-container h1 {
    margin-bottom: 20px;
    font-size: 28px;
    color: #333;
}
.about-container p {
    font-size: 16px;
    color: #555;
}
.about-container ul {
    list-style-type: disc;
    padding-left: 20px;
}
.about-container ul li {
    font-size: 16px;
    color: #555;
}
.language-form {
    margin-bottom: 20px;
}
.language-form .btn {
    margin: 5px;
}
.language-form .btn.active {
    font-weight: bold;
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
        <li class="nav-item"><a class="nav-link" href="problems.php">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg><span data-coreui-i18n="dashboard">Dashboard</span></a></li>
        <li class="nav-title" data-coreui-i18n="theme">Features</li>
        <li class="nav-item"><a class="nav-link" href="problems.php">
           <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
            </svg><span data-coreui-i18n="colors">Home</span></a></li>
        <li class="nav-item"><a class="nav-link" href="statisticts.php">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
            </svg><span data-coreui-i18n="typography">Statistics</span></a></li> 

            <li class="nav-item"><a class="nav-link" href="review_statistics.php">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
            </svg><span data-coreui-i18n="typography">Review Statistics</span></a></li>

            <li class="nav-item"><a class="nav-link" href="About.php">
              <svg class="nav-icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
              </svg><span data-coreui-i18n="typography">About</span></a></li> 

              <li class="nav-item"><a class="nav-link" href="index.php">
              <svg class="nav-icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
              </svg><span data-coreui-i18n="typography">Logout</span></a></li> 
         
       
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
    <!-- Display success or error message -->
    <?php if (!empty($successMessage)) : ?>
        <div class="alert alert-success">
            <?php echo $successMessage; ?>
        </div>
    <?php endif; ?>

    <!-- Search form and Submitted Problems header in one row -->
    <div class="d-flex justify-content-between align-items-center">
        <h3>Submitted Problems</h3>
        <form method="GET" action="" id="searchForm" class="form-inline">
            <input type="text" class="form-control mr-2" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($searchQuery); ?>" oninput="checkEmptyInput()">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Items per page selector -->
    <div class="mt-3">
        <form method="GET" action="">
            <label for="items_per_page">Items per page:</label>
            <select name="items_per_page" id="items_per_page" class="form-control d-inline w-auto" onchange="this.form.submit()">
                <option value="5" <?php if ($itemsPerPage == 5) echo 'selected'; ?>>5</option>
                <option value="10" <?php if ($itemsPerPage == 10) echo 'selected'; ?>>10</option>
            </select>
            <input type="hidden" name="search" value="<?php echo htmlspecialchars($searchQuery); ?>"> <!-- Maintain search query -->
        </form>
    </div>

    <!-- Displaying data from database -->
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Staff Name</th>
                <th>Department</th>
                <th>Device Name</th>
                <th>Problem Category</th>
                <th>Problem Description</th>
                <th>Submitted At</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0) : ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $a++; ?></td>
                        <td><?php echo htmlspecialchars($row['staff_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['department']); ?></td>
                        <td><?php echo htmlspecialchars($row['device_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['problem_category']); ?></td>
                        <td><?php echo htmlspecialchars($row['problem_description']); ?></td>
                        <td><?php echo $row['report_date']; ?></td>
                        <td>
                            <!-- Action buttons -->
                            <a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                            <a href="reply.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Reply</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8" class="text-center">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination controls -->
    <nav>
        <ul class="pagination">
            <?php
            $totalPages = ceil($totalRecords / $itemsPerPage);
            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i == $page) ? 'active' : '';
                echo "<li class='page-item $activeClass'><a class='page-link' href='?page=$i&items_per_page=$itemsPerPage&search=" . htmlspecialchars($searchQuery) . "'>$i</a></li>";
            }
            ?>
        </ul>
    </nav>
</div>

<script>
    // JavaScript function to check if the input is empty
    function checkEmptyInput() {
        var searchInput = document.querySelector('input[name="search"]');
        if (searchInput.value.trim() === '') {
            document.getElementById('searchForm').submit(); // Submit the form to reset
        }
    }
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