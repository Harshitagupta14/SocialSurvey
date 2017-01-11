<?php

class Survey_Model extends CI_Model {

    public function get_survey_feeds() {
        $survey_select = '`survey`.`id`,`survey`.`survey_id`,`survey`.`user_id_fk`,`survey`.`survey_title`,`survey`.`survey_type`,`survey`.`survey_category`,`survey`.`status`,`survey`.`add_time`';
        $final_select = " $survey_select ,count(`survey_question`.`id`)as question_count";


        $final_query = $this->db->select($final_select)
                ->from("`tbl_survey` as `survey`")
                ->join("`tbl_survey_question` as `survey_question` ", ' survey_question.survey_fk_id = survey.id', 'left')
                ->group_by('survey.survey_id')
                ->order_by('survey.add_time', 'DESC')
                ->get();
        return $final_query->result_array();
    }

    public function get_categories() {
        $query = $this->db->get("tbl_survey_question_type");
        $result = $query->result_array();
        return $result;
    }

}

?>
