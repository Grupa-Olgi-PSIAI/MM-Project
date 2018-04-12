<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>M&M - Mini Company Manager</title>
	<link href="css/styles.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
	<div id="cont">
		<div id="menu-fixed">
			<a href="#cont">
				<i class="material-icons back">&#xE314;</i>
			</a>
			<a href="#menu-fixed">
				<div class="logo">
					<span></span>   
					<p>M&M</p>
				</div>
				<p class="pmenu"></p>
			</a>
			<hr>
			<ul class="menu">
				<li><i class="material-icons">&#xE8CC;</i><p>Faktury zakupu</p></li>
				<li><i class="material-icons">&#xE227;</i><p>Faktury sprzedaży</p></li>
				<li><i class="material-icons">&#xE226;</i><p>Dokumenty</p></li>
				<li><i class="material-icons">&#xE337;</i><p>Sprzęt</p></li>
				<li><i class="material-icons">&#xE61A;</i><p>Licencje</p></li>
			</ul>
			<i class="material-icons info">&#xE88E;</i>
		</div>
	</div>

	<div id="top-nav">
		<ul id="nav">
			<li><a href="#"><i class="material-icons navbar logout">&#xE5DD;</i></a></li>
			<li><a href="#"><i class="material-icons navbar">&#xE8B5;</i></a></li>
			<li><a href="#"><i class="material-icons navbar">&#xE7FD;</i></a></li>
			<li><form class="search-bar" action="todo_search.php" method="post">
				<input type="search" placeholder="Szukaj w systemie..." name="phraseToFind">
			</form></li>
		</ul>
	</div>

	<div id="page">
		<div>
			PAGE CONTENT
		</div>
	</div>
</body>
</html>