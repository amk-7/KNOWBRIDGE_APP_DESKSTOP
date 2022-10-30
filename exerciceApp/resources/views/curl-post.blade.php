<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <form method="POST" action="{{route('test_curl_post')}}">
        @csrf
        <label>Adresse du serveur</label>
        <input name="adresse" type="text"><br>
        <label>Email</label>
        <input name="email" type="email"><br>
        <label>Mot de passe</label>
        <input name="motdepasse" type="password">
        <button type="Submit">Envoyer</button>
    </form>
</div>
</body>
</html>
