<?php
include("config.php");
include("classes/SiteResultsProvider.php");
include("classes/ImageResultsProvider.php");
include("classes/ShoppingResultsProvider.php");
include("classes/NewsResultsProvider.php");


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

	<link rel="shortcut icon" type="image/png" href="NoMe LoGo.jpg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<link rel="stylesheet" type="text/css" href="fg/images/hk.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<style type="text/css">
		
.affix {
    top: 0;
    width: 100%;
    z-index: 9999 !important;
  }

.affix + .container-fluid {
   padding-top: 70px;
}

.navbar-default {
    background-color: #fff;
}

@media (min-width: 768px)
.navbar {
	border-radius: 0px;
}

.navbar {
    min-height: 0px; 
    margin-bottom: 0px; 
    border: 1px solid transparent; 
}

a{
	color: black;
}

.bgcolor.scrolled{
	box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(248,248,248,0.8);
}

	</style>

</head>
<body vlink="#aa03ff">


	<div class="wrapper">

		<div class="header">
			
			<nav class="navbar navbar-default bgcolor" data-spy="affix" data-offset-top="197">
			<div class="headerContent">
				
				<div class="logoContainer">
					<a href="index.php">
						<img src="fg/images/ok.png">
					</a>
				</div>
			
				<div class="searchContainer">
			 		
					<form action="search.php" method="GET">
						
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
		</nav>

		<div class="tabsContainer">
			

			<ul class="tabList">
				
				<li class="<?php echo $type=='sites' ? 'active' : '' ?>">
					<a href='<?php echo "search.php?term=$term&type=sites"; ?>'>
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
					<a href='<?php echo "search.php?term=$term&type=news"; ?>'>
						News
					</a>
				</li>

			</ul>

			</div>
		</div>



		



			<table id="t">
			<td class="link">
			<div class="mainResultsSection">
				<div class="calc">
				<?php
				if (strpos($term, "https")!==FALSE){
		function extract_title($data){
	
	$start  = "<title>";
	$end = "</title>";
	$b = strpos($data, $start);
	$a = strpos($data, $end, $b);
	$length = $a-$b-7;
	$title = substr($data, $b+7, $length);
	return $title;
}

function extract_description($data){
	$description = "";
	foreach (preg_split("/[<>]+/", $data) as $line) {
		 $description_txt = "/" . "description" . "/i";
		 $content = "/" . "content=" . "/i";
		 if (preg_match($description_txt, $line)&&preg_match($content,$line)) {
		 	$start  = "content=";
			$end = "";
			$b = strpos($line, $start);
			$a = strpos($line,$end,$b+9);
			$length = $a-$b-9;
			$sub_line = substr($line, $b+9, $length);

			$sub_line_txt = "/" . $subline . "/i";
			if (preg_match($sub_line_txt, $description)) {
				 $description .= $sub_line . " ";
		 }
		 }
	}
	return $description;
}




if ($_SERVER["REQUEST_METHOD"] == "GET") {

	 $address = $term;

	 $html = file_get_contents($address);

	 echo "<br><br>";

$title = extract_title($html);
$description = extract_description($html);


$txt = file_get_contents('database.txt');

echo "<div class='siteResults'>";
echo "<div class='resultContainer'>";
echo "<a href='$address'>";
echo $title;
echo "</a>";
echo "<br>";
echo $address;
echo "<br>";
echo $description;
echo"</div>";

$txt .= "\n" . "<h3 class='title' id='ji'>" . "<a class='df' href='" . $address . "'>" . $title . "</a></h3><span class='url' id='ik'>" . $address . "</span><br><span class='description' id='des'>" . $description . "<br><br>";

file_put_contents('database.txt', $txt);

}

}if (strpos($term, "http")!==FALSE){
		function extract_title($data){
	
	$start  = "<title>";
	$end = "</title>";
	$b = strpos($data, $start);
	$a = strpos($data, $end, $b);
	$length = $a-$b-7;
	$title = substr($data, $b+7, $length);
	return $title;
}

function extract_description($data){
	$description = "";
	foreach (preg_split("/[<>]+/", $data) as $line) {
		 $description_txt = "/" . "description" . "/i";
		 $content = "/" . "content=" . "/i";
		 if (preg_match($description_txt, $line)&&preg_match($content,$line)) {
		 	$start  = "content=";
			$end = "";
			$b = strpos($line, $start);
			$a = strpos($line,$end,$b+9);
			$length = $a-$b-9;
			$sub_line = substr($line, $b+9, $length);

			$sub_line_txt = "/" . $subline . "/i";
			if (preg_match($sub_line_txt, $description)) {
				 $description .= $sub_line . " ";
		 }
		 }
	}
	return $description;
}




if ($_SERVER["REQUEST_METHOD"] == "GET") {

	 $address = $term;

	 $html = file_get_contents($address);

	 echo "<br><br>";

$title = extract_title($html);
$description = extract_description($html);


$txt = file_get_contents('database.txt');

echo "<div class='siteResults'>";
echo "<a href='$address'>";
echo $title;
echo "</a>";
echo "<br>";
echo $address;
echo "<br>";
echo $description;
echo"</div>";

$txt .= "\n" . "<h3 class='title' id='ji'>" . "<a href='" . $address . "'>" . $title . "</a></h3><span class='url' id='ik'>" . $address . "</span><br><span class='description' id='des'>" . $description . "<br><br>";

file_put_contents('database.txt', $txt);

}

}
				if (strpos($term, "1")!==FALSE) {
					 include ("ok.html");
					 $_GET["txt"] = $term;
				}
				if (strpos($term, "2")!==FALSE) {
					 include ("ok.html");
					 $_GET["txt"] = $term;
				}
				if (strpos($term, "3")!==FALSE) {
					 include ("ok.html");
					 $_GET["txt"] = $term;
				}
				if (strpos($term, "4")!==FALSE) {
					 include ("ok.html");
					 $_GET["txt"] = $term;
				}
				if (strpos($term, "5")!==FALSE) {
					 include ("ok.html");
					 $_GET["txt"] = $term;
				}
				if (strpos($term, "6")!==FALSE) {
					 include ("ok.html");
					 $_GET["txt"] = $term;
				}
				if (strpos($term, "7")!==FALSE) {
					 include ("ok.html");
					 $_GET["txt"] = $term;
				}
				if (strpos($term, "8")!==FALSE) {
					 include ("ok.html");
					 $_GET["txt"] = $term;
				}
				if (strpos($term, "9")!==FALSE) {
					 include ("ok.html");
					 $_GET["txt"] = $term;
				}
				if (strpos($term, "0")!==FALSE) {
					 include ("ok.html");
					 $_GET["txt"] = $term;
				}
				if (strpos($term, "meaning")!==FALSE) {
					echo "<div class='dict'>";
					 include ("Word_Dictionary.html");
					 $_POST["#searchBox"] = $term;
					 echo "</div>";
				}
				if(strpos($term,"headphones")!==FALSE){
				    
				}
				if (strpos($term, "Meaning")!==FALSE) {
					echo "<div class='dict'>";
					 include ("Word_Dictionary.html");
					 $_POST["#searchBox"] = $term;
					 echo "</div>";
				}
				if($type == sites){
				if (strpos($term, "who is the founder of nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "who is founder of nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Who is the Founder of NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Who is the founder of nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "who is the founder of Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "who is the founder of NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Who is the founder of Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "who is the founder of nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "founder of nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Founder of nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "founder of Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Founder of Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "founded of Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "of Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "discovered Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Discovered Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Discovered nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "discovered nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Discovered NoMe")!==FALSE){
				    include ("info.html");
				}
					if (strpos($term, "discovered NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Discovered NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Discovered NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "discovered NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"who founded NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"who founded nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "who founded Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who founded NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who founded nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Who founded Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who Founded NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who Founded nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Who Founded Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"who Founded NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"who Founded nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "who Founded Nome")!==FALSE){
				    include ("info.html");
				}
				
				if (strpos($term,"who discovered NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"who discovered nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "who discovered Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who discovered NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who discovered nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Who discovered Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who Discovered NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who Discovered nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Who Discovered Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"who Discovered NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"who Discovered nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "who Discovered Nome")!==FALSE){
				    include ("info.html");
				}
				
				if (strpos($term,"who created NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"who created nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "who created Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who created NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who created nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Who created Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who Created NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"Who Created nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Who Created Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"who Created NoMe")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term,"who Created nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "who Created Nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "who created nome")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "naman")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Naman")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "naman shah")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Naman Shah")!==FALSE){
				    include ("info.html");
				}
				if (strpos($term, "Jesus","Napoleon","Muhammad","William Shakespeare","Abraham Lincoln","George Washington","Adolf Hitler","Aristotle","Alexander the Great","Thomas Jefferson","Henry VIII of England","Charles Darwin","Elizabeth I of England","Karl Marx","Julius Caesar","Queen Victoria","Martin Luther","Joseph Stalin","Albert Einstein","Christopher Columbus")!==FALSE) 
				{
				    include ("Name.css");
				}
				}
				?></div>
				<?php
				if ($type == "sites") {
					$resultsProvider = new SiteResultsProvider($con);
					$pageSize = 10;
					    function test_input($data) {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
					}

					if ($_SERVER["REQUEST_METHOD"] == "GET") {

						 $search_keyword = test_input($term);

						 echo "<br><br>";

					$txt = file_get_contents("database.txt");

					$keyword = "/" . $search_keyword . "/i";

					

					}
				}

				else if ($type == "images"){
					$resultsProvider = new ImageResultsProvider($con);
				    $pageSize = 30;
				}
				else if ($type == "shopping") {
					include("sho.php");
				}
				else if ($type == "news") {
					$resultsProvider = new NewsResultsProvider($con);
					$pageSize = 10;
				}

				$numResults=$resultsProvider->getNumResults($term);

				echo "<p class='resultsCount'>$numResults results found</p>";

