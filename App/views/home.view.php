<?php $this->view('includes/header',$data)?>

<html>
<link rel="stylesheet" href="../public/assets/css/style.css">
<title>
     Home
</title> 
<body>
<div class = "para">
<p><b>Agriculture </b>is the art and science f cultivating the soil,
growing crops and raising livestock.<br>It includes the preparation 
of plant and animal products for people to use and their distribution to markets.
Here you will find numerous resources to grow your business and a platform to 
sell and by products.</p>
</div>
<div class = "home_body">
<ul>
<li><img src = "../public/assets/images/v.png" width = "200px" height = "300px"></li>
<li><img src = "../public/assets/images/s.png" width = "200px" height = "300px"></li>
<li><img src = "../public/assets/images/b.png" width = "200px" height = "300px"></li>
<li><img src = "../public/assets/images/c.png" width = "200px" height = "300px"></li>
</ul>
</div>

<div class = "home_text">
<ul>
<li><a href="Vegetables" ><Button>Vegetables & Fruits </Button></a></li>
<li><a href="seeds" ><Button>  Seeds </Button></a></li>
<li><a href="blogs" ><Button>  Blogs</Button></a></li>
<li><a href="courses" ><Button>  Courses </Button></a></li>
</ul>
</div>


</body>
<?php $this->view('includes/footer',$data)?>