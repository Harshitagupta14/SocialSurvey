<script type="text/javascript">
     $(window).load(function(){
        var upro_views = <?php echo $upro_views; ?>;
        if(upro_views == 1){
        $("#organization_details_modal").modal('show');
        }
    });
</script>
<div class="page-content-wrapper">
    <div class="page-content">
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
    </div>
    <!-- END PORTLET MAIN -->
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
    function validate_form() {
        var survey_title = $("#survey_title").val();
        if (survey_title == '') {
            var error = "TITLE OF THE SURVEY IS A REQUIRED FIELD";
            display_error(error);
            return false;
        }
        return true;
    }
</script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= $this->config->item('adminassets'); ?>global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
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
<script>
    $("#update_organization").click(function (e) {
        e.preventDefault();
        var userid = $(this).attr('data-orgainization-id');
        var organization_type = $('#organization_type option:selected').val();
        var organization_name = $('#organization_name').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "ajax_update_organization_details_first_time",
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