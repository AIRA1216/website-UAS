$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';
$loggedIn = isset($_SESSION['user']); // Check login status
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Internet of Things (IoT) untuk Pemula - TechCode</title>
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
    <h1>Internet of Things (IoT) untuk Pemula</h1>
    <img src="thumbnail5.jpg" alt="Thumbnail Internet of Things" class="thumbnail">
    <p><strong>Internet of Things (IoT)</strong> adalah konsep di mana objek fisik dilengkapi dengan sensor, perangkat lunak, dan teknologi lainnya untuk saling terhubung dan bertukar data melalui internet.</p>

    <h2>1. Apa itu IoT?</h2>
    <p>IoT mencakup segala sesuatu yang terhubung ke internet, tetapi secara khusus digunakan untuk menggambarkan perangkat yang "berbicara" satu sama lain.</p>

    <h2>2. Contoh Penerapan IoT</h2>
    <ul>
      <li>Smart home: lampu, AC, dan kamera CCTV yang dikendalikan dari ponsel</li>
      <li>Smart agriculture: sensor tanah dan kelembapan untuk memantau kondisi tanaman</li>
      <li>Smart health: smartwatch yang memantau detak jantung dan langkah kaki</li>
    </ul>

    <h2>3. Komponen Utama IoT</h2>
    <ul>
      <li><strong>Sensor</strong>: Mengumpulkan data lingkungan (suhu, kelembapan, gerakan, dsb)</li>
      <li><strong>Perangkat Konektivitas</strong>: Mengirim data ke cloud (WiFi, Bluetooth, LoRa)</li>
      <li><strong>Platform</strong>: Menyimpan dan memproses data (cloud, server, aplikasi)</li>
    </ul>

    <h2>4. Platform Pengembangan IoT</h2>
    <ul>
      <li><strong>Arduino</strong>: Board mikrokontroler yang mudah diprogram</li>
      <li><strong>ESP8266 / ESP32</strong>: Modul WiFi murah dan handal</li>
      <li><strong>Raspberry Pi</strong>: Komputer mini yang bisa menjalankan sistem operasi</li>
    </ul>

    <h2>5. Tantangan IoT</h2>
    <ul>
      <li>Keamanan data dan privasi</li>
      <li>Kompatibilitas antar perangkat</li>
      <li>Pengelolaan data besar (big data)</li>
    </ul>

    <h2>Kesimpulan</h2>
    <p>IoT membuka banyak peluang di masa depan, baik untuk solusi sehari-hari maupun industri. Bagi pemula, memulai dengan proyek sederhana seperti monitoring suhu atau kontrol lampu pintar bisa menjadi awal yang menarik.</p>

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