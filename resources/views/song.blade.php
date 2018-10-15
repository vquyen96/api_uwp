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
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
            </div>
            <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
            </div>
            <input type="text" name="description" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Singer</span>
            </div>
            <input type="text" name="singer" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Author</span>
            </div>
            <input type="text" name="author" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Thumbnail</span>
            </div>
            <input type="text" name="thumbnail" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Link</span>
            </div>
            <input type="text" name="link" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            <input type="text" name="id" class="form-control d-none" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <button type="button" class="btn btn-primary btn-lg btn-block create_song">SEND</button>
        <button type="button" class="btn btn-primary btn-lg btn-block my_song">GET MY SONG</button>

    </form>
    <div class="list_song"></div>
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
    $("button.create_song").click(function(){
        var data = {
            name: $('input[name="name"]').val(),
            description: $('input[name="description"]').val(),
            singer: $('input[name="singer"]').val(),
            author: $('input[name="author"]').val(),
            thumbnail: $('input[name="thumbnail"]').val(),
            link: $('input[name="link"]').val()
        };

        $.ajax({
            method: "POST",
            url: url+"api/song",
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
    $("button.my_song").click(function(){

        $.ajax({
            method: "POST",
            url: url+"api/your_song",
            headers: {
                'Token': token
            },
            success: function(resp){
                var content = "<ul>";
                for (var i=0 ;i < resp.length; i++ ){
                    content += "<li style='cursor: pointer' class='detail_song'><span class='song_name mr-2'>"+resp[i].name+"</span> - ";
                    content += "<span class='song_description mr-2'>"+resp[i].description+"</span> - ";
                    content += "<span class='song_singer mr-2'>"+resp[i].singer+"</span> - ";
                    content += "<span class='song_author mr-2'>"+resp[i].author+"</span> - ";
                    content += "<span class='song_thumbnail mr-2'>"+resp[i].thumbnail+"</span> - ";
                    content += "<span class='song_link mr-2'>"+resp[i].link+"</span> - ";
                    content += "<span class='song_id d-none mr-2'>"+resp[i].id+"</span>";
                    content += "</li>";
                }
                content += "</ul>";
                $('.list_song').html(content);
            },
            error: function(resp){
                console.log(resp.responseText);
            }
        });
    });
    $(document).on('click', '.detail_song', function () {
        // console.log($(this).find('.song_name').text());
        $('input[name="name"]').val($(this).find('.song_name').text());
        $('input[name="description"]').val($(this).find('.song_description').text());
        $('input[name="singer"]').val($(this).find('.song_singer').text());
        $('input[name="author"]').val($(this).find('.song_author').text());
        $('input[name="thumbnail"]').val($(this).find('.song_thumbnail').text());
        $('input[name="link"]').val($(this).find('.song_link').text());
        $('input[name="id"]').val($(this).find('.song_id').text());
    });
    // $(".detail_song").click(function(){
    //
    //
    // });
</script>



</body>
</html>