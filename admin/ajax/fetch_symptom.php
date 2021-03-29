<?php 
	include_once '../../core/symptoms.class.php';
	include_once '../../core/core.function.php';

	
	$symptom = new symptoms();
	$symptom_id = $_POST['symptom_id'];

	$symptom_row = $symptom->fetch_symptom($symptom_id);

	$output = [
        'symptom_id' => $symptom_row['symptom_id'],
        'disease_id' => $symptom_row['disease_id'],
        'symptom_type_id' => $symptom_row['symptom_type_id'],
        'symptom' => $symptom_row['symptom'],
        'symptom_type' => $symptom_row['symptom_type'],
        'disease_name' => $symptom_row['disease_name'],
        'symptom_image' => $symptom_row['symptom_image']
    ];
    echo json_encode($output);
?>