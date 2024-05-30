<?php 
include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Events</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Icon picture -->
  <link rel="shortcut icon" type="images/jpg" href="images/icon.png" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">

  <style>

   body {
  }

  .event-container {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    flex-wrap: wrap;
  }

  .event-card {
    margin: 8px;
    margin-bottom: 20px;
    padding: 6px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
  }
  .event-card:hover {
    transform: scale(1.05);
  }

  .card-title {
    color: #007bff;
    font-weight: bold;
    font-size: 1.3em;
    text-align: center;
    margin-bottom: 0.5em;
  }

  .event-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
  }

  .card-text {
    font-size: 0.9em;
    color: #333;
    margin-bottom: 0.5em;
  }

  h4 {
    margin-top: 15px;
    font-size: 1.8rem;
    color: #333;
    font-weight: bold;
  }

  p {
    color: #666;
    font-size: 1.2rem;
  }

  .custom-bg-color {
    background-color: #6380FF;
  }

  .title-font {
    font-family: Fantasy;
    font-size: 28px;
    color: #5bc0de;
  }

  .custom-text {
    font-family:  helvetica, sans-serif;
    font-size: 16px;
  }

  .title {
    font-family: 'Fantasy';
    font-weight: bold;
    font-size: 26px;
  }
  .event-details {
    margin-top: 10px; /* Adjust the spacing as needed */
  }

  .event-title {
    font-weight: bold;
    color: #007bff;
    padding-bottom: 10px;
  }

  .event-details h6 {
    font-size: 0.9em;
    color: #333;
    margin: 5px 0; /* Adjust the spacing as needed */
  }


</style>
</head>

<body>

  <?php include_once 'student_navbar.php'; ?>

 <div class="container mt-5">

    <section id="schedule" class="section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <p>Events</p>
        </div>
      </div>
    </section>

    <div class="event-container">
      <?php
      // Read
                try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Add WHERE condition to filter out events with dates and times that have passed
    $stmt = $conn->prepare("SELECT * FROM tbl_event WHERE CONCAT(eventDate, ' ', eventEndTime) >= NOW()");
    $stmt->execute();
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
      foreach ($result as $readrow) {
        ?>
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="event-card">
            <?php if ($readrow['eventPoster'] == ""): ?>
              <button class="openBtn btn btn-link" data-toggle="modal" data-target="#posterModal" data-href="event_details.php?eventid=<?php echo $readrow['eventID']; ?>" role="button">
                <img src="images/eventPoster/None.GIF" alt="No Poster" class="event-image img-fluid">
              </button>
            <?php else: ?>
              <button class="openBtn btn btn-link" data-toggle="modal" data-target="#posterModal" data-href="event_details.php?eventid=<?php echo $readrow['eventID']; ?>" role="button">
                <img src="images/eventPoster/<?php echo $readrow['eventPoster']; ?>" class="event-image img-fluid" alt="Event Poster">
              </button>
            <?php endif; ?>

            <div class="card-body">
              <h5 class="card-title"><?php echo $readrow['eventName']; ?></h5>
              <p class="card-text">
                <strong>Date:</strong> <?php echo date('d/m/Y', strtotime($readrow['eventDate'])); ?><br>
                <strong>Time:</strong> 
                <?php 
                $startTime = date('h:i A', strtotime($readrow['eventStartTime'])); 
                $endTime = date('h:i A', strtotime($readrow['eventEndTime'])); 
                echo $startTime . ' - ' . $endTime;
                ?>
                <br>
                <strong>Location:</strong> <?php echo $readrow['eventLocation']; ?>
              </p>
            </div>
          </div>
        </div>
        <?php
      }
      $conn = null;
      ?>
    </div>


  </div>


<!-- Modal -->
<div class="modal fade" id="posterModal" tabindex="-1" aria-labelledby="myModalLabel" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <!-- Modal content -->
    <div class="modal-content" style="background-color: white ;">
      <div class="modal-header" style="font-family:viga, sans-serif; font-size:40px;">
        <h4 style="font-weight: bold;">Consultation Details</h4>
        <button type="button" class="close" aria-label="Close" data-dismiss="modal">&times;</button> 
    </div>
    <div class="modal-body" style="font-size:16px;">
    </div>
    <div class="modal-footer">
        <button type="button" clas="btn btn-default font-button" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
</div>

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    $('.openBtn').on('click', function(){
      var url = $(this).attr('data-href');
      $('.modal-body').load(url, function() {
        /* Act on the event */
        $('#posterModal').modal({show:true});
    });
  });
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.reportBtn').on('click', function(){
      var url = $(this).attr('data-href');
      $('.modal-body').load(url, function() {
        /* Act on the event */
        $('#posterModal').modal({show:true});
    });
  });
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.addBtn').on('click', function(){
      var url = $(this).attr('data-href');
      $('.modal-body').load(url, function() {
        /* Act on the event */
        $('#posterModal').modal({show:true});
    });
  });
});
</script>


  </body>

  </html>