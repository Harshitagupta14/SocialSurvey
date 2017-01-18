<?php

class Survey_Model extends CI_Model {

    public function get_survey_feeds() {
        $survey_select = '`survey`.`id`,`survey`.`survey_id`,`survey`.`user_id_fk`,`survey`.`survey_title`,`survey`.`survey_type`,`survey`.`survey_category`,`survey`.`survey_status`,`survey`.`add_time`';
        $final_select = " $survey_select ,count(`survey_question`.`id`)as question_count";

        $final_query = $this->db->select($final_select)
                ->from("`tbl_survey` as `survey`")
                ->join("`tbl_survey_question` as `survey_question` ", ' survey_question.survey_fk_id = survey.id', 'left')
                ->group_by('survey.survey_id')
                ->order_by('survey.add_time', 'DESC')
                ->get();
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

}

?>
