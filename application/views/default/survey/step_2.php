<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="theme-panel">
            <div class="toggler tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Click To Manage Your Questions" style="display: none;">
                <i class="icon-settings"></i>
            </div>
            <div class="toggler-close" style="display: block;">
                <i class="icon-close"></i>
            </div>
            <div class="theme-options" style="display: block;">
                <div class="theme-option theme-colors clearfix">
                    <span><a href="#" class="btn btn-primary"> + Add New Question </a></span>
                </div>
                <div class="theme-option">
                    <span> Question 1 </span>
                    <select class="layout-option form-control input-small">
                        <option value="fluid" selected="selected">Fluid</option>
                        <option value="boxed">Boxed</option>
                    </select>
                </div>
            </div>
        </div>
        <br/><br/><br/>
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
                            <i class="fa fa-globe"></i><?php if ($product_id) { ?>Edit<?php } else { ?> Add<?php } ?> Question</div>
                    </div>
                    <div class="portlet light ">

                        <div class="portlet-body">

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="select2-single-input-sm" class="control-label">Select Survey Question Type</label>

                                    <select id="select2-single-input-sm" class="form-control input-sm select2-multiple">
                                        <?php
                                        foreach ($survey_types as $survey) {
                                            if ($survey['type_parent_id'] == 0) {
                                                ?>
                                                <optgroup label="<?php echo $survey['type_name']; ?>"></optgroup>
                                            <?php } else { ?>
                                                <option value="<?php echo $survey['type_small_name']; ?>"><?php echo $survey['type_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>


                            </div>


                        </div>
                        <input type="hidden" value="<?php echo $id; ?>" name="id" id="id"/>
                        <input type="hidden" value="<?php echo $survey_id; ?>" name="survey_id" id="survey_id"/>
                        <!-- Default Question Block -->
                        <div id="question-block" style="margin-top:50px;"></div>
                        <!-- Default Question Block Ends -->

                        <!-- Multiple Option Question Block -->
                        <div id="mq-block" style="display:none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <select multiple data-role="tagsinput" placeholder="Multiple Choice Options" id="multiple_choice"></select>
                                </div>
                            </div>
                        </div>
                        <!-- Multiple Option Question Block Ends -->
                        <div class="row" style="margin-top:20px;">
                            <div class="col-lg-2 col-md-4 col-xs-12">
                                <div class="mt-element-ribbon bg-grey-steel">
                                    <div class="ribbon ribbon-color-primary uppercase">Question 1</div>
                                    <p class="ribbon-content"><input value="save" class="btn btn-danger" type="submit" id="question_save"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        var i = 0;
        $("#question_save").click(function () {
            var max_input;
            var qLimitLow;
            var multiple_choice;
            var question_title = document.getElementById("form_control_1").value;
            var help_text_note = document.getElementById("form_control_2").value;
            var unique_one_word = document.getElementById("form_control_3").value;
            var type = document.getElementById("select2-single-input-sm").value;
            var survey_id = document.getElementById("survey_id").value;
            i = +i + +1;
            if (type == "sb") {
                max_input = document.getElementById("form_control_4").value;
                qLimitLow = 0;
                multiple_choice = 0;
            }
            if (type == "mq") {
                qLimitLow = document.getElementById("qLimitLow").value;
                max_input = document.getElementById("qLimitUp").value;
                multiple_choice = document.getElementById("multiple_choice").value;
            } else {
                max_input = 100;
                qLimitLow = 0;
                multiple_choice = 0;
            }
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "ajax-save-question",
                dataType: 'json',
                data: {question_title: question_title, help_text_note: help_text_note, unique_one_word: unique_one_word, max_input: max_input, type: type, qLimitLow: qLimitLow, multiple_choice: multiple_choice, survey_id: survey_id, i: i},
                complete: function (stat) {
                    var response = stat.responseText;
                    var data = JSON.parse(response);
                    console.log(data.question_data.question_no);
                    if (data.success == "true") {
                        document.getElementById("form_control_1").value = "";
                        document.getElementById("form_control_2").value = "";
                        document.getElementById("form_control_3").value = "";
                        document.getElementById("form_control_4").value = "";
                        document.getElementById("qLimitLow").value = "";
                        document.getElementById("qLimitUp").value = "";
                        document.getElementById("select2-single-input-sm").value = "";
                    } else {
                        alert("Error");
                    }
                }
            });
        });
    });
</script>
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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= $this->config->item('adminassets'); ?>global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= $this->config->item('adminassets'); ?>pages/scripts/components-bootstrap-tagsinput.min.js" type="text/javascript"></script>

