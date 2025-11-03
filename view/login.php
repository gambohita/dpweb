<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: linear-gradient(120deg, #4facfe, #00f2fe); /* Degradado azul bonito */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background: white;
      padding: 2.5rem;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      text-align: center;
      animation: fadeIn 1s ease-in-out;
    }

    .login-container img {
      width: 80px;
      margin-bottom: 1rem;
    }

    .login-container h2 {
      margin-bottom: 1.5rem;
      color: #333;
      font-weight: bold;
    }

    .form-group {
      margin-bottom: 1.2rem;
      text-align: left;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.4rem;
      color: #555;
      font-weight: 600;
    }

    .form-group input {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #ccc;
      border-radius: 10px;
      transition: 0.3s;
      font-size: 14px;
    }

    .form-group input:focus {
      border-color: #4facfe;
      box-shadow: 0 0 6px rgba(79, 172, 254, 0.5);
      outline: none;
    }

    .login-button {
      width: 100%;
      padding: 0.8rem;
      border: none;
      background: linear-gradient(135deg, #4facfe, #00f2fe);
      color: white;
      font-weight: bold;
      border-radius: 10px;
      cursor: pointer;
      transition: transform 0.2s, background 0.3s;
      font-size: 15px;
    }

    .login-button:hover {
      transform: scale(1.03);
      background: linear-gradient(135deg, #00c6ff, #0072ff);
    }

    .bottom-text {
      margin-top: 1.2rem;
      color: #666;
      font-size: 0.9rem;
    }

    .bottom-text a {
      color: #0072ff;
      font-weight: bold;
      text-decoration: none;
    }

    .bottom-text a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
  <script>
    const base_url = '<?= BASE_URL; ?>';
  </script>
</head>

<body>

  <div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form id="frm_login">
      <div class="form-group">
        <label for="username">Usuario</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="button" class="login-button" onclick="iniciar_sesion();">Ingresar</button>
    </form>
    <div class="bottom-text">
      ¿No tienes cuenta? <a href="#">Regístrate</a>
    </div>
  </div>

  <script src="<?= BASE_URL; ?>view/function/user.js"></script>
</body>
</html>