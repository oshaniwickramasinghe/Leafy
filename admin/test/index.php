<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width"/>
		<link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
	<!-- <nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
		</div>
	</nav> -->
	<!-- <div class="col-md-3"></div> -->
	<!-- <div class="col-md-6 well"> -->
		<h3 class="text-primary">PHP - Simple Search Box</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<!-- <div class="col-md-1"></div> -->
		<!-- <div class="col-md-10"> -->
			<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal">Add Content</button> -->
			<!-- <br />
			<br /> -->
			<form class="search" method="POST" action="index.php">
				<!-- <div class="input-group col-md-12"> -->
					<input type="text" placeholder="Search here..." name="keyword" required="required" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
					<span >
						<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button>
					</span>
				<!-- </div> -->

                </form>
			<br />
			<?php
				if(ISSET($_POST['search'])){
					$keyword = $_POST['keyword'];
			?>
			<div>
				<h2>Result</h2>
				<hr style="border-top:2px dotted #ccc;"/>
				<?php
					require '../connect.php';
					$query = mysqli_query($conn, "SELECT * FROM `blog` WHERE `title` LIKE '%$keyword%' ORDER BY `title`") ;
					while($fetch = mysqli_fetch_array($query)){
				?>
				<div style="word-wrap:break-word;">
					<a href="get_blog.php?id=<?php echo $fetch['blog_id']?>"><h4><?php echo $fetch['title']?></h4></a>
					<p><?php echo substr($fetch['content'], 0, 100)?>...</p>
				</div>
				<hr style="border-bottom:1px solid #ccc;"/>
				<?php
					}
				?>
			</div>
			<?php
				}
			?>
		<!-- </div> -->
	<!-- </div> -->
	<!-- <div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<form action="save_content.php" method="POST" enctype="multipart/form-data">

            <div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Title</label>
								<input type="text" class="form-control" name="title" required="required"/>
							</div>
							<div class="form-group">
								<label>Content</label>
								<textarea class="form-control" style="resize:none; height:250px;" name="content" required="required"></textarea>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div> -->
<!-- <script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script> -->
</body>
</html>
