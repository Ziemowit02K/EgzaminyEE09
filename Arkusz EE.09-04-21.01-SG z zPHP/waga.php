<!DOCTYPE HTML>	
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Twój wskaźnik BMI</title>
			<link rel="stylesheet" href="styl4.css">
		</head>
		
		
		<body>
			<div id="baner">
				<h2>Oblicz wskaźnik BMI</h2>
			</div>
				<div id="logo">
					<img alt="liczymy BMI"  src="wzor.png">
				</div>
			<div id="lewy">
				<img alt="zrzuć kalorie!" src="rys1.png">
			</div>
			<div id="prawy">
				<h1>Podaj dane</h1>
					<form method="POST">
						<label>Waga: <input type="number" name="waga"></label><br/>
						<label>Wzrost[cm]: <input type="number" name="wzrost"></label><br/>
						<input type="submit" value="Licz BMI i zapisz wynik" name="licz">
						<!--Skrypt 1-->
						<?php
							if(isset($_POST['licz']))
							{
								$waga=$_POST['waga'];
								$wzrost=$_POST['wzrost'];
								if(!(empty($waga) || empty($wzrost)))
								{
									$bmi=$waga/($wzrost*$wzrost);
									$wynik=$bmi*10000;
									
									echo "<br/> Twoja waga: ".$waga.";"."Twój wzrost: ".$wzrost."<br/> BMI wynosi: ".$wynik;
								}
								
							}
						
						
						?>
						
					
					</form>
			</div>
			<div id="glowny">
				<table>
					<tr>
						<th>lp.</th>
						<th>Interpretacja</th>
						<th>zaczyna się od</th>
						<?php 
							$db = mysqli_connect("localhost","root","","egzamin2");
								$zapytanie = "SELECT id,informacja,wart_min FROM bmi;";
								$query=mysqli_query($db,$zapytanie);
								while($row=mysqli_fetch_array($query))
								{
									$id = $row['id'];
									$informacja = $row['informacja'];
									$wart_min = $row['wart_min'];
									
									echo "<tr><td>".$id."</td><td>".$informacja."</td><td>".$wart_min."</td></tr>";
								}
							
						?>
				</table>
			</div>
			<div id="stopka">
				<p>Autor: 0000000000</p>
				<a href="kw2.jpg">Wynik działania kwerendy 2</a>
			</div>
		</body>
		
	</html>