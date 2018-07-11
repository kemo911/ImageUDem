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
        .croppie-container {
            padding: 0px;
        }
        #out-container{
            background: linear-gradient(#d0d0d1, #efefef);
        }
    </style>
</head>
    <body style="font-family: 'Montserrat', sans-serif; height: 100% ; background-color: #efefef;">
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="default_pic" value="{{$png_url}}">
    <div class="container-fluid" style="height: 100%">
        <div class="row" style="height: 100%">
            <div class="col-md-3 hidden-sm-down" style="padding: 0px;">
            </div>
            <div class="col-md-6" style="padding: 0px;">
                <div id="out-container" class="container-fluid" style="width: 100%; height: 100% ;display: table;">
                    <div class="row" style="height: 100%;display: table-row;">
                        <div class="col-md-12" style="display: table-cell;x float: none;vertical-align: middle;">
                            <div align="center">
                                <div id="upload-demo" style="width:250px;"></div><br>
                                <input style="width: 50%;" type="file" id="upload"><br><br>
                                <input style="width: 50%;" class="form-control" type="number" value="{{$user}}" disabled id="ref" placeholder="Reference number"><br>
                                <button style="width: 50%;" class="btn btn-success btn-block upload-result" @if($status == 1) disabled @endif > @if($status == 1) Pending Request @else Update @endif</button><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 hidden-sm-down" style="padding: 0px;">
                <img src="/images/UDEM-pleca.png" class="img-responsive" style="width: 50%; float: right;">
            </div>
        </div>


        <div id="myModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Picture</h5>
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
<script src="{{asset('js/main.js')}}"></script>
</html>
