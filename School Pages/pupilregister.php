<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>PupilRegister</title>
</head>

<body>

  <?php
  // Connect to the database
  $server = "localhost";
  $user = "root";
  $pass = "";
  $db = "blescohouse";

  try {
    $conn = mysqli_connect($server, $user, $pass, $db);

    if (!$conn) {
      throw new Exception("connection to database failed", 1);
    }
  } catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
  }

  /////////////////////////////////////////////////////////////////////////testing
  // Set the number of records per page
  $records_per_page = 5;

  // Get the current page number
  $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
  if (!$page) {
    $page = 1;
  }


  // Calculate the starting point for the query
  $start_from = ($page - 1) * $records_per_page;

  // Retrieve the data
  $query = "SELECT * FROM register LIMIT ?,?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "ii", $start_from, $records_per_page);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  // Calculate the total number of pages
  $total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM register"));
  $total_pages = ceil($total_records / $records_per_page);
  ?>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>register</th>
        <!-- Add additional columns as needed -->
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        $id = htmlspecialchars(isset($row["id"]) ? $row["id"] : '', ENT_QUOTES);
        $firstname = htmlspecialchars(isset($row["firstname"]) ? $row["firstname"] : '', ENT_QUOTES);
        $lastname = htmlspecialchars(isset($row["lastname"]) ? $row["lastname"] : '', ENT_QUOTES);
        $register = htmlspecialchars(isset($row["register"]) ? $row["register"] : '', ENT_QUOTES);
        // Add additional columns as needed
        echo "<tr>
                <td>$id</td>
                <td>$firstname</td>
                <td>$lastname</td>
                <td>$register</td>
                <!-- Add additional columns as needed -->
              </tr>";
      }
      ?>
    </tbody>
  </table>


  <div class="text-center">

    <?php
    // Previous page link
    if ($page > 1) {
      echo "<a href='?page= " . ($page - 1) . "' class='btn btn-primary'>Previous</a>";
    }
    // Next page link
    if ($page <= $total_pages) {
      echo "<a href='?page= " . ($page + 1) . "' class='btn btn-primary'>Next</a>";
    }
    ?>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>