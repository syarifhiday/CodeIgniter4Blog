<?= $this->extend('layout/blogTemplate'); ?>


<?= $this->section('content'); ?>
<h1><?= $title ?></h1>

<div class="row">
    <?php foreach($posts as $post): ?>
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="/<?= $post['thumbnail']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title']; ?></h5>
                    <p class="card-text"><?= $post['meta_desc']; ?></p>
                    <a href="/blog/<?= $post['permalink'] ;?>" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>
