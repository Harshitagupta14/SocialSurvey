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
    </div>
</form>
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
</body>

</html>