<?php
	include '../includes/dbConnect.php';
	session_start();
	if(isset($_SESSION['email'])){
		echo "<script>location.href='admin/admin.php'</script>";
	}
	else{
		if(isset($_POST['makeReservation'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$date = $_POST['date'];
			$nrOfGuests = $_POST['nrOfGuests'];
			
			include '../includes/connection.php';
			$sql = 'INSERT INTO reservations (name, email, date, nrOfGuests) VALUES (:name, :email, :date, :nrOfGuests)';
            $query = $pdo->prepare($sql);
            $query->bindParam('name', $name);
			$query->bindParam('email',$email);
			$query->bindParam('date',$date);
			$query->bindParam('nrOfGuests',$nrOfGuests);
                
            if($query->execute()) {
				echo "<script>confirm('Rezervimi u bë. Ju faleminderit.')</script>";
                header('Location: menu.php');
            } else {
                echo "<script>alert('Rezervimi nuk u bë!');</script>";
            }
		}
		
		if(isset($_POST['contactUs'])){
			$email = $_POST['email'];
			$message = $_POST['message'];
			
			if(empty($email) || $email == "" || $email == " " || empty($message) || $message == "" || $message == " "){
				echo "<script>alert('Ju lutem mbushni fushat e zbrazeta!');</script>";
				echo "<script>location.href = 'menu.php'</script>";
			}else{
				include '../includes/connection.php';
				$sql = 'INSERT INTO contactus (email, message) VALUES (:email, :message)';
				$query = $pdo->prepare($sql);
				$query->bindParam('email',$email);
				$query->bindParam('message',$message);
				
				if($query->execute()){
					echo "<script>alert('Mesazhi u dërgua. Faleminderit që na kontaktuat.')</script>";
					echo "<script>location.href = 'menu.php'</script>";
				}else {
					echo "<script>alert('Mesazhi nuk u dërgua!');</script>";
				}
			}
		}
	}
?>
<html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Menu</title>
        <link rel = "stylesheet" href = "../css/menucss.css">
        <script type="text/javascript" src="../scripts/main.js"></script>
        <script type="text/javascript" src="../scripts/reservation.js"></script>
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
                    <li><a href = "../index.php">Home</a></li>
                    <li><a href = "#">Menu</a></li>
                    <li><a href = "team.php">Team</a></li>
                    <li><a href = "about.php">About</a></li>
                    <li><a href = "#JumpToContactUs">Engage</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class = "container">
                <h1>MENU</h1>
                <h4><a href = "#ShowMainCourse">Main Course</a></h4>
                <h4><a href = "#ShowDrinks">Drinks</a></h4>
                <h4><a href = "#ShowDesserts">Desserts</a></h4>
            </div><br>
            <div class = "category" id = "ShowMainCourse">
                <div>
                    <img src = "../images/beef.jpg" alt = "beef">
                    <h4>Beef Medallions</h4>
                    <p>Grilled tenderloin and roasted pepper coulis.<br>$11.00</p>
                </div>
                <div>
                    <img src = "../images/calamari.jpg" alt = "calamari">
                    <h4>Calamari</h4>
                    <p>Served with house made aioli.<br>$10.00</p>
                </div>
                <div>
                    <img src = "../images/shrimps.jpg" alt = "shrimps">
                    <h4>Sautee Prawns</h4>
                    <p>Red chili peppers, minced garlic, zilavka wine and lepinja bread.<br>$12.00</p>
                </div>
            </div>
            <div class = "category" id = "ShowDrinks">
                <div>
                    <img src = "../images/cosmopolitan.jpg" alt = "cosmopolitan">
                    <h4>Cosmopolitan</h4>
                    <p>Lipsmackingly sweet-and-sour, the Cosmopolitan cocktail
                    is a good time in a glass.<br>$9.00</p>
                </div>
                <div>
                    <img src = "../images/mimosas.jpg" alt = "mimosas">
                    <h4>Mimosa</h4>
                    <p>A mimosa cocktail is composed of champagne and chilled citrus juice.<br>$10.00</p>
                </div>
                <div>
                    <img src = "../images/mojito.jpg" alt = "mojito">
                    <h4>Mojito</h4>
                    <p>A tall, refreshing Cuban signature cocktail.<br>$8.00</p>
                </div>
            </div>
            <div class = "category" id = "ShowDesserts">
                <div>
                    <img src = "../images/strawberries.jpg" alt = "strawberries">
                    <h4>Chocolate Covered Strawberries</h4>
                    <p>Fresh strawberries covered in milk chocolate and white chocolate.<br>$7.00</p>
                </div>
                <div>
                    <img src = "../images/tiramisu.jpg" alt = "tiramisu">
                    <h4>Tiramisu</h4>
                    <p>This coffee-flavoured Italian dessert is a must-try.<br>$8.99</p>
                </div>
                <div>
                    <img src = "../images/cheesecake.jpg" alt = "cheesecake">
                    <h4>New York-Style Cheesecake</h4>
                    <p>Made with cream cheese, sour cream, graham cracker crumbs, berry sauce.<br>$9.99</p>
                </div>
            </div><br>
            <div class = "ending">
                <h1>Food tastes better when you eat it with your family!</h1>
                <button onclick="openForm()">Make a reservation</button>
            </div>
            <div class = "form-popup" id = "myForm">
                <form action="menu.php" method="post" class = "form-container">
                    <h1>Your reservation</h1>
                    <label><b>Full Name</b></label>
                    <input type = "text" name="name" placeholder = "Enter your name" required>
                    <label><b>E-mail</b></label>
                    <input type = "email" name="email" placeholder= "Enter your email" required>
                    <label><b>Date/Time</b></label>
                    <input type = "datetime-local" name="date" required>
                    <label><b>Number of Guests</b></label>
                    <input type = "number" max = "15" name="nrOfGuests" placeholder = "You and how many people?" required>
                    <button type="submit" name="makeReservation" class="btn">Submit</button>
                    <button type="submit"  class="btn cancel" onclick="closeForm()">Close</button>
                </form>
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
					<form method="post" action="menu.php">
						<h1>Contact us</h1>
						<input name="email" type = "email" id = "email" placeholder = "Your email address"><br>
						<textarea name="message" id = "message" placeholder = "Type your message..."></textarea><br>
						<button type="submit" name="contactUs" <!--onclick = "ShowMessage()-->">Send</button>
					</form>
                </div>
        </footer>
    </body>
</html>