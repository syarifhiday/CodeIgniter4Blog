<?= $this->extend('/layout/adminTemplate'); ?>


<?= $this->section('content'); ?>

    <div class="d-flex my-3">
        <h2>Blog Posts</h2>
        <a href="/admin/write" class="btn btn-primary ms-4" style="height: 42px;">Add Post</a>
    </div>   
<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('message') ?>
    </div>
<?php endif ?>
<div class="row">
    <?php foreach($posts as $post): ?>
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="/<?= $post['thumbnail']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title']; ?></h5>
                    <p class="card-text"><?= $post['meta_desc']; ?></p>
                    <a href="/admin/edit/<?= $post['permalink'] ;?>" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>
