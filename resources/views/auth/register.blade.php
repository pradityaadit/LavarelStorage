<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
            text-align: center;
            /* Pusatkan pesan error */
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="nim">NIM:</label>
                <input type="text" name="nim" required>
            </div>

            <div>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" required>
            </div>

            <div>
                <label for="jurusan">Jurusan:</label>
                <input type="text" name="jurusan" required>
            </div>

            <div>
                <label for="no_hp">No HP:</label>
                <input type="text" name="no_hp" required>
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>

            <div>
                <label for="password_confirmation">Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit">Register</button>

            @if($errors->any())
            <div class="error-message">
                <strong>{{ $errors->first() }}</strong>
            </div>
            @endif
        </form>

        <div class="link">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>
    </div>
</body>

</html>