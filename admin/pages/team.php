<?php
	session_start();
	include '../includes/dbConnect.php';
	$email = '';
	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
	}
	else{
		echo "<script>location.href = 'logout.php'</script>";
	}
?>
<html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Team</title>
        <link rel = "stylesheet" href = "../css/teamcss.css">
        <script type="text/javascript" src="../scripts/main.js"></script>
    </head>
    <body>
        <header>
            <nav class = "socialMedia">
                <ul type = "none">
                    <li><a href = "https://www.facebook.com" target = "_blank">
                        <img src = "../images/facebook.png" alt = "facebooklogo" width = "22" height = "22"></a></li>
                    <li><a href = "https://www.twitter.com/explore" target = "_blank">
                        <img src = "../images/twitter.png" alt = "twitterlogo" width = "22" height = "22"></a></li>
                    <li><a href = "https://www.youtube.com" target = "_blank">
                        <img src = "../images/youtube.png" alt = "youtubelogo" width = "22" height = "22"></a></li>
                    <li><a href = "https://www.instagram.com" target = "_blank">
                        <img src = "../images/instagram.png" alt = "instagramlogo" width = "22" height = "22"></a></li>
                    <li><a href = "https://www.linkedin.com" target = "_blank">
                        <img src = "../images/linkedin.png" alt = "linkedinlogo" width = "22" height = "22"></a></li>
                </ul>
            </nav>
            <nav class = "navigationBar">
                <ul type = "none">
                    <li><a href = "../admin.php">Home</a></li>
                    <li><a href = "menu.php">Menu</a></li>
                    <li><a href = "#">Team</a></li>
                    <li><a href = "about.php">About</a></li>
                    <li><a href = "#JumpToContactUs">Engage</a></li>
					<li><a href="../logout.php">Logout: <?php echo $email; ?></a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class = "team">
                <h1>Best Workers</h1>
                <div class = "employees">
                    <a href = "#employee1"><img src = "../images/manager.png" alt = "manager"></a>
                    <a href = "#employee2"><img src = "../images/chef.png" alt = "chef"></a>
                    <a href = "#employee3"><img src = "../images/waiter.png" alt = "waiter"></a>
                </div>
            </div>
            <div class = "section" id = "employee1">
                <h1>Ruby Ruiz</h1>
                <p>Management jobs are all about people, and being able to build successful 
                relationships is integral. If you want to lead a team, you'll need 
                to earn the respect of your colleagues. To do this, you need to know how
                to effectively deal with other people
                Setting time aside to get to know your team members 
                on both a personal and professional level, through social activities or 
                team-building training, while still maintaining professional boundaries, 
                will go a long way to earning their respect.
               </p>
            </div>
            <div class = "section" id = "employee2">
                <h1>Omar Roy</h1>
                <p>I think a chef is someone who can cook their face off, while at the same time,
                having the ability to manage, lead and create a successful kitchen operation
                — restaurant or otherwise. One of the main problems is that the hands-on, 
                technical part of the job, which most of us enjoy most, requires a drastically 
                different skill set than the other essential components of the job. So, yes, 
                there are obvious hands-on skills and techniques required, but a whole host of others, as well.
               </p>
            </div>
            <div class = "section" id = "employee3">
                <h1>Aaron Smith</h1>
                <p>Being a waiter or waitress can be a challenging job. The work is physically,
                mentally,and emotionally demanding. You’re likely to spend hours on your feet,
                rushing about managing several tables of customers. 
                While the potential for higher pay through tips, this work is not for everyone.
               </p>
            </div>
        </main>
        <footer>
            <div class = "footerBox">
                <div class = "openingHours">
                    <h1>Opening hours</h1>
                    <p>
                    Monday: Closed<br>
                    Tue-Wed : 9:Am - 10PM<br>
                    Thu-Fri : 9:Am - 10PM<br>
                    Sat-Sun : 5:PM - 10PM
                    </p>
                </div>
                <div class = "information">
                    <h1>Information</h1>
                    <p>
                    Ipsum Street, Lorem Tower, MO, Columbia, 508000<br>
                    +01 2000 800 9999<br>
                    info@admin.com
                    </p>
                </div>
                <div class = "contactUs" id = "JumpToContactUs">
					<p style="color:white;" >Only simple users can contact us!</p>
                    <h1>Contact us</h1>
                    <input disabled type = "email" id = "email" placeholder = "Your email address"><br>
                    <textarea disabled id = "message" placeholder = "Type your message..."></textarea><br>
                    <button disabled onclick = "ShowMessage()">Send</button>
                </div>
        </footer>
    </body>
</html>