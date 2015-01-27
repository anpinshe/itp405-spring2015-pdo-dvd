<!DOCTYPE html>
<html>
    <head>
        <title>Song Search</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/home.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="brand" href="search.php">Rating page</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-fluid">
        
            <?php 

                $host = 'itp460.usc.edu';
                $dbname = 'dvd';
                $user = 'student';
                $pass = 'ttrojan';

                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

                $rating = $_GET['rating'];

                $sql = "
	               SELECT title, genre_name
                   FROM dvds
                   INNER JOIN ratings
                   ON ratings.id = dvds.rating_id
                   INNER JOIN genres
                   ON genres.id = dvds.genre_id
                   WHERE ratings.rating_name = ?
                ";

                $statement = $pdo->prepare($sql);
                $statement->bindParam(1, $rating);
                $statement->execute();
                $results = $statement->fetchAll(PDO::FETCH_OBJ);
                ?>
                <p>Rating: "<?php echo $rating ?>" </p>
                <?php foreach($results as $result) : ?>
                    <h3><?php echo $result->title ?></h3>
                    <p>Genre: <?php echo $result->genre_name ?></p>
                <?php endforeach; ?>
        </div>
    </body>
</html>