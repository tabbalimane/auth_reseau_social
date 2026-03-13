<style>
body{
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg,#ff9a9e,#fad0c4);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    margin:0;
}
h2{text-align:center;color:white;margin-bottom:20px;}
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
    border-color:#ff758c;
    outline:none;
}
button{
    padding:12px;
    background:#ff758c;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}
button:hover{
    background:#e84363;
}
.error{
    color:red;
    font-weight:bold;
    text-align:center;
}
</style>





<form method="POST" action="/register">
@csrf

<input type="text" name="name" placeholder="Name">
<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password">

<button type="submit">Register</button>

        <!-- Errors -->
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror
</form>