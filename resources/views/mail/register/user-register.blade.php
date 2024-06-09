<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Successful! Welcome to [Your Company/Platform Name]</title>
  <style>
    /* Add your custom styles here */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f8f8;
    }
    .container {
      max-width: 400px;
      margin: 20px auto;
    }
    .card {
      padding: 20px;
      border-radius: 8px;
      background: #eee;
        box-shadow: 7px 8px 6px #d0b7b7;
    }
    h1 {
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
    }
    p {
      color: #666;
      font-size: 16px;
      margin-bottom: 10px;
    }
    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }
    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h1>Registration Successful!</h1>
      <p>Welcome to {{getenv('APP_NAME')}}. We're excited to have you on board!</p>
      <p>Get started by exploring our features and community.</p>
      <p><strong>Next Steps:</strong></p>
      <ul>
        <li>Complete your profile</li>
        <li>Explore our features</li>
        <li>Connect with our community</li>
      </ul>
      <a href="{{url('login')}}" class="btn">Get Started</a>
    </div>
  </div>
</body>
</html>
