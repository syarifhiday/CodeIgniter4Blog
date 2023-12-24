<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
 
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">SecureDev</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/blog">Blogs</a>
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
  <div class="container">
        <div class="row">
            <div class="col-sm-8 p-3">
                <!-- This is content section -->
                <?php echo $this->renderSection('content'); ?>
                

            </div>
            <div class="col p-3 mb-2">
                <!-- This is Sidebar -->
                <h3>New Posts</h3>
                <?php foreach ($posts as $post): ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['title'] ?></h5>
                            <p class="card-text"><?= $post['meta_desc'] ?></p>
                        </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<!-- Footer section -->

<div class="container text-center">
  <hr>
<p class="mt-3">Copiright - SecureDev 2023</p>
</div>
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
  </script>  
</body>
</html>