<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Icon picture -->
    <link rel="shortcut icon" type="images/jpg" href="images/icon.png" />

    <!-- Add Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: "Open Sans", sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-image: url("images/background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }


        .back-button {
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .back-button:hover {
            color: #0056b3;
        }

        h1 {
            color: white;
            text-align: center;
            font-size: 32px;
            margin: 0
        }

        h2 {
            color: black;
            text-align: center;
            margin-top: 20px;
        }

        .about-container {
            max-width: 800px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            position: relative; /* Added for the decorative background */
        }

        .about-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: linear-gradient(45deg, #007BFF, #00FFFF);  Fancy gradient background */
            opacity: 0.1;
            border-radius: 15px;
            z-index: -1;
        }

        .about-content {
            text-align: justify;
            margin-bottom: 20px;
        }

        .unit-kaunseling {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            text-align: center;
        }

        .unit-kaunseling div {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container {
            text-align: center;
        }

        .container img {
            max-width: 80%;
            height: auto;
        }


        a {
            color: #007BFF;
            text-decoration: none;
            transition: color 0.3s; /* Smooth color transition on hover */
        }

        a:hover {
            color: #0056b3;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .about-maincontainer {
            max-width: 800px;
            margin: auto;
        }

        th {
            background-color: #6380FF;
            color: white;
        }
    </style>
</head>

<body>
    <?php include_once 'counselor_navbar.php'; ?>
<div class="about-maincontainer">
    <br><br>
<h2 class="text-center"><strong>About Us</strong></h2>
   


    <div class="about-container">


        <p class="about-content">
            <h2>Counseling Unit</h2>
        </p>


        <div class="unit-kaunseling">
            <div>
                <h3>Guidance & Counseling</h3>
                <p>Provides guidance and counseling services for individuals and groups..</p>
            </div>

            <div>
                <h3>Mental Health</h3>
                <p>Implements crisis interventions for critical cases involving mental health.</p>
            </div>


            <div>
                <h3>Healthy Mind Screening</h3>
                <p>Conducts screening for a healthy mind for all new students at UKM.</p>
            </div>

            <div>
                <h3>Human Module Development</h3>
                <p>Manages and implements human module development programs based on a psychological approach, covering aspects of development, prevention, recovery, and intervention.</p>
            </div>

            <div>
                <h3>Psychological Testing</h3>
                <p>Administers and interprets psychological testing tools.</p>
            </div>

            <div>
                <h3>Reports</h3>
                <p>Provides documentation, statistics, and annual reports for each handled case..</p>
            </div>
        </div>

        <div class="container">
            <br>
            <img src="images/carta_organisasi.jpeg" alt="Carta Organisasi" class="img-fluid custom-mt mx-auto d-block">
        </div>

        <br></br>
        <div class="working-hours">
            <h2>Working Hours</h2>
            <table>
                <tr>
                    <th>Days</th>
                    <th>Hours</th>
                    <th>Lunch Break</th>
                </tr>
                <tr>
                    <td>Monday - Thursday</td>
                    <td>08:00 - 17:00</td>
                    <td>(13:00-14:00 Close)</td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td>08:00 - 17:00</td>
                    <td>(12:15-14:45 Close)</td>
                </tr>
                <tr>
                    <td>Weekend</td>
                    <td>Close</td>
                    <td></td>
                </tr>
            </table>
        </div>

    </div>

        <script>
        function goBack() {
            window.history.back();
        }
    </script>
    </body>

    </html>