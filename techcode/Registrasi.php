$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$registration_message = ''; // To store feedback messages

if ($submitted) {
    $firstName = htmlspecialchars($_POST['nama-depan'] ?? '');
    $lastName = htmlspecialchars($_$_POST['nama-belakang'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $dob = htmlspecialchars($_POST['tanggal-lahir'] ?? '');
    $username = htmlspecialchars($_POST['username'] ?? '');
    $password = $_POST['password'] ?? ''; // Get raw password for hashing

    // Basic validation
    if (empty($firstName) || empty($lastName) || empty($email) || empty($dob) || empty($username) || empty($password)) {
        $registration_message = '<p style="color: red; text-align: center;">Semua kolom harus diisi.</p>';
    } else {
        $usersFile = 'users.json';
        $users = [];

        // Read existing users from JSON file
        if (file_exists($usersFile) && filesize($usersFile) > 0) {
            $users_json = file_get_contents($usersFile);
            $users = json_decode($users_json, true);
            if ($users === null) {
                $users = []; // Initialize as empty array if JSON is invalid
            }
        }

        // Check if username already exists
        $usernameExists = false;
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                $usernameExists = true;
                break;
            }
        }

        if ($usernameExists) {
            $registration_message = '<p style="color: red; text-align: center;">Username sudah terdaftar. Silakan pilih username lain.</p>';
        } else {
            // Hash the password before saving
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); //

            $newUser = [
                'name_first'    => $firstName,
                'name_last'     => $lastName,
                'email'         => $email,
                'date_of_birth' => $dob,
                'username'      => $username,
                'password'      => $hashedPassword // Store hashed password
            ];

            $users[] = $newUser; // Add new user to the array

            // Save updated users array back to JSON file
            if (file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT))) {
                $registration_message = '<p style="color: green; text-align: center;">Registrasi berhasil! Silakan <a href="index.php#login">Login</a>.</p>';
                // Clear form data after successful submission
                $_POST = array(); // This clears the $_POST array so the form doesn't re-populate
            } else {
                $registration_message = '<p style="color: red; text-align: center;">Terjadi kesalahan saat menyimpan data.</p>';
            }
        }
    }
}

$darkMode = isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark';
$loggedIn = isset($_SESSION['user']); // Check login status
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrasi - TechCode</title>
  <style>
    :root {
      --bg: <?= $darkMode ? '#111' : '#fff' ?>;
      --text: <?= $darkMode ? '#fff' : '#000' ?>;
      --accent: #f97316;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: var(--bg);
      color: var(--text);
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      transition: background 0.3s, color 0.3s;
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
      color: var(--accent);
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
      transition: color 0.3s;
    }

    .nav-links a:hover, .nav-links button:hover {
      color: var(--accent);
    }

    main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }

    .form-container {
      background: <?= $darkMode ? '#1c1c1c' : '#f8f8f8' ?>;
      padding: 2rem;
      border-radius: 10px;
      width: 100%;
      max-width: 450px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    h2 {
      color: var(--accent);
      margin-bottom: 1rem;
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
    }

    input {
      width: 100%;
      padding: 0.6rem;
      border-radius: 5px;
      border: none;
      margin-bottom: 1rem;
      font-size: 1rem;
      background: <?= $darkMode ? '#222' : '#ddd' ?>;
      color: <?= $darkMode ? '#fff' : '#000' ?>;
    }

    button {
      width: 100%;
      padding: 0.7rem;
      background: var(--accent);
      border: none;
      border-radius: 5px;
      color: #000;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background: #fb923c;
    }

    footer {
      text-align: center;
      padding: 1rem;
      background: <?= $darkMode ? '#000' : '#eee' ?>;
      font-size: 0.9rem;
      color: <?= $darkMode ? '#fff' : '#000' ?>;
    }

    .success-box {
      margin-top: 2rem;
      background: <?= $darkMode ? '#222' : '#e6ffe6' ?>;
      padding: 1rem;
      border-radius: 8px;
      border: 1px solid var(--accent);
      color: <?= $darkMode ? '#fff' : '#000' ?>;
    }

    .success-box h3 {
      color: var(--accent);
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar">
      <h1 class="logo">TechCode</h1>
      <ul class="nav-links">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="index.php#blog">Blog</a></li>
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
    <div class="form-container">
      <h2>Registrasi Akun</h2>
      <?= $registration_message ?> <form action="" method="post">
        <label for="nama-depan">Nama Depan</label>
        <input type="text" id="nama-depan" name="nama-depan" value="<?= $_POST['nama-depan'] ?? '' ?>" required />

        <label for="nama-belakang">Nama Belakang</label>
        <input type="text" id="nama-belakang" name="nama-belakang" value="<?= $_POST['nama-belakang'] ?? '' ?>" required />

        <label for="email">Alamat Email</label>
        <input type="email" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required />

        <label for="tanggal-lahir">Tanggal Lahir</label>
        <input type="date" id="tanggal-lahir" name="tanggal-lahir" value="<?= $_POST['tanggal-lahir'] ?? '' ?>" required />

        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= $_POST['username'] ?? '' ?>" required />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />

        <button type="submit">Daftar</button>
      </form>
    </div>
  </main>

  <footer>
    &copy; 2025 Teknologi & Coding. Semua hak dilindungi.
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const toggle = document.getElementById('toggle-dark');
      toggle.addEventListener('click', () => {
        fetch('toggle_theme.php') // A new PHP file to handle theme toggle
          .then(response => response.json())
          .then(data => {
            const root = document.documentElement;
            if (data.theme === 'dark') {
              root.style.setProperty('--bg', '#111');
              root.style.setProperty('--text', '#fff');
              document.body.style.background = '#111';
              document.querySelector('.navbar').style.background = '#000';
              document.querySelector('footer').style.background = '#000';
              document.querySelectorAll('.nav-links a, .nav-links button').forEach(el => el.style.color = '#fff');
              document.querySelectorAll('.form-container input').forEach(el => { el.style.background = '#222'; el.style.color = '#fff'; });
              document.querySelector('.form-container').style.background = '#1c1c1c';
              document.querySelector('.success-box').style.background = '#222';
              document.querySelector('.success-box').style.color = '#fff';
              document.querySelector('.logo').style.color = '#f97316';
            } else {
              root.style.setProperty('--bg', '#fff');
              root.style.setProperty('--text', '#000');
              document.body.style.background = '#fff';
              document.querySelector('.navbar').style.background = '#eee';
              document.querySelector('footer').style.background = '#eee';
              document.querySelectorAll('.nav-links a, .nav-links button').forEach(el => el.style.color = '#000');
              document.querySelectorAll('.form-container input').forEach(el => { el.style.background = '#ddd'; el.style.color = '#000'; });
              document.querySelector('.form-container').style.background = '#f8f8f8';
              document.querySelector('.success-box').style.background = '#e6ffe6';
              document.querySelector('.success-box').style.color = '#000';
              document.querySelector('.logo').style.color = '#f97316';
            }
          })
          .catch(error => console.error('Error toggling theme:', error));
      });
    });
  </script>
</body>
</html>