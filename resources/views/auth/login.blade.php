<h2>Login</h2>

<form method="POST" action="/login">

@csrf

<input type="email" name="email" placeholder="email">

<input type="password" name="password" placeholder="password">

<button type="submit">Login</button>

</form>