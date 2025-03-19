<!--begin::App Content-->
<div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Danh sách danh mục</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">STT</th>
                          <th>Tên danh mục</th>
                          <th>Thao Tác</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $stt = 1; ?>
                          <?php foreach ($categories as $category): ?>
                              <tr class="align-middle">
                                  <td><?= $stt++; ?></td>
                                  <td><?= $category['name']; ?></td>
                                  <td>
                                      <a href="index.php?action=edit_Category&id=<?= $category['id']; ?>" class="btn btn-primary">Sửa</a>
                                      <a href="index.php?action=delete_Category&id=<?= $category['id']; ?>" class="btn btn-danger">Xóa</a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
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
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->