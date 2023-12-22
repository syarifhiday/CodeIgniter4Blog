<?= $this->extend('layout/adminTemplate'); ?>


<?= $this->section('content'); ?>
<div class="col-sm-8 p-3">

<h1>Add a Post</h1>

        <h4>Title</h4>
        
    <input class="form-control" type="text" id="articleTitle" name="title" required autofocus>

    <h4 class="mt-3">
        Content
    </h4>
    <textarea id="content" name="content" class="form-control mb-3" required></textarea>
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
                <img id="previewImage" src="" alt="Preview Image" style="max-width: 300px; max-height: 300px; margin-top: 10px;">
                <input type="hidden" id="imagePathInput" name="thumbnail">


            <h5 class="mt-3">Meta description</h5>
            <textarea name="meta_desc" class="form-control" aria-label="With textarea"></textarea>

            <button class="btn btn-primary mt-3" type="submit">Submit</button>

        </div>
        <?php endif; ?>

<?= $this->endSection(); ?>
