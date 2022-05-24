<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Prognoza pogody Wrocław</title>
				<link rel="stylesheet" href="styl2.css">
		</head>
		
		
		<body>
		<div id="BanerPanel">
			<div id="LeftBaner">
				<img alt="meteo" src="logo.png">
			</div>
			<div id="MainBaner">
				<h1>Prognoza dla Wrocławia</h1>
			</div>
			<div id="RightBaner">
				<p>maj 2019</p>
			</div>
		</div>
			
			<div id="MainPanel">
				<table>
					<tr>
						<th>DATA</th>
						<th>TEMPERATURA W NOCY</th>
						<th>TEMPERATURA W DZIEŃ</th>
						<th>OPADY[mm/h]</th>
						<th>CIŚNIENIE[hPa]</th>
					</tr>
					<?php
						$db=mysqli_connect('localhost','root','','egzamin7');
							If(!$db)
							{
								echo "błąd połączenia z bazą";
							}
							$zapytanie="SELECT * FROM pogoda WHERE miasta_id=2 ORDER BY data_prognozy ASC;";
								$query=mysqli_query($db,$zapytanie);
								while($row=mysqli_fetch_array($query))
								{
									$data=$row['data_prognozy'];
									$tempNoc=$row['temperatura_noc'];
									$tempDzien=$row['temperatura_dzien'];
									$opady=$row['opady'];
									$cisnienie=$row['cisnienie'];
									
									echo "<tr><td>".$data."</td><td>".$tempNoc."</td><td>".$tempDzien."</td><td>".$opady."</td><td>".$cisnienie."</td></tr>";
									
								}
								mysqli_close($db);
					
					
					?>
				</table>
			</div>
			
			<div id="LeftPanel">
				<img alt="Polska,Wrocław" src="obraz.jpg">
			</div>
			<div id="RightPanel">
				<a href="kwerendy.txt">Pobierz kwerendy</a>
			</div>
			
			<div id="Footer">
				<p>Stronę wykonał: 000000000</p>
			</div>
		</body>
	</html>