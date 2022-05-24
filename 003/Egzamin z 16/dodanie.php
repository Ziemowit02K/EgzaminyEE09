<?php
	if(isset($_POST['button1']))
	{
		$db=mysqli_connect('localhost','root','','egzamin2');
			if(!$db)
			{
				echo "Błąd połączenia z bazą";
			}
			$numer=$_POST['karetka'];
			$pierwszy=$_POST['pierwszy'];
			$drugi=$_POST['drugi'];
			$trzeci=$_POST['trzeci'];
			$zapytanie="INSERT INTO ratownicy (nrKaretki,ratownik1,ratownik2,ratownik3) VALUES ('$numer','$pierwszy','$drugi','$trzeci');";
				$query=mysqli_query($db,$zapytanie);
				if(!$query)
				{
					echo "Błąd zapytania";
				}
				else
				{
					echo "Do bazy zostało wysłane zapytanie ".$zapytanie;
				}
			mysqli_close($db);
	}
	

?>