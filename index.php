<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <title>Avatar</title>
</head>
<body>
    
<?php

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['lastname']) && isset($_POST['firstname'])){ 

    if(empty($_POST['lastname']) || empty($_POST['firstname'])){
        $errors[] = "Veuillez indiquez un nom et un prénom !";
    }

    $lastname = trim($_POST['lastname']);
    $firstname = trim($_POST['firstname']);

    $uploadDir = 'public/uploads/';
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $authorizedExtensions = ['jpg','gif','png','webp'];
    $maxFileSize = 2000000;

    if(!in_array($extension, $authorizedExtensions)){
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
    }
    
    if( file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize){
        $errors[] = "Votre fichier doit faire moins de 1M !";
    }

    $uploadDir = 'public/uploads/';
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
}

if(empty($errors)){?>
    <div class="card m-auto" style="width: max-content;">
        <div class="card-header bg-info text-center"><h1>SPRINGFIELD</h1></div>
        <div class="card-body d-flex flex-column align-items-center justify-content-start">
            <p><?=$lastname?> <?=$firstname?></p>
            <img src="<?=$uploadFile?>" alt="Photo d'Homer Simpson" class="bg-info" style="width: 200px;">
        </div>
    </div>
<?php    
}else{
    foreach($errors as $error){
        echo $error.'<br>';
    }
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>