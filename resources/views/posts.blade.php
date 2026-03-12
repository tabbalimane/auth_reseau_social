
<style>/* ====== Body & Fonts ====== */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7f8;
    color: #333;
    margin: 0;
    padding: 20px;
}

/* ====== Formulaire Create Post ====== */
form {
    background: #fff;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

form input[type="text"],
form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    transition: border 0.3s;
}

form input[type="text"]:focus,
form textarea:focus {
    border-color: #007bff;
    outline: none;
}

/* ====== Buttons ====== */
button {
    padding: 10px 18px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.1s;
}

button:hover {
    background-color: #0056b3;
    transform: scale(1.03);
}

button:disabled {
    background-color: #aaa;
    cursor: not-allowed;
}

/* ====== Post Card ====== */
.post-card {
    background: #fff;
    padding: 18px;
    margin-bottom: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.post-card h3 {
    margin-top: 0;
    color: #007bff;
}

.post-card p {
    font-size: 16px;
    line-height: 1.5;
}

/* ====== Likes ====== */
.like-section {
    margin-top: 10px;
}

.like-section p {
    font-weight: bold;
    display: inline-block;
    margin-right: 10px;
}
a{
       padding: 10px 18px;
    background-color: #ff0080;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.1s;
}</style>

<h2>Create Post</h2>
<a href="/logout">Logout</a>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <textarea name="content" placeholder="Content"></textarea>
    <button type="submit">Add Post</button>
</form>

<hr>

@foreach($posts as $post)
<h3>{{ $post->title }}</h3>
<p>{{ $post->content }}</p>
<p>Likes: {{ $post->likes->count() }}</p>

@if($post->user_id == (session('user_id') ?? 1))

<form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="margin-top:5px;">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Post</button>
</form>
@endif
@if($post->user_id == (session('user_id') ?? 1))
    <a href="{{ route('posts.edit', $post->id) }}">Update</a>
@endif

<form method="POST" action="{{ route('posts.like', $post->id) }}">
    @csrf
    <button type="submit" 
        @if($post->likes->contains('user_id', session('user_id') ?? 1)) disabled style="background:gray;" @endif>
        Like
    </button>
</form>

<hr>
@endforeach