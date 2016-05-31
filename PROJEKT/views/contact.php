				
	<h1>Kontakt</h1>
	<br>
		<div class="left">
			<!--<h2>Kirjuta meile</h2>-->
			<form action="vorm" method="post">
			
				<input type="text" name="first_name" placeholder="Eesnimi"><br>
				<input type="text" name="last_name" placeholder="Perekonnanimi"><br>
				<input type="text" name="email"  placeholder="E-mail"><br>
				<textarea rows="5" name="message"  placeholder="Sõnum" cols="25"></textarea><br>
				<input type="submit" name="submit" value="SAADA">
			</form>
			
		</div>
		<div class="right">
			<p class="contactBIG">
				Ülemiste Keskuse 2. korrus,<br/>
				Suur-Sõjamäe 4, Tallinn<br/>
				Administraator | 5560 0393<br/>
				Sünnipäevad | 5309 8715<br/>
				info@lennumaa.ee<br/>
				broneering@lennumaa.ee<br/>
			</p>
		</div>
			
		<?php 
		if(isset($_POST['submit'])){
			$to = "kerstim@gmail.com"; // this is your Email address
			$from = $_POST['email']; // this is the sender's Email address
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$subject = "Teema";
			$subject2 = "Copy of your form submission";
			$message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
			$message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

			$headers = "From:" . $from;
			$headers2 = "From:" . $to;
			mail($to,$subject,$message,$headers);
			mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
			echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
			// You can also use header('Location: thank_you.php'); to redirect to another page.
			}
		?>
