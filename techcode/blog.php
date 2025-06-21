$loggedIn = isset($_SESSION['user']);
$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Blog - TechCode</title>
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
    <h1>Blog</h1>
    <div class="blog-list">
      <article>
        <h3><a href="artikel1.php">Apa itu HTML, CSS, dan JavaScript?</a></h3>
      </article>
      <article>
        <h3><a href="artikel2.php">Belajar AI & Machine Learning</a></h3>
      </article>
      <article>
        <h3><a href="artikel3.php">Dasar-Dasar Python</a></h3>
      </article>
      <article>
        <h3><a href="artikel4.php">Cara Membuat Website Responsif</a></h3>
      </article>
      <article>
        <h3><a href="artikel5.php">Internet of Things (IoT) untuk Pemula</a></h3>
      </article>
      <article>
        <h3><a href="artikel6.php">Belajar JavaScript Asynchronous</a></h3>
      </article>
      <article>
        <h3><a href="artikel7.php">Apa Itu Git dan GitHub?</a></h3>
      </article>
      <article>
        <h3><a href="artikel8.php">Pengembangan Game dengan Unity</a></h3>
      </article>
      <article>
        <h3><a href="artikel9.php">Kecerdasan Buatan di Dunia Nyata</a></h3>
      </article>
      <article>
        <h3><a href="artikel10.php">Belajar React JS untuk Pemula</a></h3>
      </article>
    </div>
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