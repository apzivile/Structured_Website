<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!page title>
		<title>A structured website</title>
		<!link to css file>
		<link rel='stylesheet' href='../../phpCW/css/style.css' type='text/css' />
	</head>
	<body>
		<!headings>
		<h2>Payment Options</h2>
		<h4>Debit / Credit Card <img src= "../../phpCW/image/MC.jpg" alt= "MasterCard"></h4>
		<!main box for the form>
		<div class="mail">
			<!Form/ action jumps to secondpage if onsubmit cardnumber function returns true/ method post to take input and post it into database>
			<! onsubmit works when submit button is pressed>
			<form name="form" action="secondpage.php" method="post" onsubmit="return cardnumber(ccnum,seccode);">
	
				<!label for CC number input>
				<label for ="cardno">Card Number</label>
				<input class ="input" type='number' name='ccnum' id= "cardno"/>
				<!new line>
				<div>&nbsp;</div>
		
				<!label for expiration date>
				<label for= "month">Expiration Date</label>
				<!selection box for expiration month>
				<select id="month" name= "month">
					<option >Month</option>
					<option value="1">01</option>
					<option value="2">02</option>
					<option value="3">03</option>
					<option value="4">04</option>
					<option value="5">05</option>
					<option value="6">06</option>
					<option value="7">07</option>
					<option value="8">08</option>
					<option value="9">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
				<!selection box for expiration year>
				<select id="year" name= "year">
					<option >Year</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
				</select>
				<!new line>
				<div>&nbsp;</div>
		
				<!label for security code input>
				<label for="secode">Security Code</label>
				<!set max length for security code, form will not submit until correct amount of numbers are inserted>
				<input class ="input" type='number' name='seccode' max="9999" id="secode" />
				<!new line>
				<div>&nbsp;</div>
				<!line of text to guide user>
				<span class ="guide">(3-4 digit code normaly on the back of your card)</span>

				<!submit button>
				<div class="submit"><input type="submit" class ="button" name = "submit" value="Continue"/></div>
				<!new line>
				<div>&nbsp;</div>
			<!end of form>
			</form>
		<!end of main box>
		</div>
		<! tell where and which javascript file to use>
		<script src="../../phpCW/js/script.js"></script>
	</body>
</html>