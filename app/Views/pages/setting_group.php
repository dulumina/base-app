<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Settings /</span> Groups</h4>

  <div class="row">
    <div class="col-lg-12 mb-12 order-0">
      <div class="card">
        <div class="card-header">
          <h5>Hoverable rows</h5><small class="text-muted float-end">
            <button type="button" class="btn rounded-pill btn-success" data-bs-toggle="modal"
              data-bs-target="#groupForm"><i class=" fa fa-plus"></i>Add
              New</button>
          </small>
        </div>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Group Name</th>
                  <th>Members</th>
                  <th>Acceess</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php foreach($group_list as $group): ?>
                <tr>
                  <td> <strong data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                      title=""
                      data-bs-original-title="<?= $group['description'] ?>"><?= $group['group_name'] ?></strong>
                  </td>
                  <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#membersForm">
                      <span class="badge badge-center rounded-pill bg-label-secondary"><?= $group['members']; ?></span>
                    </a>
                  </td>
                  <td>
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#accessModal"><i
                        class='bx bx-check-square'></i> Edit Access</a>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-2">

                      <?php if($group['status'] == 1): ?>
                      <input class="form-check-input" type="checkbox" id="status<?=$group['group_id'] ?>" checked="">
                      <label class="form-check-label" for="status<?=$group['group_id'] ?>"><span
                          class="badge bg-label-primary me-1">Active</span></label>
                      <?php elseif($group['status'] == 0): ?>
                      <input class="form-check-input" type="checkbox" id="status<?=$group['group_id'] ?>">
                      <label class="form-check-label" for="status<?=$group['group_id'] ?>"><span
                          class="badge bg-label-warning me-1">Not Active</span></label>
                      <?php endif; ?>
                    </div>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu" style="">
                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                          data-bs-target="#groupForm"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- groupForm Modal -->
<div class="modal fade" id="groupForm" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="nameLarge" class="form-label">Name</label>
            <input type="text" id="nameLarge" class="form-control" placeholder="Enter Name">
          </div>
        </div>
        <div class="row g-2">
          <div class="col mb-0">
            <label for="emailLarge" class="form-label">Email</label>
            <input type="text" id="emailLarge" class="form-control" placeholder="xxxx@xxx.xx">
          </div>
          <div class="col mb-0">
            <label for="dobLarge" class="form-label">DOB</label>
            <input type="text" id="dobLarge" class="form-control" placeholder="DD / MM / YY">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- groupForm Modal -->
<!-- membersForm Modal -->
<div class="modal fade" id="membersForm" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Recipient's username"
                aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-outline-primary" type="button" id="button-addon2">Add Member</button>
            </div>
          </div>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Project</th>
                <th>Client</th>
                <th>Users</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                <td>Albert Cook</td>
                <td>
                  <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                      <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Sophia Wilkerson">
                      <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Christina Parker">
                      <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                    </li>
                  </ul>
                </td>
                <td><span class="badge bg-label-primary me-1">Active</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
                <td>Barry Hunter</td>
                <td>
                  <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                      <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Sophia Wilkerson">
                      <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Christina Parker">
                      <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                    </li>
                  </ul>
                </td>
                <td><span class="badge bg-label-success me-1">Completed</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
                <td>Trevor Baker</td>
                <td>
                  <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                      <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Sophia Wilkerson">
                      <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Christina Parker">
                      <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                    </li>
                  </ul>
                </td>
                <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong></td>
                <td>Jerry Milton</td>
                <td>
                  <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                      <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Sophia Wilkerson">
                      <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="" data-bs-original-title="Christina Parker">
                      <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                    </li>
                  </ul>
                </td>
                <td><span class="badge bg-label-warning me-1">Pending</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- membersForm Modal -->

<!-- aceess Modal -->
<div class="modal fade" id="accessModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover  table-striped">
            <thead>
              <tr>
                <th>Menu</th>
                <th>Select</th>
                <th>Insert</th>
                <th>Update</th>
                <th>delete</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php foreach($menus as $row) : ?>
              <?php if($row->type == 'single') : ?>
              <tr>
                <td><?= $row->name; ?></td>
                <td><input class="form-check-input" <?= ($row->c == 1 )? 'checked':'' ?> type="checkbox"
                    id="inlineCheckbox1" value="option1"></td>
                <td><input class="form-check-input" <?= ($row->r == 1 )? 'checked':'' ?> type="checkbox"
                    id="inlineCheckbox1" value="option1"></td>
                <td><input class="form-check-input" <?= ($row->u == 1 )? 'checked':'' ?> type="checkbox"
                    id="inlineCheckbox1" value="option1"></td>
                <td><input class="form-check-input" <?= ($row->d == 1 )? 'checked':'' ?> type="checkbox"
                    id="inlineCheckbox1" value="option1"></td>
              </tr>
              <?php elseif($row->type == 'parent') : ?>
              <tr>
                <td><?= $row->name; ?></td>
                <td><input class="form-check-input" <?= ($row->c == 1 )? 'checked':'' ?> disabled type="checkbox"
                    id="inlineCheckbox1" value="option1"></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <div class="list-group">
                <?php foreach($menus as $child) : ?>
                <?php if($child->parent == $row->menu_id) :?>
                <tr>
                  <td><?= $row->name; ?> -> <?= $child->name; ?></td>
                  <td><input class="form-check-input" <?= ($child->c == 1 )? 'checked':'' ?> type="checkbox"
                      id="inlineCheckbox1" value="option1"></td>
                  <td><input class="form-check-input" <?= ($child->r == 1 )? 'checked':'' ?> type="checkbox"
                      id="inlineCheckbox1" value="option1"></td>
                  <td><input class="form-check-input" <?= ($child->u == 1 )? 'checked':'' ?> type="checkbox"
                      id="inlineCheckbox1" value="option1"></td>
                  <td><input class="form-check-input" <?= ($child->d == 1 )? 'checked':'' ?> type="checkbox"
                      id="inlineCheckbox1" value="option1"></td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- aceess Modal -->

<?= $this->endSection() ?>