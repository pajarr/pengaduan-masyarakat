<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="landing/style.css">
</head>
<body>
    <section class="showcase">
        <div class="video-container">
            <video src="https://traversymedia.com/downloads/video.mov" autoplay muted loop></video>
        </div>
        <div class="content">
            <h1>Selamat Datang Pengadu!</h1>
            <h3>Silahkan Login Sebagai:</h3>
            <a href="{{ route('login') }}" class="btn">Admin</a>
            <a href="{{ route('loginPetugas') }}" class="btn">Petugas</a>
            <a href="{{ route('loginMasyarakat') }}" class="btn">Masyarakat</a>
        </div>
    </section>

    <section id="about">
        <h1>About</h1>
        <p>
            Aplikasi Pengaduan Masyarakat adalah aplikasi yang menampung keluhan atau aduan dari masyarakat khususnya untuk warga suka maju bukan untuk suka mundur.
        </p>
    </section>
</body>
</html>