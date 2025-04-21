<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Profile Dashboard</h1>
    <h2>Welcome to your profile, {{auth()->user()->name}}</h2>
    <h3>All posts by {{auth()->user()->name}}</h3>
    <form action = "/" method = "GET">
        <button>Back to home</button>
    </form>
    @foreach($posts as $post)
    <div style = "background-color: gray; pading: 10px; margin: 10px;">
        <h3>{{ $post->title}} by {{$post->getUser->name}}</h3>
        {{ $post->body }}
        <p>Created at: {{$post->created_at}}</p>
        <p>Last updated: {{$post->updated_at}}</p>
        <p><a href = "/edit-post/{{$post->id}}">Edit</a></p>
        <form action = "/delete-post/{{$post->id}}" method = "POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    </div>
    @endforeach
    <div>
        {{$posts->links()}}
    </div>
</body>
</html>