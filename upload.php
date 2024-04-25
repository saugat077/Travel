<?php
// Include the database configuration file
include 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $fileName = $_FILES['file']['name'];
    $fileTmp = $_FILES['file']['tmp_name'];
    $title = $_POST['title'];
    $brief = $_POST['brief'];

    // File upload path
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . $fileName;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($fileTmp, $targetFilePath)) {
        // Get the current date and time
        $uploadedOn = date('Y-m-d H:i:s');

        // Insert the entry into the database
        $query = "INSERT INTO journal (file_name, uploaded_on, title, brief) VALUES ('$fileName', '$uploadedOn', '$title', '$brief')";
        $result = mysqli_query($conn, $query);

        // Check if the insertion was successful
        if ($result) {
            header("Location: index.php");
    exit();
        } else {
            echo "Failed to add entry. Please try again.";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Close the database connection
mysqli_close($conn);
?>
