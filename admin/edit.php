<?php
include 'conn.php'; // Include your database connection

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data from the database
    $stmt = $conn->prepare("SELECT * FROM problem_reports WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        echo "No record found!";
        exit;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Invalid request!";
    exit;
}

// Handle form submission to update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staff_name = $_POST['staff_name'];
    $department = $_POST['department'];
    $device_name = $_POST['device_name'];
    $problem_category = $_POST['problem_category'];
    $problem_description = $_POST['problem_description'];
    $submission_time = $_POST['report_date'];

    // Update the data in the database
    $stmt = $conn->prepare("UPDATE problem_reports SET staff_name = ?, department = ?, device_name = ?, problem_category = ?, problem_description = ?, report_date = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $staff_name, $department, $device_name, $problem_category, $problem_description, $submission_time, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully!";
        header("Location: problems.php"); // Redirect to the main page after successful update
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch categories for the dropdown
$category_result = $conn->query("SELECT * FROM problem_reports");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>Edit Problem Report</title>
</head>
<body>
    <div class="container form-container">
        <h2>Edit Problem Report</h2>
        <form method="POST" action="">
            <div class="form-group">
                <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Staff Name" value="<?php echo htmlspecialchars($row['staff_name']); ?>" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="department" name="department" placeholder="Department" value="<?php echo htmlspecialchars($row['department']); ?>" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="device_name" name="device_name" placeholder="Device Name" value="<?php echo htmlspecialchars($row['device_name']); ?>" required>
            </div>
            <div class="form-group">
            <select class="form-control" id="problem_category" name="problem_category" required>
                    <option selected disabled>Choose Problem Category</option>
                    <?php while ($cat = mysqli_fetch_assoc($category_result)) : ?>
                        <option value="<?php echo $cat['problem_category']; ?>" <?php echo $cat['problem_category'] == $row['problem_category'] ? 'selected' : ''; ?>>
                            <?php echo $cat['problem_category']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="problem_description" name="problem_description" rows="3" placeholder="Problem Description" required><?php echo htmlspecialchars($row['problem_description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="submission_time">Submission Time:</label>
                <input type="datetime-local" class="form-control" id="submission_time" name="report_date" value="<?php echo date('Y-m-d\TH:i', strtotime($row['report_date'])); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="problems.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
