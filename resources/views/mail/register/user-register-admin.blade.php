<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New User Registration</title>
  <style>
    /* Add your custom styles here */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f8f8;
    }
    .container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      color: #333;
    }
    p {
      color: #666;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>New User Registration</h1>
    <p>Hello Admin,</p>
    <p>A new user has registered on your platform. Below are the details:</p>
    <table>
      <tr>
        <th>User Details</th>
        <th></th>
      </tr>
      
      <tr>
        <td>Name:</td>
        <td>{{$data->name}}</td>
      </tr>
      <tr>
        <td>Email:</td>
        <td>{{$data->email}}</td>
      </tr>
      <tr>
        <td>Phone:</td>
        <td>{{$data->phone_number}}</td>
      </tr>
      <tr>
        <td>Registration Date:</td>
        <td>{{date("d/M/Y",strtotime($data->created_at))}}</td>
      </tr>
    </table>
    <p>Please take necessary actions as required.</p>
    <p>Best regards,<br>
    {{getenv('APP_NAME')}}</p>
  </div>
</body>
</html>
