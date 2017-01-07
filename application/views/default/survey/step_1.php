<!-- BEGIN PAGE LEVEL PLUGINS -->

<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?= site_url('admin/dashboard') ?>">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="active"><?php echo isset($product_id) ? $breadcum_edit : $breadcum ?></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php if ($this->session->flashdata('ProductSuccess')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('ProductSuccess') ?></div>
                <?php } ?>
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i><?php if ($product_id) { ?>Edit<?php } else { ?> Create<?php } ?> Survey</div>
                    </div>
                    <div class="portlet-body">
                        <div class="page-content-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group form-md-line-input">
                                                <div class="col-md-offset-4 col-md-4">
                                                    <input class="form-control " id="form_control_1" placeholder="Survey Title" name="survey_title"  type="text">
                                                    <span class="help-block">Enter a name for survey...</span>
                                                    <span class="help-block" style="color: red;"><?= strip_tags(form_error('survey_title')) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-offset-4 col-md-4">
                                                <label for="category" class="control-label" style="margin-bottom:5px;">Category</label>
                                                <select class="bs-select form-control" name="survey_category" id="category">
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                </select>
                                                <span class="help-block" style="color: red;"><?= strip_tags(form_error('survey_category')) ?></span>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-offset-4 col-md-4">
                                                <label for="type" class="control-label" style="margin-bottom:5px;">Type</label>
                                                <select class="bs-select form-control" name="survey_type" id="category">
                                                    <option value="SI">Simple</option>
                                                    <option value="OB">Observation</option>
                                                </select>
                                                <span class="help-block" style="color: red;"><?= strip_tags(form_error('survey_type')) ?></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-offset-4 col-md-3" style="margin-top:20px;">
                                                <a href="" type="submit" class="btn btn-danger" value="Cancel" name="login_user">Cancel</a>
                                            </div>
                                            <div class="col-md-4" style="margin-top:20px;">
                                                <input type="submit" class="btn btn-primary" value="Submit" name="login_user">
                                                <input type="hidden" value="save" name="form_submit">
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            //alert(input.id);
                            reader.onload = function (e) {
                                $('#' + input.id + '_preview').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                </script>

                <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="<?= $this->config->item('adminassets'); ?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                <!-- BEGIN THEME GLOBAL SCRIPTS -->
                <script src="<?= $this->config->item('adminassets'); ?>global/scripts/app.min.js" type="text/javascript"></script>
                <!-- END THEME GLOBAL SCRIPTS -->
                <!-- BEGIN PAGE LEVEL SCRIPTS -->