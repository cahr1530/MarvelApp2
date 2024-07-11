
<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>


<main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">New Hero</h3>

            <form action="<?= base_url('Characters'); ?>" class="row g-3" method="post" autocomplete="off">

                <div class="col-md-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>

                <div class="col-md-6">
                    <label for="thumbnail" class="form-label">Thumbnail Link</label>
                    <input type="text" class="form-control" id="thumbnail" name="thumbnail">
                </div>

                <div class="col-12">
                    <a href="<?=base_url('Characters'); ?>" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>

        </div>
    </main>

<?= $this->endSection() ?>