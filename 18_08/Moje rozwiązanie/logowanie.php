<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Forum o psach</title>
			<link rel="stylesheet" href="styl4.css">
	</head>
	
	<body>
		<div id="Baner">
			<h1>Forum wielbicieli psów</h1>
		</div>
		
		<div id="Lewy">
			<img src="obraz.jpg" alt="foksterier">
		</div>
		<div class="PrawyPanel">
		<div id="Prawy1">
			<h2>Zapisz się</h2>
			<form method="POST">
				<label>login:  <input type="text" name="login"></labek></br>
				<label>hasło:  <input type="password" name="haslo"></labek></br>
				<label>powtórz hasło:  <input type="password" name="haslo2"></labek></br>
				<input type="submit" name="submit1" value="Zapisz">
			
			</form>
			<?php
				if(isset($_POST['submit1']))
				{
					$db=mysqli_connect('localhost','root','','psy');
						if(!$db)
						{
							echo "<p>Błąd połączenia z bazą</p>";
							
						}
						else
						{
							if(empty($_POST['login']) || empty($_POST['haslo']))
							{
								echo "<p>wypełnij wszystkie pola<p>";
								mysqli_close($db);
								
							}
							else
							{
								$zapytanie1="SELECT login FROM uzytkownicy;";
								$query1=mysqli_query($db,$zapytanie1);
									while($row=mysqli_fetch_array($query1))
									{
										$loginDB=$row['login'];
										$login1=$_POST['login'];
											if($loginDB==$login1)
											{
												echo "<p>login występuje w bazie danych, konto nie zostało dodane </p>" ;
												$wynik=false;
											}
											else
											{
												$wynik=true;
											}
											
									}
									if($wynik==true)
									{
										$haslo1=$_POST['haslo'];
										$haslo2=$_POST['haslo2'];
										if(!($haslo1==$haslo2))
										{
											echo "<p>hasła nie są takie same konto nie zostało dodane</p>";
											mysqli_close($db);
										}
										else
										{
											
										
											$hasloDB=sha1($haslo1);
											$zapytanie2="INSERT INTO uzytkownicy (login,haslo) VALUES ('$login1','$hasloDB');";
											$query2=mysqli_query($db,$zapytanie2);
												if($query2)
												{
													echo "<p>Konto zostało dodane</p>";
													mysqli_close($db);
												}
												else
												{
													echo "<p>Błąd zapytania 2</p>";
												}
										}
									}
									else
									{
										mysqli_close($db);
									}
							}
						}
					
				}
			
			?>
		</div>
		<div id="Prawy2">
			<h2>Zapraszamy wszystkich</h2>
			<ol>
				<li>właścicieli psów</li>
				<li>weterynarzy</li>
				<li>tych co chą kupić psa</li>
				<li>tych co lubią psy</li>
			</ol>
			<a href="regulamin.html">Przeczytaj regulamin forum</a>
		</div>
		</div>
		
		<div id="Stopka">
			<h5>Stronę wykonał: 00000000000</h5>
		</div>
	
	</body>
</html>