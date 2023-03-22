@extends('layouts.admin')
@section('title', 'Users')

@section('content')

<style>
    .row_permission label input {
        margin-right: 10px;
    }

    .roles_nav_pills .nav-link {
        background-color: #0080ec;
        color: #fff;
        margin-right: 5px;
    }

    .roles_nav_pills .nav-link:hover {
        color: #fff !important;
        background-color: #89ad3e;
    }

    .activelink {
        color: red;
    }
</style>

<!-- orignaol form -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Sub Admin</h1>
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <form class="form-horizontal needs-validation" method="POST" id="create_role" novalidate
                action="{{  url('/department/sub-admin/save') }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">Role Name
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="hidden" name="userId" 
                                    value="<?= !empty($admin) ? $admin->id : ''; ?>">
                                <div class="col-md-12">
                                    <select class="form-select form-control" name="role"
                                        aria-label="Default select example">
                                        <option selected>Select Role Name</option>
                                        @if(@$uertype)
                                        @foreach ($uertype as &$uertyp)
                                        @php
                                            $selected = !empty($admin) && ($admin->role ==  $uertyp->id) ? 'selected' : '';
                                        @endphp
                                        <option value="{{  $uertyp->id }}" {{ $selected }}>{{ ucfirst($uertyp->name) }}</option>
                                        @endforeach
                                        @else
                                        <option selected>No Role Exist</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">First Name
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <input value="<?= !empty($admin) ? $admin->first_name :' '; ?>" type="text"
                                        class="form-control position" name="first_name" placeholder="position" required>
                                    <div class="invalid-feedback">
                                        Please define role's position.
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">Last Name
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <input value="<?= !empty($admin) ? $admin->last_name :' '; ?>" type="text"
                                        class="form-control position" name="last_name" placeholder="position" required>
                                    <div class="invalid-feedback">
                                        Please define role's position.
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">Email Id
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <input value="<?= !empty($admin) ? $admin->email :' '; ?>" type="email"
                                        class="form-control position" name="email" placeholder="position" required>
                                    <div class="invalid-feedback">
                                        Please define role's position.
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">Password
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <input value="" type="password"
                                        class="form-control position" name="password" placeholder="Password..."
                                        <?= !empty($admin) ? '' : 'required'; ?>>
                                    <div class="invalid-feedback">
                                        Please define role's position.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">Phone No
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <input value="<?= !empty($admin) ? $admin->phone :' '; ?>" type="number"
                                        class="form-control position" name="phone" placeholder="Phone No" required>
                                    <div class="invalid-feedback">
                                        Please define role's position.
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">Mobile No
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <input value="<?= !empty($role) ? $role->position :' '; ?>" type="number"
                                        class="form-control position" name="mobile_no" placeholder="Mobile No" required>
                                    <div class="invalid-feedback">
                                        Please define role's position.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">GST No.
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <input value="<?= !empty($role) ? $role->position :' '; ?>" type="text"
                                        class="form-control position" name="gst_no" placeholder="Gst No" required>
                                    <div class="invalid-feedback">
                                        Please define role's position.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">Aadhaar Card No
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <input value="<?= !empty($role) ? $role->position :' '; ?>" type="number"
                                        class="form-control position" name="aadhaar_card" placeholder="Aadhaar Card No"
                                        required>
                                    <div class="invalid-feedback">
                                        Please define role's position.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">Company Pancard
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <input value="<?= !empty($role) ? $role->position :' '; ?>" type="text"
                                        class="form-control position" name="company_pancard"
                                        placeholder="Company Pancard" required>
                                    <div class="invalid-feedback">
                                        Please define role's position.
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="name" class="control-label">Company Website
                                    <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-12">
                                    <input value="<?= !empty($role) ? $role->position :' '; ?>" type="text"
                                        class="form-control position" name="company_website"
                                        placeholder="Company Website" required>
                                    <div class="invalid-feedback">
                                        Please define role's position.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="col-md-12">
                                    <label for="name" class="control-label">Country
                                        <sup class="text-danger">*</sup>
                                    </label>@php
                                    // dd($Country);
                                    @endphp
                                    <select class="form-select form-control country" name="country"
                                        aria-label="Default select example">
                                        <option selected>Select Country</option>
                                        @if(@$Country)
                                        @foreach ($Country as $Countr)
                                        <option value="{{  $Countr->id }}">{{ ucfirst($Countr->name) }}</option>
                                        @endforeach
                                        @else
                                        <option selected>No Role Exist</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="col-md-12">
                                    <label for="name" class="control-label">State
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <select class="form-select form-control state" aria-label="Default select example">
                                        <option selected>Select State</option>                                       
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
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
@section('scripts')

<script>
    $(document).ready(function(){
        $('.clickme a').click(function(){
            $('.clickme a').removeClass('activelink');
            $(this).addClass('activelink');
            var tagid = $(this).data('tag');
            $('.list').removeClass('active').addClass('hide');
            $(tagid).removeClass('hide');
        });
    });



    $("select.country").change(function () {
    var selectCountry = $(".country option:selected").val();
    var _this = $(this);
    _this.parent().append(
        '<p class="bef_send"><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
    $.ajax({
        type: "POST",
        url: '/department/state',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            country: selectCountry
        }
    }).done(function (data) {
        $(".bef_send").hide();
        $(".state").html(data);
        $(".state").removeAttr("disabled");

    }).error(function () {
        $("#state_list").html("Error! Please try again later!");
    });
});
/*get cities from state*/
$(document).on('change', 'select.state', function () {
    var selectState = $(this).val();
    var _this = $(this);
    _this.parent().append(
        '<p class="bef_send"><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
    $.ajax({
        type: "POST",
        url: BASE_URL + 'AjaxRequest/hotelCityData',
        data: {
            state: selectState
        }
    }).done(function (data) {
        $(".bef_send").hide();
        $(".city").html(data);
        $(".city").removeAttr("disabled");
    }).error(function () {
        $("#city_list").html("Error! Please try again later!");
    });
});

</script>@endsection