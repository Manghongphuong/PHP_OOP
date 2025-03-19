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
                          <th>Thành Viên</th>
                          <th>Email</th>
                          <th>Trạng Thái</th>
                          <th>Thao Tác</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $stt = 1; ?>
                          <?php foreach ($user as $users): ?>
                              <tr class="align-middle">
                                  <td><?= $stt++; ?></td>
                                  <td><?= $users['username']; ?></td>
                                  <td><?= $users['email']; ?></td>
                                  <td>
                                      <?php 
                                      if ($users['is_active'] == 0) {
                                          echo "Admin";
                                      } elseif ($users['is_active'] == 1) {
                                          echo "User";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <a href="index.php?action=delete_User&id=<?= $users['id'] ?>" class="btn btn-danger">Xóa</a>
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