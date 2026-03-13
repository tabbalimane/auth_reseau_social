<style>
body{
    font-family:'Segoe UI',sans-serif;
    background:#f4f4f4;
    margin:0;
    padding:20px;
}
h2{text-align:center;color:#333;margin-bottom:20px;}
a{display:inline-block;margin-bottom:20px;background:#ff4d6d;color:white;padding:8px 15px;border-radius:6px;text-decoration:none;}
a:hover{background:#e6395c;}
.form-card{width:400px;margin:auto;background:white;padding:25px;border-radius:10px;display:flex;flex-direction:column;gap:15px;box-shadow:0 10px 25px rgba(0,0,0,0.2);}
input, textarea{padding:12px;border:2px solid #ddd;border-radius:8px;font-size:15px;}
input:focus, textarea:focus{border-color:#764ba2;outline:none;}
button{padding:12px;background:#764ba2;color:white;border:none;border-radius:8px;cursor:pointer;}
button:hover{background:#5a3a8c;}
button:disabled{background:gray;cursor:not-allowed;}
.post-card{background:white;padding:20px;margin:20px auto;border-radius:10px;box-shadow:0 8px 20px rgba(0,0,0,0.15);}
.post-card h3{margin-top:0;color:#764ba2;}
.post-card p{line-height:1.6;}
.post-actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:10px;}
.post-actions a, .post-actions button{text-decoration:none;padding:6px 12px;border-radius:6px;font-size:14px;transition:0.3s;}
.post-actions a{background:#ff4d6d;color:white;}
.post-actions a:hover{background:#e6395c;}
</style>

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