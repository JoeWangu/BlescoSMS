<?php
  // Connect to the database
  $conn = mysqli_connect("host", "username", "password", "database");

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
  $query = "SELECT * FROM table_name LIMIT ?,?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "ii", $start_from, $records_per_page);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  // Calculate the total number of pages
  $total_records = mysqli_num_rows($result);
  $total_pages = ceil($total_records / $records_per_page);
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Column 1</th>
      <th>Column 2</th>
      <!-- Add additional columns as needed -->
    </tr>
  </thead>
  <tbody>
    <?php
      while ($row = mysqli_fetch_assoc($result)) {
        $column_1 = htmlspecialchars($row["column_1"], ENT_QUOTES);
        $column_2 = htmlspecialchars($row["column_2"], ENT_QUOTES);
        // Add additional columns as needed
        echo "<tr>
                <td>$column_1</td>
                <td>$column_2</td>
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
      echo "<a href='?page=" . ($page - 1) . "' class='btn-primary'>Previous</a>";
    }

    // Next page link
    if ($page < $total_pages) {
      echo "<a href='?page=" . ($page + 1) . "' class='btn btn-primary'>Next</a>";
    }
  ?>
</div>
