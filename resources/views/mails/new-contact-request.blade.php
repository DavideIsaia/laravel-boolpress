<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h3>Hai ricevuto una nuova richiesta di contatto</h3>
  <h5>Nome: {{ $lead->name }}</h5>  
  <h5>Email: {{ $lead->email }}</h5>
  <hr>
  <p>{{ $lead->message }}</p>
</body>
</html>