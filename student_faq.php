<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jomConsult FAQ</title>

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
            line-height: 1.6;
        }

        header {
            background-color: #e88776;
            padding: 5px;
            height: 70px;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: space-between; /* Adjusted to space between items */
            padding: 0 20px; /* Adjusted padding for better spacing */
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
            color: #007BFF;
            margin-bottom: 20px;
        }

        .faq-container {
            max-width: 800px;
            margin: auto;
        }

        .question {
            background-color:  #e88776;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .answer {
            background-color: # #6380FF;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .contact-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
  <?php include_once 'student_navbar.php'; ?>

  <div class="about-maincontainer">
    <br><br>
    <section id="" class="section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <p>Frequently Asked Question</p>
        </div>
    </div>
</section>

<div class="faq-container">


    <div class="question">
        <strong>1. What is jomConsult?</strong>
    </div>
    <div class="answer">
        <p>jomConsult is an online platform designed to help streamline the process of scheduling consultations with counselors. Stay up-to-date with counseling unit events.</p>
    </div>

    <div class="question">
        <strong>2. Can I use the system without creating an account?</strong>
    </div>
    <div class="answer">
        <p>While browsing is available without an account, you need to create one to book consultations. This ensures a personalized experience and allows you to receive important updates for events.</p>
    </div>

    <div class="question">
        <strong>3. How do I create an account?</strong>
    </div>
    <div class="answer">
        <p>Click on the "Sign Up" or "Register" button on the homepage, fill in the required information, and follow the instructions to verify your account.</p>
    </div>

    <div class="question">
        <strong>4. How do I book a consultation?</strong>
    </div>
    <div class="answer">
        <p>After logging in, click 'Consultation', fill in the form, and confirm your booking. You will receive a confirmation email with details of your appointment.</p>
    </div>

    <div class="question">
        <strong>5. Is there a limit to the number of consultations I can book?</strong>
    </div>
    <div class="answer">
        <p>Generally, there is no specific limit. However, it may depend on the counselor's availability and policies. Check with the counselor or the system for more details.</p>
    </div>

    <div class="question">
        <strong>6. Are counseling sessions confidential?</strong>
    </div>
    <div class="answer">
        <p>Yes, counseling sessions are typically confidential. However, it's essential to review the counselor's privacy policy for specific details.</p>
    </div>

    <div class="question">
        <strong>7. Is there a fee for using jomConsult?</strong>
    </div>
    <div class="answer">
        <p>The system itself is free to use. There are no additional charges for any consultations.</p>
    </div>

    <div class="question">
        <strong>8. How do I receive reminders for my upcoming appointments?</strong>
    </div>
    <div class="answer">
        <p>You will receive email reminders leading up to your scheduled appointment time. Ensure your contact information is correct when you create an account.</p>
    </div>

    <div class="question">
        <strong>9. How do I reset my password if I forget it?</strong>
    </div>
    <div class="answer">
        <p>Visit the login page and click on the "Forgot Password" link. Follow the instructions to reset your password.</p>
    </div>

    <div class="question">
        <strong>10. What do I do if I encounter technical issues?</strong>
    </div>
    <div class="answer">
        <p>If you experience any technical difficulties or require assistance, please don't hesitate to contact us.</p>
    </div>

    <div class="contact-link">
        <a href="contact_us.php" target="_blank">Contact Us for Further Assistance</a>
    </div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>

</html>