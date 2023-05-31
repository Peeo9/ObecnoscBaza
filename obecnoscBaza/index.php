<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie obecnosci</title>
    <style>
        .obecnosc{
            text-align: center;
        }
    </style>
</head>
<body>
            <?php
                $connect=mysqli_connect("localhost","root","","4ti");
                if($connect){
                    $zapytanie="Select * from dane";
                    $wynik=mysqli_query($connect,$zapytanie);
                    while($wiersz=mysqli_fetch_array($wynik)){
                        $idosoba[]=$wiersz['id'];
                        $imie[]=$wiersz['imie'];
                        $nazwisko[]=$wiersz['nazwisko'];
                    }
                    
                } else{
                    echo "Blad polaczenia z baza danych" ;
                }
                mysqli_close($connect);
                ?>
    <header>
        <h1>Dodawanie obecnosci</h1>
    </header>
    <main>
        <section>
            <form method="post">
                <table>
                    <thead>
                        <tr>
                            <th>Lp.</th>
                            <th>Imię i nazwisko</th>
                            <th>Obecność</th></tr>
                    </thead>
                    <tbody>
                        <?php
                        for($i=0;$i<count($imie);$i++){
                            echo "<tr>";
                            echo "<th>$idosoba[$i]</th>";
                            echo "<td>$imie[$i] $nazwisko[$i]</td>";
                            echo "<td><input type='checkbox' name='obecny$idosoba[$i]' id='obecny$idosoba[$i]'></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <input type="submit" value="Potwierdź">
            </form>
        </section>
    </main>
    <footer>
        Strona została stworzona przez: Łukasz Krupa
    </footer>
</body>
</html>