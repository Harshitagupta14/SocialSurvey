<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css" />
<style>
    .question-overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0,0,0,0.5);
        z-index: 10;
        display:none;
    }
    .question-modal {
        width: 300px;
        height: 200px;
        line-height: 200px;
        position: fixed;
        top: 50%;
        left: 50%;
        margin-top: -100px;
        margin-left: -150px;
        background-color: #46545f;
        border-radius: 5px;
        text-align: center;
        z-index: 11;
        display:none;/* 1px higher than the overlay layer */
    }
</style>
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
                    <span onclick="add_new_question()" class="btn btn-primary add_question"> + Add New Question </span>
                </div>
                <div class="theme-option" id="question-list">

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
        <form method="post" id="survey_form">
            <div class="row">
                <div class="col-md-12">
                    <div class="question-overlay"></div>
                    <div class="question-modal"></div>
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

                                        <select id="select2-single-input-sm" name="survey_type" class="form-control input-sm select2-multiple">
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
                            <input type="hidden" value="<?php echo (isset($question_no) && $question_no != '') ? $question_no : '1'; ?>" name="question_no" id="question_no"/>
                            <input type="hidden" value="save" name="question_state" id="question_state"/>
                            <!-- Default Question Block -->
                            <div id="question-block" style="margin-top:50px;"></div>
                            <!-- Default Question Block Ends -->

                            <!-- Multiple Option Question Block -->
                            <div id="mq-block" style="display:none;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select multiple data-role="tagsinput"  name="multiple_choice[]" placeholder="Multiple Choice Options" id="multiple_choice"></select>
                                    </div>
                                </div>
                            </div>
                            <!-- Multiple Option Question Block Ends -->
                            <div class="row" style="margin-top:20px;">
                                <div class="col-lg-2 col-md-4 col-xs-12">
                                    <div class="mt-element-ribbon bg-grey-steel">
                                        <p class="ribbon ribbon-color-primary uppercase" id="question">Question 1</p>
                                        <!--<input class="ribbon ribbon-color-primary uppercase" id="question" value="Question 1"/>-->
    <!--                                    <input type="hidden" id="question_no" value="1"/>-->
                                        <p class="ribbon-content"><input value="save" class="btn btn-danger" type="submit" id="question_save"><span id="question_tools"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="<?= $this->config->item('adminassets'); ?>global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script type="text/javascript">

            $(document).ready(function () {
    load_question();
    });
            $("#question_save").click(function (e) {
    e.preventDefault();
            var question_state = $('#question_state').val();
            var str = $("#survey_form").serialize();
            $.ajax({
            type: "POST",
                    url: "<?php echo base_url(); ?>" + "ajax-save-question",
                    dataType: 'json',
                    data: {str: str},
                    beforeSend: function(){
                    if (question_state == "update"){
                    $('.question-overlay').show();
                            $('.question-modal').html('<img class="alignleft wp-image-725 size-full" draggable="false" src="http://smallenvelop.com/wp-content/uploads/2014/08/Preloader_1.gif" alt="Loading icon cube" width="64" height="64"><p style="margin:-130px 0 16px; color:#fff;">Updating Question Data...</p>');
                            $('.question-modal').show();
                    } else if (question_state == "save"){
                    $('.question-overlay').show();
                            $('.question-modal').html('<img class="alignleft wp-image-725 size-full" draggable="false" src="http://smallenvelop.com/wp-content/uploads/2014/08/Preloader_1.gif" alt="Loading icon cube" width="64" height="64"><p style="margin:-130px 0 16px; color:#fff;">Save Question Data...</p>');
                            $('.question-modal').show();
                    }
                    },
                    complete: function (stat) {
                    var response = stat.responseText;
                            var data = JSON.parse(response);
                            if (data.success === "true") {
                    if (data.success_state === "save") {
                    reset_form_fields();
                            $('.question-overlay').hide();
                            $('.question-modal').html('');
                            $('.question-modal').hide();
                            var prev_question_no = data.prev_question_no;
                            var next_question_no = data.next_question_no;
                            $('#question-list').append("<div data-question-id='" + prev_question_no + "' style='margin-bottom:10px;'> Question " + prev_question_no + "<span style='margin-left:30px;' class='btn btn-circle btn-icon-only btn-default' onclick='edit_question(" + prev_question_no + ")';><i class='fa fa-edit'></i></span></div>");
                            $('.question-overlay').show();
                            $('.question-modal').html('<span onclick="add_new_question()" class="btn btn-primary add_question"> + Add New Question </span>');
                            $('.add_question').attr("onclick", "add_new_question()");
                            $('.question-modal').show();
                            $('#question').html("Question " + next_question_no);
                            $('#question_no').val(next_question_no);
                    } else   if (data.success_state === "update") {
                    $('.question-overlay').hide();
                            $('.question-modal').html('');
                            $('.question-modal').hide();
                    }
                    } else {
                    alert("Error");
                            $('.question-overlay').hide();
                            $('.question-modal').html('');
                            $('.question-modal').hide();
                    }

                    }
            });
    });
            function load_question() {

            var survey_id = '<?php echo $survey_id; ?>';
                    $.ajax({
                    type: "POST",
                            url: "<?php echo base_url(); ?>" + "ajax-fetch-survey-questions",
                            dataType: 'html',
                            data: {survey_id: survey_id},
                            beforeSend: function(){
                            $('.question-overlay').show();
                                    $('.question-modal').html('<img class="alignleft wp-image-725 size-full" draggable="false" src="http://smallenvelop.com/wp-content/uploads/2014/08/Preloader_1.gif" alt="Loading icon cube" width="64" height="64"><p style="margin:-130px 0 16px; color:#fff;">Loading Questionaries...</p>');
                                    $('.question-modal').show();
                            },
                            success: function (stat) {
                            var data = JSON.parse(stat);
                                    if (data.success === "true"){
                            setTimeout(function(){
                            $('#question-list').html(data.question_list);
                                    handle_edit_question(data);
                            }, 3000);
                            } else if (data.success === "false"){
                            $('.add_question').removeAttr("onclick");
                                    var type = $("#select2-single-input-sm").val();
                                    console.log(type);
                                    var html_div = create_default_fields();
                                    console.log(html_div);
                                    $("#question-block").html(html_div);
                                    var sb_html = create_sb();
                                    $("#question_block").append(sb_html);
                                    setTimeout(function(){
                                    $('.question-overlay').hide();
                                            $('.question-modal').html('');
                                            $('.question-modal').hide();
                                    }, 2000);
                            }
                            }

                    });
            }

    function reset_form_fields(){
    $("#question_title_input").val('');
            $("#help_text_note_input").val('');
            $("#unique_one_word_input").val('');
            $("#qLimitLow").val('');
            $("#qLimitUp").val('');
            $("#select2-single-input-sm").val('');//Survey Type
            $('.bootstrap-tagsinput .tag').remove();
            $("#multiple_choice option:selected").remove();
            $('#multiple_choice input').val('');
    }

    function add_new_question() {
    $('#question_tools').html("");
            //Setting Question State tp Update
            $("#question_state").val("save");
            reset_form_fields();
            var last_question_no = $("#question-list div:last-child").attr('data-question-id');
            var next_question_no = (parseFloat(last_question_no) + parseFloat(1));
            $('.question-overlay').hide();
            $('.question-modal').hide();
            $('#question').html("Question " + next_question_no);
            $('#question_no').val(next_question_no);
            $('.add_question').removeAttr("onclick");
    }

    function edit_question(question_no){

    var survey_id = '<?php echo $survey_id; ?>';
            var question_no = question_no;
            $.ajax({
            type: "POST",
                    url: "<?php echo base_url(); ?>" + "ajax-edit-survey-question",
                    dataType: 'html',
                    data: {survey_id: survey_id, question_no:question_no},
                    beforeSend: function(){
                    $('.question-overlay').show();
                            $('.question-modal').html('<img class="alignleft wp-image-725 size-full" draggable="false" src="http://smallenvelop.com/wp-content/uploads/2014/08/Preloader_1.gif" alt="Loading icon cube" width="64" height="64"><p style="margin:-130px 0 16px; color:#fff;">Loading Question For Editing</p>');
                            $('.question-modal').show();
                    },
                    success: function (stat) {
                    var data = JSON.parse(stat);
                            $('#question-list').html(data.question_list);
                            setTimeout(function(){
                            $('#question').html("Question " + question_no);
                                    $('#question_no').val(question_no);
                                    $('#question_tools').html("<span style='margin-left:15px;' class='btn btn-circle btn-icon-only btn-default' onclick='delete_question(" + question_no + ");'><i class='icon-trash'></i></span>");
                                    handle_edit_question(data);
                            }, 3000);
                    }
            });
    }

    function handle_edit_question(data) {

    //Setting Question State tp Update
    $("#question_state").val("update");
            //Refreshing Input Fields
            reset_form_fields();
            $("#question-block").html('');
            $("#mq-block").hide();
            $('.question-overlay').hide();
            $('.question-modal').html('');
            $('.question-modal').hide();
            console.log(data);
            //Setting Default Fields Values
            if (data.first_question){
    var html_div = create_default_fields(data.first_question);
            var question_data = data.first_question;
            $('#question_tools').html("<span style='margin-left:15px;' class='btn btn-circle btn-icon-only btn-default' onclick='delete_question(" + question_data.question_no + ");'><i class='icon-trash'></i></span>");
    } else{
    var question_data = data.question_data;
            var html_div = create_default_fields(question_data);
    }

    //Setting  Fields Values on Type
    var type = question_data.type_small_name;
            $("#select2-single-input-sm").val(type);
            console.log(html_div);
            $("#question-block").html(html_div);
            if (type == "sb") { //Subjective
    var sb_html = create_sb(question_data);
            $("#question_block").append(sb_html);
    }
    if (type == "mq") { //Multiple Choice
    $("#mq-block").show();
            $('#multiple_choice').tagsinput('destroy');
            var result = question_data.question_multiple_options.split('|');
            console.log(result);
            var i;
            for (i = 0;i < result.length;i++){
    $('select#multiple_choice').tagsinput('refresh');
            $('select#multiple_choice').tagsinput('add', result[i]);
    }

    var mq_choice_html = create_mq("Min Choice", "Max Choice", question_data);
            $("#question_block").append(mq_choice_html);
    }
    if (type == "nm") {
    var nm_choice_html = create_mq("Lower Limit", "Upper Limit", question_data);
            $("#question_block").append(nm_choice_html);
    }

    }

    function delete_question(question_no){
    var survey_id = '<?php echo $survey_id; ?>';
            var last_question_no = $("#question-list div:last-child").attr('data-question-id');
            $.ajax({
            type: "POST",
                    url: "<?php echo base_url(); ?>" + "ajax-delete-survey-question",
                    dataType: 'html',
                    data: {survey_id: survey_id, question_no:question_no},
                    beforeSend: function(){
                    $('.question-overlay').show();
                            $('.question-modal').html('<img class="alignleft wp-image-725 size-full" draggable="false" src="http://smallenvelop.com/wp-content/uploads/2014/08/Preloader_1.gif" alt="Loading icon cube" width="64" height="64"><p style="margin:-130px 0 16px; color:#fff;">Loading Question For Editing</p>');
                            $('.question-modal').show();
                    },
                    success: function (stat) {
                    var data = JSON.parse(stat);
                            $('#question-list').html(data.question_list);
                            setTimeout(function() {
                            $('#question').html("Question " + question_no);
                                    $('#question_no').val(question_no);
                                    handle_edit_question(data);
                            }, 3000);
                    }
            });
    }

    function create_default_fields(data = '') {
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
            question_title_input.setAttribute("id", "question_title_input");
            question_title_input.setAttribute("placeholder", "Question Title");
            question_title_input.setAttribute("type", "text");
            question_title_input.setAttribute("name", "question_title");
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
            help_text_note_surveyor_input.setAttribute("id", "help_text_note_input");
            help_text_note_surveyor_input.setAttribute("name", "help_text_note");
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
            question_block_row_div.appendChild(help_text_note_surveyor_div);var short_keyword_div = document.createElement('div');
            short_keyword_div.className = "col-md-6";
            short_keyword_div.setAttribute("id", "unique_one_word");
            var short_keyword_inner_col_div = document.createElement('div');
            short_keyword_inner_col_div.className = "form-group form-md-line-input";
            var short_keyword_input = document.createElement('input');
            short_keyword_input.className = "form-control";
            short_keyword_input.setAttribute("id", "unique_one_word_input");
            short_keyword_input.setAttribute("name", "unique_one_word");
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
            if (data != '') {
    question_title_input.setAttribute("value", data.question_title);
            help_text_note_surveyor_input.setAttribute("value", data.question_help_text);
            short_keyword_input.setAttribute("value", data.question_one_word);
    }
    return question_block_row_div;
    }

    function create_sb(data = '') {
    var sb_max_characters_row_div = document.createElement('div');
            sb_max_characters_row_div.className = "row";
            sb_max_characters_row_div.setAttribute("id", "mq_choice");
            var sb_max_characters_div = document.createElement('div');
            sb_max_characters_div.className = "col-md-3";
            sb_max_characters_div.setAttribute("id", "mq_choice_low");
            var sb_max_characters_inner_div = document.createElement('div');
            sb_max_characters_inner_div.className = "form-group form-md-line-input";var sb_max_characters_input = document.createElement('input');
            sb_max_characters_input.className = "form-control";
            sb_max_characters_input.setAttribute("id", "qLimitLow");
            sb_max_characters_input.setAttribute("name", "qLimitLow");
            sb_max_characters_input.setAttribute("type", "text");
            sb_max_characters_input.setAttribute("value", "100");var sb_max_characters_label = document.createElement('label');
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
            if (data){
    sb_max_characters_input.setAttribute("value", data.question_limit_lower);
    }
    return sb_max_characters_row_div;}


    function create_mq(low_value, upper_value, data = '') {


    var mq_choice_div = document.createElement('div');
            mq_choice_div.className = "row";
            mq_choice_div.setAttribute("id", "mq_choice");
            var mq_choice_low_div = document.createElement('div');mq_choice_low_div.className = "col-md-3";
            mq_choice_low_div.setAttribute("id", "mq_choice_low");var mq_choice_low_inner_div = document.createElement('div');
            mq_choice_low_inner_div.className = "form-group form-md-line-input";
            var mq_choice_low_input = document.createElement('input');mq_choice_low_input.className = "form-control";
            mq_choice_low_input.setAttribute("id", "qLimitLow");
            mq_choice_low_input.setAttribute("name", "qLimitLow");
            mq_choice_low_input.setAttribute("placeholder", low_value);
            mq_choice_low_input.setAttribute("type", "text");
            mq_choice_low_input.setAttribute("value", "1");
            var mq_choice_low_label = document.createElement('label');
            mq_choice_low_label.setAttribute("for", "form_control_2");mq_choice_low_label.innerHTML = low_value;
            var mq_choice_low_help_block = document.createElement('span');
            mq_choice_low_help_block.className = "help-block";
            mq_choice_low_help_block.innerHTML = low_value;
            mq_choice_low_inner_div.appendChild(mq_choice_low_input);
            mq_choice_low_inner_div.appendChild(mq_choice_low_label);
            mq_choice_low_inner_div.appendChild(mq_choice_low_help_block);
            mq_choice_low_div.appendChild(mq_choice_low_inner_div);
            mq_choice_div.appendChild(mq_choice_low_div);
            var mq_choice_upper_div = document.createElement('div');mq_choice_upper_div.className = "col-md-3";
            mq_choice_upper_div.setAttribute("id", "mq_choice_upper");var mq_choice_upper_inner_div = document.createElement('div');
            mq_choice_upper_inner_div.className = "form-group form-md-line-input";
            var mq_choice_upper_input = document.createElement('input');
            mq_choice_upper_input.className = "form-control";
            mq_choice_upper_input.setAttribute("id", "qLimitUp");
            mq_choice_upper_input.setAttribute("name", "qLimitUp");
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
            if (data != ''){
    mq_choice_low_input.setAttribute("value", data.question_limit_lower);
            mq_choice_upper_input.setAttribute("value", data.question_limit_upper);
    }
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
            $("#question_block").append(nm_choice_html);}
    });
            $('.toggler').click(function (e) {
    e.preventDefault();
            $('.toggler-close').show();
            $('.theme-options').show();
            $('.toggler').hide();
    });
            $('.toggler-close').click(function (e) {
    e.preventDefault();
            $('.toggler-close').hide();
            $('.theme-options').hide();
            $('.toggler').show();
    });
</script>


