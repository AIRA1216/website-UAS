$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';
$loggedIn = isset($_SESSION['user']); // Check login status
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kecerdasan Buatan di Dunia Nyata - TechCode</title>
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
      font-size: 1.5rem; ```php
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
    <h1>Kecerdasan Buatan di Dunia Nyata</h1>
    <img src="thumbnail9.jpg" alt="Thumbnail Kecerdasan Buatan di Dunia Nyata" class="thumbnail">
    <p><strong>Kecerdasan Buatan (AI)</strong> bukan lagi hanya fiksi ilmiah. Kini, teknologi ini sudah banyak digunakan dalam kehidupan sehari-hari, mulai dari aplikasi yang kita gunakan hingga perangkat rumah tangga pintar.</p>

    <h2>1. Penggunaan AI dalam Kehidupan Sehari-hari</h2>
    <ul>
      <li><strong>Asisten Virtual:</strong> Seperti Siri, Google Assistant, dan Alexa yang membantu mencari informasi atau menjalankan perintah suara.</li>
      <li><strong>Rekomendasi Konten:</strong> YouTube, Netflix, dan Spotify menggunakan AI untuk memberikan rekomendasi konten berdasarkan preferensi pengguna.</li>
      <li><strong>Smart Home:</strong> AI mengontrol lampu, suhu ruangan, hingga keamanan rumah.</li>
      <li><strong>Chatbot:</strong> Digunakan di layanan pelanggan untuk merespon pertanyaan pengguna dengan cepat.</li>
    </ul>

    <h2>2. AI dalam Dunia Industri</h2>
    <p>AI digunakan dalam berbagai bidang industri seperti:</p>
    <ul>
      <li><strong>Kesehatan:</strong> Mendeteksi penyakit melalui citra medis dan membantu dokter dalam diagnosis.</li>
      <li><strong>Transportasi:</strong> Mobil otonom seperti Tesla yang dapat mengemudi sendiri.</li>
      <li><strong>Pertanian:</strong> Mengelola irigasi dan memantau pertumbuhan tanaman secara otomatis.</li>
      <li><strong>Keuangan:</strong> Mendeteksi penipuan dan mengelola investasi secara cerdas.</li>
    </ul>

    <h2>3. Tantangan dan Etika AI</h2>
    <p>Meski memiliki banyak manfaat, AI juga menimbulkan tantangan, seperti:</p>
    <ul>
      <li>Potensi kehilangan pekerjaan karena otomatisasi</li>
      <li>Privasi data pengguna</li>
      <li>Penggunaan AI dalam senjata atau manipulasi informasi</li>
    </ul>

    <h2>Kesimpulan</h2>
    <p>AI telah dan akan terus menjadi bagian penting dari perkembangan teknologi. Dengan pemahaman dan regulasi yang tepat, AI bisa memberikan manfaat maksimal bagi kehidupan manusia.</p>

    <p><a href="index.php">← Kembali ke Beranda</a></p>
  </main>

  <footer id="kontak">
    &copy; 2025 TechCode. Dibuat dengan semangat belajar dan teknologi.
    <div class="kontak">
      Hubungi kami:
      <a href="[https://mail.google.com/mail/?view=cm&fs=1&to=goemulyo@gmail.com](https://mail.google.com/mail/?view=cm&fs=1&to=goemulyo@gmail.com)">Email</a>
      <a href="[https://wa.me/6285819331636](https://wa.me/6285819331636)">WhatsApp</a>
      <a href="[https://instagram.com/se_se0rang/](https://instagram.com/se_se0rang/)">Instagram</a>
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