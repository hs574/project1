<?php
$target_dir = "./upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if csv file is a actual image or fake image
if (isset($_POST["submit"])) {

    if ($target_file == "upload/") {
        $msg = "cannot be empty";
        $uploadOk = 0;
        echo $msg;
    } // Check if file already exists
    else if (file_exists($target_file)) {
        $msg = "Sorry, file already exists.";
        $uploadOk = 0;
        echo $msg;
    } // Check file size
    else if ($_FILES["fileToUpload"]["size"] > 5000000) {
        $msg = "Sorry, your file is too large.";
        $uploadOk = 0;
        echo $msg;
    } // Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        $msg = "Sorry, your file was not uploaded.";
        echo $msg;

        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file  )) {
            $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            echo $msg;
            //header("https://web.njit.edu/~hs574/project2/display.php?name=$target_file");
        }
    }
}

?>
