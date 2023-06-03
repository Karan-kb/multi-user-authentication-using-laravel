<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Details</title>
    
    <!-- Add CSS styles -->
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    </head>
    <body>
    
    </body>
    <table>
    <thead>
    <tr>
    <th>Name</th>
    <th>Email</th>
     <th>Phone</th>
    <th>Address</th>
    {{--<th>Balance</th> --}}
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @if(isset($users))
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                     <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td> 
                    <td>
                        @foreach($wallets as $wallet)
                            @if($wallet->user_id == $user->id)
                                {{$wallet->balance}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form> 
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="edit-button" style="display: inline-block;">Edit</a>
                    </td> 
                </tr>
            @endforeach
        @endif
        </tbody>
        
    </table>
    
    </html>
    </x-app-layout>