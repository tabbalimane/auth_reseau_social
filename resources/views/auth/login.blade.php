<style>
/* ===== Login Form ===== */
form {
    background-color: #fff;
    max-width: 400px;
    margin: 60px auto;
    padding: 25px 20px;
    border-radius: 10px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Inputs */
form input[type="email"],
form input[type="password"] {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 15px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 16px;
    color: #1f2937;
}

/* Submit Button */
form button {
    width: 100%;
    padding: 10px 0;
    background-color: #3b82f6; /* bleu login */
    color: #fff;
    font-weight: bold;
    font-size: 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s;
}

form button:hover {
    background-color: #2563eb;
}

/* Message Under Form */
.message {
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
    color: #6b7280;
}

.message a {
    color: #3b82f6;
    text-decoration: none;
    font-weight: 500;
}

.message a:hover {
    text-decoration: underline;
}
</style>
<form method="POST" action="/login">

@csrf

<input type="email" name="email" placeholder="email">

<input type="password" name="password" placeholder="password">

<button type="submit">Login</button>
<p class="message">
    Pas encore de compte ? 
    <a href="/register">Inscrivez-vous ici</a>
</p>

</form>