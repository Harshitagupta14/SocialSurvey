<?php

class Report_Model extends CI_Model {

    /**
     * Function to get Reports
     * @param type $survey_enc_id
     * @param type $date
     * @param type $auditors
     * @param type $status
     * @return array
     */
    public function get_reports() {
        //Encrypt Survey id
        $survey_enc_id = $this->input->post('selected_survey');
        $selected_survey = $this->db->get_where("tbl_survey", array("survey_id" => $survey_enc_id));
        //Getting Survey Id from Encrypted id
        $survey_id = $selected_survey->row()->id;
        //Date Range
        //Splitting Both dates start and end
        //Converting Format to Y-m-d
        $date = $this->input->post('date');
        $dates = explode('-', $date);
        //Start Date in old Format
        $start_date = $dates[0];
        $time = strtotime($start_date);
        //Start Date in New Format
        $newformat_start_date = date('Y-m-d', $time);
        //Last Date in old Format
        $last_date = $dates[1];
        $time = strtotime($last_date);
        //Last Date in New Format
        $newformat_last_date = date('Y-m-d', $time);

        //Surveyor ids
        $auditors = $this->input->post('selected_auditor');
        //Survey Status
        $status = $this->input->post('publish_draft');

        foreach ($auditors as $auditor) {
            if ($auditor == "all") {
                $surveyor = "NO";
                break;
            } else {
                $surveyor = "YES";
            }
        }

        $initial_select = "`survey_response`.*,`survey_response`.`id` as response_id,`survey_response_question`.`survey_res_fk_id` ,GROUP_CONCAT(`survey_response_question`.`question_no`) as question_no,GROUP_CONCAT(`survey_response_question`.`question_response`) as question_response";

        $final_select = " $initial_select ";

        $final_query = $this->db->select($final_select)
                ->from("`tbl_survey_response` as `survey_response`")
                ->join("`tbl_survey_question_response` as `survey_response_question`  ", ' survey_response_question.survey_res_fk_id = survey_response.id', 'left')
                ->where("`survey_response`.`survey_fk_id`", $survey_id)
                ->where("`survey_response`.`survey_res_status`", $status)
                ->where("`survey_response`.add_time  >=", $newformat_start_date)
                ->where("`survey_response`.add_time  <=", $newformat_last_date)
                //->where_in("`survey_response`.`surveyor_fk_id`", $auditors)
                ->group_by('`survey_response_question`.`survey_res_fk_id`')
                ->order_by('`survey_response_question`.`survey_res_fk_id`', 'ASC')
                ->get();
        //echo $this->db->last_query();
        return $final_query->result_array();
    }

}

?>