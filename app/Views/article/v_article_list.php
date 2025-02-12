<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>

<div class="container">
    <h2 class="mb-3">Articles</h2>
    <a href="/article/create" class="btn btn-success mb-3">Create Article</a>

    <div class="row g-4">
        <?php foreach ($articles as $article) { ?>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="<?= base_url("articles/search-image.svg") ?>"
                        class="card-img-top img-fluid w-50 mx-auto mt-2" alt="Card Image">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $article->getTitle() ?></h5>
                        <p class="card-text flex-grow-1"><?= word_limiter($article->getContent(), 10) ?></p>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-info m-2">Detail</a>
                            <a href="#" class="btn btn-warning m-2">Edit</a>
                            <form action="/article/delete/<?= $article->getId(); ?>" method="post" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger m-2"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus article ini?');">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?= $this->endSection() ?>