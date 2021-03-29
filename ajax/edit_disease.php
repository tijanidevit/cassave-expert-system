<?php 
	include_once '../../core/diseases.class.php';
	include_once '../../core/core.function.php';

	echo update_disease();
	// function FunctionName($value='')
	// {
	// 	# code...
	// }
	function update_disease(){
		$disease = new Diseases();
		$disease_name = $_POST['disease_name'];
		$symptoms = $_POST['symptoms'];
		$causes = $_POST['causes'];
		$prevention = $_POST['prevention'];
		$cure = $_POST['cure'];
		$comments = $_POST['comments'];
		$disease_id = $_POST['disease_id'];

		// if ($disease->check_disease_existence($disease_name)) {
		// 	return  displayWarning($disease_name.' already exist');
		// }
		if ($disease->update_disease($disease_name,$symptoms,$causes,$prevention,$cure,$comments,$disease_id)) {
			return displaySuccess($disease_name.' successfully updateed');
		}
		else{
			return displayError('Unable to update');
		}
	}
?>