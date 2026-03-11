<h2>Create Post</h2>
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <textarea name="content" placeholder="Content"></textarea>
    <button type="submit">Add Post</button>
</form>

<hr>

@foreach($posts as $post)

<p>{{ $post->content }}</p>

@if($post->user_id == session('user_id'))

<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Post</button>
</form>
@endif

<form method="POST" action="/posts/{{ $post->id }}/like">
@csrf
<button>Like</button>
</form>

<hr>

@endforeach