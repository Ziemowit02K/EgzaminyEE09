<!DOCTYPE html>
    <html>
        <head>
            <title> piłka nożna</title>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="styl2.css">
        </head>
        <body>
            <div id="banerPanel">
                    <h3>
                        Reprezentacja polski w piłce nożnej
                    </h3>
                    <img alt="reprezentacja" src="obraz1.jpg">
            </div>
            <div id="leftPanel">
                <form method="POST">
                    <select name="lista">
                            <option value="1">Bramkarze</option>
                            <option value="2">Obrońcy</option>
                            <option value="3">Pomocnicy</option>
                            <option value="4">Napastnicy</option>
                    </select>
                    <input type="submit" value="zobacz" name="Button1"  action="liga.php" >
                </form>
                <img src="zad2.png" alt="piłka">
                <p> Autor: 0000000000 </p>
            </div>
            <div id="rightPanel">
                    <ol>
                    <?php  
                        if(isset($_POST['Button1']))
                        {
                            $db=mysqli_connect("localhost","root","","egzamin");
                                $numer=$_POST['lista'];
                                $zapytanie="SELECT imie,nazwisko FROM zawodnik WHERE pozycja_id=$numer;";
                                $query=mysqli_query($db,$zapytanie);
                                    while($row = mysqli_fetch_array($query))
                                    {
                                        $imie= $row['imie'];
                                        $nazwisko =$row['nazwisko'];
                                        echo "<li>".$imie." ".$nazwisko."</li>";
                                    }
                            mysqli_close($db);
                        }
                            
                    ?>
                    </ol>
            </div>
            <div id="mainPanel">
                <h3>Liga mistrzów</h3>

            </div>
            <div id="scriptPanel">
            <?php
                $db=mysqli_connect("localhost","root","","egzamin");

                    $zapytanie = "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC";
                    $query=mysqli_query($db,$zapytanie);
                    while ($row = mysqli_fetch_array($query)) {
                        $zespol = $row['zespol'];
                        $punkty = $row['punkty'];
                        $grupa = $row['grupa'];

                        echo '<div id="blok">';
                        echo "<br><h2>$zespol</h2>";
                        echo "<h1><br>$punkty<br><br></h1>";
                        echo "<p>Grupa: $grupa</p><br>";
                        echo '</div>';
                    }
                    mysqli_close($db)

                ?>


            </div>
        </body>
    </html>