<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h3>Nuovo post creato</h3>
  <h5>Titolo: {{ $new_post->title}}</h5>
  <a href="{{ route('admin.posts.show', ['slug' =>$new_post->slug]) }}">Visualizza il contenuto</a>
  
</body>
</html>