<?php 
	include_once '../../core/diseases.class.php';
	include_once '../../core/core.function.php';

	
	$disease = new Diseases();
	$disease_id = $_POST['disease_id'];

	$disease_row = $disease->fetch_disease($disease_id);

	$output = [
        'disease_id' => $disease_row['disease_id'],
        'disease_name' => $disease_row['disease_name'],
        'symptoms' => $disease_row['symptoms'],
        'causes' => $disease_row['causes'],
        'prevention' => $disease_row['prevention'],
        'cure' => $disease_row['cure'],
        'comments' => $disease_row['comments'],
        'stats' => $disease_row['stats']
    ];
    echo json_encode($output);
?>