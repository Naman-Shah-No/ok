<!DOCTYPE html>
<html>
<head>
	<title>NoMe</title>
    <style>
        .so {
            visibility:hidden;
            
        }
        *{
            background:transparent;
        }
    </style>
</head>
<body vlink="#aa03ff">
    
    <form>
        <input type="text" class="so" name="so">
    </form>
    
</body>
</html>
<?php

	   if($_GET['so']) {
		 $api_url = "https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&titles=".ucwords($_GET['so'])."&redirects=true";
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
		 else{
		 	echo "There are Many things to explore with NoMe";
		 }
	}
?>