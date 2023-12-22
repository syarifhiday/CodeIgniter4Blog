<?php echo $this->extend('layout/blogTemplate'); ?>

<?php echo $this->section('content'); ?>

<h1><?= $title ;?></h1>
<hr>
<img src="../../../<?= $post['thumbnail'] ;?>" alt="<?= $title ;?>">
<p><?= $post['content'] ;?></p>

<?php echo $this->endSection();?>