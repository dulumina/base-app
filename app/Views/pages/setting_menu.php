<?= $this->extend('/layout/page_layout') ?>

<?= $this->section('content') ?>

<style>
.just-padding {
  padding: 15px;
}

.list-group.list-group-root {
  padding: 0;
  overflow: hidden;
}

.list-group.list-group-root .list-group {
  margin-bottom: 0;
}

.list-group.list-group-root .list-group-item {
  border-radius: 0;
  border-width: 1px 0 0 0;
}

.list-group.list-group-root>.list-group-item:first-child {
  border-top-width: 0;
}

.list-group.list-group-root>.list-group>.list-group-item {
  padding-left: 30px;
}

.list-group.list-group-root>.list-group>.list-group>.list-group-item {
  padding-left: 45px;
}
</style>

<div class="container-xxl flex-grow-1 container-p-y">


  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Settings /</span> Menu</h4>

  <!-- Accordion -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">List Menu</h5> <small class="text-muted float-end">
            <button type="button" class="btn rounded-pill btn-success" onclick="addMenu()"><i class="fa fa-plus"></i>Add
              New</button>
          </small>
        </div>
        <div class="card-body menu-list">

          <div class="just-padding">

            <div class="list-group list-group-root well">

              <?php $menus = json_decode($_SESSION['user_data'])->acess_menu; ?>
              <?php foreach($menus as $row) : ?>
              <?php if($row->type == 'single') : ?>
              <a href="#" onclick="editMenu('<?= $row->menu_id ?>')" class="list-group-item"><?= $row->name ?></a>
              <?php elseif($row->type == 'parent') : ?>
              <a href="#" onclick="editMenu('<?= $row->menu_id ?>')" class="list-group-item"><?= $row->name ?></a>
              <div class="list-group">
                <?php foreach($menus as $child) : ?>
                <?php if($child->parent == $row->menu_id) :?>
                <a href="#" onclick="editMenu('<?= $child->menu_id ?>')" class="list-group-item"><?= $child->name ?></a>
                <?php endif; ?>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
              <?php endforeach; ?>

            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0" id="formTitle">Add Menu</h5> <small class="text-muted float-end">

          </small>
        </div>
        <div class="card-body">
          <form method="POST" id="formMenu">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="menuName">Menu Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="menuName" name="menuName">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="menuLink">Link</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="menuLink" name="menuLink">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="menuIcon">Icon</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="text" id="menuIcon" class="form-control" name="menuIcon">
                </div>
                <!-- <div class="form-text"> You can use letters, numbers &amp; periods </div> -->
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="menuType">Type</label>
              <div class="col-sm-10">
                <div class="form-check">
                  <input name="type" class="form-check-input" type="radio" value="single" id="single" checked>
                  <label class="form-check-label" for="single">
                    Single menu
                  </label>
                </div>
                <div class="form-check">
                  <input name="type" class="form-check-input" type="radio" value="parent" id="parent">
                  <label class="form-check-label" for="parent">
                    Parent menu
                  </label>
                </div>
                <div class="form-check">
                  <input name="type" class="form-check-input" type="radio" value="child" id="child">
                  <label class="form-check-label" for="child">
                    Chid menu
                  </label>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="selectParent">Parent</label>
              <div class="col-sm-10">
                <select class="form-select" id="selectParent" name="selectParent">
                </select>
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Send</button>
                <div class="text-muted float-end">
                  <button type="button" class="btn btn-danger">Danger</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Accordion -->

  <!--/ Advance Styling Options -->
</div>
<script src="<?= base_url(); ?>/assets/vendor/libs/jquery/jquery.js"></script>

<script>
const menus = JSON.parse(`<?= json_encode($menus) ?>`)
const parrentMenu = menus.filter(menu => menu.type == 'parent').map(menu => {
  const container = {};
  container['id'] = menu.menu_id;
  container['name'] = menu.name;
  return container
})
const formMenu = $('#formMenu');

function addMenu() {
  formMenu.attr('action', '<?= base_url("settings/menu/add") ?>')
  $('#formTitle').text('Add Menu')
  $('#menuName').val('')
  $('#menuLink').val('')
  $('#menuIcon').val('')
  $("input[name=type]").removeAttr('checked');
  $("#single").attr('checked', 'checked');
  let select = $('#selectParent');
  select.empty(); // remove old options
  select.append($("<option value='0'></option>"))
  $.each(parrentMenu, function(key, obj) {
    select.append($("<option value='" + obj.id + "'>" + obj.name + "</option>"))
  });
}

function editMenu(id) {
  formMenu.attr('action', '<?= base_url("settings/menu/edit") ?>/' + id)
  let menu = menus.filter(menu => menu.menu_id == id)[0];
  $('#formTitle').text('Edit Menu')
  $('#menuName').val(menu.name)
  $('#menuLink').val(menu.link)
  $('#menuIcon').val(menu.icon)
  $("input[name=type]").removeAttr('checked');
  $("#" + menu.type).attr('checked', 'checked');
  let select = $('#selectParent');
  select.empty(); // remove old options
  select.append($("<option value='0'></option>"))
  $.each(parrentMenu, function(key, obj) {
    if (obj.id == menu.parent) {
      select.append($("<option value='" + obj.id + "' selected>" + obj.name + "</option>"))
    } else {
      select.append($("<option value='" + obj.id + "'>" + obj.name + "</option>"))
    }
  });
}
</script>
<?= $this->endSection() ?>