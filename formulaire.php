<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ajouter un auteur</h1>

    <form action="index.php" method="post">
        <div class="fields">
            <div class="field">
                <label for="auteur">Auteur</label><br>
                <input type="text" name="auteur" id="auteur">
            </div>
            <div class="field">
                <label for="bio">Bio</label><br>
                <textarea name="bio" id="bio"></textarea>
            </div>

        </div>
        <div class="submit">
            <input type="submit" value="ajouter">
        </div>

    </form>
</body>

</html>