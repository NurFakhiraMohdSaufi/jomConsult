<?php 

include 'database.php';
?>
<?php
function getStatusClass($status)
{
    switch ($status) {
        case 'Upcoming':
        return 'status-upcoming';
        case 'Complete':
        return 'status-complete';
        case 'Incomplete':
        return 'status-incomplete';
        default:
        return '';
    }
}
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Jom Consult</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Icon picture -->
<link rel="shortcut icon" type="images/jpg" href="images/icon.png" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link href="assets/sidebar.css" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />

<!-- Template Main CSS File -->
<link href="assets/css/style1.css" rel="stylesheet">

<style>
    body{
    }
    table {
        background-color: white;
    }


    /* Add styles for different status */
    .status-upcoming { background-color: #ffc107; color: #000; }
    .status-complete { background-color: #28a745; color: #fff; }
    .status-incomplete { background-color: #dc3545; color: #fff; }

    /* Style for Details button */
    .details-button { background-color: #007bff; color: #fff; padding: 8px 12px; border: none; cursor: pointer; }

</style>

</head>

<?php include_once 'counselor_navbar.php'; ?>


<!-- Main Container -->
<div class = "container mt-5"> 

    <!-- ======= Services Section ======= -->
    <section id="portfolio" class="portfolio section-bg" >
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Consultation</h2>
          <p>Report</p>
      </div>
  </div>

  <div class="list-box" style="background-color:rgba(241, 241, 241, 0.6)">

    <table id="datatable"  border="1">
        <thead>
            <tr>
                <th class="text-center">Consultation ID</th>
                <th class="text-center">Date</th>
                <th class="text-center">Time</th>
                <th class="text-center">Student ID</th>
                <th class="text-center">Issue</th>
                <th class="text-center">Description</th>
                <th class="text-center">Consultation Report</th>
            </tr>
        </thead>
        <tbody>

            <?php
                            // pagination
            $per_page = 500;
            if(isset($_GET["page"]))
                $page = $_GET["page"];
            else
                $page = 1;
            $start_from = ($page-1) * $per_page;

                            // read table

            try {
                $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM tbl_consultation WHERE counselorID = '$id' AND statusCompletion = 'Complete'");

                $stmt->execute();
                $result = $stmt->fetchAll();
            }
            catch(PDOException $e) {

                echo "Error: ". $e->getMessage();
            }
            foreach($result as $readrow) {
                ?>

                <tr>
                    <td><?php echo $readrow['consultationID']; ?></td>
                    <td><?php echo $readrow['consultationDate']; ?></td>
                    <td><?php echo $readrow['consultationTime']; ?></td>
                    <td><?php echo $readrow['studentID']; ?></td>
                    <td><?php echo $readrow['issueOption']; ?></td>
                     <td><?php echo $readrow['issueDescription']; ?></td>

                    <!--Report Button -->
                    <td>
                      <center>
                        <?php

                        $reportExists = false;

                        if ($readrow['statusReport'] === 'Complete') {
                            ?>

                            <button id="reportBtn" type="button" data-toggle="modal" data-target="#myModal" data-href="report_details.php?consultationid=<?php echo $readrow['consultationID']; ?>" class="reportBtn btn btn-info btn-sm" role="button" style="color: white;">Report</button>
                            <?php
                        } else {
                            ?>

                            <button id="addBtn" type="button" data-toggle="modal" data-target="#myModal" data-href="counselorReport_form.php?consultationid=<?php echo $readrow['consultationID']; ?>" class="addBtn btn btn-success btn-sm" role="button" style="color: white;">
                                <i class="bi bi-plus"></i>
                            </button>
                            <?php
                        }
                        ?>
                    </center>
                </td>
            </tr>
            <?php 
        }
        $conn = null;
        ?>
    </tbody>
</table>
</div>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" role="dialog" data-keyboard="false" data-backdrop="static">
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
        <button type="button" class="print" aria-label="Print" onclick="printReport()">Print</button>
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
        $('#myModal').modal({show:true});
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
        $('#myModal').modal({show:true});
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
        $('#myModal').modal({show:true});
    });
  });
});
</script>


<script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').DataTable( {
        "lengthMenu": [
            [5,10,20,30, -1], 
            [5,10,20,30,"All"]
            ],
        "pagelength": 5,
        "dom": 'Blfrtip',
        "searching": true,
        "paging": true,
        "sorting": true,
        "order": [[1, 'desc']], // Sort the "Name" column ascendingly on load
        "columnDefs": [
          { targets: [2], searchable: false } // Exclude the "Price" column from searching
          ],
        buttons: [
          'excel', 'csv'
          ]

    } );
  } );
</script>

<script>
    function printReport() {
       var newWindow = window.open('printReport.php', '_blank');
       newWindow.print();
   }
</script>

</body>
</html>
