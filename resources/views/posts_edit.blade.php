<style>
/* ===== Form Update Post ===== */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    max-width: 500px;
    margin: 20px auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Headings */
h2 {
    text-align: center;
    color: #111827;
    margin-bottom: 20px;
    font-size: 26px;
}

/* Input & Textarea */
form input[type="text"],
form textarea {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 15px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 16px;
    color: #1f2937;
}

form textarea {
    resize: vertical;
    min-height: 100px;
}

/* Submit Button */
form button {
    width: 100%;
    padding: 10px 0;
    background-color: #facc15; /* jaune comme Update */
    color: #1f2937;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    transition: background 0.3s;
}

form button:hover {
    background-color: #eab308;
}
</style>

<h2>Update Post</h2>

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <input type="text" name="title" value="{{ $post->title }}">
    <textarea name="content">{{ $post->content }}</textarea>
    <button type="submit">Update Post</button>
</form>