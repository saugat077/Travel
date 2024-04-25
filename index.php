<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Travel Journal</title>
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="./style.css" />
    <!-- Custom Icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

</head>
<body>
    <div class="main">

        <!-- Time and Date -->
        <div class="datetime">
            <div class="time">
                <?php
                // Set the timezone to Nepal
                date_default_timezone_set('Asia/Kathmandu');
                // Get the current time
                $currentTime = date("g:i");
                echo "" . $currentTime;
                ?>
            </div>
            <div class="date">
                <?php
                // Get the current day, date, and month
                $currentDay = date("l");
                $currentDate = date("d");
                $currentMonth = date("F");
                echo "" . $currentDay . ", " . $currentDate . " " . $currentMonth;
                ?>
            </div>
        </div>

        <!-- Add section -->
            <div class="add">
                <div class="line"></div>
                <a href="./add.php"><i class="fa-solid fa-circle-plus fa-beat fa-2xl" style="color: #4d8eff;"></i></a>
            </div>

    <!-- Display User Entries -->
<div class="entries">
    <?php
    // Include the database configuration file
    include 'db.php';

    // Fetch user entries from the database
    $query = "SELECT * FROM journal";
    $result = mysqli_query($conn, $query);

    // Check if there are any entries
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $entryId = $row['id'];
            $fileName = $row['file_name'];
            $title = $row['title'];
            $brief = $row['brief'];
            $uploadedOn = date("Y-m-d",strtotime($row['uploaded_on']));

            // Display the entry
            echo '<div class="entry-container">';
            echo '<div class="entry-left">';
            echo '<img src="uploads/' . $fileName . '" alt="' . $fileName . '" class="left-image"">';
            echo '</div>';
            echo '<div class="entry-right">';
            echo '<div class="entry-details">';
            echo '<h3>' . $title . '</h3>';
            echo '<p>' . $brief . '</p>';
            echo '</div>';
            echo '<div class="entry-actions">';
            echo '<p class="uploaddate">' . $uploadedOn . '</p>';
            echo '<a href="edit.php?id=' . $entryId . '" class="btn-edit"><i class="fa-solid fa-pen-to-square"></i></a>';
            echo '<a href="delete.php?id=' . $entryId . '" class="btn-delete" onclick="return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa-regular fa-trash-can"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No entries found.</p>';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</div>
</div>
</body>
</html>