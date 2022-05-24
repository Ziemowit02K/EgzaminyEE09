<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Portal społecznościowy</title>
			<link rel="stylesheet" href="styl5.css">
		</head>
		
		
		<body>
			<div class="Baner">
				<div id="banerLewy">
					<h2>Nasze osiedle</h2>
				</div>
				<div id="banerPrawy">
					<!--script 1-->
						<?php
							$db=mysqli_connect('localhost','root','','portal');
								$zapytanie1='SELECT count(*) FROM dane;';
								$query1=mysqli_query($db,$zapytanie1);
									while($row=mysqli_fetch_array($query1))
									{
										$count=$row['count(*)'];
										echo "<h5>Liczba użytkowników portalu: ".$count."</h5>";
									}
								mysqli_close($db);
						?>
				</div>
			</div>
			<div class="main">
			<div id="Lewy">
				<h3>Logowanie</h3>
					<form method="POST">
						<label>login: <br/><input type="text" name="login"></label><br/>
						<label>hasło: <br/><input type="password" name="haslo"></label><br/>
						<input type="submit" name="logowanie" value="Zaloguj">
					
					</form>
			</div>
			<div id="Prawy">
				<h3>Wizytówka</h3>
					<div id='wizytowka'>
						<!--Sktypt 2-->
						<?php
							if(isset($_POST['logowanie']))
							{
								if(!(empty($_POST['login']) || empty($_POST['haslo'])))
								{
										$db=mysqli_connect('localhost','root','','portal');
										if($db)
										{
											$login=$_POST['login'];
											$zapytanie2="SELECT haslo FROM uzytkownicy WHERE login='$login';";
											$query=mysqli_query($db,$zapytanie2);
											if(mysqli_num_rows($query)==0)
											{
												echo "login nie istnieje";
												mysqli_close($db);
											}
											else
											{
												while($row=mysqli_fetch_array($query))
												{
													$haslo=$_POST['haslo'];
													$hasloDB=$row['haslo'];
													$hasloSH1=sha1($haslo);
													if($hasloSH1==$hasloDB)
													{
														$zapytanie3="SELECT uzytkownicy.login,dane.rok_urodz,dane.przyjaciol,dane.hobby,dane.zdjecie FROM uzytkownicy JOIN dane ON uzytkownicy.id=dane.id WHERE uzytkownicy.login='$login';";
														$query2=mysqli_query($db,$zapytanie3);
														while($row=mysqli_fetch_array($query2))
														{
															$obraz=$row['zdjecie'];
															$loginDB=$row['login'];
															$rok_urodz=$row['rok_urodz'];
																$wiek=2022-$rok_urodz;
															$hobby=$row['hobby'];
															$przyjaciele=$row['przyjaciol'];
															
															
															echo "<img src='".$obraz."' alt='osoba'>";
															echo "<h4>".$loginDB."(".$wiek.")</h4>";
															echo "<p>hobby: ".$hobby."</p>";
															echo "<h1><img src='icon-on.png'>".$przyjaciele."</h1>";
															echo "<a href='dane.html'><button>Więcej informacji</button></a>";
															
															
															
														}
													}
													else
													{
														echo 'hasło nieprawidłowe';
														mysqli_close($db);
													}

												}
												
												
											}
										}
										else
										{
												mysqli_close($db);
										}
										
								}
								else
								{
									echo "Prosze uzupełnic pola";
								}
							}
						
						
						?>
					
				</div>
			</div>
		</div>
			
			<div id="Stopka">
				<p>Stronę wykonał: 00000000</p>
			</div>
		
		</body>
	</html>