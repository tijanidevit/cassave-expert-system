<?php 
	include_once '../../core/symptoms.class.php';
	include_once '../../core/core.function.php';

	echo delete_symptom();
	function delete_symptom(){
		$symptom = new symptoms();
		$symptom_id = $_POST['symptom_id'];

		if ($symptom->delete_symptom($symptom_id)) {
			return 1;
		}
		else{
			return displayError('Unable to delete');
		}
	}
?>