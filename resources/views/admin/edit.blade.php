<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Registration</title>

    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        label {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        input {
            padding: 5px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
            width: 250px;
        }

        button[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="{{route('users.update', $user->id)}}" method="POST">

        @csrf
    
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $user->name}}"><br>
    
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"  value="{{ $user->email}}"><br>
    
      

        <label for="password">Phone:</label>
        <input type="number" id="phone" name="phone" value="{{ $user->phone}}"><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ $user->address}}"><br>
    
        <button type="submit">Submit</button>
    </form>
</body>
</html>
