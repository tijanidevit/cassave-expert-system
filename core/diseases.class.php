<?php
    include_once 'db.class.php';

    class Diseases extends DB{

        function add_disease($disease_name,$symptoms,$causes,$prevention,$cure,$comments){
            return DB::execute("INSERT INTO diseases(disease_name,symptoms,causes,prevention,cure,comments) VALUES(?,?,?,?,?,?)", [$disease_name,$symptoms,$causes,$prevention,$cure,$comments]);
        }
        function fetch_diseases(){
            return DB::fetchAll("SELECT * FROM diseases ORDER BY disease_name ",[]);
        }
        function fetch_disease($disease_id){
            return DB::fetch("SELECT * FROM diseases WHERE disease_id = ? ",[$disease_id] );
        }


        function fetch_disease_symptoms($disease_id){
            return DB::fetchAll("SELECT * FROM symptoms WHERE disease = ? ",[$disease_id] );
        }


        function delete_disease($disease_id){
            return DB::execute("DELETE FROM diseases WHERE disease_id = ? ",[$disease_id] );
        }
        function update_disease($disease_name,$symptoms,$causes,$prevention,$cure,$comments,$disease_id){
            return DB::execute("UPDATE diseases SET disease_name = ?, symptoms = ? , causes = ?, prevention = ?, cure =? , comments = ? WHERE disease_id = ? ", [$disease_name,$symptoms,$causes,$prevention,$cure,$comments,$disease_id]);
        }
       
        function diseases_num(){
            return DB::num_row("SELECT disease_id FROM diseases ", []);
        }

        function check_disease_existence($disease_name){
            if (DB::num_row("SELECT disease_id FROM diseases WHERE disease_name = ? ", [$disease_name]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }
       

       #Disease Types
        function fetch_disease_types(){
            return DB::fetchAll("SELECT * FROM disease_types",[]);
        }
    }
?>