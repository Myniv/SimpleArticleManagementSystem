<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>
<div>

    <?php if (isset($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= esc($error) ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <h2>Create Article</h2>
    <form action="<?= 'create' ?>" method="post">
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="number" class="form-control" id="id" name="id" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection() ?>