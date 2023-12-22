<?= $this->extend('layout/adminTemplate'); ?>


<?= $this->section('content'); ?>
<div class="col-sm-8 p-3">

<h1>Edit Post</h1>
    <input type="hidden" name="id" value="<?= $post['id'] ;?>">

        <h4>Title</h4>
        
    <input class="form-control" type="text" id="articleTitle" name="title" value="<?php if($post): echo $post['title']; endif; ?>" required autofocus>

    <h4 class="mt-3">
        Content
    </h4>
    <textarea id="content" name="content" class="form-control mb-3"required><?php if($post): echo $post['meta_desc']; endif; ?></textarea>
    <label>Block the text and then select a format:</label>
    <select id="format" name="format" onchange="applyFormat()">
        <option value="paragraf">Paragraf</option>
        <option value="heading">Heading</option>
        <option value="italic">Italic</option>
        <option value="bold">Bold</option>
    </select>

    </div>


    <?php if($title=="Add a Post" || $title=="Edit Post"): ?>
        <div class="col p-3 mb-2">
            <!-- This is Sidebar -->
            <h3>Post Settings</h3>

            <h5 class="mt-3">Thumbnail</h5>
                <input type="file" id="imageInput" onchange="fileChange()" accept="image/*">
                <br>
                <img class="img-fluid" id="previewImage" src="/<?php if($post): echo $post['thumbnail']; endif; ?>" alt="Preview Image" style="max-width: 300px; max-height: 300px; margin-top: 10px;">
                <input type="hidden" id="imagePathInput" name="thumbnail" value="<?php if($post): echo $post['thumbnail']; endif; ?>">


            <h5 class="mt-3">Meta description</h5>
            <textarea name="meta_desc" class="form-control" ><?php if($post): echo $post['meta_desc']; endif; ?></textarea>

            <div class="d-flex">
                <button class="btn btn-primary mt-3" type="submit">Update</button>
                <a href="/admin/delete/<?= $post['id'] ;?>" class="btn btn-danger mt-3 mx-3" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
            </div>

        </div>
        <?php endif; ?>

<?= $this->endSection(); ?>
