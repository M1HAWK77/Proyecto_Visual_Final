
<!DOCTYPE html>
<html>
<head>
    <title>Capture webcam image with php and jquery - ItSolutionStuff.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>

    <script src="JqueryLib.js"></script>

</head>

<body>

<div class="container">
    <h1 class="text-center">Capturar Imagen</h1>
    <div class="col-md-2">
        <a href="docentes.php" class="btn btn-primary btn-block mb-3">Regresar</a>
    </div>
    <br><br><br><br>
    
    <form method="POST" action="takePictureDocente.php">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type="hidden" name="image" class="image-tag">
                <input class="btn btn-outline-info" type=button value="Take Snapshot" onClick="take_snapshot()">
                <button class="btn btn-outline-success" id="foto">Submit</button>
            </div>
            <div class="col-md-6">
                <div id="results">La imagen se cargara aqui</div>
            </div>

        </div>
    </form>
</div>

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach( '#my_camera' );

    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            //var dir=document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            
        } );
    }
</script>

</body>
</html>