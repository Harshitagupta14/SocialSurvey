
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
            //alert(input.id);
            reader.onload = function(e) {
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
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<script type="text/javascript">
            function display_error(error_message) { //common function for displayinga ll the error

            'use strict';
                    var snackbarContainer = document.querySelector('#toast-notify');
                    'use strict';
                    var data = {
                    message: error_message
                    };
                    snackbarContainer.MaterialSnackbar.showSnackbar(data);
            }
</script>
<script>
    setTimeout(function(){
    if (typeof (document.querySelector('#message')) != 'undefined' && document.querySelector('#message') != null) {
    document.querySelector('#message').style.display = "none";
    }
    }, 3000);
            var base_url = '<?php echo base_url(); ?>';
            $(document).ready(function() {
    load_question();
    });
            $("#question_save_btn").click(function(e) {
    e.preventDefault();
            var selected_type = $("#select2-single-input-sm option:selected").text();
            var question_title_input = $("#question_title_input").val();
            var valid = validate_form();
            if (valid) {
    var question_state = $('#question_state').val();
            var str = $("#survey_form").serialize();
            $.ajax({
            type: "POST",
                    url: "<?php echo base_url(); ?>" + "ajax-save-question",
                    dataType: 'json',
                    data: {
                    str: str
                    },
                    beforeSend: function() {
                    if (question_state == "update") {
                    $('.question-overlay').show();
                            $('.question-modal').html('<img class="alignleft wp-image-725 size-full" draggable="false" src="' + base_url + 'assets/frontend/img/preloader.gif" alt="Loading icon cube" width="64" height="64"><p style="margin:-130px 0 16px; color:#fff;">Updating Question Data...</p>');
                            $('.question-modal').show();
                    } else if (question_state == "save") {
                    $('.question-overlay').show();
                            $('.question-modal').html('<img class="alignleft wp-image-725 size-full" draggable="false" src="' + base_url + 'assets/frontend/img/preloader.gif" alt="Loading icon cube" width="64" height="64"><p style="margin:-130px 0 16px; color:#fff;">Save Question Data...</p>');
                            $('.question-modal').show();
                    }
                    },
                    complete: function(stat) {
                    var response = stat.responseText;
                            var data = JSON.parse(response);
                            if (data.success === "true") {
                    document.getElementById('publish_check').value = 'yes';
                            if (data.success_state === "save") {
                    document.getElementById('publish_check').value = 'yes';
                            change_to_save_btn();
                            //reset_form_fields();
                            $('.question-overlay').hide();
                            $('.question-modal').html('');
                            $('.question-modal').hide();
                            var prev_question_no = data.prev_question_no;
                            var next_question_no = data.next_question_no;
                            $('#question-list').append("<div data-question-id='" + prev_question_no + "' style='margin-bottom:10px;' class='row question-row'> <span class='badge badge-danger'> " + prev_question_no + " </span> " + question_title_input + " </br><div class='col-lg-7 col-md-7 col-sm-7 col-xs-7'><label class='label label-warning'>" + selected_type + "</label></div><div class='col-lg-5 col-md-5 col-sm-5 col-xs-5'><span  class='btn btn-icon-only btn-default' onclick='edit_question(" + prev_question_no + ")';><i class='fa fa-edit'></i></span></div></div>");
                            $('.question-overlay').show();
                            $('.question-modal').html('<h4 style="margin-top:60px; color:#fff;"><i class="fa fa-check-circle m-r-5"></i>Your Question was saved succesfully</h4><span onclick="add_new_question()" class="btn btn-primary add_question"  style="margin-bottom:150px;"> + Add New Question </span>');
                            $('#survey_question_time').html("<i class='fa fa-clock-o' aria-hidden='true'></i>" + approxDateDiff(data.question_data.add_time) + " ago");
                            $('.add_question').attr("onclick", "add_new_question()");
                            $('.question-modal').show();
                            //$('#question').html("Question " + next_question_no);
                            //$('#question_no').val(next_question_no);
                    } else if (data.success_state === "update") {
                    document.getElementById('publish_check').value = 'yes';
                            change_to_update_btn();
                            var question_no = $('#question_no').val();
                            $('#question-list > div[data-question-id="' + question_no + '"]').html("<span class='badge badge-danger' style='margin-right:10px;'> " + question_no + " </span>" + question_title_input + " </br><div class='col-lg-7 col-md-7 col-sm-7 col-xs-7'><label class='label label-warning'>" + selected_type + "</label></div><div class='col-lg-5 col-md-5 col-sm-5 col-xs-5'><span class='btn btn-icon-only btn-default' onclick='edit_question(" + question_no + ")';><i class='fa fa-edit'></i></span></div>");
                            $('#survey_question_time').html("<i class='fa fa-clock-o' aria-hidden='true'></i>" + approxDateDiff(data.question_data.add_time) + " ago");
                            $('.question-overlay').hide();
                            $('.question-modal').html('');
                            $('.question-modal').hide();
                    }
                    } else {
                    //Displaying Validation Errors From Server Side
                    var error_array = data.error.split("\n");
                            for (var i = 0; i < error_array.length; i++) {
                    var value = error_array[i];
                            if (value !== ''){
                    display_error(error_array[i]);
                    }
                    }

                    $('.question-overlay').hide();
                            $('.question-modal').html('');
                            $('.question-modal').hide();
                    }

                    }
            });
    }
    });
            function change_to_save_btn() {
            $('#question_save_btn').attr('style', 'display:inline-block;');
                    $('#question_save_btn').attr('class', 'btn btn-primary')
                    $('#question_save_btn').html('<span><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</span>');
            }

    function change_to_update_btn() {
    $('#question_save_btn').attr('style', 'display:inline-block;');
            $('#question_save_btn').attr('class', 'btn btn-danger')
            $('#question_save_btn').html('<span><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Update</span>');
    }

    function load_question() {

    var survey_id = '<?php echo $survey_id; ?>';
            $.ajax({
            type: "POST",
                    url: "<?php echo base_url(); ?>" + "ajax-fetch-survey-questions",
                    dataType: 'html',
                    data: {
                    survey_id: survey_id
                    },
                    beforeSend: function() {
                    $('.question-overlay').show();
                            $('.question-modal').html('<img class="alignleft wp-image-725 size-full" draggable="false" src="' + base_url + 'assets/frontend/img/preloader.gif" alt="Loading icon cube" width="64" height="64"><p style="margin:-130px 0 16px; color:#fff;">Loading Questionaries...</p>');
                            $('.question-modal').show();
                    },
                    success: function(stat) {
                    var data = JSON.parse(stat);
                            if (data.success === "true") {
                    document.getElementById('publish_check').value = 'yes';
                            setTimeout(function() {
                            change_to_update_btn();
                                    $('#question-list').html(data.question_list);
                                    $('#survey_question_time').html("<i class='fa fa-clock-o' aria-hidden='true'></i>" + approxDateDiff(data.first_question.add_time) + " ago");
                                    handle_edit_question(data);
                            }, 3000);
                    } else if (data.success === "false") {
                    document.getElementById('publish_check').value = 'no';
                            $('#question-list').html('');
                            reset_form_fields();
                            $('.add_question').removeAttr("onclick");
                            var html_div = create_default_fields();
                            $("#question-block").html(html_div);
                            var sb_html = create_sb();
                            $("#question_block").append(sb_html);
                            $("#select2-single-input-sm").val("sb");
                            setTimeout(function() {
                            $('.question-overlay').hide();
                                    $('.question-modal').html('');
                                    $('.question-modal').hide();
                            }, 2000);
                            $('#question_tools').html('');
                            $('#question_no').val(1);
                            $('#survey_question_time').html('');
                            $('#publish_update').html('');
                            $('#question_state').val('save');
                            change_to_save_btn();
                    }
                    }

            });
    }

    function reset_form_fields() {
    $("#question_title_input").val('');
            $("#help_text_note_input").val('');
            $("#unique_one_word_input").val('');
            $("#qLimitLow").val('');
            $("#qLimitUp").val('');
            $("#select2-single-input-sm").val(''); //Survey Type
            $('.bootstrap-tagsinput .tag').remove();
            $("#multiple_choice option:selected").remove();
            $('#multiple_choice input').val('');
    }

    function add_new_question() {
    $('#question_tools').html("");
            //Setting Question State tp Update
            $("#question_state").val("save");
            var last_active_question_no = $('#question_no').val();
            $('#question-list > div[data-question-id="' + last_active_question_no + '"]').attr("class", "row question-row");
            reset_form_fields();
            var last_question_no = $("#question-list").children().last().attr('data-question-id');
            var next_question_no = (parseFloat(last_question_no) + parseFloat(1));
            $('.question-overlay').hide();
            $('.question-modal').hide();
            $('#question').html("Question " + next_question_no);
            $('#question_no').val(next_question_no);
            $('.add_question').removeAttr("onclick");
            $('#survey_question_time').html("");
            change_to_save_btn();
    }

    function edit_question(question_no) {

    var survey_id = '<?php echo $survey_id; ?>';
            var question_no = question_no;
            $.ajax({
            type: "POST",
                    url: "<?php echo base_url(); ?>" + "ajax-edit-survey-question",
                    dataType: 'html',
                    data: {
                    survey_id: survey_id,
                            question_no: question_no
                    },
                    beforeSend: function() {
                    $('.question-overlay').show();
                            $('.question-modal').html('<img class="alignleft wp-image-725 size-full" draggable="false" src="' + base_url + 'assets/frontend/img/preloader.gif" alt="Loading icon cube" width="64" height="64"><p style="margin:-130px 0 16px; color:#fff;">Loading Question For Editing</p>');
                            $('.question-modal').show();
                    },
                    success: function(stat) {
                    var data = JSON.parse(stat);
                            if (data.success === "true") {
                    $('.add_question').attr("onclick", "add_new_question()");
                            change_to_update_btn();
                            $('#question-list').html(data.question_list);
                            setTimeout(function() {
                            $('#question').html("Question " + question_no);
                                    $('#survey_question_time').html("<i class='fa fa-clock-o' aria-hidden='true'></i>" + approxDateDiff(data.question_data.add_time) + " ago");
                                    $('#question_no').val(question_no);
                                    //    $('#question-list > div[data-question-id="' + question_no + '"]').html("<div data-question-id='" + question_no + "' style='margin-bottom:10px;' class='question-active row question-row'> <span class='badge badge-danger' style='margin-right:10px;'> " + question_no + " </span>" + data.question_data.question_title + " </br><div class='col-lg-7 col-md-7 col-sm-7 col-xs-7'><label class='label label-warning'>" + data.question_data.type_name + "</label></div><div class='col-lg-5 col-md-5 col-sm-5 col-xs-5'><span class='btn btn-icon-only btn-default' onclick='edit_question(" + question_no + ")';><i class='fa fa-edit'></i></span></div></div>");
                                    $('#question_tools').html("<span style='margin-left:15px;' class='btn btn-circle btn-icon-only btn-default' onclick='delete_question(" + question_no + ");'><i class='icon-trash'></i></span>");
                                    handle_edit_question(data);
                            }, 3000);
                    } else if (data.success === "false") {
                    alert("Something Went Wrong, Please try Reloading the Survey.")
                    }
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
            if (data.first_question) {
    var type = data.first_question.type_small_name;
            if (type != 'hsb'){
    var html_div = create_default_fields(data.first_question);
    } else{
    var html_div = create_section_break_fields(data.first_question);
    }

    var question_data = data.first_question;
            $('#question').html("Question " + question_data.question_no);
            $('#question_tools').html("<span style='margin-left:15px;' class='btn btn-circle btn-icon-only btn-default' onclick='delete_question(" + question_data.question_no + ");'><i class='icon-trash'></i></span>");
    } else {
    var question_data = data.question_data;
            var type = data.question_data.type_small_name;
            if (type != 'hsb'){
    var html_div = create_default_fields(data.question_data);
    } else{
    var html_div = create_section_break_fields(data.first_question);
    }
    var html_div = create_default_fields(question_data);
    }

    //Setting  Fields Values on Type

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
            for (i = 0; i < result.length; i++) {
    $('select#multiple_choice').tagsinput('refresh');
            $('select#multiple_choice').tagsinput('add', result[i]);
    }

    var mq_choice_html = create_mq(false, "Max Choice", question_data);
            $("#question_block").append(mq_choice_html);
    }
    if (type == "nm") {
    var nm_choice_html = create_mq("Lower Limit", "Upper Limit", question_data);
            $("#question_block").append(nm_choice_html);
    }
    if (type == "hn") {
    var hn_choice_html = create_mq(false, "Max Characters", question_data);
            $("#question_block").append(hn_choice_html);
    }
    if (type == "sc") { //Subjective
    var sc_html = create_sc(question_data);
            $("#question_block").append(sc_html);
    }
    }

    function delete_question(question_no) {
    var survey_id = '<?php echo $survey_id; ?>';
            var last_question_no = $("#question-list div:last-child").attr('data-question-id');
            $.ajax({
            type: "POST",
                    url: "<?php echo base_url(); ?>" + "ajax-delete-survey-question",
                    dataType: 'html',
                    data: {
                    survey_id: survey_id,
                            question_no: question_no
                    },
                    beforeSend: function() {
                    $('.question-overlay').show();
                            $('.question-modal').html('<img class="alignleft wp-image-725 size-full" draggable="false" src="' + base_url + 'assets/frontend/img/preloader.gif" alt="Loading icon cube" width="64" height="64"><p style="margin:-130px 0 16px; color:#fff;">Deleting the Question, Please wait.</p>');
                            $('.question-modal').show();
                    },
                    success: function(stat) {
                    var data = JSON.parse(stat);
                            if (data.success == "true") {
                    if (data.question_count == 0) {
                    document.getElementById('publish_check').value = 'no';
                            $('#survey_question_time').html('');
                    }
                    load_question();
                    } else {
                    if (data.question_count == 0) {
                    document.getElementById('publish_check').value = 'no';
                            $('#survey_question_time').html('');
                    }
                    alert("Something went Wrong!!!");
                    }

                    }
            });
    }

    function create_default_fields(data = '') {
    var question_block_row_div = document.createElement('div'); question_block_row_div.className = "row";
            question_block_row_div.setAttribute("id", "question_block");
            var question_mandatory_div = document.createElement('fieldset'); question_mandatory_div.className = "col-md-2";
            question_mandatory_div.setAttribute("id", "mandatory");
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
            question_block_row_div.appendChild(question_mandatory_div);
            var help_text_note_surveyor_div = document.createElement('div');
            help_text_note_surveyor_div.className = "col-md-6";
            help_text_note_surveyor_div.setAttribute("id", "help_text_note");
            var help_text_note_surveyor_inner_col_div = document.createElement('div');
            help_text_note_surveyor_inner_col_div.className = "form-group form-md-line-input";
            var help_text_note_surveyor_input = document.createElement('input');
            help_text_note_surveyor_input.className = "form-control";
            help_text_note_surveyor_input.setAttribute("id", "help_text_note_input");
            help_text_note_surveyor_input.setAttribute("name", "question_help_text");
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
            short_keyword_div.setAttribute("id", "unique_one_word");
            var short_keyword_inner_col_div = document.createElement('div');
            short_keyword_inner_col_div.className = "form-group form-md-line-input";
            var short_keyword_input = document.createElement('input');
            short_keyword_input.className = "form-control";
            short_keyword_input.setAttribute("id", "unique_one_word_input");
            short_keyword_input.setAttribute("name", "question_one_word");
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
            /**var question_mandatory = document.createElement('input');
             question_mandatory.className = "question_mandatory";
             question_mandatory.setAttribute("type", "checkbox");
             question_mandatory.setAttribute("value", 1);              question_mandatory.setAttribute("name", "question_mandatory");
             question_mandatory_div.appendChild(question_mandatory);*/
            if (data != '') {
    question_title_input.setAttribute("value", data.question_title);
            help_text_note_surveyor_input.setAttribute("value", data.question_help_text);
            short_keyword_input.setAttribute("value", data.question_one_word);
    }
    return question_block_row_div;
    }

    function create_sb(data = '') {
    var sb_max_characters_row_div = document.createElement('div'); sb_max_characters_row_div.className = "row";
            sb_max_characters_row_div.setAttribute("id", "mq_choice");
            var sb_max_characters_div = document.createElement('div');
            sb_max_characters_div.className = "col-md-3";
            sb_max_characters_div.setAttribute("id", "mq_choice_low");
            var sb_max_characters_inner_div = document.createElement('div');
            sb_max_characters_inner_div.className = "form-group form-md-line-input";
            var sb_max_characters_input = document.createElement('input');
            sb_max_characters_input.className = "form-control";
            sb_max_characters_input.setAttribute("id", "qLimitUp");
            sb_max_characters_input.setAttribute("name", "question_limit_upper");
            sb_max_characters_input.setAttribute("type", "text");
            sb_max_characters_input.setAttribute("value", "100");
            sb_max_characters_input.setAttribute("onkeypress", "return isNumber(event)");
            var sb_max_characters_label = document.createElement('label');
            sb_max_characters_label.setAttribute("for", "form_control_4");
            sb_max_characters_label.innerHTML = "Max Characters Allowed";
            var sb_max_characters_help_block = document.createElement('span');
            sb_max_characters_help_block.className = "help-block";
            sb_max_characters_help_block.innerHTML = "Max Characters Allowed";
            sb_max_characters_inner_div.appendChild(sb_max_characters_input);
            sb_max_characters_inner_div.appendChild(sb_max_characters_label);
            sb_max_characters_inner_div.appendChild(sb_max_characters_help_block);
            sb_max_characters_div.appendChild(sb_max_characters_inner_div);
            sb_max_characters_row_div.appendChild(sb_max_characters_div);
            if (data) {
    if (typeof (data.question_limit_upper) !== 'undefined') {
    sb_max_characters_input.setAttribute("value", data.question_limit_upper);
    }
    }
    return sb_max_characters_row_div;
    }

    function create_mq(low_value = false, upper_value = false, data = '') {

    var mq_choice_div = document.createElement('div');
            mq_choice_div.className = "row";
            mq_choice_div.setAttribute("id", "mq_choice");
            if (upper_value != false){
    var mq_choice_upper_div = document.createElement('div');
            mq_choice_upper_div.className = "col-md-3";
            mq_choice_upper_div.setAttribute("id", "mq_choice_upper");
            var mq_choice_upper_inner_div = document.createElement('div');
            mq_choice_upper_inner_div.className = "form-group form-md-line-input";
            var mq_choice_upper_input = document.createElement('input');
            mq_choice_upper_input.className = "form-control";
            mq_choice_upper_input.setAttribute("id", "qLimitUp");
            mq_choice_upper_input.setAttribute("name", "question_limit_upper");
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
    }
    if (low_value != false){
    var mq_choice_low_div = document.createElement('div');
            mq_choice_low_div.className = "col-md-3";
            mq_choice_low_div.setAttribute("id", "mq_choice_low");
            var mq_choice_low_inner_div = document.createElement('div');
            mq_choice_low_inner_div.className = "form-group form-md-line-input";
            var mq_choice_low_input = document.createElement('input');
            mq_choice_low_input.className = "form-control";
            mq_choice_low_input.setAttribute("id", "qLimitLow");
            mq_choice_low_input.setAttribute("name", "question_limit_lower");
            mq_choice_low_input.setAttribute("placeholder", low_value);
            mq_choice_low_input.setAttribute("type", "hidden");
            mq_choice_low_input.setAttribute("onkeypress", "return isNumber(event)");
            mq_choice_low_input.setAttribute("value", "1");
            var mq_choice_low_label = document.createElement('label');
            mq_choice_low_label.setAttribute("for", "form_control_2");
            //    mq_choice_low_label.innerHTML = low_value;
            var mq_choice_low_help_block = document.createElement('span');
            mq_choice_low_help_block.className = "help-block";
            mq_choice_low_help_block.innerHTML = low_value;
            mq_choice_low_inner_div.appendChild(mq_choice_low_input);
            mq_choice_low_inner_div.appendChild(mq_choice_low_label);
            mq_choice_low_inner_div.appendChild(mq_choice_low_help_block);
            mq_choice_low_div.appendChild(mq_choice_low_inner_div);
            mq_choice_div.appendChild(mq_choice_low_div);
    }
    if (data != '') {
    if (low_value != false){
    if (typeof (data.question_limit_lower) !== 'undefined') {
    mq_choice_low_input.setAttribute("value", data.question_limit_lower);
    }
    }
    if (upper_value != false){
    if (typeof (data.question_limit_upper) !== 'undefined') {
    mq_choice_upper_input.setAttribute("value", data.question_limit_upper);
    }
    }
    }
    return mq_choice_div; }

    function create_sc(data = '') {
    var sc_max_characters_row_div = document.createElement('div');
            sc_max_characters_row_div.className = "row";
            sc_max_characters_row_div.setAttribute("id", "mq_choice");
            var sc_max_characters_div = document.createElement('div');
            sc_max_characters_div.className = "col-md-3";
            sc_max_characters_div.setAttribute("id", "mq_choice_low");
            var sc_max_characters_inner_div = document.createElement('div');
            sc_max_characters_inner_div.className = "form-group form-md-line-input";
            var sc_max_characters_input = document.createElement('input');
            sc_max_characters_input.className = "form-control";
            sc_max_characters_input.setAttribute("id", "qLimitUp");
            sc_max_characters_input.setAttribute("name", "question_limit_upper");
            sc_max_characters_input.setAttribute("type", "text");
            sc_max_characters_input.setAttribute("value", "10");
            sc_max_characters_input.setAttribute("onkeypress", "return isNumber(event)");
            var sc_max_characters_label = document.createElement('label');
            sc_max_characters_label.setAttribute("for", "form_control_4");
            sc_max_characters_label.innerHTML = "Max Scale Allowed";
            var sc_max_characters_help_block = document.createElement('span');
            sc_max_characters_help_block.className = "help-block";
            sc_max_characters_help_block.innerHTML = "Max Scale Allowed";
            sc_max_characters_inner_div.appendChild(sc_max_characters_input);
            sc_max_characters_inner_div.appendChild(sc_max_characters_label);
            sc_max_characters_inner_div.appendChild(sc_max_characters_help_block);
            sc_max_characters_div.appendChild(sc_max_characters_inner_div);
            sc_max_characters_row_div.appendChild(sc_max_characters_div);
            if (data) {
    if (typeof (data.question_limit_upper) !== 'undefined') {
    sc_max_characters_input.setAttribute("value", data.question_limit_upper);
    }
    }
    return sc_max_characters_row_div;
    }

    function validate_form() {

    var selected_type = $("#select2-single-input-sm option:selected").val();
            var multiple_choice = $('#multiple_choice').val();
            var qLimitLow = $('#qLimitLow').val();
            var qLimitUp = $('#qLimitUp').val();
            var question_title_input = $("#question_title_input").val();
            var question_mandatory = $("#question_mandatory").val();
            //1. Question Type
            if (selected_type == undefined) {
    var error = "QUESTION TYPE IS A REQUIRED FIELD";
            display_error(error);
            return false;
    }

    //2. Qestion Title
    if (question_title_input == '') {
    var error = "TITLE OF THE QUESTION IS A REQUIRED FIELD";
            display_error(error);
            return false;
    }
    //Type Wise validation Check
    //SUBJECTIVE
    if (selected_type == "sb") {
    if (qLimitUp == 0) {
    var error = "MAX CHARCTERS ALLOWED OPTIONS CANNOT BE ZERO";
            display_error(error);
            return false;
    }if (qLimitUp == '') {
    var error = "MAX CHARCTERS ALLOWED OPTIONS IS A REQUIRED FIELD";
            display_error(error);
            return false;
    }
    }
    //MULTIPLE CHOICE
    if (selected_type == "mq") {
    var array_length = multiple_choice.length;
            if (multiple_choice == null) {
    var error = "MULTIPLE CHOICE OPTIONS IS A REQUIRED FIELD";
            display_error(error);
            return false;
    } else if (array_length < 2){
    var error = "MINIMUM 2 OPTIONS ARE REQUIRED";
            display_error(error);
            return false;
    } else if (qLimitUp == 0) {
    var error = "MAX CHOICE  CANNOT BE LEFT ZERO (0)";
            display_error(error);
            return false;
    } else if (array_length < qLimitUp) {
    var error = "MAX CHOICE CANNOT BE GREATER THAN MULTIPLE OPTIONS ENTERED.";
            display_error(error);
            return false; }

    }
    //NUMERICAL
    if (selected_type == "nm") {
    if (qLimitLow == 0) {
    var error = "LOWER LIMIT OPTIONS IS A REQUIRED FIELD";
            display_error(error); return false;
    }
    if (qLimitUp == 0) {
    var error = "UPPER LIMIT OPTIONS IS A REQUIRED FIELD";
            display_error(error);
            return false;
    }
    }
    if (selected_type == "sc") {
    if (qLimitUp == 0) {
    var error = "UPPER LIMIT OPTIONS IS A REQUIRED FIELD";
            display_error(error);
            return false;
    }
    }
    if (selected_type == "hn") {

    if (qLimitUp == 0) {
    var error = "MAX CHARACTERS CANNOT BE LEFT ZERO (0).";
            display_error(error);
            return false;
    }
    }

    return true;
    }

    $("#select2-single-input-sm").change(function() {
    //Maintaining Old Data State
    var formdata = $("#survey_form").serializeArray();
            var data = {}; $(formdata).each(function(index, obj) {
    data[obj.name] = obj.value;
    });
            console.log(data); // Old Data
            $("#mq-block").hide();
            var type = $(this).val();
            console.log(type);
            if (type == "hsb") {

    var sb_html = create_section_break_fields(data);
            console.log(sb_html);
            $("#question-block").html(sb_html);
    } else{
    var html_div = create_default_fields(data);
            console.log(html_div); $("#question-block").html(html_div);
    }
    if (type == "sb") {
    var sb_html = create_sb(data);
            $("#question_block").append(sb_html);
    }
    if (type == "mq") {
    $("#mq-block").show();
            var mq_choice_html = create_mq(false, "Max Choice");
            $("#question_block").append(mq_choice_html);
    }
    if (type == "nm") {
    var nm_choice_html = create_mq("Lower Limit", "Upper Limit");
            $("#question_block").append(nm_choice_html);
    }
    if (type == "hn") {
    var hn_choice_html = create_mq(false, "Max Characters");
            $("#question_block").append(hn_choice_html);
    }
    if (type == "sc") {
    var sc_html = create_sc(data);
            $("#question_block").append(sc_html);
    }
    });
            $('.toggler').click(function(e) {
    e.preventDefault();
            $('.toggler-close').show();
            $('.theme-options').show();
            $('.toggler').hide();
    });
            $('.toggler-close').click(function(e) {
    e.preventDefault();
            $('.toggler-close').hide();
            $('.theme-options').hide();
            $('.toggler').show();
    });
            function approxDateDiff(mysqlDate) {
            // Split timestamp into [ Y, M, D, h, m, s ]
            var t = mysqlDate.split(/[- :]/);
                    // Apply each element to the Date function
                    var startDate = new Date(t[0], t[1] - 1, t[2], t[3], t[4], t[5]);
                    var now = new Date();
                    var difference = (now.getTime() - startDate.getTime()) / 1000 | 0;
                    if ((difference / (60 * 60 * 24 * 365) | 0)) {
            var years = Math.round(difference / (60 * 60 * 24 * 365));
                    return years == 1 ? years + ' Year' : years + ' Years';
            }
            if ((difference / (60 * 60 * 24 * 30) | 0)) {
            var months = Math.round(difference / (60 * 60 * 24 * 30));
                    return months + (months == 1 ? ' Month' : ' Months');
            }
            if ((difference / (60 * 60 * 24) | 0)) {
            var days = Math.round(difference / (60 * 60 * 24));
                    return days + (days == 1 ? ' Day' : ' Days');
            }
            if ((difference / (60 * 60) | 0)) {
            var hours = Math.round(difference / (60 * 60));
                    return hours + (hours == 1 ? ' Hour' : ' Hours');
            }
            if ((difference / (60) | 0)) {             var minutes = Math.round(difference / (60));
                    return minutes + (minutes == 1 ? ' Minute' : ' Minutes');
            }
            if (difference) {
            var seconds = difference;
                    return seconds + (seconds == 1 ? ' sec' : ' secs');
            }


            }

    function publish_data() {
    var is_publish_allowed = document.getElementById('publish_check').value;
            if (is_publish_allowed == 'yes') {
    var survey_id = '<?php echo $survey_id; ?>';
            $.ajax({
            type: "POST",
                    url: "<?php echo base_url(); ?>" + "ajax_publish_data",
                    dataType: 'json',
                    data: {
                    survey_id: survey_id
                    },
                    beforeSend: function() {
                    $('.question-overlay').show();
                            $('.question-modal').html('<img class="alignleft wp-image-725 size-full" draggable="false" src="' + base_url + 'assets/frontend/img/preloader.gif" alt="Loading icon cube" width="64" height="64"><p style="margin:-130px 0 16px; color:#fff;">Publishing the Questions, Please wait.</p>');
                            $('.question-modal').show();
                    },
                    success: function(stat) {
                    // var data = JSON.parse(stat);
                    if (stat.success == "true") {
                    $('.question-overlay').hide();
                            $('.question-modal').html('');
                            $('.question-modal').hide();
                            $('#publish_update').html('Published ' + stat.update_time);
                    } else {
                    display_error("SOMETHING WENT WRONG , OUR TEAM IS TRYING TO FIX IT OUT.");
                    }

                    }
            });
    }
    }

    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    display_error("ONLY NUMBERS ARE ALLOWED");
            return false;
    }
    return true;
    }


    function create_section_break_fields(data = '') {
    var question_block_row_div = document.createElement('div');
            question_block_row_div.className = "row";
            question_block_row_div.setAttribute("id", "question_block");
            var question_mandatory_div = document.createElement('fieldset');
            question_mandatory_div.className = "col-md-2";
            question_mandatory_div.setAttribute("id", "mandatory");
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
            question_title_label.innerHTML = "Section Title";
            var question_title_help_block = document.createElement('span');
            question_title_help_block.className = "help-block";
            question_title_help_block.innerHTML = "Section Title Goes Here";
            //        question_title_inner_col_div.appendChild(question_no);
            question_title_inner_col_div.appendChild(question_title_input);
            question_title_inner_col_div.appendChild(question_title_label);
            question_title_inner_col_div.appendChild(question_title_help_block);
            question_title_col_div.appendChild(question_title_inner_col_div);
            question_block_row_div.appendChild(question_title_col_div);
            question_block_row_div.appendChild(question_mandatory_div);
            var help_text_note_surveyor_div = document.createElement('div');
            help_text_note_surveyor_div.className = "col-md-6";
            help_text_note_surveyor_div.setAttribute("id", "help_text_note");
            var help_text_note_surveyor_inner_col_div = document.createElement('div');
            help_text_note_surveyor_inner_col_div.className = "form-group form-md-line-input";
            var help_text_note_surveyor_input = document.createElement('input');
            help_text_note_surveyor_input.className = "form-control";
            help_text_note_surveyor_input.setAttribute("id", "help_text_note_input");
            help_text_note_surveyor_input.setAttribute("name", "question_help_text");
            help_text_note_surveyor_input.setAttribute("placeholder", "Section Description");
            help_text_note_surveyor_input.setAttribute("type", "text");
            var help_text_note_surveyor_label = document.createElement('label');
            help_text_note_surveyor_label.setAttribute("for", "form_control_2");
            help_text_note_surveyor_label.innerHTML = "Section Description";
            var help_text_note_surveyor_help_block = document.createElement('span');
            help_text_note_surveyor_help_block.className = "help-block";
            help_text_note_surveyor_help_block.innerHTML = "Section Description";
            help_text_note_surveyor_inner_col_div.appendChild(help_text_note_surveyor_input);
            help_text_note_surveyor_inner_col_div.appendChild(help_text_note_surveyor_label);
            help_text_note_surveyor_inner_col_div.appendChild(help_text_note_surveyor_help_block);
            help_text_note_surveyor_div.appendChild(help_text_note_surveyor_inner_col_div);
            question_block_row_div.appendChild(help_text_note_surveyor_div);
            /**var short_keyword_div = document.createElement('div');
             short_keyword_div.className = "col-md-6";
             short_keyword_div.setAttribute("id", "unique_one_word");
             var short_keyword_inner_col_div = document.createElement('div');
             short_keyword_inner_col_div.className = "form-group form-md-line-input";
             var short_keyword_input = document.createElement('input');
             short_keyword_input.className = "form-control";
             short_keyword_input.setAttribute("id", "unique_one_word_input");
             short_keyword_input.setAttribute("name", "question_one_word");
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
             question_block_row_div.appendChild(short_keyword_div);*/
            /**var question_mandatory = document.createElement('input');
             question_mandatory.className = "question_mandatory";
             question_mandatory.setAttribute("type", "checkbox");
             question_mandatory.setAttribute("value", 1);
             question_mandatory.setAttribute("name", "question_mandatory");
             question_mandatory_div.appendChild(question_mandatory);*/
            if (data != '') {
    question_title_input.setAttribute("value", data.question_title);
            help_text_note_surveyor_input.setAttribute("value", data.question_help_text);
            //short_keyword_input.setAttribute("value", data.question_one_word);
    }
    return question_block_row_div;
    }
</script>