<?php
	session_start();
	include 'includes/dbConnect.php';
	$email = '';
	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
	}
	else{
		echo "<script>location.href = 'logout.php'</script>";
	}
	
	$teksti = '';
	if(isset($_POST['postoTeDhenat'])){
		$teksti = $_POST['teksti'];
            if(!($teksti == "" || empty($teksti) || $teksti == " ")){
    
                $sql = 'INSERT INTO njoftimet (teksti) VALUES (:teksti)';
                $query = $pdo->prepare($sql);
                $query->bindParam('teksti', $teksti);
                
                if($query->execute()) {
					echo "<script>alert('Njoftimi u ruajt.')</script>";
                    header('Location: admin.php');
                } else {
                    echo "<script>alert('Njoftimi nuk u ruajt.');</script>";
                }
            }else{
                echo "<script>alert('Njoftimi nuk u ruajt.');</script>";
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
					<li><a href="logout.php">Logout: <?php echo $email; ?></a></li>
					
                </ul>
            </nav>
        </header>
        <main>
			<div class = "boxLeft">
			<form action="admin.php" method="post">
				<h1>Type something!</h1>
					<textarea name="teksti" placeholder="Type something..."></textarea>
					<button type="submit" name="postoTeDhenat" value="submit">Post Data</button>
				</form>
			</div>
            <div class = "box">
                <h1>Njoftimet!</h1>
				<hr>
					<?php
						include 'includes/connection.php';
						while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><p><?php echo $row['teksti'] ?></p></td>
						<a href="pages/delete.php?id=<?php echo $row[0] ?>">DELETE POST</a>
						<hr>
                    </tr>
                    <?php
                        }
					?>
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
                    <input type = "email" id = "email" placeholder = "Your email address" disabled><br>
                    <textarea disabled id = "message" placeholder = "Type your message..."></textarea><br>
                    <button disabled onclick = "ShowMessage()">Send</button>
                </div>
            </div>
        </footer>
    </body>
</html>