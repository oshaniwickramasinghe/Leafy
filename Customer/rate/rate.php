<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Star rating</title>
	<link rel="stylesheet" href="../CSS/style.css">
	<link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="rating_body">
		
		<div class="rating-wrap">
		<div class  = "post">
		<div class="edit">Edit</div>
		<div class  = "text">Thank you for rating Us </div>
		<a href = "../customerhome.php"><input type  = "submit" value  = "Go Back" style = "margin-left:-5% ; margin-top:2%"></a>
	   
	     </div>
			<h2>Rate our service</h2>
			<div class="centerr">
				<fieldset class="rating">
					<input type="radio" id="star5" name="rating" value="5"/><label for="star5" class="full" title="Awesome"></label>
					<input type="radio" id="star4.5" name="rating" value="4.5"/><label for="star4.5" class="half"></label>
					<input type="radio" id="star4" name="rating" value="4"/><label for="star4" class="full"></label>
					<input type="radio" id="star3.5" name="rating" value="3.5"/><label for="star3.5" class="half"></label>
					<input type="radio" id="star3" name="rating" value="3"/><label for="star3" class="full"></label>
					<input type="radio" id="star2.5" name="rating" value="2.5"/><label for="star2.5" class="half"></label>
					<input type="radio" id="star2" name="rating" value="2"/><label for="star2" class="full"></label>
					<input type="radio" id="star1.5" name="rating" value="1.5"/><label for="star1.5" class="half"></label>
					<input type="radio" id="star1" name="rating" value="1"/><label for="star1" class="full"></label>
					<input type="radio" id="star0.5" name="rating" value="0.5"/><label for="star0.5" class="half"></label>
				</fieldset>
			</div>
				<h4 id="rating-value"></h4><br>

			<form  method=  "post" >
				<div class= "textarea">
					<textarea cols = "30" id= "reviews" placeholder = "Describe your experience .."> </textarea>
				</div>
				<button  class  = "review" name = "review_btn">Post</button>
				
			</form>
		
		</div>
		</div>
	

	<script>

let star = document.querySelectorAll('input');
let showValue = document.querySelector('#rating-value');

let val = 0;

for (let i = 0; i < star.length; i++) {
	star[i].addEventListener('click', function() {
		i = this.value;
		console.log(i);
		val = i;
		showValue.innerHTML = i + " out of 5";
	});


}


       const btn = document.querySelector("button");
	   const form = document.querySelector("form");
	   const value = document.querySelector("h4");
	   const title = document.querySelector("h2");
	   const post = document.querySelector(".post");
	   const rate = document.querySelector(".rating");
	   const editBtn = document.querySelector(".edit");

	

	   btn.onclick = () =>{
		   let elements = document.getElementById("reviews");

		  
fetch("./test.php", {
	method: 'post',
	body: JSON.stringify({rate : val , review: elements.value})
}).then((response) => {return response.json()}).then(
	(data) => {
		console.log(data);
	}
)


	    rate.style.display = "none";
		form.style.display = "none";
		value.style.display = "none";
		title.style.display = "none";
		post.style.display = "block";

		editBtn.onclick = ()=>{

		rate.style.display = "block";
		form.style.display = "block";
		value.style.display = "block";
		title.style.display = "block";
		post.style.display = "none";

		}
		return false;
	   }


	</script>

	
</body>
</html>