function cardnumber(inputtxt1,inputtxt2)
{
	//function takes to parameters 
	//function used in index.php form onsubmit inputtxt1 = ccnum inputtxt2=seccode
	 var cardno = /^(?:5[1-5][0-9]{14})$/;
	 //check if ccnum value matches cardno requirements
	 //check if seccode is not empty, otherwise validation passes with no seccode
	 //code fails to insert data into database because seccode cannot be empty
	 //and shows previously entered card number.
	 if(inputtxt1.value.match(cardno) && inputtxt2.value.length!==0)
		{
	  return true;
		}
	  else
		{
		//show alert if condition is not met
		alert("Not a valid Mastercard number or security code field is empty");
		return false;
		}
}
