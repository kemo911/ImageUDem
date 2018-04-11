<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">    <style>
        html{
            background: url('/images/back-APP.jpg');
            background-size: auto;
        }
    </style>
</head>
    <body style="background-color: rgba(255, 255, 255, 0.8); margin-left: 4%; height: auto; width: 90% ; border: 1px;margin-top: 4%;margin-bottom: 1%; border-radius: 12px;">
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="/images/UDEM-pleca.png" class="img-responsive" style="width: 60%; margin: 14%;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div id="upload-demo" style="width:250px; margin-left: 20px;"></div>
                <input style="width: 70%; margin-left: 40px;" type="file" id="upload"><br><br>
                <input style="width: 70%;margin-left: 40px;" class="form-control" type="number" id="ref" placeholder="Reference number"><br>
                <button style="width: 70%;margin-left: 40px;" class="btn btn-success btn-block upload-result">Update</button><br><br>
            </div>
        </div>

        <div id="myModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-7">
                                <p>
                                    Are you sure you want to Update your ID photo ?
                                </p>
                            </div>
                            <div class="col-md-5 confirm_photo">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary submit">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script><script type="text/javascript"></script>
<script>
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        enableResize:true,
        viewport: {
            width: 200,
            height: 300,
            type: 'square'
        },
        boundary: {
            width: 250,
            height: 350
        }
    });


    $('#upload').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });
    $('.upload-result').on('click', function (ev) {
        var value2 = document.getElementById('ref').value;
        var value3 = value2.substr(0,3);
        var vidFileLength = $("#upload")[0].files.length;
        if(vidFileLength === 0){
            alert("No file selected.");
        }else if(value2 == ""){
            alert("Please Enter your Reference Number");
        }else if(value3 != "000"){
            alert("The Reference Number is not valid");
        }else if(value2.length > 9){
            alert("The Reference Number is longer than the expected");
        }else{
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (resp) {
                html = '<img id="last_photo" src="' + resp + '" style="width: 130px; height:180px;" />';
                $(".confirm_photo").html(html);
                $("#myModal").modal();
            });
        }
    });
    
    $(".submit").on('click',function () {
        $.ajax({
            type: "POST",
            url: "{{url("/")}}/saveImg",
            dataType: "json",
            data: {
                'img': $('#last_photo').attr('src'),
                'reference': document.getElementById('ref').value,
                '_token': document.getElementById('_token').value
            },
            success: function (data) {
                alert(data.status);
            }
        })
    })
</script>
</html>
