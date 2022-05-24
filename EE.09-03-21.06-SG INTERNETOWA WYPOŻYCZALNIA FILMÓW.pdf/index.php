<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Video On Demand</title>
</head>

<body>
    <div class="title-sm">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div class="title-sm-sec">
        <table>
            <tr>
                <th>Kryminał</th>
                <th>Horror</th>
                <th>Przygodowy</th>
            </tr>
            <tr>
                <td>
                    20
                </td>
                <td>
                    30
                </td>
                <td>
                    20
                </td>
            </tr>
        </table>
    </div>
    <div class="qrr1">
        <h3>Polecamy</h3>
        <?php
        require("connect.php");
        $qrr = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id=18 || id=22 || id=23|| id=25";
        $res = $conn->query($qrr);
        while ($row = $res->fetch_array()) {
            echo "<div class='scrr-col'> 
                <h4>$row[0].$row[1]</h4>
                <img src='$row[3]' alt='film'>
                <p>$row[2]</p>
                </div>";
        }
        mysqli_close($conn);
        header("Location: /index.php");
        exit();
        ?>
    </div>
    <div class="qrr2">
        <h3>Filmy fantastyczne</h3>
        <?php
        require("connect.php");
        $qrr2 = "SELECT id, nazwa, zdjecie, opis FROM produkty WHERE Rodzaje_id=12";
        $res2 = $conn->query($qrr2);
        while ($row = $res2->fetch_array()) {
            echo "<div class='scr-col'> 
                <h4>$row[0].$row[1]</h4>
                <img src='$row[2]' alt='film'>
                <p>$row[3]</p>
                </div>";
        }
        mysqli_close($conn);
        header("Location: /index.php");
        exit();
        ?>
    </div>
    <div class="footer">
        <form action="index.php" method="post">
            Usuń film nr.:<input type="number" name="liczba" id="liczba">
            <input type="submit" value="Usuń film">
        </form>
        <?php
        require("connect.php");
        if (isset($_POST["liczba"])) {
            $liczba = $_POST["liczba"];
            $qrr3 = "DELETE FROM produkty WHERE id=$liczba";
            $conn->query($qrr3);
        }
        mysqli_close($conn);
        header("Location: /index.php");
        exit();
        ?>
        Stronę wykonał:
        <a href="mailto:ja@poczta.com">Jan Kupczyk</a>
    </div>
</body>

</html>




































<!-- Jan Kupczyk -->