<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>
        html{
            height: 100%;
        }
    </style>
</head>
<body style="font-family: 'Montserrat', sans-serif; height: 100% ; background-color: #efefef;">
<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
<div class="container-fluid" style="height: 100%">
    <h3 align="center">Requests</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Old Image</th>
                    <th>New Image</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                    <tr>
                        <td>{{$d->student_id}}</td>
                        <td><img src="/images/profile-{{$d->student_id}}.jpg"></td>
                        <td><img src="/Image_Pending/profile-{{$d->student_id}}.jpg"></td>
                        <td><a href="/action/{{$d->student_id}}/1" class="btn btn-outline-primary">Accept</a></td>
                        <td><a href="/action/{{$d->student_id}}/0" class="btn btn-outline-danger">Reject</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
