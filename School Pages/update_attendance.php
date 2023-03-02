<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blescohouse";

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        // Check if the key starts with "attendance_"
        if (strpos($key, "attendance_") === 0) {
            // Get the student ID from the key
            $student_id = str_replace("attendance_", "", $key);

            // Update the attendance of the student in the database
            $sql = "UPDATE register SET register = '" . $value . "' WHERE id = " . $student_id;
            mysqli_query($conn, $sql);
        }
    }
}
// Close the database connection
mysqli_close($conn);

// Redirect to the form page
header("Location: index.php");
exit;
?>