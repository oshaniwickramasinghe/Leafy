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

		<form action="insert.php" method="post" id="form">
			
			<p>
			<label for="firstName">First Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			<input type="text" name="first_name" id="firstName" placeholder="First Name" required="required">
			</p>

			
			<p>
			<label for="lastName">Last Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			<input type="text" name="last_name" id="lastName" placeholder="Last Name" required="required">
			</p>

			<p>
			<label for="emailAddress">Email Address:&nbsp&nbsp&nbsp</label>
			<input type="email" name="email" id="emailAddress" placeholder="Email Address" required="required">
			</p>

			<p>
			<label for="contactNo">Contact Number:</label>
			<input type="text" name="contactNo" id="contactNo" placeholder="Contact Number" required="required">
			</p>

			
			<p>
			<label for="passward">Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			<input type="password" name="passward" id="passward" placeholder="xxxxxxxxxx" required="required">
			</p>

			<p>
			<label for="passward">Confirm Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			<input type="password" name="conpassward" id="conpassward" placeholder="xxxxxxxxxx" required="required">
			</p>

			<p>
			<label for="role">Role:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			<input type="text" name="role" id="role" placeholder="Select role" required="required">
			</p>

			
			

			<input id="button" type="submit" value="Submit">

		</form>

        
	</center>
</body>
</html>