foreach (preg_split("/((\r?\n)|(\r\n?))/",$txt) as $line) {
					if (preg_match($keyword, $line)) {

					if (!($search_keyword=="")) {
					echo "<div class='siteResults'>";
					echo $line;
					echo"</div>";
					}
					}
					}

				echo $resultsProvider->getResultsHtml($page, $pageSize, $term);
                
				?>


			</div></td><br>
		

			<td>
			<div class="ok" id="ok">
			<?php

			if ($type == "sites"){
			echo "<h2>$term</h2>";
 		
	   if($_GET['term']) {
		 $api_url = "https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&titles=".ucwords($_GET['term'])."&redirects=true";
		 $api_url = str_replace(' ', '%20', $api_url);

		 if ($data = json_decode(@file_get_contents($api_url))) {
		 	 foreach ($data->query->pages as $key=>$val) {
		 	 	 $pageId = $key;
		 	 	 break;
		 	 }
		 	 $content = $data->query->pages->$pageId->extract;

		 	 header('Content-Type:text/html; charset=utf-8');
		 	 echo substr($content, 0, 590);
	         echo "....";
		 }
		 
	         echo "<a href='https://en.wikipedia.org/wiki/$term'> more </a>";
	}
}
?>

</div></td></table><br><br>

		

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
										<a href='search.php?term=$term&type=$type&page=$currentPage'>
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

    <script type="text/javascript">
    	$(window).scroll(function(){

    		$('nav').toggleClass('scrolled',$(this).scrollTop()>50);
    	});
    </script>
</body>
</html>