<?php
    include_once 'db.class.php';

    class Symptoms extends DB{

        function add_symptom($symptom_type,$disease,$symptom,$symptom_image){
            return DB::execute("INSERT INTO symptoms(symptom_type,disease,symptom,symptom_image) VALUES(?,?,?,?)", [$symptom_type,$disease,$symptom,$symptom_image]);
        }
        function fetch_symptoms(){
            return DB::fetchAll("SELECT * FROM symptoms
                JOIN symptom_types on symptom_types.symptom_type_id = symptoms.symptom_type
                JOIN diseases on diseases.disease_id = symptoms.disease
                ORDER BY symptom

                ",[]);
        }
        function fetch_symptom($symptom_id){
            return DB::fetch("SELECT * FROM symptoms
                JOIN symptom_types on symptom_types.symptom_type_id = symptoms.symptom_type
                JOIN diseases on diseases.disease_id = symptoms.disease
                WHERE symptom_id = ? ",[$symptom_id] );
        }
        function delete_symptom($symptom_id){
            return DB::execute("DELETE FROM symptoms WHERE symptom_id = ? ",[$symptom_id] );
        }
        function update_symptom($symptom_type,$disease,$symptom,$symptom_id){
            return DB::execute("UPDATE symptoms SET symptom_type = ?, disease = ?, symptom = ? WHERE symptom_id = ? ", [$symptom_type,$disease,$symptom,$symptom_id]);
        }
       
        function symptoms_num(){
            return DB::num_row("SELECT symptom_id FROM symptoms ", []);
        }

        function check_symptom_existence($symptom){
            if (DB::num_row("SELECT symptom_id FROM symptoms WHERE symptom = ? ", [$symptom]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }
       

       #symptom Types
        function fetch_symptom_types(){
            return DB::fetchAll("SELECT * FROM symptom_types",[]);
        }

        function fetch_symptom_types_symptoms($symptom_type_id){
            return DB::fetchAll("SELECT * FROM symptoms WHERE symptom_type = ? ",[$symptom_type_id]);
        }
    }
?>