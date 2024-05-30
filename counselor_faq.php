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
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-image: url("images/background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
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
            background-color:  #6380FF;
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
            color: white;
        }

        .contact-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>


<body>

    
  <?php include_once 'counselor_navbar.php'; ?>

<div class="faq-container">

    <h2 class="text-center"><strong>Frequently Asked Questions</strong></h2>
    <br>

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
        <strong>4. What type of counseling services can I offer on jomConsult?</strong>
    </div>
    <div class="answer">
        <p>You can offer a wide range of counseling services based on your expertise, such as academic counseling, career counseling, mental health counseling, and more.</p>
    </div>

    <div class="question">
        <strong>5. Are there both in-person and virtual counseling sessions?</strong>
    </div>
    <div class="answer">
        <p>Yes, student may have the option to choose both in-person or virtual sessions depednding on their requests.</p>
    </div>

    <div class="question">
        <strong>6. Are counseling sessions confidential?</strong>
    </div>
    <div class="answer">
        <p>Yes, counseling sessions are typically confidential. However, it's essential to review the counselor's privacy policy for specific details.</p>
    </div>

    <div class="question">
        <strong>7. What steps should I take to prepare for an online counseling session?</strong>
    </div>
    <div class="answer">
        <p>Provide guidance for students on how to prepare for an online session, including having a stable internet connection, finding a quiet space, and ensuring necessary materials are available.</p>
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
        <p>If you experience any technical difficulties or require assistance, visit our <a style="color: #007BFF" href="contact_us.php" target="_blank">Contact</a> section on the website.</p>
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