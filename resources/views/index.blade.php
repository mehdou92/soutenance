<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Created at</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($utilisateurs as $utilisateur)
            <tr>
                <td>{{$utilisateur['id']}}</td>
                <td>{{$utilisateur['first_name']}}</td>
                <td>{{$utilisateur['last_name']}}</td>
                <td>{{$utilisateur['username']}}</td>
                <td>{{$utilisateur['password']}}</td>
                <td>{{$utilisateur['email']}}</td>
                <td>{{$utilisateur['created_at']}}</td>

                <td><a href="{{action('UtilisateurController@edit', $utilisateur['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('UtilisateurController@destroy', $utilisateur['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>