<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script>
    function create_default_fields() {

//        var question_no = document.createElement('input');
//        question_no.className = "form-control";
//        question_no.setAttribute("id", "question_no");
//        question_no.setAttribute("type", "text");
//        question_no.setAttribute("value", 0);

        var question_block_row_div = document.createElement('div');
        question_block_row_div.className = "row";
        question_block_row_div.setAttribute("id", "question_block");

        var question_title_col_div = document.createElement('div');
        question_title_col_div.className = "col-md-6";
        question_title_col_div.setAttribute("id", "question_title");

        var question_title_inner_col_div = document.createElement('div');
        question_title_inner_col_div.className = "form-group form-md-line-input";

        var question_title_input = document.createElement('input');
        question_title_input.className = "form-control";
        question_title_input.setAttribute("id", "form_control_1");
        question_title_input.setAttribute("placeholder", "Question Title");
        question_title_input.setAttribute("type", "text");

        var question_title_label = document.createElement('label');
        question_title_label.setAttribute("for", "form_control_1");
        question_title_label.innerHTML = "Question Title";

        var question_title_help_block = document.createElement('span');
        question_title_help_block.className = "help-block";
        question_title_help_block.innerHTML = "Question Title Goes Here";

//        question_title_inner_col_div.appendChild(question_no);
        question_title_inner_col_div.appendChild(question_title_input);
        question_title_inner_col_div.appendChild(question_title_label);
        question_title_inner_col_div.appendChild(question_title_help_block);
        question_title_col_div.appendChild(question_title_inner_col_div);

        question_block_row_div.appendChild(question_title_col_div);

        var help_text_note_surveyor_div = document.createElement('div');
        help_text_note_surveyor_div.className = "col-md-6";
        help_text_note_surveyor_div.setAttribute("id", "help_text_note");

        var help_text_note_surveyor_inner_col_div = document.createElement('div');
        help_text_note_surveyor_inner_col_div.className = "form-group form-md-line-input";

        var help_text_note_surveyor_input = document.createElement('input');
        help_text_note_surveyor_input.className = "form-control";
        help_text_note_surveyor_input.setAttribute("id", "form_control_2");
        help_text_note_surveyor_input.setAttribute("placeholder", "Help Text For Surveyor");
        help_text_note_surveyor_input.setAttribute("type", "text");

        var help_text_note_surveyor_label = document.createElement('label');
        help_text_note_surveyor_label.setAttribute("for", "form_control_2");
        help_text_note_surveyor_label.innerHTML = "Help Text For Surveyor";

        var help_text_note_surveyor_help_block = document.createElement('span');
        help_text_note_surveyor_help_block.className = "help-block";
        help_text_note_surveyor_help_block.innerHTML = "Help Text For Surveyor";


        help_text_note_surveyor_inner_col_div.appendChild(help_text_note_surveyor_input);
        help_text_note_surveyor_inner_col_div.appendChild(help_text_note_surveyor_label);
        help_text_note_surveyor_inner_col_div.appendChild(help_text_note_surveyor_help_block);
        help_text_note_surveyor_div.appendChild(help_text_note_surveyor_inner_col_div);
        question_block_row_div.appendChild(help_text_note_surveyor_div);

        var short_keyword_div = document.createElement('div');
        short_keyword_div.className = "col-md-6";
        short_keyword_div.setAttribute("id", "help_text_note");

        var short_keyword_inner_col_div = document.createElement('div');
        short_keyword_inner_col_div.className = "form-group form-md-line-input";

        var short_keyword_input = document.createElement('input');
        short_keyword_input.className = "form-control";
        short_keyword_input.setAttribute("id", "form_control_3");
        short_keyword_input.setAttribute("placeholder", "Unique One Word");
        short_keyword_input.setAttribute("type", "text");

        var short_keyword_label = document.createElement('label');
        short_keyword_label.setAttribute("for", "form_control_3");
        short_keyword_label.innerHTML = "Short Keyword For Question.";

        var short_keyword_help_block = document.createElement('span');
        short_keyword_help_block.className = "help-block";
        short_keyword_help_block.innerHTML = "Short Keyword For Question.";


        short_keyword_inner_col_div.appendChild(short_keyword_input);
        short_keyword_inner_col_div.appendChild(short_keyword_label);
        short_keyword_inner_col_div.appendChild(short_keyword_help_block);
        short_keyword_div.appendChild(short_keyword_inner_col_div);

        question_block_row_div.appendChild(short_keyword_div);
        return question_block_row_div;
    }

    function create_sb() {
        var sb_max_characters_row_div = document.createElement('div');
        sb_max_characters_row_div.className = "row";
        sb_max_characters_row_div.setAttribute("id", "mq_choice");

        var sb_max_characters_div = document.createElement('div');
        sb_max_characters_div.className = "col-md-3";
        sb_max_characters_div.setAttribute("id", "mq_choice_low");

        var sb_max_characters_inner_div = document.createElement('div');
        sb_max_characters_inner_div.className = "form-group form-md-line-input";

        var sb_max_characters_input = document.createElement('input');
        sb_max_characters_input.className = "form-control";
        sb_max_characters_input.setAttribute("id", "form_control_4");
        sb_max_characters_input.setAttribute("type", "text");
        sb_max_characters_input.setAttribute("value", "100");

        var sb_max_characters_label = document.createElement('label');
        sb_max_characters_label.setAttribute("for", "form_control_4");
        sb_max_characters_label.innerHTML = "Max Cahracters Allowed";

        var sb_max_characters_help_block = document.createElement('span');
        sb_max_characters_help_block.className = "help-block";
        sb_max_characters_help_block.innerHTML = "Max Cahracters Allowed";


        sb_max_characters_inner_div.appendChild(sb_max_characters_input);
        sb_max_characters_inner_div.appendChild(sb_max_characters_label);
        sb_max_characters_inner_div.appendChild(sb_max_characters_help_block);
        sb_max_characters_div.appendChild(sb_max_characters_inner_div);
        sb_max_characters_row_div.appendChild(sb_max_characters_div);

        return sb_max_characters_row_div;
    }


    function create_mq(low_value, upper_value) {


        var mq_choice_div = document.createElement('div');
        mq_choice_div.className = "row";
        mq_choice_div.setAttribute("id", "mq_choice");

        var mq_choice_low_div = document.createElement('div');
        mq_choice_low_div.className = "col-md-3";
        mq_choice_low_div.setAttribute("id", "mq_choice_low");

        var mq_choice_low_inner_div = document.createElement('div');
        mq_choice_low_inner_div.className = "form-group form-md-line-input";

        var mq_choice_low_input = document.createElement('input');
        mq_choice_low_input.className = "form-control";
        mq_choice_low_input.setAttribute("id", "qLimitLow");
        mq_choice_low_input.setAttribute("placeholder", low_value);
        mq_choice_low_input.setAttribute("type", "text");
        mq_choice_low_input.setAttribute("value", "1");

        var mq_choice_low_label = document.createElement('label');
        mq_choice_low_label.setAttribute("for", "form_control_2");
        mq_choice_low_label.innerHTML = low_value;

        var mq_choice_low_help_block = document.createElement('span');
        mq_choice_low_help_block.className = "help-block";
        mq_choice_low_help_block.innerHTML = low_value;


        mq_choice_low_inner_div.appendChild(mq_choice_low_input);
        mq_choice_low_inner_div.appendChild(mq_choice_low_label);
        mq_choice_low_inner_div.appendChild(mq_choice_low_help_block);
        mq_choice_low_div.appendChild(mq_choice_low_inner_div);
        mq_choice_div.appendChild(mq_choice_low_div);

        var mq_choice_upper_div = document.createElement('div');
        mq_choice_upper_div.className = "col-md-3";
        mq_choice_upper_div.setAttribute("id", "mq_choice_upper");

        var mq_choice_upper_inner_div = document.createElement('div');
        mq_choice_upper_inner_div.className = "form-group form-md-line-input";

        var mq_choice_upper_input = document.createElement('input');
        mq_choice_upper_input.className = "form-control";
        mq_choice_upper_input.setAttribute("id", "qLimitUp");
        mq_choice_upper_input.setAttribute("placeholder", upper_value);
        mq_choice_upper_input.setAttribute("type", "text");
        mq_choice_upper_input.setAttribute("value", "1");

        var mq_choice_upper_label = document.createElement('label');
        mq_choice_upper_label.setAttribute("for", "form_control_2");
        mq_choice_upper_label.innerHTML = upper_value;

        var mq_choice_upper_help_block = document.createElement('span');
        mq_choice_upper_help_block.className = "help-block";
        mq_choice_upper_help_block.innerHTML = upper_value;


        mq_choice_upper_inner_div.appendChild(mq_choice_upper_input);
        mq_choice_upper_inner_div.appendChild(mq_choice_upper_label);
        mq_choice_upper_inner_div.appendChild(mq_choice_upper_help_block);
        mq_choice_upper_div.appendChild(mq_choice_upper_inner_div);
        mq_choice_div.appendChild(mq_choice_upper_div);


        return mq_choice_div;
    }


    $("#select2-single-input-sm").change(function () {
        $("#mq-block").hide();
        var type = $(this).val();
        console.log(type);
        var html_div = create_default_fields();
        console.log(html_div);
        $("#question-block").html(html_div);

        if (type == "sb") {
            var sb_html = create_sb();
            $("#question_block").append(sb_html);
        }
        if (type == "mq") {
            $("#mq-block").show();
            var mq_choice_html = create_mq("Min Choice", "Max Choice");
            $("#question_block").append(mq_choice_html);
        }
        if (type == "nm") {
            var nm_choice_html = create_mq("Lower Limit", "Upper Limit");
            $("#question_block").append(nm_choice_html);
        }
    });

    window.onload = function () {
        var type = $("#select2-single-input-sm").val();
        console.log(type);
        var html_div = create_default_fields();
        console.log(html_div);
        $("#question-block").html(html_div);
        var sb_html = create_sb();
        $("#question_block").append(sb_html);
    };
</script>


