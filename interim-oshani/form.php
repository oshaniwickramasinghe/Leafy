<!DOCTYPE html>
<html lang="en">
<head>
	<title>GFG- Store Data</title>
	<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
	<div class="header">
        <h1>Leafy</h1>
    </div>

	<center>
		<form action="insert.php" method="post" id="form">
			
		
		<div class="row">
		<div class="column" >
			<p><label for="firstName">First Name:</label></p>
			<p><label for="lastName">Last Name:</label></p>
			<p><label for="emailAddress">Email Address:</label></p>
			<p><label for="contactNo">Contact Number:</label></p>
			<p><label for="passward">Password:</label></p>
			<p><label for="passward">Confirm Password:</label></p>
			<p><label for="passward">Select user role:</label></p>
		</div>
		<div class="column" >
			
		<p><input type="text" name="first_name" id="firstName" placeholder="First Name" required="required"></p>
		<p><input type="text" name="last_name" id="lastName" placeholder="Last Name" required="required"></p>
		<p><input type="email" name="email" id="emailAddress" placeholder="Email Address" required="required"></p>
		<p><input type="text" name="contactNo" id="contactNo" placeholder="0000000000" pattern="[0-9]{10}" required="required"></p>
		<p><input type="password" name="passward" id="passward" placeholder="xxxxxxxxxx" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required"></p>
		<p><input type="password" name="conpassward" id="conpassward" placeholder="xxxxxxxxxx" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required"></p>
		<p>	<select name="role" class="box">
            <option value="">Select user role</option>
            <option value="customer">Customer</option>
            <option value="agriculturalist">Agriculruralist</option>
            <option value="delivery_person">Delivery Person</option>
            <option value="instructor">Instructor</option>
            <br>
            </select>
		</p>
		</div>
		</div>			

			<input id="button" type="submit" value="Submit">

		</form>

        
	</center>
</body>
</html>
