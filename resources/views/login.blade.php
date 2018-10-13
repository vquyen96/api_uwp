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
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            </div>
            <input type="text" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
            </div>
            <input type="text" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <button type="button" class="btn btn-primary btn-lg btn-block">SEND</button>

    </form>

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    var url = $('.currentUrl').text();
    $("button").click(function(){
        var data = {

            password: $('input[name="password"]').val(),
            email: $('input[name="email"]').val()

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
            url: url+"api/login",
            headers: {
                'Authorization':'03213213223123231321',
            },
            data: data,
            success: function(resp){
                localStorage.setItem("token", resp.token);
                console.log(resp);
            }});
    });
</script>



</body>
</html>