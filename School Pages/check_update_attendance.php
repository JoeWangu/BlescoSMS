<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

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

    // Function to fetch students from the database
    function fetch_students_from_database()
    {
        global $conn;

        $sql = "SELECT * FROM register";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    ?>

    <form action="update_attendance.php" method="POST">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Attendance</th>
            </tr>
            <?php
            $students = fetch_students_from_database();
            foreach ($students as $student) {
                ?>
                <tr>
                    <td>
                        <?php echo $student['firstname']; ?>
                    </td>
                    <td>
                        <?php echo $student['lastname']; ?>
                    </td>
                    <td>
                        <input type="radio" name="attendance_<?php echo $student['id']; ?>" value="present">Present
                        <input type="radio" name="attendance_<?php echo $student['id']; ?>" value="absent">Absent
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <input type="submit" value="Submit">
    </form>
</body>

</html>