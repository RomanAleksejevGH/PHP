<?php
$title = "Галерея";                  
include ("tmp/header.php");                 
?>

<!-- begin gallery content -->
<div class="container-fluid">

			<div class="row">
				<div class="container px-5">
					<div class="col-md-12">
						<h1 class="text-center">Галерея</h1>
					</div>
					<div class="col-md-12">
						<div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-5">	
			<?php
				$result = mysqli_query($connection, "select * from images order by id desc");
				foreach ($result as $img) {
				echo "<div class=\"col-md-3 \">
						<div class=\"p-3 bg-light\">
						<a href=\"uploaded/".$img['name']."\" 
						data-lightbox=\"roadtrip\">
						<img class=\"img-fluid img-thumbnail\" 
						src=\"uploaded/".$img['name']."\" alt=\"\">
						</a>
						</div>
						</div>";
					}
			?>
						</div>
					</div>	
				</div>
		
			</div>
		</div>	
<!-- end gallery content -->

<?php
include ("tmp/footer.php");                 
?>