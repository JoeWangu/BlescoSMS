<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
</head>

<body>
 -->
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




// if (isset($_POST['submit'])) {
//     $attendance = $_POST['attendance'];
//     $student_id = $_POST['student_id'];

//     $sql = "UPDATE students SET register='$attendance' WHERE id='$student_id'";

//     if ($conn->query($sql) === TRUE) {
//         echo "Attendance updated successfully";
//     } else {
//         echo "Error updating attendance: " . $conn->error;
//     }
// }

// $conn->close();

// // Function to update student attendance in the database
// function update_student_attendance($student_id, $attendance)
// {
//     global $conn;

//     $sql = "UPDATE students SET attendance = '$attendance' WHERE id = $student_id";
//     if (mysqli_query($conn, $sql)) {
//         return true;
//     } else {
//         return false;
//     }
//     // if(true){
//     //     echo '<script>alert("successfully updated the records")</script>';
//     // } else{
//     //     echo '<script>alert("error occurred, records not updated")</script>';
//     // }
// }



// update_student_attendance($student_id, $attendance);
?>
<!-- </body>
</html> -->