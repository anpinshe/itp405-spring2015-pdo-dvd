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
                        <a class="brand" href="search.php">Search Page</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-fluid">
            <div class="mini-layout">
            <div class="mini-layout-body">
                <div class="mini-center">
                <form class="form-search" method="get" action="results.php">
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p align="center">Please insert the dvd title you want to search:</p>
                    <p align="center" style="font-weight:800" >
                        DVD Title:
                    <input type="text" class="input-medium search-query" name="title">
                    <input type="submit" class="btn" value="Search">
                    </p>
                </form>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>