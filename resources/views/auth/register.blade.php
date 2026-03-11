<h2>Register</h2>

<form method="POST" action="/register">
@csrf

<input type="text" name="name" placeholder="name">

<input type="email" name="email" placeholder="email">

<input type="password" name="password" placeholder="password">

<button type="submit">Register</button>

</form>