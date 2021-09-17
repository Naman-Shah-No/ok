<!DOCTYPE html>
<html>
<head>
    
    <script data-ad-client="ca-pub-4872227362970078" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
	<title>NoMe</title>

	<meta name="description" content="Search the web for sites and images.">
	<meta name="keywords" content="Search engine, NoMe, websites">
    <meta name="author" content="NoMe">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="NoMe LoGo.jpg">

	<link rel="stylesheet" type="text/css" href="fg/o/lk.css">

	<style type="text/css">
	.container {
    width: 100%;
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 0 4px rgb(0 255 255 / 40%), 0 4px 4px rgb(0 231 255 / 26%);
    border: 1px solid #ccc
}
.container input {
  background: transparent;
  border: 0;
  font-size: 30px;
  color: #fff;
}
.suggestions {
  display: none;
}
.suggestions.show {
  display: block;
}
.suggestions > div {
  padding: 15px;
  font-size: 15px;
  color: #000;
  border-top: none;
  cursor: pointer;
}
.suggestions > div:hover, .suggestions > div.selected  {
  background-color: #00fff3;
}
.emphy {
  width: 50%;
  margin: 40px auto;
  text-align: center;
  color: #fff;
}
	</style>

</head>
<body><br><br><br><br><br><br><br><br><br><br><br>


	<div class="wrapper indexPage">


		<div class="mainSection">
			
			<div class="logoContainer">
				<img src="fg/images/ok.png" title="NoMe" alt="Site logo">
			</div>

		
			<div class="searchContainer">
				
				<form action="search.php" method="GET" autocomplete="off">
					
					<div class="searchainer">
            		<div class="s">
            		<div class="container">
					<input class="searchBox" type="text" name="term" autofocus placeholder="Search NoMe or type a url" id="searchBox">
         			<button class="searchButton" type="submit" value="Search" id="search"><img src="fg/images/ji/search.png"></button>
					<div class="suggestions">
					</div>
				</div>
        </div>
				</div>

				</form>

			</div>


		</div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    	const countries = [
  {name: 'amazon'},
  {name: 'google'},
  {name: 'gmail'},
  {name: 'NoMe'},
  {name: 'Yessle'},
  {name: 'whitehat jr'},
  {name: 'zoom'},
  {name: 'jio'},
  {name: 'youtube'},
  {name: 'bing'},
  {name: 'cc search'},
  {name: 'redmi'},
  {name: 'samsung'}
];

var selectedSuggestionIndex = -1;
const searchInput = document.querySelector('.searchBox');
const suggestionsPanel = document.querySelector('.suggestions');

function resetSelectedSuggestion() {
  for (var i = 0; i < suggestionsPanel.children.length; i++) {
    suggestionsPanel.children[i].classList.remove('selected');
  }
}
searchInput.addEventListener('keyup', function(e) {
  if (e.key === 'ArrowDown') {
    resetSelectedSuggestion();
    selectedSuggestionIndex = (selectedSuggestionIndex < suggestionsPanel.children.length - 1) ? selectedSuggestionIndex + 1 : suggestionsPanel.children.length - 1;
    suggestionsPanel.children[selectedSuggestionIndex].classList.add('selected');
    return;
  }
  if (e.key === 'ArrowUp') {
    resetSelectedSuggestion();
    selectedSuggestionIndex = (selectedSuggestionIndex > 0) ? selectedSuggestionIndex -1 : 0;
    suggestionsPanel.children[selectedSuggestionIndex].classList.add('selected');
    return;
  }
  if (e.key === 'Enter') {
    searchInput.value = suggestionsPanel.children[selectedSuggestionIndex].innerHTML;
    suggestionsPanel.classList.remove('show');
    selectedSuggestionIndex = -1;
    return;
  }
  suggestionsPanel.classList.add('show');
  const input = searchInput.value;
  suggestionsPanel.innerHTML = '';
  const suggestions = countries.filter(function(country) {
    return country.name.toLowerCase().startsWith(input.toLowerCase());
  });
  console.log(suggestions)
  suggestions.forEach(function(suggested) {
    const div = document.createElement('div');
    div.innerHTML = suggested.name;
    div.setAttribute('class', 'suggestion');
    suggestionsPanel.appendChild(div);
  });
  if (input === '') {
    suggestionsPanel.innerHTML = '';  
  }
});

document.addEventListener('click', function(e) {
  if (e.target.className === 'suggestion') {
    searchInput.value = e.target.innerHTML;
    suggestionsPanel.classList.remove('show');
  }
});







    </script>
    <div id="response">
    	
    </div>
   
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="m">
    	<a href="portfolio-responsive-complete-master/index.html" id="au">About Us</a>
    	<a href="bot.html" id="an">Ask NoMe</a>
    </div>		
</body>
</html>