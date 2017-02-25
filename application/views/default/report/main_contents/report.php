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
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
<style>
    .btn:not(.md-skip){
        padding:8px 44px 8px;
    }
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <form action="#" class="form-horizontal">
            <div class="form-group">
                <div class="col-md-4">
                    <div class="input-group select2-bootstrap-append">
                        <select id="selected_survey" class="form-control select2">
                            <option>Select Survey</option>
                            <?php foreach ($surveys as $survey) { ?>
                                <option value="<?php echo $survey["survey_id"]; ?>"><?php echo $survey["survey_title"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-md-4">
                    <div id="reportrange" class="btn default">
                        <i class="fa fa-calendar"></i> &nbsp;
                        <span id="date">February 22, 2017 - February 22, 2017</span>
                        <b class="fa fa-angle-down"></b>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <div class="input-group select2-bootstrap-append">
                        <select id="multi-append" class="form-control select2" multiple placeholder="Select Surveyor" name="multi-append[]">
                            <option value="all">All Auditors</option>
                            <?php foreach ($auditors as $auditor) { ?>
                                <option value="<?php echo $auditor["uacc_id"]; ?>"><?php echo $auditor["uacc_username"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <div class="input-group select2-bootstrap-append">
                        <select id="publish_draft" class="form-control select2">
                            <option value="published">Published</option>
                            <option value="draft">Drafted</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" id="search_button">Fetch</button>
        </form>
        <div id="data_table"></div>
        <div id="pageNavPosition"></div>
        <script>
            var view_data = new Array();
            $("#search_button").click(function (e) {
                e.preventDefault();
                var selected_survey = $("#selected_survey option:selected").val();
                var date = $("#date").text();
                var selected_auditor = $("#multi-append").val();
                var publish_draft = $("#publish_draft option:selected").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "ajax-generate-surveyor-report",
                    dataType: 'json',
                    data: {
                        selected_survey: selected_survey, date: date, selected_auditor: selected_auditor, publish_draft: publish_draft
                    },
                    success: function (stat) {
                        view_data.length = 0;
                        var table;
                        table = $('#sample_2').DataTable({destroy: true,
                            bLengthChange: false,
                            paging: false});
                        if (table) {
                            table.clear();
                        }
                        for (var i = 0; i < stat.reports.length; i++) {
                            table.row.add([(i + 1), stat.reports[i].upro_first_name, stat.reports[i].survey_res_status, stat.reports[i].add_time, "<a href='#' onclick='javascript:view_response(" + i + ")'><i class='fa fa-eye' aria-hidden='true'></i>&nbsp;</a><a href><i class='fa fa-trash-o' aria-hidden='true'></i></a>"]);
                            view_data.push(JSON.stringify(stat.reports[i]));

                        }
                        table.draw();
                    }
                });

            });

            function view_response(i) {
                var data = JSON.parse(view_data[i]);
                var modal_html = "<table class='table table-striped table-bordered table-hover table-checkable order-column'><thead><th>SNO</th><th>Question Number</th><th>Question Response</th><th>Question Type</th></thead>";
                var question_array = data.question_no.split(",");
                var question_array_size = question_array.length;
                var question_response = data.question_response.split(",");
                var question_type = data.question_type.split(",");
                for (i = 0; i < question_array_size; i++) {
                    modal_html += "<tr><td>" + (i+1) + "</td><td>" + question_array[i]+"</td><td>" + question_response[i] + "</td><td>" + question_type[i] + "</td></tr>";
                }
                modal_html += "</table>";
                document.getElementById('view_data').innerHTML = modal_html;
                $('#response_view').modal('show');
            }
        </script>

        <div id="response_view" class="modal fade">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">View</h4>
            </div>
            <div class="modal-body" id="view_data">

            </div>
        </div>

        <!--Table -->
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
            <thead>
                <tr>
<!--                    <th>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                            <span></span>
                        </label>
                    </th>-->
                    <th> SNO </th>
                    <th> Auditor  </th>
                    <th> Status </th>
                    <th> Joined </th>
                    <th> Actions </th>
                </tr>
            </thead>
            <tbody>

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