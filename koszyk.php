<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-6"><h1>KOSZYK</h1>
            <table class="table table-dark table-striped-columns">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Czolg</td>
                    <td><a href="http://localhost/koszyk/koszyk.php?add=1">
                            <button class="btn btn-light">Dodaj produkt do koszyka</button>
                        </a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Pies</td>
                    <td><a href="http://localhost/koszyk/koszyk.php?add=2">
                            <button class="btn btn-light">Dodaj produkt do koszyka</button>
                        </a></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Noz</td>
                    <td><a href="http://localhost/koszyk/koszyk.php?add=3">
                            <button class="btn btn-light">Dodaj produkt do koszyka</button>
                        </a></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <h1>PRODUKTY</h1>
                <table class="table table-dark table-striped-columns">
                    <thead>
                    <tr>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Ilosc</th>
                        <th scope="col">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                $arr = array(
                    "c" => 0,
                    "p" => 0,
                    "n" => 0

                );
                if($_COOKIE !== null){
                    echo $arr["c"];
                    $arr = (json_decode($_COOKIE["products"], true));
//                    print_r($jsonToArr["products"]) ;
                    if($arr["c"] > 0) {
                        echo "<tr> <th scope='col'>Czołg </th>"."<th scope='col'>".$arr["c"]."</th><th scope='col'><a href='http://localhost/koszyk/koszyk.php?remove=1'><button class='btn btn-danger'>Usuń z koszyka</button></a></th></tr>";
                    }
                    if($arr["p"] > 0) {
                        echo "<tr> <th scope='col'>Pies </th>"."<th scope='col'>".$arr["p"]."</th><th scope='col'><a href='http://localhost/koszyk/koszyk.php?remove=2'><button class='btn btn-danger'>Usuń z koszyka</button></a></th></tr>";
                    }
                    if($arr["n"] > 0) {
                        echo "<tr> <th scope='col'>Noz </th>"."<th scope='col'>".$arr["n"]."</th><th scope='col'><a href='http://localhost/koszyk/koszyk.php?remove=3'><button class='btn btn-danger'>Usuń z koszyka</button></a></th></tr>";
                    }


                }

                if(isset($_GET["add"])) {
                    $add = $_GET["add"];
                    //            echo $add;
                    switch ($add) {
                        case 1:

                            $arr["c"]++;
                            break;
                        case 2:
                            $arr["p"]++;
                            break;
                        case 3:
                            $arr["n"]++;
                            break;
                    }
                }

                if(isset($_GET["remove"])) {
                    //            echo $add;
                    $remove = $_GET["remove"];
                    switch ($remove) {
                        case 1:
                            $arr["c"]--;
                            break;
                        case 2:
                            $arr["p"]--;
                            break;
                        case 3:
                            $arr["n"]--;
                            break;
                    }
                }


                $arrToJson = json_encode($arr);
                setcookie("products", $arrToJson, time() + (86400 * 30), "/");

                ?>
                    </tbody>
                </table>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"></script>
</body>
</html>

