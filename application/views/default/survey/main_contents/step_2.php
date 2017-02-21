<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="<?= $this->config->item('adminassets'); ?>global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css" />
<style>
    .question-active {
        background-color: #32c5d2;
    }

    .question-row {
        margin-left: -12px;
        margin-right: -12px;
    }
</style>
<style>
    .question-overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 10;
        display: none;
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
        display: none;
        /* 1px higher than the overlay layer */
    }
</style>
<!-- END PAGE LEVEL PLUGINS -->

<div class="page-content-wrapper">

    <div class="page-content">
        <div class="theme-panel">
            <div class="toggler tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Click To Manage Survey Questions" style="display: none;">
                <i class="icon-settings"></i>
            </div>
            <div class="toggler-close" style="display: block;">
                <i class="icon-close"></i>
            </div>
            <div class="theme-options" style="display: block;">
                <div class="theme-option theme-colors clearfix">
                    <span style="margin-right: 15%;" onclick="add_new_question()" class="btn btn-primary add_question"> + Add New Question </span>
                </div>
                <div class="theme-option" id="question-list">

                </div>
                <div class="theme-option">
                    <span id="publish_update" style="width:100%; text-transform:capitalize; text-align:center; margin-bottom:5px;"><?php echo (isset($publish_update)) ? 'Published ' . $publish_update : ''; ?></span>
                    <button class="btn btn-danger" id="survey_publish_btn" type="submit" style="display:inline-block; margin-left:30%;" onclick="publish_data()"><span><i aria-hidden="true" class="icon-cloud-upload"></i>Publish</span><div></div></button>
                </div>
            </div>
        </div>
        <br/>
        <?php if ($this->session->flashdata('message')) { ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php } ?>
        <div class="col-md-6">
            <h1 class="page-title"><?php echo ucfirst($survey_title); ?>
                <small>Survey</small>
            </h1>
        </div>

        <form method="post" id="survey_form">
            <div class="row">
                <div class="col-md-12">
                    <div class="question-overlay"></div>
                    <div class="question-modal"></div>
                    <div class="portlet box green">
                        <div class="portlet-title">
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
                                <input type="hidden" value="<?php echo $id; ?>" name="id" id="id" />
                                <input type="hidden" value="<?php echo $survey_id; ?>" name="survey_id" id="survey_id" />
                                <input type="hidden" value="<?php echo (isset($question_no) && $question_no != '') ? $question_no : '1'; ?>" name="question_no" id="question_no" />
                                <input type="hidden" value="save" name="question_state" id="question_state" />
                                <input type="hidden" value="" id="publish_check" />
                                <!-- Default Question Block -->
                                <div id="question-block" style="margin-top:50px;"></div>
                                <!-- Default Question Block Ends -->

                                <!-- Multiple Option Question Block -->
                                <div id="mq-block" style="display:none;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select multiple data-role="tagsinput" name="multiple_choice[]" placeholder="Multiple Choice Options" id="multiple_choice" name="multiple_choice"></select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Multiple Option Question Block Ends -->
                                <div class="row" style="margin-top:20px;">
                                    <div class="col-lg-3 col-md-4 col-xs-12">
                                        <div class="mt-element-ribbon bg-grey-steel">
                                            <p class="ribbon ribbon-color-primary uppercase" id="question">Question 1</p>
                                            <p style="float: right; margin-right: 10px;" id="survey_question_time"></p>
                                            <!--<input class="ribbon ribbon-color-primary uppercase" id="question" value="Question 1"/>-->
                                            <!--                                    <input type="hidden" id="question_no" value="1"/>-->
                                            <p class="ribbon-content"><button class="btn btn-primary" id="question_save_btn" type="submit" style="display:none;"></button>
                                                <span id="question_tools"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>

        <div id="toast-notify" class="mdl-js-snackbar mdl-snackbar">
            <div class="mdl-snackbar__text"></div>
            <button class="mdl-snackbar__action" type="button"></button>
        </div>
    </div>
</div>
</div>
