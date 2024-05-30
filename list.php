

<?php
include_once 'database.php';

// Define database connection variables ($servername, $username, $password, $dbname)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultation Application Details</title>

</style>

<style>
  /* Add custom styles here if needed */
  .table-container {
    margin: 0 auto; /* Center the table */
   
  }
  .page-header-container {
    text-align: center;
    justify-content: center;
  }

  .pagination-container {
    display: flex;
    justify-content: right;
    margin-top: 10px;
    

  }
</style>

</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 page-header-container">
              <br><h2>Consultation Form List</h2>
              
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 table-container">
        <table class="table table-striped table-bordered">
          <tr>
          <th>Consultation ID</th>
          <th>Date</th>
          <th>Time</th>
          <th>Student ID</th>
          <th>Counselor ID</th>
          <th>Issue</th>
          <th>Status Approval</th>
          <th>Status Completion</th>
          <th>Status Report</th>
          <th>Actions</th>
          </tr>

          <?php   
          $per_page =7;
          if (isset($_GET["page"]))
            $page = $_GET["page"];
          else
            $page = 1;
          $start_from = ($page-1) * $per_page;    

           try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("select * from tbl_consultation LIMIT $start_from, $per_page");
            $stmt->execute();
            $result = $stmt->fetchAll();
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          foreach($result as $readrow) {
          ?>
          <tr>
            <td><?php echo $readrow['consultationID']; ?></td>
            <td><?php echo $readrow['consultationDate']; ?></td>
            <td><?php echo $readrow['consultationTime']; ?></td>
            <td><?php echo $readrow['studentID']; ?></td>
            <td><?php echo $readrow['counselorID']; ?></td>
            <td><?php echo $readrow['issue']; ?></td>
            <td><?php echo $readrow['statusApproval']; ?></td>
            <td><?php echo $readrow['statusCompletion']; ?></td>
            <td><?php echo $readrow['statusReport']; ?></td>

            <td>
              <a href="admin_list_details.php?consultationid=<?php echo $readrow['consultationID']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
            </td>
          </tr>
          <?php }  ?>
        </table>
      </div>
    </div> 

    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 pagination-container">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_consultation");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page == 1) { ?>
            <li class="page-item disabled">
              <span class="page-link" aria-hidden="true">&laquo;</span>
            </li>
          <?php } else { ?>
            <li class="page-item">
              <a class="page-link" href="list.php?page=<?php echo $page - 1 ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a></li>
            <?php } ?>

            <!-- Numbered Pages -->
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
              <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="list.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>

            <?php } ?>

            <!-- Next Page -->
            <?php if ($page == $total_pages) { ?>
              <li class="page-item disabled">
                <span class="page-link" aria-hidden="true">&raquo;</span></li>
              <?php } else { ?>
                <li class="page-item">
                  <a class="page-link" href="list.php?page=<?php echo $page + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a></li>
                <?php } ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>