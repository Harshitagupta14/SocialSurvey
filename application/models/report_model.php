<?php

class Survey_Model extends CI_Model {

    public function get_survey_feeds() {
        $userid = $this->flexi_auth->get_user_by_identity_row_array()['uacc_id'];

        $survey_select = 'SELECT `survey`.`id`,`survey`.`survey_id`,`survey`.`user_id_fk`,`survey`.`survey_title`,`survey`.`survey_type`,`survey`.`survey_category`,`survey`.`survey_status`,`survey`.`add_time`';

        $question_count = "COALESCE( survey_question.cnt, 0 ) AS question_count";
        $response_count = "COALESCE( survey_response.cnt, 0 ) AS response_count";

        $final_select = " $survey_select , $question_count , $response_count FROM `tbl_survey` survey";

        $left_join_question = "LEFT JOIN ( SELECT survey_fk_id, COUNT(*) AS cnt FROM tbl_survey_question survey_question GROUP BY survey_fk_id ) survey_question ON survey.id = survey_question.survey_fk_id";

        $left_join_response = "LEFT JOIN ( SELECT survey_fk_id, COUNT(*) AS cnt FROM tbl_survey_response survey_response GROUP BY survey_fk_id ) survey_response ON survey.id = survey_response.survey_fk_id";

        $conditions = "WHERE survey.user_id_fk = " . $userid . " ORDER BY survey.add_time DESC";

        $query = "$final_select $left_join_question $left_join_response $conditions";

        $final_query = $this->db->query($query);

        return $final_query->result_array();
    }

    public function get_survey_questions_by_args($id = FALSE, $question_no = FALSE) {

        $survey_select = '`survey_question`.*';
        $final_select = " $survey_select , survey_type.type_small_name,survey_type.type_name";

        $this->db->select($final_select);
        $this->db->from("`tbl_survey_question` as `survey_question`");
        $this->db->join("`tbl_survey_question_type` as `survey_type` ", ' survey_question.type_id_fk = survey_type.id', 'left');
        $this->db->where("`survey_question.survey_fk_id`", $id);
        if ($question_no) {
            $this->db->where("`survey_question.question_no`", $question_no);
        }
        $this->db->order_by('survey_question.question_no', 'ASEC');
        $final_query = $this->db->get();
        return $final_query->result_array();
    }

    public function rearrange_survey_question_no($question_no) {
        $this->db->set('question_no', 'question_no-1', FALSE);
        $this->db->where('question_no >', $question_no);
        $this->db->update('tbl_survey_question');
    }

    public function get_surveyor_by_args($parent_id = FALSE) {
        $survey_select = '`user_accounts`.*';
        $final_select = " $survey_select ,`user_profiles`.*";
        $this->db->select($final_select);
        $this->db->from("`user_accounts`");
        $this->db->join("`user_profiles`", ' user_profiles.upro_uacc_fk  = user_accounts.uacc_id', 'left');
        $this->db->where("`user_accounts.uacc_parent_id_fk`", $parent_id);
        $this->db->order_by('user_accounts.uacc_id', 'ASEC');
        $final_query = $this->db->get();
        return $final_query->result_array();
    }

}

?>
