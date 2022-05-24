<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset="UTF-8">
				<title>Rozgrywki futbolowe</title>
				<link rel="stylesheet" href="styl.css">
		</head>
		
		<body>
			<div id="Baner">
				<h2>Światowe rozgrywki piłkarskie</h2>
					<img src="obraz1.jpg" alt="boisko">
			</div>
			
			<div id="Mecze">
				<!--Sktypt 1-->
					<?php
						$db=mysqli_connect('localhost','root','','egzamin3');
							if(!$db)
							{
								echo "Błąd połączenie z bazą";
							}
							$zapytanie="SELECT zespol1,zespol2,wynik,data_rozgrywki FROM rozgrywka WHERE zespol1='EVG'";
								$query=mysqli_query($db,$zapytanie);
								if(!$query)
								{
									echo "błąd zapytania";
								}
								while($row=mysqli_fetch_array($query))
								{
									$zespol1=$row['zespol1'];
									$zespol2=$row['zespol2'];
									$wynik=$row['wynik'];
									$data_rozgrywki=$row['data_rozgrywki'];
									
									echo "<div id='blok'>";
									echo "<h3>".$zespol1." - ".$zespol2."</h3><h4>".$wynik."</h4><p>w dniu: ".$data_rozgrywki;
									echo "</div>";
									
								}
							mysqli_close($db);
					?>
				
			</div>
			<div id="Main">
				<h2>Reprezentacja Polski</h2>
			</div>
			
			<div id="Left">
				<p>Podj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy,4-napastnicy)</p>
				<form method="POST">
					<input type="number" name="wybor">
					<input type="submit" value="Sprawdź" name="button1">
					<ol>
						<?php
							if(isset($_POST['button1']))
							{
								$db=mysqli_connect('localhost','root','','egzamin3');
								if(!$db)
								{
									echo "Błąd połączenie z bazą";
								}
								$id=$_POST['wybor'];
								if(!empty($id))
								{
									$zapytanie="SELECT imie,nazwisko FROM zawodnik WHERE pozycja_id=$id";
										$query=mysqli_query($db,$zapytanie);
										if(!$query)
										{
											echo "błąd zapytania";
										}
									while($row=mysqli_fetch_array($query))
									{
										$imie=$row['imie'];
										$nazwisko=$row['nazwisko'];
										
										echo "<li>".$imie." ".$nazwisko."</li>";
									}
								}else
								{
									echo "Pole nie może być puste";
								}
								mysqli_close($db);
							}
					
						?>
					</ol>
				
				
				
				</form>
				
			</div>
			<div id="Right">
				<img src="zad1.png" alt="piłkarz">
				<p>Autor: 000000000000</p>
				
			</div>
			
		
		</body>
	</html>