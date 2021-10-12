<!DOCTYPE html>
    <html lang="en">
    <head>
        <base href="{BASE_URL}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StruchiFy</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="contenedor">
        <div class="logopag">
            <a href="home"><img src="img/logo2.png" alt="imagen del logo" style="width: 75px;"></a> <!-- No toma ninguna clase en el css (-_-#) -->
            <a href="home"><h1 class="struchify">StruchiFy</h1></a> 
        </div>
        
        {if isset($smarty.session.USER_ID)} <!-- $_SESSION['USER_ID'] -->
            <a class="btn btn-secondary" href="logout">{$smarty.session.USER_EMAIL} Logout</a>
        {else}
            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">login</button>
        {/if}
        
    </div>