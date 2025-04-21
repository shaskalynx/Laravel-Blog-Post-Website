<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <p>you are logged in, {{auth()->user()->name}}</p>
    <form action = "/logout" method = "POST">
    @csrf
        <button>Logout</button>
    </form>
    <div style = "border: 3px solid black;">
        <h2>Create a New Post</h2>
        <form action = "/create-post" method = "POST">
            @csrf
            <input type = "text" name = "title" placeholder = "Enter your title">
            <textarea type = "text" name = "body" placeholder = "Enter your content"></textarea>
            <button>Create</button>
        </form>
    </div>

    <div style = "border: 3px solid black;">
        <h2>All Posts</h2>
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

    @else
    <div style = "border: 3px solid black;">
        <h2>Register:</h2>
        <form action = "/register" method = "POST">
            @csrf
            <input type = "text" name = "name" placeholder = "Enter your name">
            <input type = "text" name = "email" placeholder = "email">
            <input type = "password" name = "password" placeholder = "password">
            <button>Register</button>
        </form>
    </div>

    <div style = "border: 3px solid black;">
        <h2>Login:</h2>
        <form action = "/login" method = "POST">
            @csrf
            <input type = "text" name = "loginname" placeholder = "Enter your name">
            <input type = "password" name = "loginpassword" placeholder = "password">
            <button>Login</button>
        </form>
    </div>
    @endauth

    
</body>
</html>