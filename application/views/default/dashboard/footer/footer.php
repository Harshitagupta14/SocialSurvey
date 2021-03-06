<script type="text/javascript">
    $(window).load(function () {
        var upro_views = <?php echo $upro_views; ?>;
        if (upro_views == 1) {
            $("#organization_details_modal").modal('show');
        }
    });
</script>
<div id="organization_details_modal" class="modal fade" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Organization Details</h4>
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="col-md-6"> <h2>Welcome,<br><b class="overflow-ellipsis" id="first_name"><?php echo $user['upro_first_name']; ?></b></h2>
                <p>Before you continue,help us know about your organization so that we can help customize your experience for data collection.</p></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="organization_name">Organization Name:</label>
                    <div class="input-group">
                        <input class="form-control" placeholder="Organization Name" name="organization_name" id="organization_name" value="<?php echo $user['upro_company']; ?>" type="text">
                        <span class="input-group-addon">
                            <i class="fa fa-building-o font-red"></i>
                        </span>
                    </div>
                    <span class="error-block" style="color: red;" id="organization_name_error"></span>
                </div>
                <?php $organization_type = array('0' => 'Non-profit Organization', '1' => 'Private Limited Company', '2' => 'Social Enterprise', '3' => 'Citizen Group/Project Team', '4' => 'Other'); ?>
                <div class="form-group">
                    <label for="organization_type">Organization Type:</label>
                    <div class="input-group">
                        <select class="form-control" placeholder="Organization Type" name="organization_type" id="organization_type" >
                            <?php foreach ($organization_type as $type) { ?>
                                <option value="<?php echo $type; ?>" <?php if ($type == $user['upro_company_type']) { ?>selected="selected" <?php } ?>><?php echo $type; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <span class="error-block" style="color: red;" id="organization_type_error"></span>
                </div>
            </div>
            <div class="col-md-12"><p id="surveyor_login_help" style="color:green"></p></div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-orgainization-id="<?php echo $user['uacc_id']; ?>" id="update_organization" class="btn btn-outline btn-primary">Update</button>
    </div>
</div>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/scripts/app.min.js" type="text/javascript"></script>
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<script type="text/javascript">
    function display_error(error_message) { //common function for displayinga ll the error
        'use strict';
        var snackbarContainer = document.querySelector('#toast-notify');
        'use strict';
        var data = {message: error_message};
        snackbarContainer.MaterialSnackbar.showSnackbar(data);
    }
</script>
<style>.modal.fade.in{top:0%;}</style>
<script>
    $("#update_organization").click(function (e) {
        e.preventDefault();
        var userid = $(this).attr('data-orgainization-id');
        var organization_type = $('#organization_type option:selected').val();
        var organization_name = $('#organization_name').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "ajax-update-organization-details",
            dataType: 'json',
            data: {'organization_id': userid, 'organization_type': organization_type, 'organization_name': organization_name},
            complete: function (stat) {
                var response = stat.responseText;
                var data = JSON.parse(response);
                console.log(data);
                if (data.success === "true") {
                    $('#organization_details_modal').modal('toggle');
                    window.location.reload();
                } else if (data.success === "false") {
                    $('#organization_details_modal').modal('toggle');
                    //alert("Error!!,Please try again later.");
                    //window.location.reload();
                }

            }
        });
    });
</script>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/respond.min.js"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= $this->config->item('adminassets'); ?>global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= $this->config->item('adminassets'); ?>pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?= $this->config->item('adminassets'); ?>layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script src="<?= $this->config->item('adminassets') ?>global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets') ?>global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets') ?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= $this->config->item('adminassets') ?>global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= $this->config->item('adminassets') ?>pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>

</body>

</html>