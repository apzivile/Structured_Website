<?php
//connect to mysql database creditcard
$mysqli = new mysqli("localhost", "root", "", "creditcard");
/* check connection */
if ($mysqli->connect_errno) {
	//if connection fails exit website
   echo "Connect failed ".$mysqli->connect_error;
	
   exit();
}

//checks if ccnum from form is already in the databse
$query = mysqli_query($mysqli,"SELECT * FROM card WHERE ccnum = AES_ENCRYPT($_POST[ccnum],'1234') ");
//checks SELECT query returns more than 0 rows
//if true prompt alert and close mysql connection so that duplicate wouldnt be entered
if (mysqli_num_rows($query) > 0)
{	//message to print as a javascript alert
	$message = "CC number has already been entered.";
	echo "<script type='text/javascript'>alert('$message');</script>";
    
	 $mysqli->close();
}
//if false insert data
else{
	//before inserting data have to find last id to increase it, and if there are no rows set id to 1
	//SELECT query to find last inserted id
	$query= "SELECT `#` FROM card ORDER BY `#` DESC LIMIT 1";
	$result = $mysqli->query($query);
	//if SELECT query returns more than 0 rows
	if ($result ->num_rows>0) {
	
		//fetch associative array
		while ($row = $result->fetch_assoc()) {
		//set idincrease variable to the last inserted id
		$idincrease= $row["#"];		
		/*insert new row in database, set id to $idincrease +1 to increase id on every new row
		 use information entered in html form 
		in ccnum insert encrypted value using a kye (e.g 1234)
		for exp date take year - month - 01 add them as one date(e.g 2020-04-01)*/
		mysqli_query($mysqli,"INSERT INTO `card` (`#`,`ccnum`, `expdate`, `seccode`) 
							VALUES ($idincrease +1 ,AES_ENCRYPT($_POST[ccnum],'1234'), '$_POST[year]-$_POST[month]-01',$_POST[seccode])");
		}
	}
	//if SELECT returns 0 rows 
	else{
		//insert values, use # =1 for the first row in the table 
		mysqli_query($mysqli,"INSERT INTO `card` (`#`,`ccnum`, `expdate`, `seccode`) 
		VALUES (1 ,AES_ENCRYPT($_POST[ccnum],'1234'), '$_POST[year]-$_POST[month]-01',$_POST[seccode])");
		}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!page title>
		<title>A structured website</title>
		<!link for css file to use on this page>
		<link rel='stylesheet' href='../../phpCW/css/style.css' type='text/css' />
	</head>
	<body>
		<!headings>
		<h2>You have successfully entered your credit card details</h2>
		<h4>Debit / Credit Card <img src= "../../phpCW/image/MC.jpg" alt= "MasterCard">
			Your credit card number ends in **** **** **** 
			<?php
			//connect to databse creditcard
			$mysqli = new mysqli("localhost", "root", "", "creditcard");

			/* check connection */
			if ($mysqli->connect_errno) {
				//exit page if connection fails
			   echo "Connect failed ".$mysqli->connect_error;

			   exit();
			}
			 /*fetch last entered ccnum, works only if id is increased every time new row is entered */
			//SELECT query decrypts cc number and takes 4 digits from the right of the cc number
			//order by id in descending order and limit to 1, meaning that it shows only first row with the highest id possible
			$query ="SELECT RIGHT (AES_DECRYPT(ccnum, '1234'),4) FROM card ORDER BY `#` DESC LIMIT 1";

			if ($result = $mysqli->query($query)) {

				/* fetch associative array */
				while ($row = $result->fetch_assoc()) {
					//print last 4 digits of decrypted cc number
					echo $row["RIGHT (AES_DECRYPT(ccnum, '1234'),4)"]." <br />";
				}
				}
			//close connection
			$mysqli->close();
			?>
		</h4>
		<!grey empty box>
		<div class="secondbox">
		</div>
	</body>
</html>