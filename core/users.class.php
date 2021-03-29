<?php
    include_once 'db.class.php';

    class Users extends DB{

        function register_user($fullname,$email,$password){
            return DB::execute("INSERT INTO users(fullname,email,password) VALUES(?,?,?)", [$fullname,$email,$password]);
        }
        function activate_user($password,$user_id){
            return DB::execute("UPDATE users SET status = 1 , password = '' WHERE user_id = ? AND password = ?  ", [$password,$user_id]);
        }
        function verify_user_activation_key($password,$user_id){
            return  DB::num_row("SELECT user_id FROM users WHERE user_id = ? AND password = ? ", [$user_id,$password]);
        }
        function fetch_users(){
            return DB::fetchAll("SELECT * FROM users",[]);
        }
        function fetch_user($username){
            return DB::fetch("SELECT * FROM users WHERE username = ? OR email = ? ",[$username,$username] );
        }
        function fetch_user_rating($user_id){
            return DB::fetch("SELECT user_rating FROM users WHERE user_id = ? ",[$user_id] );
        }
        function update_user($fullname,$othernames,$username,$email,$user_id){
            return DB::execute("UPDATE users SET fullname =? ,othernames =? ,username =? ,email =? WHERE user_id = ? ", [$fullname,$othernames,$username,$email,$user_id]);
        }

        function update_user_rating($user_rating,$user_id){
            return DB::execute("UPDATE users SET user_rating = ? WHERE user_id = ? ", [$user_rating,$user_id]);
        }
        function update_password($password,$user_id){
            return DB::execute("UPDATE users SET password =? WHERE user_id = ? ", [$password,$user_id]);
        }
        function update_profile_image($profile_image,$user_id){
            return DB::execute("UPDATE users SET profile_image =? WHERE user_id = ? ", [$profile_image,$user_id]);
        }
        function users_num(){
            return DB::num_row("SELECT user_id FROM users ", []);
        }

        function check_email($email){
            return DB::num_row("SELECT user_id FROM users WHERE email = ? ", [$email]);
        }
        function user_login($email,$password){
            if (DB::num_row("SELECT user_id FROM users WHERE email = ?   AND password = ? ", [$email,$password]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }
    }
?>