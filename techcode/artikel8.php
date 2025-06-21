$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';
$loggedIn = isset($_SESSION['user']); // Check login status
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pengembangan Game dengan Unity - TechCode</title>
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
    <h1>Pengenalan Game Development</h1>
    <img src="thumbnail8.jpg" alt="Thumbnail Game Development" class="thumbnail">
    <p>Game development adalah proses pembuatan video game yang melibatkan berbagai disiplin ilmu seperti pemrograman, desain grafis, cerita, musik, dan interaksi pengguna. Industri game terus berkembang pesat dan menawarkan banyak peluang karier.</p>

    <h2>1. Peran dalam Game Development</h2>
    <ul>
      <li><strong>Game Designer</strong> – membuat konsep, mekanik, dan pengalaman bermain</li>
      <li><strong>Programmer</strong> – menulis kode untuk logika dan interaksi game</li>
      <li><strong>Artist</strong> – membuat aset visual seperti karakter, lingkungan, dan UI</li>
      <li><strong>Composer</strong> – menciptakan musik dan efek suara</li>
    </ul>

    <h2>2. Tools yang Umum Digunakan</h2>
    <ul>
      <li><strong>Unity</strong> – engine populer dengan C#</li>
      <li><strong>Unreal Engine</strong> – engine grafis tinggi dengan C++ dan Blueprints</li>
      <li><strong>Godot</strong> – engine ringan dan open source</li>
      <li><strong>Blender</strong> – untuk membuat model dan animasi 3D</li>
    </ul>

    <h2>3. Bahasa Pemrograman dalam Game</h2>
    <ul>
      <li><strong>C#</strong> – digunakan di Unity</li>
      <li><strong>C++</strong> – umum digunakan di Unreal Engine</li>
      <li><strong>GDScript</strong> – digunakan di Godot</li>
      <li><strong>JavaScript/HTML5</strong> – untuk game berbasis web</li>
    </ul>

    <h2>4. Proses Pembuatan Game</h2>
    <ol>
      <li>Ide dan Konsep</li>
      <li>Perencanaan dan Desain</li>
      <li>Pembuatan Prototipe</li>
      <li>Pengembangan Game (Programming, Art, Sound)</li>
      <li>Testing dan Debugging</li>
      <li>Peluncuran dan Pemasaran</li>
    </ol>

    <h2>5. Tips untuk Pemula</h2>
    <ul>
      <li>Mulai dari proyek kecil seperti game puzzle atau platformer</li>
      <li>Gunakan asset gratis dari internet</li>
      <li>Ikuti tutorial dari YouTube atau platform pembelajaran</li>
      <li>Bergabung dalam komunitas game dev seperti Discord atau Reddit</li>
    </ul>

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