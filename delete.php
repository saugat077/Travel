<?php
// Include the database configuration file
include 'db.php';

// Check if the entry ID is provided
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Get the entry ID from the URL parameter
    $entryId = $_GET['id'];

        // Delete the entry from the database
        $deleteQuery = "DELETE FROM journal WHERE id = $entryId";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        // Check if the entry is successfully deleted
        if ($deleteResult) {
            header("Location: index.php");
    exit();

        } else {
            echo "Error deleting entry.";
        }
} else {
    // If entry ID is not provided, redirect to index.php
    header("Location: index.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
