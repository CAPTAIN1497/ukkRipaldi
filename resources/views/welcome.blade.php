<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Penjualan Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 100%;
            max-width: 420px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            background-color: white;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        .card img {
            width: 80px;
            margin-bottom: 1rem;
        }

        .card h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .card p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 2rem;
        }

        .card .btn {
            width: 100%;
            padding: 0.8rem;
            font-size: 1.1rem;
            border-radius: 30px;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .btn-login {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-login:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-register {
            background-color: #28a745;
            color: white;
            border: none;
            margin-top: 1rem;
        }

        .btn-register:hover {
            background-color: #1e7e34;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Selamat Datang</h1>
        <p>Silakan Login atau Register untuk melanjutkan</p>
        <a href="{{ route('login') }}" class="btn btn-login">Login</a>
        <a href="{{ route('register') }}" class="btn btn-register">Register</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>