<style>
body{font-family:'Segoe UI',sans-serif;background:#f4f4f4;margin:0;padding:20px;}
h2{text-align:center;color:#333;margin-bottom:20px;}
.form-card{width:400px;margin:auto;background:white;padding:25px;border-radius:10px;display:flex;flex-direction:column;gap:15px;box-shadow:0 10px 25px rgba(0,0,0,0.2);}
input, textarea{padding:12px;border:2px solid #ddd;border-radius:8px;font-size:15px;}
input:focus, textarea:focus{border-color:#38a169;outline:none;}
button{padding:12px;background:#38a169;color:white;border:none;border-radius:8px;cursor:pointer;}
button:hover{background:#2f855a;}
</style>

<h2>Update Post</h2>

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <input type="text" name="title" value="{{ $post->title }}">
    <textarea name="content">{{ $post->content }}</textarea>
    <button type="submit">Update Post</button>
</form>