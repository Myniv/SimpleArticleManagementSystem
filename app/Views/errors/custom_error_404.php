<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>

<div class="error-container">
    <h1 class="display-1 fw-bold text-danger">404</h1>
    <p class="fs-3">Oops! Page not found.</p>
    <p class="lead">The page you are looking for might have been removed or is temporarily unavailable.</p>
    <a href="/" class="btn btn-primary">Go Back to Home</a>
</div>

<?= $this->endSection() ?>