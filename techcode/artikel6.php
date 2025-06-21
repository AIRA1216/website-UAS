$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';
$loggedIn = isset($_SESSION['user']); // Check login status
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bel ajar JavaScript Asynchronous - TechCode</title>
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
    <h1>Belajar JavaScript Asynchronous</h1>
    <img src="thumbnail6.jpg" alt="Thumbnail JavaScript Asynchronous" class="thumbnail">
    <p>JavaScript bersifat asynchronous secara alami, yang berarti dapat menjalankan kode tanpa harus menunggu perintah sebelumnya selesai. Ini sangat berguna dalam pengembangan web modern, terutama saat berinteraksi dengan API atau menunggu respons dari server.</p>

    <h2>1. Callback</h2>
    <p>Callback adalah fungsi yang dijalankan setelah fungsi lain selesai.</p>
    <code>
function prosesData(callback) {
  setTimeout(() => {
    console.log("Memproses data...");
    callback();
  }, 2000);
}

prosesData(() => console.log("Selesai!"));
    </code>

    <h2>2. Promise</h2>
    <p>Promise memberikan cara yang lebih bersih untuk menangani operasi asynchronous.</p>
    <code>
const ambilData = new Promise((resolve, reject) => {
  let sukses = true;
  setTimeout(() => {
    if (sukses) resolve("Data berhasil diambil");
    else reject("Gagal mengambil data");
  }, 2000);
});

ambilData
  .then(response => console.log(response))
  .catch(error => console.log(error));
    </code>

    <h2>3. Async / Await</h2>
    <p>Async/Await adalah cara modern dan lebih sederhana dalam menulis kode asynchronous.</p>
    <code>
async function ambilData() {
  try {
    const hasil = await fetch("https://api.example.com/data");
    const data = await hasil.json();
    console.log(data);
  } catch (error) {
    console.log("Terjadi kesalahan:", error);
  }
}

ambilData();
    </code>

    <h2>Kesimpulan</h2>
    <p>Memahami konsep asynchronous sangat penting untuk menjadi JavaScript developer yang handal. Callback, Promise, dan Async/Await adalah tiga pendekatan utama yang bisa kamu pelajari dan terapkan dalam proyek nyata.</p>

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