
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="add_to_shop.inc.php" method="post">
            <div class="form-group">
                <label for="name">Name of new Item</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="class">Class of new Item</label>
                <input type="text" class="form-control" id="class" name="class" placeholder="Enter class">
            </div>
            <div class="form-group">
                <label for="price">Price of new Item</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
            </div>
            <div class="form-group">
                <label for="price">URL(img) of new Item</label>
                <input type="text" class="form-control" id="URL" name="URL" placeholder="Enter URL">
            </div>
            <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>