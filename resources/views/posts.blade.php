<style>/* ===== Body ===== */
/* ===== Body ===== */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f6f8;
    color: #1f2937;
    margin: 0;
    padding: 30px 20px;
}

/* ===== Logout Button ===== */
.logout-btn {
    display: inline-block;
    margin-bottom: 25px;
    padding: 10px 18px;
    background-color: #ef4444;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    box-shadow: 0 3px 6px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}

.logout-btn:hover {
    background-color: #dc2626;
    transform: translateY(-2px);
    box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}

/* ===== Headings ===== */
h2 {
    margin-bottom: 20px;
    color: #111827;
    font-size: 28px;
    text-align: center;
}

/* ===== Form Card ===== */
.form-card {
    background-color: #fff;
    padding: 25px 25px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    margin-bottom: 35px;
    max-width: 550px;
    margin-left: auto;
    margin-right: auto;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.form-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

/* Inputs & Textarea */
.form-card input[type="text"],
.form-card textarea {
    width: 100%;
    padding: 12px 14px;
    margin-bottom: 18px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 16px;
    color: #1f2937;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.form-card input[type="text"]:focus,
.form-card textarea:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 8px rgba(59,130,246,0.2);
    outline: none;
}

.form-card textarea {
    resize: vertical;
    min-height: 100px;
}

/* Form Button */
.form-card button {
    width: 100%;
    padding: 12px 0;
    background-color: #3b82f6;
    color: #fff;
    font-weight: bold;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.form-card button:hover {
    background-color: #2563eb;
    transform: translateY(-2px);
    box-shadow: 0 5px 12px rgba(0,0,0,0.2);
}

/* ===== Posts Container ===== */
.posts-container {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

/* ===== Post Card ===== */
.post-card {
    background-color: #fff;
    padding: 20px 25px;
    border-radius: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.post-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.12);
}

/* Post Title & Content */
.post-title {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #111827;
}

.post-content {
    font-size: 16px;
    color: #374151;
    margin-bottom: 12px;
}

/* Likes */
.likes {
    font-size: 14px;
    color: #ef4444;
    margin-bottom: 12px;
}

/* Buttons inside posts */
.update-btn,
.delete-btn,
.like-btn {
    display: inline-block;
    padding: 7px 14px;
    font-size: 14px;
    border-radius: 8px;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    border: none;
    margin-right: 6px;
    transition: all 0.3s ease;
}

/* Update Button */
.update-btn {
    background-color: #facc15;
    color: #1f2937;
}
.update-btn:hover {
    background-color: #eab308;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

/* Delete Button */
.delete-btn {
    background-color: #ef4444;
    color: #fff;
}
.delete-btn:hover {
    background-color: #dc2626;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

/* Like / Unlike Button */
.like-btn {
    background-color: #3b82f6;
    color: #fff;
}
.like-btn:hover {
    background-color: #2563eb;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
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


