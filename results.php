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
                        <a class="brand" href="search.php">Result Page</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-fluid">
            
            <?php 

                if (!isset($_GET['title'])) {
                    header('Location: search.php');
                }

                $host = 'itp460.usc.edu';
                $dbname = 'dvd';
                $user = 'student';
                $pass = 'ttrojan';

                $title = $_GET['title']; // $_REQUEST['artist']

                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

                $sql = "
                    SELECT title, genre_name, format_name, rating_name
                    FROM dvds
                    INNER JOIN genres
                    ON dvds.genre_id = genres.id
                    INNER JOIN formats 
                    ON dvds.format_id = formats.id
                    INNER JOIN ratings
                    ON dvds.rating_id = ratings.id
                    WHERE title LIKE ?
                    ORDER BY title 
                ";

                $statement = $pdo->prepare($sql);
                $like = '%'.$title.'%';
                $statement->bindParam(1, $like);

                $statement->execute();
                $dvds = $statement->fetchAll(PDO::FETCH_OBJ);
            ?>
            <p>You searched for "<?php echo $title ?>" </p>
            
            <?php foreach($dvds as $dvd) : ?>
                <h3>
                    <?php echo $dvd->title ?>

                    <p>Genre: <?php echo $dvd->genre_name ?></p>
                    <p>Format: <?php echo $dvd->format_name ?></p>
                    <p>Rating: <a href="ratings.php?rating=<?php echo $dvd->rating_name ?>"><?php echo $dvd->rating_name ?></a></p>
                    <?php endforeach; ?>
      
        </div>
    </body>
</html>      