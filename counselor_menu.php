<?php 
include_once 'database.php';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT issueOption, COUNT(*) as count FROM tbl_consultation GROUP BY issueOption";
  $result = $conn->query($sql);
  $issueData = $result->fetchAll(PDO::FETCH_ASSOC);

  $issueLabels = array_column($issueData, 'issueOption');
  $issueCounts = array_column($issueData, 'count');

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

function formatConsultationDate($date)
{
    
    return date('jS F Y', strtotime($date));
}

function formatConsultationTime($time)
{
    
    return date('h:i A', strtotime($time));
}
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Jom Consult</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Icon picture -->
    <link rel="shortcut icon" type="images/jpg" href="images/icon.png" />

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

      body{
        background-color: #fcf7f5;
      }

      .container-plus {
        margin-top: 50px;
        max-width: 100%;
      }

      .container-fluid .g-0 {
        width: 100%;
        max-width: 100%;
      }

      .portfolio {
        padding-top: 130px;
      }

      .img-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .single_crm {
            margin-bottom: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .single_crm:hover {
            transform: scale(1.05);
        }

        .crm_head {
            background-color: #C6DEF1;
            color: #ffffff;
            padding: 15px;
            margin: 0;
            border-radius: 10px 10px 0 0;
            font-size: 2rem;
            font-family: 'Arial', sans-serif;
            text-align: center;
        }

        .crm_body {
            padding: 20px;
            border-radius: 0 0 10px 10px;
            font-size: 1.5rem;
            color: #495057;
            text-align: center;
            font-family: 'Verdana', sans-serif;
        }

        .crm_body h4 {
            margin: 0;
            font-size: 2rem;
        }

        .crm_body p {
            margin: 0;
            font-size: 1.2rem;
        }

        .chart-container {
            position: relative;
            margin-top: 20px;
            height: 200px;
        }

        .chart-label {
            font-size: 1.2rem;
            margin-top: 10px;
        }


    </style>
  </head>

  <body>

    <?php include_once 'counselor_navbar.php'; ?>

    <div class="container-fluid g-0">

      <!-- ======= Hero Section ======= -->
      <section id="hero" class="d-flex align-items-center container-plus g-0" style="background-color: #fff;">

        <div class="container">
          <div class="row gy-4 justify-content-center">
            <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center">
              <h1>Welcome Counselors!<h1>
                <h2>As a counselor, you play a crucial role in empowering students to navigate life's challenges. Here, you'll find resources and opportunities to share your expertise.</h2>
                <div>
                  <a href="counselor_schedule.php" class="btn-get-started scrollto">View Consultation</a>
                </div>
              </div>
              <div class="col-lg-4 order-1 order-lg-2 hero-img text-lg-end">
                <img src="images/img_counselor.png" class="img-fluid animated" alt="">
              </div>
            </div>
          </div>

        </section><!-- End Hero -->


        <!-- ======= Services Section ======= -->
        <section id="portfolio" class="portfolio section-bg" >
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Dashboard</h2>
              <p>Counselor Dashboard</p>
            </div>

            <section id="portfolio" class="portfolio section-bg" >
              <h2>Upcoming Consultations</h2>
        <?php
        try {
            $currentDate = date('Y-m-d H:i:s');

            // Upcoming consultations with student information
            $upcomingConsultationQuery = "SELECT c.studentID, c.consultationDate, c.consultationTime, s.studentPic
                                          FROM tbl_consultation c
                                          JOIN tbl_student s ON c.studentID = s.studentID
                                          WHERE c.counselorID = '$id'
                                            AND c.consultationDate > '$currentDate'
                                            AND c.statusApproval = 'Approved'
                                          ORDER BY c.consultationDate";

            $upcomingConsultationStmt = $conn->prepare($upcomingConsultationQuery);
            $upcomingConsultationStmt->execute();
            $upcomingConsultationResult = $upcomingConsultationStmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($upcomingConsultationResult) > 0) {
                foreach ($upcomingConsultationResult as $row) {
                    echo "<div class='card mb-3'>
                            <div class='card-body'>
                                <h5 class='card-title'>
                                    <img src='images/studentPic/{$row['studentPic']}' alt='Student Icon' class='img-icon'>
                                    {$row['studentID']}
                                </h5>
                                <p class='card-text'> " . formatConsultationDate($row['consultationDate']) . "</p>
                                <p class='card-text'> " . formatConsultationTime($row['consultationTime']) . "</p>
                            </div>
                          </div>";
                }
            } else {
                echo "<p>No upcoming consultations.</p>";
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>

      </section><!-- End Hero -->

            <div class="row">

              <div class="col-xl-6">

                <div class="white_card mb_30 card_height_100">
                  <div class="white_card_header">
                    <div class="row align-items-center justify-content-between flex-wrap">
                      <div class="col-lg-4">
                        <div class="main-title">
                        <h5 class="m-0">Counseling Issues</h5>
                      </div>
                    </div>
                  </div>
                  <canvas id="myBarChart" width="100%" height="50"></canvas>
                </div>
              </div>
            </div>

            <?php

            try {
              $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT COUNT(*) AS count, statusCompletion FROM tbl_consultation WHERE counselorID = '$id' AND statusApproval = 'Approved' GROUP BY statusCompletion");
              $stmt->execute();
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

              $upcomingCount = 0;
              $completeCount = 0;
              $incompleteCount = 0;

              foreach ($result as $row) {
                switch ($row['statusCompletion']) {
                  case 'Upcoming':
                  $upcomingCount = $row['count'];
                  break;
                  case 'Complete':
                  $completeCount = $row['count'];
                  break;
                  case 'Incomplete':
                  $incompleteCount = $row['count'];
                  break;
              // Add more cases if needed
                }
              }
              $sql = "SELECT *, COUNT(*) as count FROM tbl_student, tbl_consultation WHERE tbl_student.studentID = tbl_consultation.studentID AND statusApproval = 'Approved' AND counselorID = '$id' GROUP BY studentGender";

              $result = $conn->query($sql);
              $genderData = $result->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
              echo "Error: " . $e->getMessage();
            }
            ?>

            <div class="col-xl-3 ">
              <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                  <div class="row align-items-center">
                    <div>
                      <div class="main-title">
                        <h5 class="m-0">Consultation Status</h5>
                        <div id="chartLegend">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="white_card_body ">
                  <canvas id="pieChart" width="100%" height="300"></canvas>
                </div>
              </div>
            </div>
          </div>

            <div class="col-xl-3 ">
              <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                  <div class="row align-items-center">
                    <div>
                      <div class="main-title">
                        <h5 class="m-0">Total Student by Gender</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="white_card_body ">
                  <canvas id="chartTotal" width="100%" height="300"></canvas>
                </div>
              </div>
            </div>

          </div>



        </div>
      </section>

              <!-- ======= Services Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-3">
                <div class="single_crm mx-auto">
                    <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                        <div class="thumb">
                            <i class='bx bx-run'></i>
                        </div>
                    </div>
                    <div class="crm_body">
                        <?php
                        try {
                            // Analytic Report Query for Current Month
                            $currentMonth = date('F'); // 'F' format returns the full month name
                            $numericMonth = date('m'); // 'm' format returns the month as a two-digit number

                            $analyticStmt = $conn->prepare("
                                SELECT COUNT(*) as consultationCount
                                FROM tbl_consultation
                                WHERE counselorID = :counselorID
                                AND statusCompletion = 'Complete'
                                AND MONTH(consultationDate) = :numericMonth
                            ");
                            $analyticStmt->bindParam(':counselorID', $id, PDO::PARAM_STR);
                            $analyticStmt->bindParam(':numericMonth', $numericMonth, PDO::PARAM_STR);
                            $analyticStmt->execute();
                            $analyticResult = $analyticStmt->fetch(PDO::FETCH_ASSOC);

                            // Display Analytic Report for Current Month
                            $consultationCount = $analyticResult['consultationCount'];
                            echo "<h2>$currentMonth</h2>";
                            echo "<p>$consultationCount Attended Consultations</p>";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="single_crm mx-auto">
                    <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                        <div class="thumb">
                            <i class='bx bx-run'></i>
                        </div>
                    </div>
                    <div class="crm_body">
                        <?php
                        try {
                            // Analytic Report Query for Current Year
                            $currentYear = date('Y');

                            $analyticStmtYear = $conn->prepare("
                                SELECT COUNT(*) as consultationCount
                                FROM tbl_consultation
                                WHERE counselorID = :counselorID
                                AND statusCompletion = 'Complete'
                                AND YEAR(consultationDate) = :currentYear
                            ");
                            $analyticStmtYear->bindParam(':counselorID', $id, PDO::PARAM_STR);
                            $analyticStmtYear->bindParam(':currentYear', $currentYear, PDO::PARAM_INT);
                            $analyticStmtYear->execute();
                            $analyticResultYear = $analyticStmtYear->fetch(PDO::FETCH_ASSOC);

                            // Display Analytic Report for Current Year
                            $consultationCountYear = $analyticResultYear['consultationCount'];
                            echo "<h2>$currentYear</h2>";
                            echo "<p>$consultationCountYear Attended Consultations</p>";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.2/chart.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


    <script type="text/javascript">
        // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#292b2c';

        // Bar Chart Example
      var ctx = document.getElementById("myBarChart").getContext('2d');
      var myBarChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
          labels: <?php echo json_encode($issueLabels); ?>,
          datasets: [{
            label: 'Number of Issues',
            data: <?php echo json_encode($issueCounts); ?>,
            backgroundColor: ['#007bff', '#dc3545', '#43A047', '#FF9800', '#8D6E63'],
          }],
        },
        options: {
          responsive:true,
          scales: {
            xAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    </script>

    <script>
    // Use the counts obtained from the database
      var upcomingCount = <?php echo $upcomingCount; ?>;
      var completeCount = <?php echo $completeCount; ?>;
      var incompleteCount = <?php echo $incompleteCount; ?>;

      // Chart.js configuration
      var ctx = document.getElementById('pieChart').getContext('2d');
      var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Upcoming', 'Complete', 'Incomplete'],
          datasets: [{
            data: [upcomingCount, completeCount, incompleteCount],
            backgroundColor: [
              'rgba(255, 99, 132, 0.8)', // Red for Upcoming
              'rgba(75, 192, 192, 0.8)', // Green for Complete
              'rgba(255, 205, 86, 0.8)'  // Yellow for Incomplete
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
        }
      });
    </script>

    <script>

      // Chart.js configuration
      var ctx = document.getElementById('chartTotal').getContext('2d');
      var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ["Male", "Female"],
          datasets: [{
            data: <?php echo json_encode(array_column($genderData, 'count')); ?>,
            backgroundColor: ['#007bff', '#dc3545'],
          }],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
        }
      });
    </script>

    <script>
  // Use the counts obtained from the database
var upcomingCount = <?php echo $upcomingCount; ?>;
var completeCount = <?php echo $completeCount; ?>;
var incompleteCount = <?php echo $incompleteCount; ?>;

// calculate the total count
var totalCount = upcomingCount + completeCount + incompleteCount;

// Calculate the percentages
var upcomingPercentage = ((upcomingCount / totalCount) * 100).toFixed(2);
var completePercentage = ((completeCount / totalCount) * 100).toFixed(2);
var incompletePercentage = ((incompleteCount / totalCount) * 100).toFixed(2);

// Chart.js configuration
var ctx = document.getElementById('pieChart').getContext('2d');
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Upcoming', 'Complete', 'Incomplete'],
    datasets: [{
      data: [upcomingCount, completeCount, incompleteCount],
      backgroundColor: [
        'rgba(255, 99, 132, 0.8)', // Red for Upcoming
        'rgba(75, 192, 192, 0.8)', // Green for Complete
        'rgba(255, 205, 86, 0.8)'  // Yellow for Incomplete
      ],
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    tooltips: {
      callbacks: {
        label: function (tooltipItem, data) {
          var label = data.labels[tooltipItem.index] || '';
          var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
          var percentage = ((value / totalCount) * 100).toFixed(2);
          return label + ': ' + value + ' (' + percentage + '%)';
        }
      }
    },
    legendCallback: function (chart) {
      var text = [];
      text.push('<ul class="chart-legend">');
      for (var i = 0; i < chart.data.labels.length; i++) {
        text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '"></span>');
        text.push(chart.data.labels[i] + ': ' + chart.data.datasets[0].data[i] + ' (' + ((chart.data.datasets[0].data[i] / totalCount) * 100).toFixed(2) + '%)</li>');
      }
      text.push('</ul>');
      return text.join('');
    }
  },
  plugins: [{
    afterDraw: function (chart) {
      var width = chart.width,
        height = chart.height,
        ctx = chart.ctx;
      ctx.restore();
      var fontSize = (height / 114).toFixed(2);
      ctx.font = fontSize + "em sans-serif";
      ctx.textBaseline = "middle";
      var text = totalCount + " Total",
        textX = Math.round((width - ctx.measureText(text).width) / 2),
        textY = height / 2;
      ctx.fillText(text, textX, textY);
      ctx.save();
    }
  }]
});

// Display the legend with percentages
document.getElementById('chartLegend').innerHTML = myPieChart.generateLegend();
</script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </body>
  </html>

  <?php
} catch(PDOException $e) {
  echo "Error: ".$e->getMessage();
}
$conn = null;
?>
