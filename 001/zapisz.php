<?php
	if(isset($_POST['zapisz1']))
	{
		$db=mysqli_connect('localhost','root','','egzamin6');
			if(!$db)
			{
				echo "Błąd połączenia z bazą";
			}
			$imie=$_POST['imie'];
			$nazwisko=$_POST['nazwisko'];
			$adres=$_POST['adres'];
			$zapytanie="INSERT INTO karty_wedkarskie (imie,nazwisko,adres) VALUES ('$imie','$nazwisko','$adres');";
				$query=mysqli_query($db,$zapytanie);
				if($query==true)
				{
					//echo "Dodano do bazy";
				}
			mysqli_close($db);
	}


?>