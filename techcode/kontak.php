$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';
$loggedIn = isset($_SESSION['user']); // Check login status

$message_status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // In a real application, you would send an email here or save to a database.
    // For this example, we'll just set a success message.
    if (!empty($name) && !empty($message)) {
        $message_status = '<p style="color: green; text-align: center;">Pesan Anda telah berhasil dikirim. Terima kasih!</p>';
        // Optionally, save to a log file or send an email
        // file_put_contents('contact_messages.log', "Name: $name\nMessage: $message\n---\n", FILE_APPEND);
    } else {
        $message_status = '<p style="color: red; text-align: center;">Harap isi semua kolom formulir.</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kontak - TechCode</title>
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
      max-width: 600px; /* Added max-width for better form layout */
      margin: 0 auto; /* Center the main content */
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
    form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-top: 1.5rem;
    }
    form label {
        margin-bottom: -0.5rem; /* Adjust spacing */
        font-weight: bold;
    }
    form input, form textarea {
        padding: 0.8rem;
        border-radius: 5px;
        border: 1px solid <?= $darkMode ? '#555' : '#ccc' ?>;
        background: <?= $darkMode ? '#222' : '#f0f0f0' ?>;
        color: <?= $darkMode ? '#fff' : '#000' ?>;
        font-size: 1rem;
    }
    form textarea {
        min-height: 120px;
        resize: vertical;
    }
    form button {
        padding: 0.8rem 1.5rem;
        background: #f97316;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: bold;
        transition: background 0.3s;
    }
    form button:hover {
        background: #e0600a;
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
    <h1>Kontak Kami</h1>
    <p>Hubungi kami melalui:</p>
    <div class="kontak-links">
      <a href="[https://mail.google.com/mail/?view=cm&fs=1&to=goemulyo@gmail.com](https://mail.google.com/mail/?view=cm&fs=1&to=goemulyo@gmail.com)">Email</a>
      <a href="[https://wa.me/6285819331636](https://wa.me/6285819331636)">WhatsApp</a>
      <a href="[https://instagram.com/se_se0rang/](https://instagram.com/se_se0rang/)">Instagram</a>
    </div>
    <p>Anda juga dapat mengisi formulir di bawah ini untuk pertanyaan lebih lanjut:</p>
    <?= $message_status ?>
    <form method="post" action="kontak.php">
      <label for="name">Nama:</label>
      <input type="text" id="name" name="name" required>
      <label for="message">Pesan:</label>
      <textarea id="message" name="message" required></textarea>
      <button type="submit">Kirim</button>
    </form>
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
              document.querySelectorAll('form input, form textarea').forEach(el => { el.style.background = '#222'; el.style.borderColor = '#555'; el.style.color = '#fff'; });
              document.querySelector('.logo').style.color = '#f97316';
            } else {
              document.body.style.background = '#fff';
              document.body.style.color = '#000';
              document.querySelector('.navbar').style.background = '#eee';
              document.querySelector('footer').style.background = '#eee';
              document.querySelectorAll('.nav-links a, .nav-links button').forEach(el => el.style.color = '#000');
              document.querySelectorAll('form input, form textarea').forEach(el => { el.style.background = '#f0f0f0'; el.style.borderColor = '#ccc'; el.style.color = '#000'; });
              document.querySelector('.logo').style.color = '#f97316';
            }
          })
          .catch(error => console.error('Error toggling theme:', error));
      });
    });
  </script>
</body>
</html>