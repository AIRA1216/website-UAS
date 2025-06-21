$loggedIn = isset($_SESSION['user']);
$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';

$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_submit'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Load users from JSON file
    $users_json = file_get_contents('users.json');
    $users = json_decode($users_json, true);

    $authenticated = false;
    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) { //
            $_SESSION['user'] = $username;
            $authenticated = true;
            break;
        }
    }

    if ($authenticated) {
        header('Location: index.php'); // Redirect to homepage or dashboard
        exit;
    } else {
        $login_error = 'Username atau password salah.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teknologi & Coding</title>
  <style>
    :root {
      --bg: <?= $darkMode ? '#111' : '#fff' ?>;
      --text: <?= $darkMode ? '#fff' : '#000' ?>;
      --accent: #f97316;
    }
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: var(--bg) url('images.png') no-repeat center center fixed;
      background-size: cover; /* Ensure background image covers the area */
      color: var(--text);
      transition: background 0.3s, color 0.3s;
    }
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background: <?= $darkMode ? '#000' : '#eee' ?>; /* Dynamic navbar background */
      position: sticky;
      top: 0;
      z-index: 10;
    }
    .logo {
      color: var(--accent);
      font-size: 1.5rem;
      font-weight: bold;
    }
    .nav-links {
      list-style: none;
      display: flex;
      gap: 1rem;
      align-items: center;
    }
    .nav-links a, .nav-links button {
      color: <?= $darkMode ? '#fff' : '#000' ?>; /* Dynamic nav link color */
      text-decoration: none;
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1rem;
      transition: color 0.3s;
    }
    .nav-links a:hover, .nav-links button:hover {
      color: var(--accent);
    }
    .hero {
      padding: 4rem 2rem;
      text-align: center;
    }
    .blog-section, .kontak-section, .login-section {
      padding: 2rem;
    }
    .blog-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 1.5rem;
    }
    .blog-card {
      background: <?= $darkMode ? '#1a1a1a' : '#f0f0f0' ?>; /* Dynamic blog card background */
      border-radius: 12px;
      padding: 1rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.3);
      transition: transform 0.3s;
    }
    .blog-card:hover {
      transform: scale(1.02);
    }
    .blog-card img {
      max-width: 100%;
      border-radius: 10px;
    }
    .kontak-links a {
      display: inline-block;
      margin-right: 1rem;
      padding: 0.5rem 1rem;
      border: 1px solid var(--accent);
      color: var(--accent);
      border-radius: 8px;
      text-decoration: none;
      transition: background 0.3s;
    }
    .kontak-links a:hover {
      background: var(--accent);
      color: #000;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      max-width: 300px;
      margin: 0 auto; /* Center the form */
    }
    input, button {
      padding: 0.5rem;
      border: none;
      border-radius: 8px;
    }
    input {
      background: <?= $darkMode ? '#222' : '#ddd' ?>; /* Dynamic input background */
      color: <?= $darkMode ? '#fff' : '#000' ?>; /* Dynamic input text color */
    }
    button {
      background: var(--accent);
      color: #000;
      cursor: pointer;
    }
    footer {
      text-align: center;
      padding: 1rem;
      background: <?= $darkMode ? '#000' : '#eee' ?>; /* Dynamic footer background */
      font-size: 0.9rem;
      color: <?= $darkMode ? '#fff' : '#000' ?>; /* Dynamic footer text color */
    }
    .error-message {
        color: red;
        margin-top: 0.5rem;
        text-align: center;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const toggle = document.getElementById('toggle-dark');
      toggle.addEventListener('click', () => {
        fetch('toggle_theme.php') // A new PHP file to handle theme toggle
          .then(response => response.json())
          .then(data => {
            const root = document.documentElement;
            if (data.theme === 'dark') {
              root.style.setProperty('--bg', '#111');
              root.style.setProperty('--text', '#fff');
              document.body.style.background = '#111 url(\'images.png\') no-repeat center center fixed';
              document.querySelector('.navbar').style.background = '#000';
              document.querySelector('footer').style.background = '#000';
              document.querySelectorAll('.nav-links a, .nav-links button').forEach(el => el.style.color = '#fff');
              document.querySelectorAll('input').forEach(el => { el.style.background = '#222'; el.style.color = '#fff'; });
              document.querySelectorAll('.blog-card').forEach(el => el.style.background = '#1a1a1a');
            } else {
              root.style.setProperty('--bg', '#fff');
              root.style.setProperty('--text', '#000');
              document.body.style.background = '#fff url(\'images.png\') no-repeat center center fixed';
              document.querySelector('.navbar').style.background = '#eee';
              document.querySelector('footer').style.background = '#eee';
              document.querySelectorAll('.nav-links a, .nav-links button').forEach(el => el.style.color = '#000');
              document.querySelectorAll('input').forEach(el => { el.style.background = '#ddd'; el.style.color = '#000'; });
              document.querySelectorAll('.blog-card').forEach(el => el.style.background = '#f0f0f0');
            }
            document.body.style.backgroundSize = 'cover'; // Apply cover after changing background
          })
          .catch(error => console.error('Error toggling theme:', error));
      });
    });
  </script>
