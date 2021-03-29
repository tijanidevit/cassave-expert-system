<?php 
	include_once '../core/symptoms.class.php';
	include_once '../core/core.function.php';

	
	$symptom = new symptoms();
	$symptom_type_id = $_POST['symptom_type_id'];

	$symptoms_row = $symptom->fetch_symptom_types_symptoms($symptom_type_id);
    foreach ($symptoms_row as $row) {  
       echo (' <div class="col-4 col-md-4">
                <a class="block block-link-shadow" href="disease.php?id='.$row['disease'].'" id="">
                    <div class="block-content text-center">
                        <div class="py-20">
                            <p class="mb-10">
                                <img src="symptoms/'.$row['symptom_image'].'" class="img-fluid">
                            </p>
                            <p class="font-size-lg">'.$row['symptom'].'<p>
                        </div>
                    </div>
                </a>
            </div>');
    }
?>