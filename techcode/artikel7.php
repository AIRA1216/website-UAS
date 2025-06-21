$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';
$loggedIn = isset($_SESSION['user']); // Check login status
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Apa Itu Git dan GitHub? - TechCode</title>
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
    <h1>Apa Itu Git dan GitHub?</h1>
    <img src="thumbnail7.jpg" alt="Thumbnail Git dan GitHub" class="thumbnail">
    <p><strong>Git</strong> adalah sistem kontrol versi (Version Control System) yang digunakan untuk mencatat setiap perubahan yang dilakukan terhadap kode program. Sedangkan <strong>GitHub</strong> adalah layanan berbasis cloud untuk menyimpan dan mengelola proyek Git secara online.</p>

    <h2>1. Kenapa Menggunakan Git?</h2>
    <ul>
      <li>Mencatat histori perubahan kode</li>
      <li>Memudahkan kolaborasi tim</li>
      <li>Menghindari konflik saat bekerja bersama</li>
      <li>Mengembalikan versi sebelumnya dengan mudah</li>
    </ul>

    <h2>2. Dasar Perintah Git</h2>
    <code>
    // Inisialisasi repositori
    $ git init

    // Menambahkan file ke staging
    $ git add nama_file

    // Commit perubahan
    $ git commit -m "Pesan commit"

    // Melihat status repositori
    $ git status
    </code>

    <h2>3. Apa Itu GitHub?</h2>
    <p>GitHub menyediakan tempat untuk menyimpan repositori Git secara online. Fitur-fitur GitHub:</p>
    <ul>
      <li>Hosting proyek</li>
      <li>Kolaborasi tim dengan pull request dan issues</li>
      <li>CI/CD (integrasi dan deployment otomatis)</li>
      <li>Portofolio terbuka bagi developer</li>
    </ul>

    <h2>4. Menghubungkan Git ke GitHub</h2>
    <code>
    // Menambahkan remote repository
    $ git remote add origin https://github.com/username/repo.git

    // Push ke GitHub
    $ git push -u origin master
    </code>

    <h2>Kesimpulan</h2>
    <p>Git dan GitHub adalah kombinasi penting bagi developer modern. Dengan memahaminya, kamu bisa bekerja lebih efisien, terstruktur, dan profesional dalam membangun proyek perangkat lunak.</p>

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