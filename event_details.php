<?php
include 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

  <?php
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_event WHERE eventID = :eventid");
    $stmt->bindParam(':eventid', $eventid, PDO::PARAM_STR);
    $eventid = $_GET['eventid'];
    $stmt->execute();
    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);


  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  ?>


  <div class="row">
    <div class="col-md-6">
      <?php if ($readrow['eventPoster'] == ""): ?>
        <img src="images/eventPoster/None.GIF" alt="No Poster" class="event-image img-fluid">
      <?php else: ?>
        <img src="images/eventPoster/<?php echo $readrow['eventPoster']; ?>" class="event-image img-fluid rounded" alt="Event Poster">
      <?php endif; ?>

    </div>
    <div class="col-md-6">
      <div class="card border-0 shadow-lg">
        <div class="card-body">
          <h5 class="card-title text-primary title-font"><?php echo $readrow['eventName'] ?></h5><br>
          <p class="card-text custom-text"><strong>Date:</strong> <?php echo date('d/m/Y', strtotime($readrow['eventDate'])); ?></p>
          <p class="card-text custom-text"><strong>Time:</strong> <?php echo $readrow['eventStartTime'] ?> - <?php echo $readrow['eventEndTime'] ?></p>
          <p class="card-text custom-text"><strong>Location:</strong> <?php echo $readrow['eventLocation'] ?></p>
          <p class="card-text custom-text"><strong>Fees (RM):</strong> <?php echo $readrow['eventFees'] ?></p>

          <p class="card-text custom-text"> <?php echo $readrow['eventDescription'] ?></p>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>

