$uploadCrop = $('#upload-demo').croppie({
    url: "/images/"+document.getElementById('default_pic').value,
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
    if($(".cr-image").attr('src') == "/images/profile-default.png"){
        alert("Please Insert your Picture");
    }else if(value2 == ""){
        alert("Please Enter your Reference Number");
    }else if(value3 != "000"){
        alert("The Reference Number is Invalid");
    }else if(value2.length != 9){
        alert("The Reference Number is Invalid");
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
        url: "/saveImg",
        dataType: "json",
        data: {
            'img': $('#last_photo').attr('src'),
            'reference': document.getElementById('ref').value,
            '_token': document.getElementById('_token').value
        },
        success: function (data) {
            alert(data.status);
            $('#myModal').modal('toggle');
        }
    })
})