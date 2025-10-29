<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error 404 - Página no encontrada</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #74b9ff, #a29bfe);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .error-container {
      text-align: center;
      background: white;
      padding: 2.5rem 3.5rem;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      animation: fadeIn 1s ease;
    }

    .error-container h1 {
      font-size: 6rem;
      margin: 0;
      color: #e74c3c;
      animation: bounce 1.5s infinite alternate;
    }

    .error-container p {
      font-size: 1.2rem;
      color: #555;
      margin: 1rem 0 2rem;
    }

    .error-container a {
      display: inline-block;
      text-decoration: none;
      color: white;
      background-color: #3498db;
      padding: 0.8rem 1.8rem;
      border-radius: 10px;
      transition: background 0.3s, transform 0.2s;
      font-weight: bold;
      font-size: 1rem;
    }

    .error-container a:hover {
      background-color: #2980b9;
      transform: translateY(-3px);
    }

    /* Animaciones */
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }

    @keyframes bounce {
      0% { transform: translateY(0); }
      100% { transform: translateY(-10px); }
    }

    /* Responsivo */
    @media (max-width: 600px) {
      .error-container {
        width: 90%;
        padding: 2rem;
      }

      .error-container h1 {
        font-size: 4rem;
      }

      .error-container p {
        font-size: 1rem;
      }
    }
  </style>
</head>

<body>
  <div class="error-container">
    <h1>404</h1>
    <p>Lo sentimos, la página que buscas no existe.</p>
    <a href="login">Volver al inicio</a>
  </div>
</body>
</html>