</head>
<body>
  <header>
    <nav class="navbar">
      <h1 class="logo">TechCode</h1>
      <ul class="nav-links">
        <li><a href="#">Beranda</a></li>
        <li><a href="#blog">Blog</a></li>
        <li><a href="#kontak">Kontak</a></li>
        <?php if ($loggedIn): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="#login">Login</a></li>
        <?php endif; ?>
        <li><button id="toggle-dark">🌓</button></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="hero">
      <h2>Selamat Datang di Dunia Teknologi & Coding</h2>
      <p>Temukan informasi menarik seputar pemrograman, AI, IoT, dan lainnya.</p>
    </section>

    <section id="blog" class="blog-section">
      <h2>Artikel Terbaru</h2>
      <div class="blog-list">
        <?php
        $artikel = [
          ["thumbnail1.jpg", "artikel1.php", "Apa itu HTML, CSS, dan JavaScript?", "Pengenalan dasar-dasar web programming untuk pemula."],
          ["thumbnail2.jpg", "artikel2.php", "Belajar AI & Machine Learning", "Langkah awal memahami cara kerja kecerdasan buatan."],
          ["thumbnail3.jpg", "artikel3.php", "Dasar-Dasar Python", "Mengenal sintaks dan konsep utama dalam bahasa Python."],
          ["thumbnail4.jpg", "artikel4.php", "Cara Membuat Website Responsif", "Teknik CSS dan HTML untuk tampilan yang menyesuaikan semua perangkat."],
          ["thumbnail5.jpg", "artikel5.php", "Internet of Things (IoT) untuk Pemula", "Pengenalan konsep dan implementasi IoT dalam kehidupan sehari-hari."],
          ["thumbnail6.jpg", "artikel6.php", "Belajar JavaScript Asynchronous", "Penjelasan async/await dan penggunaan API modern."],
          ["thumbnail7.jpg", "artikel7.php", "Apa Itu Git dan GitHub?", "Alat penting untuk kolaborasi dan manajemen versi dalam proyek coding."],
          ["thumbnail8.jpg", "artikel8.php", "Pengembangan Game dengan Unity", "Langkah awal membuat game 2D/3D dengan Unity Engine."],
          ["thumbnail9.jpg", "artikel9.php", "Kecerdasan Buatan di Dunia Nyata", "Aplikasi AI dalam industri kesehatan, pendidikan, dan transportasi."],
          ["thumbnail10.jpg", "artikel10.php", "Belajar React JS untuk Pemula", "Panduan awal membangun antarmuka web interaktif dengan React."]
        ];

        foreach ($artikel as $data) {
          echo '
          <article class="blog-card">
            <img src="'.$data[0].'" alt="Thumbnail Artikel">
            <h3><a href="'.$data[1].'">'.$data[2].'</a></h3>
            <p>'.$data[3].'</p>
          </article>';
        }
        ?>
      </div>
    </section>

    <section id="kontak" class="kontak-section">
      <h2>Hubungi Kami</h2>
      <div class="kontak-links">
        <a href="[https://mail.google.com/mail/?view=cm&fs=1&to=goemulyo@gmail.com](https://mail.google.com/mail/?view=cm&fs=1&to=goemulyo@gmail.com)">Email</a>
        <a href="[https://wa.me/6285819331636](https://wa.me/6285819331636)">WhatsApp</a>
        <a href="[https://instagram.com/se_se0rang/](https://instagram.com/se_se0rang/)">Instagram</a>
      </div>
    </section>

    <section id="login" class="login-section">
      <h2>Login Member</h2>
      <form method="post" action="index.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login_submit">Login</button>
        <?php if ($login_error): ?>
            <p class="error-message"><?= $login_error ?></p>
        <?php endif; ?>
      </form>
      <p>Belum punya akun? <a href="Registrasi.php">Daftar di sini</a></p>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Teknologi & Coding. Dibuat dengan semangat .</p>
  </footer>
</body>
</html>