<?php 
	include_once '../../core/symptoms.class.php';
	include_once '../../core/core.function.php';

	echo update_symptom();
	function update_symptom(){
		$symptom_obj = new Symptoms();
		$symptom_type = $_POST['symptom_type'];
		$symptom = $_POST['symptom'];
		$disease = $_POST['disease'];
		$symptom_id = $_POST['symptom_id'];

		if ($symptom_obj->update_symptom($symptom_type,$disease,$symptom,$symptom_id)) {
			return displaySuccess($symptom.' successfully updateed');
		}
		else{
			return displayError('Unable to update');
		}
	}
?>