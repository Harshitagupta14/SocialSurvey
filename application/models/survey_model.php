<?php

class Survey_Model extends CI_Model {

    public function get_categories() {
        $query = $this->db->get("tbl_survey_question_type");
        $result = $query->result_array();
        return $result;
    }

}

?>
