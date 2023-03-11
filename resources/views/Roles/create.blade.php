@extends('layouts.admin')
@section('title', 'Users')

@section('content')

<style>
    .row_permission label input {
        margin-right: 10px;
    }
</style>

<!-- orignaol form -->
<div class="content-wrapper">
    <div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Assign Permissions</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
    <section class="content">
        <div class="container-fluid">
            <form class="form-horizontal needs-validation" method="POST" id="create_role" novalidate
                action="<?= 'Superadmin/save_create'; ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">Role Name
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="hidden" name="role_id" id="role_id_"
                                    value="<?= !empty($role) ? $role->id : ''; ?>">
                                <div class="col-md-12">
                                    <input type="text" class="form-control role_name" name="name" require
                                        placeholder="Name" required
                                        value="<?= !empty($role) ? $role->role_name : ''; ?>">
                                    <div class="invalid-feedback">
                                        Please enter role name.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">Role Position/ Weightage
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <input value="<?= !empty($role) ? $role->position :' '; ?>" type="number"
                                        class="form-control position" name="position" placeholder="position" required>
                                    <div class="invalid-feedback">
                                        Please define role's position.
                                    </div>
                                </div>
                            </div>

                            <div class=" col-md-4 mb-3">
                                <label class="control-label" for="role_active">Active Status
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <label class="radio-inline">
                                        <input class="enable-icheck status" type="radio" value="true" name="status"
                                            id="role_active_true" <?=!empty($role) && $role->status == true ? 'checked'
                                        : ''; ?>
                                        />
                                        Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input class="enable-icheck ms-4 status" type="radio" value="false"
                                            name="status" id="role_active_false" <?=!empty($role) && $role->status ==
                                        false ? 'checked' : '';
                                        ?>
                                        /> No
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
                    if (!empty(permissionCategory())) {
                ?>

                <!-- Nav tabs -->
                <ul class="nav nav-pills roles_nav_pills mt-4" role="tablist">
                    <?php
                        $color = array('#F26A6D', '#FCC56E', '#96BB7F', '#44c9c7', '#ff43a5');
                        foreach (permissionCategory() as $key => $min_cat) {
                        $color_random = $min_cat['color_code'];
                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?= $min_cat['id'] == 1 ? 'active' : '' ?> tabSet"
                                            data-bs-toggle="tab" href="#<?= $min_cat['categoriname'] ?>" role="tab">
                                            <span>
                                                <?= ucfirst($min_cat['categoriname']) ?>
                                            </span>
                                            <span class="badge badge-primary ms-2 <?= $min_cat['categoriname'] ?>"
                                                style=" background-color: <?= $color_random; ?>;">
                                                <?= countTotalMainPer(!empty($role) ? $role->id : '',  $min_cat['id'] ); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <?php
                    }
                    ?>
                </ul>
                <?php
                    if (!empty(permissionCategory())) {
                ?>
                <div class="tab-content mt-4">
                    <?php foreach (permissionCategory() as $key => $min_cat) {
                        $color_random = $color[array_rand($color)];
                    ?>
                    <div class="tab-pane <?= $min_cat['id']  ==  1 ? 'active' : '' ?>"
                        id="<?= $min_cat['categoriname'] ?>" role="tabpanel">
                        <div class="row_permission">
                            <div class="container_roles">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <?php
                                            $permissions = get_permission($min_cat['id']);
                                            if ($permissions) {
                                                foreach ($permissions as $permission) {
                                                    $pr_get = isset($_GET['id']) ? chekRolper($_GET['id'], $permission->permission_slug) : '';
                                                    $checked = !empty($pr_get && $pr_get == $permission->permission_slug) ? 'checked' : '';
                                            ?>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-check-label d-flex align-items-center"
                                                    for="checbox_<?= $permission->permission_slug; ?>">
                                                    <input type="checkbox"
                                                        id="checbox_<?= $permission->permission_slug; ?>"
                                                        name="permission[]"
                                                        value="<?= $permission->permission_slug ?>"
                                                        class='permission me-3 box_body_checkbox checkboxClass'
                                                        <?=$checked; ?>>
                                                    <?= ucfirst($permission->permissionName); ?>
                                                </label>
                                            </div>
                                            <?php  }
                                            } ?>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            <?php
} ?>
                    <div class="mt-4  text-end">
                        <button type="submit" class="btn btn-success save_per">Save</button>
                        <button type="submit" class="btn btn-danger">Reset</button>
                    </div>
                    <div class="roleRes"></div>
            </form>
            <!-- orignaol form end -->
    </section>
</div>

@endsection