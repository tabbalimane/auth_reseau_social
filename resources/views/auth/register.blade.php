<style>
/* ===== Register Form ===== */
form {
    background-color: #fff;
    max-width: 400px;
    margin: 50px auto;
    padding: 25px 20px;
    border-radius: 10px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Inputs */
form input[type="text"],
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
    background-color: #10b981; /* vert register */
    color: #fff;
    font-weight: bold;
    font-size: 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s;
}

form button:hover {
    background-color: #059669;
}

/* Error Messages */
.error {
    color: #ef4444; /* rouge pour les erreurs */
    font-size: 14px;
    margin-bottom: 10px;
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