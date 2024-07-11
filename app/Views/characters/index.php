<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>


<h2>Marvel Characters</h2>
<a href="<?php echo base_url('/Characters/new'); ?>" class="btn btn-success">Add Character</a>

<div class="container">
        <div class="row">
          
                <?php foreach ($Characters as $character): ?>
                     <div class="col-md-4">
                       <div class="card ">
                           <img src="<?php echo $character['thumbnail']; ?>" class="card-img-top img-fluid" style="height:300px" alt="<?php echo $character['name']; ?>">
                             <div class="card-body">
                              <h5 class="card-title"><?php echo $character['name']; ?></h5>
                                 <p class="card-text"><?php echo $character['description']; ?></p>
                                    <a href="<?php echo base_url('/Characters/'.$character['id'].'/edit'); ?>" class="btn btn-warning">Edit</a>
                                    <a data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-bs-url="<?= base_url('Characters/'.$character['id']); ?>"  class="btn btn-danger" >Delete</a>
                    
                                </div>
                        </div>
                    </div>
                 <?php endforeach; ?>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete this hero?</p>
                </div>
                <div class="modal-footer">
                    <form id="form-delete" action="" method="post">
                         <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="d-flex justify-content-center">
            <?php echo $pager->links(); ?>
            <style>
                .pagination {
                    margin-top: 20px;
                }

                .pagination li {
                    display: inline-block;
                    margin-right: 5px;
                }

                .pagination li a {
                    padding: 5px 10px;
                    border: 1px solid #ccc;
                    text-decoration: none;
                }

                .pagination li.active a {
                    background-color: #007bff;
                    color: #fff;
                }
            </style>
    </div>
    
    <script>

const deleteModal = document.getElementById('deleteModal')
if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', event => {
       
        const button = event.relatedTarget
        const url = button.getAttribute('data-bs-url')
        const form = deleteModal.querySelector('#form-delete')
        form.setAttribute('action', url)
    })
}
</script>

<?= $this->endSection() ?>