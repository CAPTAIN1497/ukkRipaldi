<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Penjualan Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            background-color: white;
            text-align: center;
            animation: fadeIn 1s ease;
        }

        .card h2 {
            color: #343a40;
            margin-bottom: 1rem;
        }

        .input-group-text {
            background-color: #6a11cb;
            color: white;
            border: none;
        }

        .btn-register {
            background-color: #28a745;
            color: white;
            border: none;
            width: 100%;
            padding: 0.75rem;
            font-size: 1.1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background-color: #1e7e34;
        }

        .link-login {
            display: block;
            margin-top: 1rem;
            color: #007bff;
            text-decoration: none;
        }

        .link-login:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required>
            </div>
            <button type="submit" class="btn btn-register">Register</button>
        </form>
        <a href="{{ route('login') }}" class="link-login">Sudah punya akun? Login</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
