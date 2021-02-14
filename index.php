<?php
	require 'includes/dbConnect.php';
	session_start();
	if(isset($_SESSION['email'])){
		echo "<script>location.href='admin/admin.php'</script>";
	}
	else{
		$email = '';
		$password = '';
		if(isset($_POST['login'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$message = '';

			$query = $pdo->prepare("SELECT * from user where email='$email'");
			$query->bindParam(':email', $email);
			$query->execute();

			$user = $query->fetch();
			if(password_verify($password, $user['password'])){
				$_SESSION['email'] = $email;
				echo "<script>location.href='admin/admin.php'</script>";
			}
			else{
				echo "<script>alert('Email or Password incorrect!')</script>";
			}
		}
		
		if(isset($_POST['makeReservation'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$date = $_POST['date'];
			$nrOfGuests = $_POST['nrOfGuests'];
			
			require 'includes/connection.php';
			$sql = 'INSERT INTO reservations (name, email, date, nrOfGuests) VALUES (:name, :email, :date, :nrOfGuests)';
            $query = $pdo->prepare($sql);
            $query->bindParam('name', $name);
			$query->bindParam('email',$email);
			$query->bindParam('date',$date);
			$query->bindParam('nrOfGuests',$nrOfGuests);
                
            if($query->execute()) {
				echo "<script>alert('Rezervimi u bë. Ju faleminderit.')</script>";
                header('Location: index.php');
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
					echo "<script>location.href = 'index.php'</script>";
				}else {
					echo "<script>alert('Mesazhi nuk u dërgua!');</script>";
				}
			}
		}
		
		if(isset($_POST['register'])){
            $emri = $_POST['emri'];
            $mbiemri = $_POST['mbiemri'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $lloji = $_POST['lloji'];
            $message = '';

            if(!empty($emri) && !empty($mbiemri) && !empty($email) && !empty($password) && (!empty($lloji) && $lloji!="" && $lloji!=" ")){
                $sql = 'INSERT INTO user (emri,mbiemri,email,password,lloji) VALUES (:emri, :mbiemri, :email, :password, :lloji)';
                $query = $pdo->prepare($sql);
                $query->bindParam('emri', $emri);
                $query->bindParam('mbiemri', $mbiemri);
                $query->bindParam('email', $email);
                $query->bindParam('password', $password);
                $query->bindParam('lloji', $lloji);
                
                if($query->execute()) {
                    $message = "Llogaria u krijua me sukses.";
                    header('Location: index.php');
                } else {
                    $message = "Nuk mund te krijohet llogaria!";
                }
            }else{
                $message = 'Te dhena mungojne!';
            }
        }
	}
	
?>
<html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Home - Restaurant</title>
        <link rel = "stylesheet" href = "css/main.css">
        <script type = "text/javascript" src = "scripts/main.js"></script>
        <script type = "text/javascript" src = "scripts/reservation.js"></script>
        <script type = "text/javascript" src = "scripts/login.js"></script>
        <script type = "text/javascript" src = "scripts/register.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css"/>
    </head>
    <body>
        <header>
            <nav class = "socialMedia">
                <ul type = "none">
                    <li><a href = "https://www.facebook.com" target = "_blank">
                        <img src = "images/facebook.png" alt = "facebooklogo" width = "22" height = "22"></a></li>
                    <li><a href = "https://www.twitter.com/explore" target = "_blank">
                        <img src = "images/twitter.png" alt = "twitterlogo" width = "22" height = "22"></a></li>
                    <li><a href = "https://www.youtube.com" target = "_blank">
                        <img src = "images/youtube.png" alt = "youtubelogo" width = "22" height = "22"></a></li>
                    <li><a href = "https://www.instagram.com" target = "_blank">
                        <img src = "images/instagram.png" alt = "instagramlogo" width = "22" height = "22"></a></li>
                    <li><a href = "https://www.linkedin.com" target = "_blank">
                        <img src = "images/linkedin.png" alt = "linkedinlogo" width = "22" height = "22"></a></li>
                </ul>
            </nav>
            <nav class = "navigationBar">
                <ul type = "none">
                    <li><a href = "#">Home</a></li>
                    <li><a href = "pages/menu.php">Menu</a></li>
                    <li><a href = "pages/team.php">Team</a></li>
                    <li><a href = "pages/about.php">About</a></li>
                    <li><a href = "#JumpToContactUs">Engage</a></li>
					<li><button onclick = "openLoginForm()">Log In</button></li>
					<li><button onclick = "openRegisterForm()">Register</button></li>
                </ul>
            </nav>
        </header>
        <main>
			<div class = "boxLeft">
			<div class="slider" align="center">
					<div class="container">
						<ul class="bxslider">
							<li> 
								<img src="images/sliderImage1.png" alt ="Foto e slider">
								<div class="text">
									<h1>Ofertat</h1>
									<p>
										Ofertat i gjeni me poshtë.
									</p>
								</div>
							</li>
							<li> 
								<img src="images/sliderImage2.png" alt ="Foto e slider">
								<div class="text">
									<h1>Ofertat</h1>
									<p>
										Ofertat i gjeni me poshtë.
									</p>
								</div>
							</li>
							<li> 
								<img src="images/sliderImage3.png" alt ="Foto e slider">
								<div class="text">
									<h1>Rezervimet</h1>
									<p>
										Bëni rezervimin tuaj tani! Sa me shpejte aq me mire.
									</p>
								</div>
							</li>
							<li> 
								<img src="images/sliderImage4.png" alt ="Foto e slider">
								<div class="text">
									<h1>Rezervimet</h1>
									<p>
										Bëni rezervimin tuaj tani! Sa me shpejte aq me mire.
									</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<h1>Ofertat!</h1>
				<hr>
					<?php
						include 'includes/connection.php';
						while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><p><?php echo $row['teksti'] ?></p></td>
						<hr>
                    </tr>
                    <?php
                        }
					?>
			</div>
            <div class = "box">
                <h1>Greetings!</h1>
                <pre>Inspired  by  culinary  traditions  from  around  the  world , 
our  creativity  knows  no  boundaries.
While  we’re  on  top  of  the  latest  food  and  beverage  trends,
our  creations ,  even  if  they  are  “ Picasso on a plate” 
are  approachable  and  familiar.</pre><br>
                <button onclick = "openForm()">Make a reservation</button>
            </div>
            <div class = "form-popup" id = "myForm">
                <form action="index.php" method="post" class = "form-container">
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
			<div class = "form-popup" id = "myLoginForm">
                <form action="index.php" method="post" class = "form-container">
                    <h1>Enter your info</h1>
                    <label><b>E-mail</b></label>
                    <input type = "email" name="email" placeholder= "Enter your email" required>
                    <label><b>Password</b></label>
                    <input type = "password" name="password" max = "15" placeholder = "Enter your password" required>
                    <button type="submit" name="login" class="btn">Submit</button>
                    <button type="submit" class="btn cancel" onclick="closeLoginForm()">Close</button>
                </form>
            </div>
			<div class = "form-popup" id = "myRegisterForm">
                <form action="index.php" method="post" class = "form-container">
                    <h1>Enter your info</h1>
					<label><b>First Name</b></label>
                    <input type = "text" name="emri" placeholder = "Enter your name" required>
					<label><b>Last Name</b></label>
                    <input type = "text" name="mbiemri" placeholder = "Enter your name" required>
                    <label><b>E-mail</b></label>
                    <input type = "email" name="email" placeholder= "Enter your email" required>
                    <label><b>Password</b></label>
                    <input type = "password" name="password" max = "15" placeholder = "Enter your password" required>
					<label><b>Type of user</b></label>
                    <input type = "text" name="lloji" max = "15" placeholder = "Enter your password" value="User" required>
                    <button type="submit" name="register" class="btn">Submit</button>
                    <button type="submit" class="btn cancel" onclick="closeRegisterForm()">Close</button>
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
					<form method="post" action="index.php">
						<h1>Contact us</h1>
						<input name="email" type = "email" id = "email" placeholder = "Your email address"><br>
						<textarea name="message" id = "message" placeholder = "Type your message..."></textarea><br>
						<button type="submit" name="contactUs" <!--onclick = "ShowMessage()-->">Send</button>
					</form>
                </div>
            </div>
        </footer>
		<script src="http://code.jquery.com/jquery-2.2.4.js"> </script>
		<script src="scripts/jquery.bxslider.min.js"></script>
		<script>
			$(document).ready(function(){
				$('.bxslider').bxSlider();
			});
		</script>
    </body>
</html>