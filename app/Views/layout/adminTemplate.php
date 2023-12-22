<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link href="../../../public/css/style.css" rel="stylesheet"/> -->
    <style>
        textarea {
            width: 100%;
            height: 300px;
        }
        
        
    </style>
</head>
  <body>

  <div class="container">
 
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">SecureDev</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/blog">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/page/about">About Me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/page/contact">Contact</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input id="query" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button id="search" class="btn btn-outline-success">Search</button>
      </form>
    </div>
  </div>
</nav>
  </div>
   
  <!-- middle section -->
  <form id="articleForm" action="/admin/<?php if($title=="Add a Post"): echo "save";elseif($title=="Edit Post"): echo "update"; endif; ?>" method="post">
  <?= csrf_field(); ?>
        <div class="container">
            <div class="row">

          <!-- This is content section -->
          <?php echo $this->renderSection('content'); ?>
          

          </div>
      </div>
      
    </form>
<!-- Footer section -->
    <footer class="container text-center p-3" >
      <hr>
      <p class="mt-3">Copiright - SecureDev 2023</p>
    </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
      document.getElementById('search').addEventListener('click', function(event) {
          // Mencegah formulir dari perilaku default (pengiriman permintaan GET)
          event.preventDefault();

          // Mengambil nilai dari input dengan ID 'query'
          var searchQuery = document.getElementById('query').value;

          // Mengarahkan halaman ke URL dengan menggunakan nilai pencarian
          window.location.href = '/blog/search/' + encodeURIComponent(searchQuery);
      });

      function applyFormat() {
        var kontenElement = document.getElementById('content');
        var format = document.getElementById('format').value;

        var selectedText = kontenElement.value.substring(
            kontenElement.selectionStart,
            kontenElement.selectionEnd
        );

        switch (format) {
            case 'heading':
                selectedText = '<h2>' + selectedText + '</h2>';
                break;
            case 'italic':
                selectedText = '<i>' + selectedText + '</i>';
                break;
            case 'bold':
                selectedText = '<b>' + selectedText + '</b>';
                break;
            case 'paragraf':
              selectedText = '<p>' + selectedText + '</p>';
              break;

            default:
                // Do nothing for 'normal' format
                break;
        }

        var start = kontenElement.value.substring(0, kontenElement.selectionStart);
        var end = kontenElement.value.substring(kontenElement.selectionEnd);

        kontenElement.value = start + selectedText + end;
    }
    

    function fileChange() {
        const input = document.getElementById('imageInput');
        const preview = document.getElementById('previewImage');
        const imagePathInput = document.getElementById('imagePathInput');

        const file = input.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                // Tampilkan gambar yang dipilih pada elemen gambar
                preview.src = e.target.result;

                // Kirim gambar ke server menggunakan AJAX
                uploadImage(file);
            };

            reader.readAsDataURL(file);
        }
    }

    function uploadImage(file) {
        const formData = new FormData();
        formData.append('image', file);

        // Kirim AJAX request ke endpoint CodeIgniter untuk mengunggah gambar
        fetch('/upload/image', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Handle respon dari server jika diperlukan
            console.log(data);

            // Isi nilai input hidden dengan path gambar yang dikembalikan dari server
            const imagePathInput = document.getElementById('imagePathInput');
            imagePathInput.value = data.imagePath;
        })
        .catch(error => {
            // Handle error jika terjadi
            console.error('Error:', error);
        });
    }

  </script>  
</body>
</html>