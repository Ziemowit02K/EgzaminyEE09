<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset ="UTF-8">
			<title>Rozgrywki futbolowe</title>
			<link rel="stylesheet" href="styl.css">
		</head>
		
		<body>
			<div id="baner">
				<h2>Światowe rozgrywki piłkarskie</h2>
				<img src="obraz1.jpg" alt="boisko">
			</div>
			<div id="mecze">
				<?php
					$db=mysqli_connect("localhost","root","","football");
						if(!$db)
						{
							echo "błąd połączenia z bazą";
						}
						$zapytanie="SELECT zespol1,zespol2,wynik,data_rozgrywki FROM `rozgrywka` WHERE zespol1='EVG'";
						$query=mysqli_query($db,$zapytanie);
							while($row=mysqli_fetch_array($query))
							{
								$zespol1=$row['zespol1'];
								$zespol2=$row['zespol2'];
								$wynik=$row['wynik'];
								$data = $row['data_rozgrywki'];
								
								echo "<div id='blok'>";
								echo "<h3>".$zespol1." - ".$zespol2."</h3>";
								echo "<h4>".$wynik."</h4>";
								echo "<p> w dniu: ".$data."</p>";
								echo "</div>";
							}
							mysqli_close($db);
				?>
				
			</div>
			<div id="glowny">
				<h2>Reprezentacja Polski</h2>
			</div>
			<div id="lewy">
				<p>Podaj pozcyje zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy): </p>
					<form method="POST">
						<input type="number" name="numer">
						<input type="submit" name="button1">
					</form>
					<ol>
					<?php
						if(isset($_POST['button1']))
						{
							$db=mysqli_connect("localhost","root","","football");
								if(!$db)
								{
									echo "błąd połączenia z bazą";
								}
							$numer=$_POST['numer'];
								$zapytanie="SELECT imie,nazwisko FROM `zawodnik` WHERE pozycja_id=$numer;";
								$query=mysqli_query($db,$zapytanie);
							while($row=mysqli_fetch_array($query))
							{
								$imie=$row['imie'];
								$nazwisko=$row['nazwisko'];
								
								echo "<li>".$imie." ".$nazwisko."</li>";

							}
							mysqli_close($db);
							
								
						}
					
					
					?>
					</ol>
			</div>
			<div id="prawy">
				<img src="zad1.png" alt="piłkarz">
				<p> Autor: 00000000000</p>
			</div>
		</body>
	</html>