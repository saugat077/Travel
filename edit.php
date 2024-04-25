<?php
// Include the database configuration file
include 'db.php';

// Check if entry ID is provided
if (isset($_GET['id'])) {
    $entryId = $_GET['id'];

    // Fetch the entry from the database
    $query = "SELECT * FROM journal WHERE id = $entryId";
    $result = mysqli_query($conn, $query);

    // Check if the entry exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fileName = $row['file_name'];
        $title = $row['title'];
        $brief = $row['brief'];
        
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get updated data from the form
            $newTitle = $_POST['title'];
            $newBrief = $_POST['brief'];

            // Update the entry in the database
            $updateQuery = "UPDATE journal SET title = '$newTitle', brief = '$newBrief' WHERE id = $entryId";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                // Redirect back to index.php after successful update
                header('Location: index.php');
                exit;
            } else {
                echo 'Error updating the entry. Please try again.';
            }
        }
    } else {
        echo 'Entry not found.';
    }
} else {
    echo 'Invalid entry ID.';
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry</title>
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="./style.css" />
</head>
<body>
    <div class="mane">
        <h4>Edit Entry</h4>
        <div class="form">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" id="title" name="title" placeholder="Title" value="<?php echo $title; ?>">
                </div>
                <div class="input-group">
                    <input type="text" id="brief" name="brief" placeholder="Description" value="<?php echo $brief; ?>">
                </div>
            <div class="input-group"> 
                <input type="submit" id="submit" name="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
