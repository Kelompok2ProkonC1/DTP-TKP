<!DOCTYPE html>
<html>
<head>
    <title>Pengumuman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        .announcement {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .label {
            font-weight: bold;
            display: inline-block;
            width: 72px;
        }

        .field {
            background-color: #fff;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>DTP-TKP Account</h2>
        <div class="announcement">
            <p>Hallo!</p>
            <p>Akun Anda telah berhasil didaftarkan ke aplikasi DTP-TKP.</p><br>
            <p>Berikut detail akun Anda :</p>
            <div class="field">
                <p><span class="label">E-Mail</span>   : {{ $email }}</p>
                <p><span class="label">Password</span>  : {{ $password }}</p>
             </div><br>
            <p>Terima kasih!</p>
            <p>Salam,<br>Admin</p>
        </div>
    </div>
</body>
</html>
