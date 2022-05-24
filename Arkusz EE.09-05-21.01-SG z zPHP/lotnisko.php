<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Port Lotniczy </title>
			<link rel="stylesheet" href="styl5.css">
		</head>
		
		
		<body>
			<div id="F_Baner">
				<img alt="logo lotnisko" src="zad5.png">
			</div>
			<div id="S_Baner">
				<h1>Przyloty</h1>
			</div>
			<div id="T_Baner">
				<h3>przydatne linki</h3>
					<a href="kwerendy.txt" target="_blank">Pobierz...</a>
			</div>
			<div id="MainPanel">
				<table>
					<tr>
						<th>CZAS</th>
						<th>KIERUNEK</th>
						<th>NUMER REJSU</th>
						<th>STATUS</th>
					</tr>
						<?php
							$db=mysqli_connect("localhost","root","","egzamin3");
							$zapytanie = "SELECT czas,kierunek,nr_rejsu,status_lotu FROM przyloty ORDER BY czas ASC";
							$query=mysqli_query($db,$zapytanie);
								while($row=mysqli_fetch_array($query))
								{
									$czas=$row['czas'];
									$kierunek=$row['kierunek'];
									$nr_rejsu=$row['nr_rejsu'];
									$status_lotu=$row['status_lotu'];
									
									echo "<tr><td>".$czas."</td><td>".$kierunek."</td><td>".$nr_rejsu."</td><td>".$status_lotu."</td></tr>";
									
								}
							mysqli_close($db);
						?>
				
				
				
				</table>
			</div>
			<div id="F_Footer">
				<?php
					setcookie('ciasteczko','Witaj ponownie na stronie lotniska',time()+60*60*2);
					if(isset($_COOKIE['ciasteczko']))
					{
						echo "<p> Witaj ponownie na stronie lotniska </p>";
					}
					else
					{
						echo "<p> Dzień dobry!Strona lotniska używa ciasteczek </p>";
					}
				
				
				?>
			</div>
			<div id="S_footer">
				Autor: 00000000000
			</div>
			
		</body>
		
		
	</html>