
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>User Note App</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url('/') ?>">Note App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul> -->
      <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addUserModal">
  Add Note
</button>
     
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12 py-3">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
        <tbody>
        <?php if (isset($users) && !empty($users)) : ?>
          <?php foreach ($users as $index => $user) : ?>
            <tr>
              <th scope="row"><?= $index + 1 ?></th>
              <td><?= esc($user['name']) ?></td>
              <td><?= esc($user['email']) ?></td>
              <td class="d-flex">
                <a href="<?= base_url("users/edit-user/".$user["id"]) ?>" data-bs-id="<?= $user["id"] ?>" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editUserModal<?= $user["id"]; ?>">Edit</a>
                <form action="users/delete-user/<?= $user["id"]; ?>" method="POST">
                     <input type="hidden" name="id" value="<?= $user["id"] ?>">
                     <input type="hidden" name="__method" value="delete">
                     <button onclick="return confirm('Are U Sure to Delete?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
    <?php else : ?>
    <tr>
      <td colspan="4">No users found.</td>
    </tr>
  <?php endif; ?>
  </tbody>
</table>
        </div>
    </div>
</div>

<!-- Add Modal Box -->

<div id="addUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <form method ="post" action="<?= base_url('/users/add-user') ?>">
                <div class="modal-header d-flex">                        
                    <h4 class="modal-title">New Note</h4>
                    <button type="button" class="close ms-auto" data-bs-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" name ="name" id = "name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"  name ="email" id = "email" class="form-control" required>
                    </div>                 
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal Box -->
<div id="editUserModal<?= $user["id"]; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <form method ="post" action="<?= base_url('/users/edit-user/'.$user['id']) ?>">
              <input type="hidden" name="__method" value="put">
              <input type="hidden" name="id" value="<?= $user["id"] ?>">

                <div class="modal-header d-flex">                        
                    <h4 class="modal-title">Edit Note</h4>
                    <button type="button" class="close ms-auto" data-bs-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" value="<?= $user['name'] ?>" name ="name" id = "name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="<?= $user['email'] ?>" name ="email" id = "email" class="form-control" required>
                    </div>                 
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
  
<script src="../js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>