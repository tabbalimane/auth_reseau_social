<style>::after/* ===== Body ===== */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f6f8;
    color: #1f2937;
    margin: 0;
    padding: 20px;
}

/* ===== Logout Button ===== */
.logout-btn {
    display: inline-block;
    margin-bottom: 20px;
    padding: 8px 15px;
    background-color: #ef4444;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    font-weight: bold;
    transition: background 0.3s;
}
.logout-btn:hover {
    background-color: #dc2626;
}

/* ===== Headings ===== */
h2 {
    margin-bottom: 15px;
    color: #111827;
    font-size: 26px;
}

/* ===== Form Card ===== */
.form-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    margin-bottom: 30px;
}

.form-card input[type="text"],
.form-card textarea {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 15px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 16px;
}

.form-card textarea {
    resize: vertical;
    min-height: 80px;
}

.form-card button {
    background-color: #3b82f6;
    color: #fff;
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s;
}
.form-card button:hover {
    background-color: #2563eb;
}

/* ===== Posts Container ===== */
.posts-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* ===== Post Card ===== */
.post-card {
    background-color: #fff;
    padding: 15px 20px;
    border-radius: 10px;
    box-shadow: 0 1px 6px rgba(0,0,0,0.05);
    position: relative;
}

/* Post Title & Content */
.post-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 8px;
    color: #111827;
}
.post-content {
    font-size: 16px;
    color: #374151;
    margin-bottom: 10px;
}

/* Likes */
.likes {
    font-size: 14px;
    color: #ef4444;
    margin-bottom: 10px;
}

/* Buttons inside posts */
.update-btn,
.delete-btn,
.like-btn {
    display: inline-block;
    padding: 6px 12px;
    font-size: 14px;
    border-radius: 6px;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    border: none;
    margin-right: 5px;
    transition: all 0.2s;
}

/* Update Button */
.update-btn {
    background-color: #facc15;
    color: #1f2937;
}
.update-btn:hover {
    background-color: #eab308;
}

/* Delete Button */
.delete-btn {
    background-color: #ef4444;
    color: #fff;
}
.delete-btn:hover {
    background-color: #dc2626;
}

/* Like / Unlike Button */
.like-btn {
    background-color: #3b82f6;
    color: #fff;
}
.like-btn:hover {
    background-color: #2563eb;
}
</style>


<!-- Logout Button -->
 <body>
<a href="/logout" class="logout-btn">Logout</a>

<h2>Create Post</h2>

<form action="{{ route('posts.store') }}" method="POST" class="form-card">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <textarea name="content" placeholder="Content"></textarea>
    <button type="submit">Add Post</button>
</form>

<div class="posts-container">
@foreach($posts as $post)
<div class="post-card">
    <div class="post-title">{{ $post->title }}</div>
    <div class="post-content">{{ $post->content }}</div>
    <div class="likes">❤️ Likes: {{ $post->likes->count() }}</div>

    @if($post->user_id == session('user_id'))
        <a class="update-btn" href="{{ route('posts.edit', $post->id) }}">Update</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">Delete</button>
        </form>
    @endif

    <form method="POST" action="{{ route('posts.like',$post->id) }}" style="display:inline">
        @csrf
        @if($post->likes->contains('user_id', session('user_id')))
            <button type="submit" class="like-btn">Unlike</button>
        @else
            <button type="submit" class="like-btn">Like</button>
        @endif
    </form>
</div>
@endforeach
</div>
 </body>


