<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit profile</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <h2>Edit A Form</h2><br/>
    <form method="post" action="{{action('UtilisateurController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value="{{$utilisateur->first_name}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{$utilisateur->last_name}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" value="{{$utilisateur->username}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="password">Password:</label>
                <input type="text" class="form-control" name="password" value="{{$utilisateur->password}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{$utilisateur->email}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>