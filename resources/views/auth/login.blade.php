<style>
body{
    font-family: 'Segoe UI', sans-serif;
    background: white;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    margin:0;
}
.message {
    text-align: center;
    margin-top: 15px;
    font-size: 15px;
    color: #333;
}

.message a {
    color: #764ba2;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s;
}

.message a:hover {
    color: #5a3a8c;
    text-decoration: underline;
}
h2{
    text-align:center;
    color:white;
    margin-bottom:20px;
}
.form-card{
    width:350px;
    background:white;
    padding:30px;
    border-radius:12px;
    display:flex;
    flex-direction:column;
    gap:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}
input, textarea{
    padding:12px;
    border:2px solid #ddd;
    border-radius:8px;
    font-size:15px;
}
input:focus, textarea:focus{
    border-color:#764ba2;
    outline:none;
}
button{
    padding:12px;
    background:#764ba2;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}
button:hover{
    background:#5a3a8c;
}
.error{
    color:red;
    font-weight:bold;
    text-align:center;
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