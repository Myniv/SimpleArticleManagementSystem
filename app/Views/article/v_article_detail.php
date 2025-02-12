<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>
<div class="card shadow-lg">
    <div class="card-header text-center bg-secondary text-white">
        <h3><?= $article->getTitle() ?></h3>
    </div>

    <div class="card-body">
        <div class="text-center mb-3">
            <img src="<?= base_url("articles/search-image.svg") ?>" class="img-fluid rounded"
                style="max-width: 15%; max-height: auto;" alt="Article Image">
        </div>

        <p class="card-text"><?= $article->getContent() ?></p>
    </div>

    <div class="card-footer text-end">
        <a href="/article" class="btn btn-secondary">Back to Home</a>
    </div>
</div>

<?= $this->endSection() ?>