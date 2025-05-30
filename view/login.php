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
      background: linear-gradient(120deg, #3498db, #8e44ad);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #333;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      color: #555;
    }

    .form-group input {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      transition: border-color 0.3s;
    }

    .form-group input:focus {
      border-color: #3498db;
      outline: none;
    }

    .login-button {
      width: 100%;
      padding: 0.75rem;
      border: none;
      background: #3498db;
      color: white;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-button:hover {
      background: #2980b9;
    }

    .bottom-text {
      text-align: center;
      margin-top: 1rem;
      color: #666;
      font-size: 0.9rem;
    }

    .bottom-text a {
      color: #3498db;
      text-decoration: none;
    }

    .bottom-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form>
      <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" placeholder="ejemplo@correo.com" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" placeholder="********" required>
      </div>
      <button type="submit" class="login-button">Entrar</button>
    </form>
    <div class="bottom-text">
      ¿No tienes cuenta? <a href="#">Regístrate</a>
    </div>
  </div>

</body>
</html>
