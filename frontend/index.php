<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Image Roasting</title>
    <style>
        #loading {
            display: inline-block;
            transform: translate(-50%, -50%);
            border: 8px solid #1b7aff;
            border-top: 8px solid #ffffff;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            z-index: 9999;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-primary">
    <div class="d-flex justify-content-center" style="margin-top:3rem;">
        <div class="card text-center" style="width:28rem;">
            <div class="card-body">
                <h5 class="card-title mt-3 mb-5">Image Roasting</h5>
                <label for="uploadfile" class="form-label fw-bold">Upload Fotomu!</label>
                <input class="form-control form-control-md mb-5" id="uploadfile" type="file" name="uploadfile" accept="image/*" required>
                <div class="alert d-none alert-danger" id="alert" role="alert">
                    Tidak ada foto yang diupload!
                </div>
                <button type="button" class="btn btn-primary mb-3" onclick="generate()">Roasting Now</button>
            </div>
            <div class="mb-3">
                <span class="fst-italic d-none" id="loading"></span>
            </div>
            <center>
                <div class="card d-none mb-3" style="width: 25rem;" id="found">
                    <img src="" class="card-img-top img-fluid" id="img">
                    <div class="card-body">
                        <p class="card-text text-break fw-bold" id="result"></p>
                    </div>
                </div>
            </center>
            <center>
                <div class="card mb-3" style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-tittle">Disclaimer</h5>
                        <p class="card-text text-break">Kami tidak menyimpan gambar anda yang telah diupload, silahkan cek source code <a class="fw-bold" href="https://github.com/WAW1311/Image-Roast">disini</a>. Buat apa kami menyimpan foto burik anda?</p>
                    </div>
                </div>
            </center>
            <a href="https://github.com/WAW1311/Image-Roast"><i class="fa fa-github" style="font-size:40px;"></i></a>
            <br>
            <div class="card-footer text-sm text-body-tertiary">
                © 2024 WAW. All rights reserved.
            </div>
        </div>
    </div>
</body>
<script src="app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>