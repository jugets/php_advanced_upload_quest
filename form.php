<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <form method="post" action="index.php" enctype="multipart/form-data">
    <p><label for="lastname">Nom :</label></p>
    <p><input type="text" name="lastname" id="lastname"></p>
    <p><label for="firstname">Prénom :</label></p>
    <p><input type="text" name="firstname" id="firstname"></p>
    <p><label for="imageUpload">Téléchargez une image</label></p>
    <p><input type="file" name="avatar" id="imageUpload" /></p>
    <p><button name="send">Send</button></p>
    </form>
</body>
</html>