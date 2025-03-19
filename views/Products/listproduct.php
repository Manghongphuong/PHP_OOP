<!--begin::App Main-->
<main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">List Products</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List Products</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">List Products</h3></div>
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Images</th>
                          <th>Description</th>
                          <th>Setting</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $stt = 1; ?>
                        <?php foreach($products as $pro): ?>
                          <tr class="align-middle">
                          <td><?= $stt++; ?></td>
                          <td><?= $pro['name']; ?></td>
                          <td><?= $pro['category_name']; ?></td>
                          <td><?= number_format($pro['price'], 0, ',', '.'); ?></td>
                          <td><?= $pro['quantity']; ?></td> 
                          <td><img src="../uploads/<?= $pro['images']; ?>" alt="" style="max-width: 100px;"></td>
                          <td><?= $pro['description']; ?></td>
                          <td>
                            <a href="index.php?action=edit_Product&id=<?= $pro['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="index.php?action=delete_Product&id=<?= $pro['id']; ?>" class="btn btn-danger">Delete</a>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!--end::App Main-->