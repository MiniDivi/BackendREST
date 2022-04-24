  
    <?php

    include "queries.php";
    //header("Content-Type: application/json");
    $requestedMethod = $_SERVER['REQUEST_METHOD']; //ottengo il metodo richiesto.


    $page = isset($_GET['page']) ? $_GET['page'] : 0;
    $size = isset($_GET['size']) ? $_GET['size'] : 20;

    echo $lastPage;

    //*Riconoscimento del metodo HTTP
    if ($requestedMethod == "POST") {
        echo "POST <br>";
    } else if ($requestedMethod == "GET") {
        echo getRequest($page, $size);
    } else if ($requestedMethod == "PUT") {
        echo "PUT <br>";
    } else if ($requestedMethod == ".DELETE") {
        echo ".DELETE <br>";
    }

    ?>