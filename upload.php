<?php
// Include database connection
include('connect.php');

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session only if it's not already active
}

// Check if the user is logged in
if (!isset($_SESSION['client_id'])) {
    echo "You must be logged in to upload files.";
    exit();
}

// Get the client_id from the session
$client_id = $_SESSION['client_id']; 

// Check if files are uploaded
if (isset($_FILES['files'])) {
    $files = $_FILES['files']; // Get the uploaded files

    // Loop through each uploaded file
    for ($i = 0; $i < count($files['name']); $i++) {
        $file_name = $files['name'][$i]; // Get the file name
        $file_tmp = $files['tmp_name'][$i]; // Get the temporary file location
        $file_size = $files['size'][$i]; // Get the file size
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); // Get file extension

        // Check for upload errors
        if ($files['error'][$i] !== UPLOAD_ERR_OK) {
            echo "Error uploading file: " . $files['error'][$i];
            exit();
        }

        // Define allowed file types
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'mp3', 'wav', 'avi'];

        // Check if the file type is allowed
        if (in_array($file_type, $allowed_types)) {
            // Set the upload directory
            $upload_dir = 'uploads/';

            // Create a unique name for the file
            $new_file_name = uniqid() . '.' . $file_type;

            // Move the file from temp location to the upload directory
            if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                // File uploaded successfully, now insert info into the database
                $query = "INSERT INTO files (File_Name, Client_ID) VALUES ('$new_file_name', '$client_id')";

                if (mysqli_query($conn, $query)) {
                    echo "<script>
                        alert('File uploaded successfully!');
                        window.location.href = 'time-capsule.php';
                    </script>";
                    exit();
                }
                 else {
                    echo "Error inserting file into the database: " . mysqli_error($conn);
                }
            } else {
                echo "Error moving the file.";
            }
        } else {
            echo "Invalid file type. Only images, videos, and audio files are allowed.";
        }
    }
}
?>

