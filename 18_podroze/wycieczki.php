<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset="UTF-8">
				<title>Wycieczki i urlopy</title>
				<link rel="stylesheet" href="styl3.css">
		</head>
		
		<body>
		<div id="Baner">
			<h1>BUIRO PODRÓŻY</h1>
		</div>
		
			
			<div id="Lewy">
				<h2>KONTAKT</h2>
					<a href="mailto: biuro@wycieczki.pl">napisz do nas</a>
					<p>telefon 555666777</p>
			</div>
		
			<div id="srodkowy">
				<h2>GALERIA</h2>
					
					
					<?php
						$db = mysqli_connect('localhost','root','','egzamin3');
						if(!$db)
						{
							echo "Błąd połączenia z bazą";
						}
						$zapytanie="SELECT nazwaPliku,podpis FROM zdjecia ORDER BY podpis ASC;";
						$query=mysqli_query($db,$zapytanie);
							while($row=mysqli_fetch_array($query))
							{
								$source=$row['nazwaPliku'];
								$alter=$row['podpis'];
								
								echo "<img src='".$source."' alt='".$alter."'>";
							}
						mysqli_close($db);
					?>
			</div>
			<div id="Prawy">
				<h2>PROMOCJE</h2>
					<table>
						<tr>
							<td>Jesień</td>
							<td>Grupa 4+</td>
							<td>Grupa 10+</td>
						</tr><tr>
							<td>5%</td>
							<td>10%</td>
							<td>15%</td>
						</tr>
					</table>
			</div>
			
			<div id="Dane">
				<h2>LISTA WYCIECZEk</h2>
					<?php
						$db = mysqli_connect('localhost','root','','egzamin3');
						if(!$db)
						{
							echo "Błąd połączenia z bazą";
						}
						$zapytanie='SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = TRUE;;';
						$query=mysqli_query($db,$zapytanie);
							while($row=mysqli_fetch_array($query))
							{
								$id=$row['id'];
								$dataWyjazdu=$row['dataWyjazdu'];
								$cena=$row['cena'];
								$cel=$row['cel'];
								
								echo $id.". ".$dataWyjazdu.", ".$cel.", cena:".$cena."<br/>";
							}
						
					?>
				
			</div>
			
				<div id="Stopka">
					<p>Stronę wykonał:00000000</p>
				</div>
			
		</body>
	
	
	
	</html>