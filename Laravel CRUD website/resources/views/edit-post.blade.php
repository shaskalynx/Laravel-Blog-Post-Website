<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$post->title}}" placeholder="Enter the new title:">
        <textarea name="body" placeholder="Enter your content">{{$post->body}}</textarea>
        <button>Update</button>
    </form>
</body>
</html>