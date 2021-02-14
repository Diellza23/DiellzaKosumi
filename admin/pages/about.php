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
        <title>About</title>
        <link rel = "stylesheet" href = "../css/aboutcss.css">
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
                    <li><a href = "team.php">Team</a></li>
                    <li><a href = "#">About</a></li>
                    <li><a href = "#JumpToContactUs">Engage</a></li>
					<li><a href="../logout.php">Logout: <?php echo $email; ?></a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class = "container">
                <h1>About Us</h1>
                <a href="#" style="background-image:url(../images/president.jpg)" class="blurredBG">
                    <div class="parentBG">
                        <div class="content">
                        <b>Brian Driscoll</b><br>
                        <i>Co-Founder, President & Executive Chef</i><br>
                        A wife who wanted to surprise her husband upon his return home from overseas military duty asked Brian to cook and serve
                        a romantic dinner for them at their home. When seeing the sheer wonder of their reunion, Brian knew immediately he wanted
                        more people to experience that same magic. Starting as a dishwasher at the age of 16, Brian worked his way from the back 
                        of the house to the front of the house, learning all aspects of restaurant operations. He worked as a server, bartender, 
                        trainer, and manager for large corporate chains, including Red Lobster, Claim Jumper, and Yard House. He also built a solid
                        reputation as a top server and mixologist for independent, chef-driven fine dining restaurants.
                        </div>
                    </div>
                </a>
                <a href="#" style="background-image:url(../images/chief.jpg)" class="blurredBG">
                    <div class="parentBG">
                        <div class="content">
                        <b>Monique Hayward</b><br>
                        <i>Co-Founder, Chief Executive Officer</i><br>
                        Monique is an award-winning entrepreneur, dynamic speaker, published author, and corporate marketing executive with over 25
                        years of business experience. She is currently the Senior Director of Marketing & Communications for Core Services 
                        Engineering & Operations at Microsoft Corporation. She formerly owned and operated Dessert Noir Café & Bar in Beaverton,
                        Oregon, which she launched to fill a niche for upscale suburban dining options and was recognized as a standout in the
                        market with awards for “Neighborhood Pick for Dessert” and “Best Bites” from The Oregonian. Monique also was a partner in
                        Cerise Noire Software, a mobile software applications company.
                        </div>
                    </div>
                </a>
                <a href="#" style="background-image:url(../images/interior.jpg)" class="blurredBG">
                    <div class="parentBG">
                        <div class="content">
                        <b>Our Restaurant</b><br>
                        <i>Founded in 1822</i><br>
                        Our restaurant is proud to continue a time-honored tradition of fine dining. It first opened its doors in 1822.
                        Ever since those early days, our restaurant has been regarded by travelers and locals alike as a charming getaway for fine dining and good
                        times in a peaceful setting.
                        </div>
                    </div>
                </a>
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
            </div>
        </footer>
    </body>
</html>