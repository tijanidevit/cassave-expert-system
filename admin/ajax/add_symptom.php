<?php 
	include_once '../../core/symptoms.class.php';
	include_once '../../core/core.function.php';

	echo add_symptom();
	// function FunctionName($value='')
	// {
	// 	# code...
	// }
	function add_symptom(){
		$symptom_obj = new symptoms();
		$symptom_type = $_POST['symptom_type'];
		$symptom = $_POST['symptom'];
		$disease = $_POST['disease'];

		if ($symptom_obj->check_symptom_existence($symptom)) {
			return  displayWarning($symptom.' already exist');
		}
		$symptom_image = upload_file($_FILES['symptom_image'],'../../symptoms/');
		if ($symptom_obj->add_symptom($symptom_type,$disease,$symptom,$symptom_image)) {
			return displaySuccess($symptom.' successfully added');
		}
		else{
			return displayError('Unable to add');
		}
	}
?>