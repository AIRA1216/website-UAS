$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';
$loggedIn = isset($_SESSION['user']); // Check login status
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dasar-Dasar Python - TechCode</title>
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
      margin: 0;
      padding: 0;
    }

    .nav-links a, .nav-links button {
      color: <?= $darkMode ? '#fff' : '#000' ?>;
      text-decoration: none;
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1rem;
      transition: color 0.3s;
    }

    .nav-links a:hover, .nav-links button:hover {
      color: #f97316;
    }

    main {
      padding: 2rem;
      max-width: 800px;
      margin: 0 auto;
    }

    h1 {
      color: #f97316;
    }

    a {
      color: #f97316;
      text-decoration: none;
    }

    code {
      background: #222;
      padding: 0.2rem 0.4rem;
      border-radius: 4px;
      display: block;
      margin: 1rem 0;
      white-space: pre-wrap;
      font-family: monospace;
      color: #eee;
    }

    footer {
      background: <?= $darkMode ? '#000' : '#eee' ?>;
      color: <?= $darkMode ? '#fff' : '#000' ?>;
      text-align: center;
      padding: 2rem 1rem;
      margin-top: 4rem;
    }

    .kontak {
      margin-top: 2rem;
    }

    .kontak a {
      margin: 0 0.5rem;
      color: #f97316;
      font-weight: bold;
      text-decoration: none;
    }

    .thumbnail {
      width: 100%;
      max-width: 600px;
      margin: 1rem auto 2rem;
      display: block;
      border-radius: 12px;
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar" role="navigation" aria-label="Main navigation">
      <h1 class="logo">TechCode</h1>
      <ul class="nav-links">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="kontak.php">Kontak</a></li>
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
    <h1>Dasar-Dasar Python</h1>
    <img src="thumbnail3.jpg" alt="Thumbnail Dasar Python" class="thumbnail" />
    <p><strong>Python</strong> adalah bahasa pemrograman tingkat tinggi yang populer karena sintaksnya sederhana, mudah dibaca, dan fleksibel digunakan dalam berbagai bidang seperti pengembangan web, analisis data, kecerdasan buatan, otomasi, dan lainnya.</p>

    <h2>1. Kenapa Memilih Python?</h2>
    <ul>
      <li>Sintaks mudah dipahami bahkan untuk pemula</li>
      <li>Dukungan komunitas yang besar</li>
      <li>Memiliki banyak pustaka (library) dan framework siap pakai</li>
      <li>Cocok untuk banyak bidang: web, data, game, AI, automasi, dsb</li>
    </ul>

    <h2>2. Struktur Program Python</h2>
    <p>Contoh program sederhana untuk mencetak teks ke layar:</p>
    <code>print("Halo, dunia!")</code>

    <h2>3. Variabel dan Tipe Data</h2>
    <p>Python mendukung berbagai tipe data seperti string, integer, float, dan boolean.</p>
    <code>nama = "Ali"
umur = 17
pi = 3.14
aktif = True</code>

    <h2>4. Operasi Dasar</h2>
    <code>a = 10
b = 3
print(a + b)  # Penjumlahan
print(a * b)  # Perkalian
print(a / b)  # Pembagian</code>

    <h2>5. Percabangan dan Perulangan</h2>
    <code>if umur >= 17:
  print("Sudah cukup umur")
else:
  print("Belum cukup umur")

for i in range(5):
  print(i)</code>

    <h2>6. Fungsi</h2>
    <code>def sapa(nama):
  print(f"Halo, {nama}!")

sapa("Ali")</code>

    <h2>7. Struktur Data: List dan Dictionary</h2>
    <code>buah = ["apel", "jeruk", "pisang"]
print(buah[1])  # Output: jeruk

siswa = {"nama": "Ali", "umur": 17}
print(siswa["nama"])</code>

    <h2>8. Pustaka Populer di Python</h2>
    <ul>
      <li><strong>NumPy</strong> dan <strong>Pandas</strong> untuk data science</li>
      <li><strong>Flask</strong> dan <strong>Django</strong> untuk web</li>
      <li><strong>Matplotlib</strong> untuk visualisasi data</li>
      <li><strong>TensorFlow</strong> dan <strong>scikit-learn</strong> untuk machine learning</li>
    </ul>

    <h2>Kesimpulan</h2>
    <p>Dengan mempelajari dasar-dasar Python, kamu bisa mulai membuat berbagai macam proyek, dari yang sederhana hingga kompleks. Python adalah gerbang masuk yang sangat bagus ke dunia pemrograman modern.</p>

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