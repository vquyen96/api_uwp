<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')|| Admin</title>
    <base href="{{asset('resources/asse/backend')}}/">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



</head>
<body>
<div class="currentUrl" style="display: none;">{{ asset('') }}</div>
<main>
    <form style="width: 300px; margin: 50px auto;">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
            </div>
            <input type="text" name="first_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
            </div>
            <input type="text" name="last_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
            </div>
            <input type="text" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            </div>
            <input type="text" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
            </div>
            <input type="text" name="address" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
            </div>
            <input type="text" name="phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Avatar</span>
            </div>
            <input type="text" name="avatar" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Gender</label>
            </div>
            <select class="custom-select" name="gender" id="inputGroupSelect01">
                <option selected disabled>Choose...</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Birthday</span>
            </div>
            <input type="text" name="birthday" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <button type="button" class="btn btn-primary btn-lg btn-block">SEND</button>

    </form>

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    var url = $('.currentUrl').text();
    var token = localStorage.getItem('token');
    if (token != null){
        $.ajax({
            method: "POST",
            url: url+"api/begin",
            headers: {
                'Token': token
            },
            success: function(resp){
                console.log(resp);
            },
            error: function (resp) {
                console.log(resp.responseText);
            }
        });
    }

    $("button").click(function(){
        var data = {
            first_name: $('input[name="first_name"]').val(),
            last_name: $('input[name="last_name"]').val(),
            password: $('input[name="password"]').val(),
            email: $('input[name="email"]').val(),
            address: $('input[name="address"]').val(),
            phone: $('input[name="phone"]').val(),
            avatar: $('input[name="avatar"]').val(),
            gender: $('select[name="gender"]').val(),
            birthday: $('input[name="birthday"]').val()
        };
        // $.ajax({
        //     method: "GET",
        //     url: url+"api/account",
        //     headers: {
        //         'Authorization':'03213213223123231321',
        //         'X_CSRF_TOKEN':'xxxxxxxxxxxxxxxxxxxx',
        //         'Content-Type':'application/json'
        //     },
        //
        //     success: function(resp){
        //         console.log(resp);
        //     }});
        $.ajax({
            method: "POST",
            url: url+"api/account",
            headers: {
                'Token': token
            },
            data: data,
            success: function(resp){
                console.log(resp);
            },
            error: function(resp){
                console.log(resp.responseText);
            }
        });
    });
</script>



</body>
</html>