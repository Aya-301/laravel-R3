<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$post->title}}</h1>
    <h2>Author is: {{$post->author}}</h2>
    <h3>Created at: {{$post->created_at}}</h3>
    <h3>Updated at: {{$post->updated_at}}</h3>
    <p><b>Description:</b> {{$post->description}}</p>
    <p>{{($post->published)? "published":"not published"}}</p>
</body>
</html>