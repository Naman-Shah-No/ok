<?php
include("config.php");
include("classes/SiteResultsProvider.php");
include("classes/ImageResultsProvider.php");



    if (isset($_GET["term"])) {
    	 $term=$_GET["term"];
    }
    else{
    	exit("You must enter something to search");
    }

$type=isset($_GET["type"]) ? $_GET["type"]:"sites";
$page = isset($_GET["page"])? $_GET["page"] :1;


?>
<!DOCTYPE html>
<html>
<head>
	<title>NoMe</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<link rel="stylesheet" type="text/css" href="fg/css/ol.css">

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>


	<div class="wrapper">

		<div class="header">
			

			<div class="headerContent">
				
				<div class="logoContainer">
					<a href="index.php">
						<img src="fg/images/ok.png">
					</a>
				</div>
			
				<div class="searchContainer">
			 		
					<form action="ok.php" method="GET">
						
						<div class="searchBarContainer">
							<input type="hidden" name="type" value="<?php echo $type; ?>">
							<input class="searchBox" type="text" name="term" value="<?php echo $term ?>">
							<button class="searchButton">
								<img src="fg/images/ji/search.png">
							</button>
						</div>

					</form>

				</div>

			</div>


		<div class="tabsContainer">
			

			<ul class="tabList">
				
				<li class="<?php echo $type=='sites' ? 'active' : '' ?>">
					<a href='<?php echo "search.php?term=$term&typ=sites"; ?>'>
						All
					</a>
				</li>

				<li class="<?php echo $type=='images' ? 'active' : '' ?>">
					<a href='<?php echo "ok.php?term=$term&type=images"; ?>'>
						Images
					</a>
				</li>
				<li class="<?php echo $type=='shopping' ? 'active' : '' ?>">
					<a href='<?php echo "search.php?term=$term&type=shopping"; ?>'>
						Shopping
					</a>
				</li>
				<li class="<?php echo $type=='news' ? 'active' : '' ?>">
					<a href='<?php echo "search.php?term=$term&type=shopping"; ?>'>
						News
					</a>
				</li>

			</ul>

			</div>
		</div>



		



			<table>
			<td class="link">
			<div class="mainResultsSection">
				
				<?php
				if ($type == "sites") {
					$resultsProvider = new SiteResultsProvider($con);
					$pageSize = 20;
				}
				else{
					$resultsProvider = new ImageResultsProvider($con);
				    $pageSize = 30;
				}

				$numResults=$resultsProvider->getNumResults($term);

				echo "<p class='resultsCount'>$numResults results found</p>";



				echo $resultsProvider->getResultsHtml($page, $pageSize, $term);
                
				?>


			</div></td></table>
		

			<div class="paginationContainer">
				
				<div class="pageButtons">



					<div class="pageNumberContainer">
						<img src="fg/images/pageStart.png" id="ui">
					</div>

					<?php 


					$pagesToShow=10;
					$numPages=ceil($numResults/$pageSize);
					$pagesLeft = min($pagesToShow, $numPages);

					$currentPage = $page - floor($pagesToShow / 2);

					if ($currentPage<1) {
						$currentPage = 1;
					}

					if ($currentPage + $pagesLeft > $numPages + 1) {
						 $currentPage = $numPages + 1 - $pagesLeft;
					}

					while ($pagesLeft != 0 && $currentPage <= $numPages) {

						if ($currentPage == $page) {
								echo "<div class='pageNumberContainer'>
						 		<img src='fg/images/pageSelected.png'>
						 		<span class='pageNumber'>$currentPage</span>
						 	   </div>";

						}
						else{
						  echo "<div class='pageNumberContainer'>
										<a href='ok.php?term=$term&type=$type&page=$currentPage'>
							 		<img src='fg/images/page.png'>
									<span class='pageNumber'>$currentPage</span>
										</a>						 	  
						 	   </div>";

						}						 

						 $currentPage++;
						 $pagesLeft--;
					}




					?>

					<div class="pageNumberContainer">
						<img src="fg/images/pageEnd.png" id="end">
					</div>



				</div>



			</div>







    </div>
    
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>