$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';
$loggedIn = isset($_SESSION['user']); // Check login status
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Apa itu HTML, CSS, dan JavaScript? - TechCode</title>
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
    code {
      background: #222;
      padding: 0.2rem 0.4rem;
      border-radius: 4px;
      display: block;
      margin: 1rem 0;
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
    <h1>Apa itu HTML, CSS, dan JavaScript?</h1>
    <img src="thumbnail1.jpg" alt="Thumbnail HTML, CSS, dan JavaScript" class="thumbnail">
    <p><strong>HTML, CSS, dan JavaScript</strong> adalah fondasi utama dalam pengembangan website. Masing-masing memiliki peran penting dalam membuat halaman web yang menarik dan interaktif.</p>

    <h2>1. HTML (HyperText Markup Language)</h2>
    <p>HTML digunakan untuk membuat struktur dasar dari halaman web. Dengan HTML, kita bisa menentukan heading, paragraf, gambar, dan link.</p>
    <pre><code>&lt;h1&gt;Judul Halaman&lt;/h1&gt;

       <h2>2. CSS (Cascading Style Sheets)</h2>
    <p>CSS digunakan untuk mengatur tampilan halaman web seperti warna, layout, dan font. HTML tanpa CSS akan terlihat sangat polos.</p>
    <pre><code>body {
  background-color: black;
  color: white;
}</code></pre>

    <h2>3. JavaScript</h2>
    <p>JavaScript digunakan untuk membuat halaman web menjadi interaktif, seperti tombol yang bisa diklik atau data yang muncul secara dinamis.</p>
    <pre><code>document.getElementById("klik").addEventListener("click", function() {
  alert("Tombol diklik!");
});</code></pre>

    <h2>Kesimpulan</h2>
    <p>HTML, CSS, dan JavaScript bekerja sama untuk membuat website modern. HTML menyusun struktur, CSS mempercantik tampilan, dan JavaScript menambahkan interaktivitas.</p>

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
              // Update navbar and footer if they use dynamic PHP for colors
              document.querySelector('.navbar').style.background = '#000';
              document.querySelector('footer').style.background = '#000';
              document.querySelectorAll('.nav-links a, .nav-links button').forEach(el => el.style.color = '#fff');
              document.querySelector('.logo').style.color = '#f97316'; // Ensure logo color remains
            } else {
              document.body.style.background = '#fff';
              document.body.style.color = '#000';
              // Update navbar and footer if they use dynamic PHP for colors
              document.querySelector('.navbar').style.background = '#eee';
              document.querySelector('footer').style.background = '#eee';
              document.querySelectorAll('.nav-links a, .nav-links button').forEach(el => el.style.color = '#000');
              document.querySelector('.logo').style.color = '#f97316'; // Ensure logo color remains
            }
          })
          .catch(error => console.error('Error toggling theme:', error));
      });
    });
  </script>
</body>
</html>