<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Wędkujemy</title>
			<link rel="stylesheet" href="styl_1.css">
		
		</head>
		
		<body>
			<div id="baner">
				<h1>Portal dla wędkarzy</h1>
			</div>
			<div id="lewy">
				<h2>Ryby drapieżne naszych wód</h2>
					<ul>	
						<!-- Sktypt 1 -->
							<?php
								$db=mysqli_connect("localhost","root","","egzamin4");
								if(!$db)
								{
									echo "Błąd połączenia z bazą danych";
								}
								$zapytanie="SELECT nazwa,wystepowanie FROM ryby WHERE styl_zycia='1'";
								$query=mysqli_query($db,$zapytanie);
									while($row=mysqli_fetch_array($query))
									{
										$nazwa =$row['nazwa'];
										$wystepowanie=$row['wystepowanie'];
										
										echo "<li>".$nazwa.", występowanie".$wystepowanie."</li>";
									}
							?>
					
					</ul>
			</div>
			<div id="prawy">
				<img alt="sum" src="ryba1.jpg"><br/>
					<a href="kwerendy.txt">Pobierz kwerendy</a>
			</div>
			<div id="stopka">
				<p>Stronę wykonał: 0000000000</p>
			</div>
		</body>
		
	</html>