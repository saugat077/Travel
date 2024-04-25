<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Journal</title>
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="./style.css" />
    <!-- Custom Icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="mane">
        <h4>Write About <br>Your Journey</h4>
        <div class="form">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <!-- <label for="file-upload">Upload Image</label> -->
                    <input type="file" id="file-upload" name="file">
                </div>
                <div class="input-group">
                    <!-- <label for="title">Title</label> -->
                    <input type="text" id="title" name="title" placeholder="Title">
                </div>
                <div class="input-group">
                    <!-- <label for="brief">Description</label> -->
                    <textarea id="brief" name="brief" placeholder="Description"></textarea>
                </div>
                <div class="input-group">
                    <input type="submit" name="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
