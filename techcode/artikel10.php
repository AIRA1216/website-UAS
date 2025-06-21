$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';
$loggedIn = isset($_SESSION['user']); // Check login status
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Belajar React JS untuk Pemula - TechCode</title>
  <style>
    /* Inline CSS styles */
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: <?= $darkMode ? '#111' : '#fff' ?>;
      color: <?= $darkMode ? '#fff' : '#000' ?>;
      line-height: 1.6;
      padding-bottom: 6rem;
    }
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background: <?= $darkMode ? '#000' : '#eee' ?>;
      position: sticky;
      top: 0;
      z-index: 10;
    }
    .logo {
      color: #f97316;
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
      color: <?= $darkMode ? '#fff' : '#000' ?>;
      text-decoration: none;
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1rem;
    }
    .nav-links a:hover, .nav-links button:hover {
      color: #f97316;
    }
    main {
      padding: 2rem;
    }
    h1 {
      color: #f97316;
    }
    a {
      color: #f97316;
      text-decoration: none;
    }
    footer {
      background: <?= $darkMode ? '#000' : '#eee' ?>;
      color: <?= $darkMode ? '#fff' : '#000' ?>;
      text-align: center;
      padding: 2rem 1rem;
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar">
      <h1 class="logo">TechCode</h1>
      <ul class="nav-links">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="#kontak">Kontak</a></li>
        <?php if ($loggedIn): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="index.php#login">Login</a></li>
        <?php endif; ?>
        <li><button id="toggle-dark">🌓</button></li>
      </ul>
    </nav>
  </header>

  <main>
    <h1>Belajar React JS untuk Pemula</h1>
    <img src="thumbnail10.jpg" alt="Thumbnail React JS" class="thumbnail">
    <p><strong>React JS</strong> adalah library JavaScript yang digunakan untuk membangun antarmuka pengguna (UI) secara efisien dan deklaratif. React sangat populer di kalangan developer web karena kemudahan penggunaannya dan performa tinggi yang dimilikinya.</p>

    <h2>1. Apa itu React?</h2>
    <p>React dikembangkan oleh Facebook dan bersifat open-source. React memungkinkan kita membangun UI dengan komponen yang dapat digunakan ulang (reusable components).</p>

    <h2>2. Instalasi React</h2>
    <p>React dapat dijalankan dengan menggunakan <code>create-react-app</code>:</p>
    <code>npx create-react-app nama-aplikasi
cd nama-aplikasi
npm start</code>

    <h2>3. Struktur Folder Project</h2>
    <ul>
      <li><code>public/</code>: berisi file statis</li>
      <li><code>src/</code>: tempat komponen dan logika aplikasi</li>
      <li><code>App.js</code>: komponen utama aplikasi</li>
    </ul>

    <h2>4. Komponen React</h2>
    <p>Komponen bisa ditulis dalam bentuk function component:</p>
    <code>function Hello() {
  return &lt;h1&gt;Halo Dunia!&lt;/h1&gt;;
}</code>

    <h2>5. JSX</h2>
    <p>JSX adalah ekstensi sintaks JavaScript yang memungkinkan kita menulis HTML di dalam JavaScript.</p>
    <code>const elemen = &lt;h2&gt;Ini JSX&lt;/h2&gt;;</code>

    <h2>6. Props dan State</h2>
    <p><strong>Props</strong> digunakan untuk mengirim data antar komponen, sedangkan <strong>state</strong> digunakan untuk menyimpan data lokal komponen.</p>

    <h2>7. Manajemen State Lanjutan</h2>
    <p>Untuk aplikasi besar, kita bisa menggunakan state management seperti Context API atau Redux.</p>

    <h2>Kesimpulan</h2>
    <p>React JS merupakan alat yang sangat powerful untuk membangun aplikasi web modern. Dengan memahami dasar-dasarnya, kamu sudah bisa mulai membuat aplikasi interaktif dengan tampilan profesional.</p>

    <p><a href="index.php">← Kembali ke Beranda</a></p>
  </main>

  <footer id="kontak">
    &copy; 2025 TechCode. Dibuat dengan semangat belajar dan teknologi.
    <div class="kontak">
      Hubungi kami:
      <a href="https://mail.google.com/mail/?view=cm&fs=1&to=goemulyo@gmail.com">Email</a>
      <a href="https://wa.me/6285819331636">WhatsApp</a>
      <a href="https://instagram.com/se_se0rang/">Instagram</a>
    </div>
  </footer>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const toggle = document.getElementById('toggle-dark');
      toggle.addEventListener('click', () => {
        fetch('toggle_theme.php') // A new PHP file to handle theme toggle
          .then(response => response.json())
          .then(data => {
            if (data.theme === 'dark') {
              document.body.style.background = '#111';
              document.body.style.color = '#fff';
              document.querySelector('.navbar').style.background = '#000';
              document.querySelector('footer').style.background = '#000';
              document.querySelectorAll('.nav-links a, .nav-links button').forEach(el => el.style.color = '#fff');
              document.querySelector('.logo').style.color = '#f97316';
            } else {
              document.body.style.background = '#fff';
              document.body.style.color = '#000';
              document.querySelector('.navbar').style.background = '#eee';
              document.querySelector('footer').style.background = '#eee';
              document.querySelectorAll('.nav-links a, .nav-links button').forEach(el => el.style.color = '#000');
              document.querySelector('.logo').style.color = '#f97316';
            }
          })
          .catch(error => console.error('Error toggling theme:', error));
      });
    });
  </script>
</body>
</html>