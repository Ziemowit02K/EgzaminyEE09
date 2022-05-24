<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>piłka nożna </title>
		<link rel="stylesheet" href="styl2.css">
    </head>
    <body>
		<div id="baner">
			<h3>Reprezentacja polski w piłce nożnej</h3>
			<img src="obraz1.jpg" alt="reprezentacja">
		</div>
		<div id="blok_lewy"> 
			<form method="POST">
				
					
							<select name="lista">
								<option value="1" id="Bramkarze">Bramkarze</option>
								<option value="2" id="Obroncy">Obrońcy</option>
								<option value="3" id="Pomocnicy">Pomocnicy</option>
								<option value="4" id="Napastnicy">Napastnicy</option>
							</select>
						
							<input type="submit" value="Zobacz" name="przycisk1">
					
			</form>
				<img src="zad2.png" alt="piłka">
				<p> Autor 00000000000</p>
		</div>
		<div id="blok_prawy">
			<ol>
				<?php
					if(isset($_POST['przycisk1']))
						{
							$db = mysqli_connect("localhost","root","","egzamin1");
							if(!$db)
							{
								echo "błąd połączenia z bazą";
							}
							$numer=$_POST['lista'];
							$zapytanie="SELECT imie,nazwisko FROM zawodnik WHERE pozycja_id=$numer;";	
							$query = mysqli_query($db,$zapytanie);
								while($row = mysqli_fetch_array($query))
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
		<div id="blok_glowny"> 
			<h3>Liga mistrzów</h3>
		</div>
		<div id="blok_liga"> 
			<div id="scriptPanel">
				<?php
					$db=mysqli_connect("localhost","root","","egzamin1");
						if(!$db)
						{
							echo "błąd połączenia z bazą";
						}
						$zapytanie="SELECT zespol, punkty,grupa FROM `liga` ORDER BY punkty DESC";
							$query=mysqli_query($db,$zapytanie);
							while($row=mysqli_fetch_array($query))
							{
								$zespol=$row['zespol'];
								$punkty=$row['punkty'];
								$grupa=$row['grupa'];
								
								echo "<div id='blok'>";
									echo "<h2>".$zespol."</h2>";
									echo "<h1>".$punkty."</h1>";
									echo "<p> Grupa: ".$grupa."</p>";
								echo "</div>";
								}
				
				?>
			</div>
		</div>
    </body>
</html>