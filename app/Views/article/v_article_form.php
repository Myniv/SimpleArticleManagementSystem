<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>
<div>
    <h2><?= isset($article) ? "Edit Article" : "Create Article" ?></h2>
    <form action="<?= isset($article) ?
        base_url('article/update/' . url_title($article->getTitle(), '-', true) . '--' . $article->getId() . '-' . url_title(word_limiter($article->getContent(), 5), '-', true))
        : base_url('article/create') ?>" method="post">
        
        <?php if (isset($article)) { ?>
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
        <?php } ?>
        
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control <?= isset($errors['id']) ? 'is-invalid' : '' ?>" id="id" name="id"
                required value="<?= isset($article) ? $article->getId() : "" ?>">
            <?php if (isset($errors['id'])) { ?>
                <div class="invalid-feedback"><?= esc($errors['id']) ?></div>
            <?php } ?>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" id="title"
                name="title" required value="<?= isset($article) ? $article->getTitle() : "" ?>">
            <?php if (isset($errors['title'])) { ?>
                <div class="invalid-feedback"><?= esc($errors['title']) ?></div>
            <?php } ?>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control <?= isset($errors['content']) ? 'is-invalid' : '' ?>" id="content"
                name="content" rows="5" required><?= isset($article) ? trim($article->getContent()) : "" ?></textarea>
            <?php if (isset($errors['content'])) { ?>
                <div class="invalid-feedback"><?= esc($errors['content']) ?></div>
            <?php } ?>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/article" class="btn btn-secondary">Back to Home</a>
    </form>
</div>
<?= $this->endSection() ?>