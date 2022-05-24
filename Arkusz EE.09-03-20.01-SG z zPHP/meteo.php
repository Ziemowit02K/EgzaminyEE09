<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Prognoza pogody Poznań</title>
			<link rel="stylesheet" href="styl4.css">
		</head>
		
		
		<body>
			<div id="BanerL">
				<p>maj 2019</p>
			</div>
			<div id="BanerS">
				<h2>Prognoza dla Poznania</h2>
			</div>
			<div id="BanerP">
				<img src="logo.png" alt="prognoza">
			</div>
			
			
			<div id="Lewy">
				<a href="kwerendy.txt">Kwerendy</a>
			
			</div>
			<div id="Prawy">
				<img src="obraz.jpg" alt="Polska,Poznań">
			</div>
			<div id="Glowny">
				<table>
					<tr>
						<th>LP.</th>
						<th>DATA</th>
						<th>NOC-TEMPERATURA</th>
						<th>DZIEŃ-TEMPERATURA </th>
						<th>OPADY[mm/h]</th>
						<th>CIŚNIENIE[hPa]</th>
					</tr>
					<?php
						$db=mysqli_connect("localhost","root","","egzamin5");
							if(!$db)
							{
								echo "Błąd połączenia z bazą";
							}
							$zapytanie= "SELECT * FROM pogoda WHERE miasta_id=2 ORDER BY data_prognozy DESC;";
							$query=mysqli_query($db,$zapytanie);
								$i=1;
								while($row=mysqli_fetch_array($query))
								{
									
									$data=$row['data_prognozy'];
									$TempNoc=$row['temperatura_noc'];
									$TempDzien=$row['temperatura_dzien'];
									$opady=$row['opady'];
									$cisnienie=$row['cisnienie'];
									
									echo "<tr><td>".$i."</td><td>".$data."</td><td>".$TempNoc."</td><td>".$TempDzien."</td><td>".$opady."</td><td>".$cisnienie."</td></tr>";
									$i++;
									
								}
					
					
					?>
				
				</table>
			</div>
			
			
			<div id="Stopka">
				<p>Stronę wtkonał 00000000000</p>
			</div>
		
		</body>
	</html>