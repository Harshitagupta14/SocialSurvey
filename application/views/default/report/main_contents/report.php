<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<style>
    .btn:not(.md-skip){
        padding:8px 44px 8px;
    }
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <form action="#" class="form-horizontal">
            <div class="form-group ">
                <div class="col-md-4">
                    <div id="reportrange" class="btn default">
                        <i class="fa fa-calendar"></i> &nbsp;
                        <span>February 22, 2017 - February 22, 2017</span>
                        <b class="fa fa-angle-down"></b>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <div class="input-group select2-bootstrap-append">
                        <select id="multi-append" class="form-control select2" multiple placeholder="Select Surveyor">
                            <option>Choose Auditor</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <!--Table -->
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
            <thead>
                <tr>
                    <th>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                            <span></span>
                        </label>
                    </th>
                    <th> Username </th>
                    <th> Email </th>
                    <th> Status </th>
                    <th> Joined </th>
                    <th> Actions </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> shuxer </td>
                    <td>
                        <a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-success"> Approved </span>
                    </td>
                    <td class="center"> 12 Jan 2012 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-left" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> looper </td>
                    <td>
                        <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> userwow </td>
                    <td>
                        <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-success"> Approved </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> user1wow </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-danger"> Blocked </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> restest </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-success"> Approved </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> foopl </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-info"> Info </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> weep </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-danger"> Rejected </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> coop </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-info"> Info </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> pppol </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-danger"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> test </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> userwow </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> test </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> goop </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> weep </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> toopl </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> userwow </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> tes21t </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> fop </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> kop </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> vopl </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> userwow </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> wap </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> test </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> toop </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1" />
                            <span></span>
                        </label>
                    </td>
                    <td> weep </td>
                    <td>
                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                    </td>
                    <td>
                        <span class="label label-sm label-warning"> Suspended </span>
                    </td>
                    <td class="center"> 12.12.2011 </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-docs"></i> New Post </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-tag"></i> New Comment </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> New User </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-flag"></i> Comments
                                        <span class="badge badge-success">4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



<script src="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>pages/scripts/components-select2.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
</body>

</html>