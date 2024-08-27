<?php
include 'conn.php'; // Include your database connection

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the DELETE statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM problem_reports WHERE id = ?");
    $stmt->bind_param("i", $id); // 'i' specifies that the parameter is an integer

    if ($stmt->execute()) {
        // Record deleted successfully, redirect to the main page
        header("Location: problems.php?message=deleted"); // Adjust this URL to your main page
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
