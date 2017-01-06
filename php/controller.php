<?php @session_start();
require_once "database.php";


//remove_orderdiscount
if(isset($_POST['remove_orderdiscount'])){
	$orders_discount_id = filters('orders_discount_id');
		if(udi("$d orders_discount $w orders_discount_id='$orders_discount_id'")){
	    	$notifications = "Discount has removed!";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong discount not removed !"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  

}

//add_discount 
if(isset($_POST['add_discount'])){
	$transaction_id = filters('transaction_id');
	$discount_id = filters('discount_id'); 
		if(udi("$i orders_discount values('','$transaction_id','$discount_id')")){
	    	$notifications = "Discount has been added to transaction !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong discount not added !"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  

}
//add_discounts
if(isset($_POST['add_discounts'])){
	$name = filters('name');
	$discount = filters('discount');
		if(udi("$i discounts values('','$name','$discount','1')")){
	    	$notifications = "New Discount has been added to records !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong discount not saved !"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  

}
//login
if(isset($_POST['login'])){
	$user = filters('user');
	$pass = filters('pass');  
	$login = counts("$s users $w user='$user' and pass='$pass' and status='1'");
	if($login <= 0){
		$error = "Wrong Login Credentials !";
	} else { 
		$id = get("user_id","$s users $w user='$user' and pass='$pass'");  
		$role = get("role","$s users $w user='$user' and pass='$pass'");  
		$_SESSION['id'] = $id;
		$_SESSION['role'] = $role;
		to('index.php?1');
	}
} 
//add patient 
if(isset($_POST['add_patient'])){ 
	$name = filters('name');
	$birthday = filters('birthday');
	$gender = filters('gender');
	$address = filters('address');
	$phone = filters('phone');
	$img = $_FILES['img']['name'];
	$target_dir = "img/";
	$target_file = $target_dir.basename($_FILES["img"]["name"]); 
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);   
	    if(udi("$i patients values('','$name','$birthday','$gender','$address','$phone','$img','1')")){
	    	$notifications = "New patient has been added to records !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong patient not saved !"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  
}
//archive_discounts
if(isset($_POST['archive_discounts'])){ 
	$discount_id = filters('discounts_id'); 
	if(udi("$u discounts set status='0' where discount_id='$discount_id'")){
		$notifications = "Discount record has been trashed !";
		$task = "<script>$('#notifications').click();</script>"; 
	} else { 
		$notifications = "Something went wrong discount records not removed !"; 
 		$task = "<script>$('#notifications').click();</script>"; 
	}  
} 
//update_discount
if(isset($_POST['update_discount'])){ 
	$discount_id = filters('id'); 
	$name = filters('name'); 
	$discount = filters('discount'); 
	if(udi("$u discounts set name='$name',discount='$discount' where discount_id='$discount_id'")){
		$notifications = "Discount record has been updated!";
		$task = "<script>$('#notifications').click();</script>"; 
	} else { 
		$notifications = "Something went wrong discount records not updated !"; 
 		$task = "<script>$('#notifications').click();</script>"; 
	}  
}
//achive patient 
if(isset($_POST['archive_patient'])){ 
	$patient_id = filters('patient_id'); 
	if(udi("$u patients set status='0' where patient_id='$patient_id'")){
		$notifications = "Patient record has been trashed !";
		$task = "<script>$('#notifications').click();</script>"; 
	} else { 
		$notifications = "Something went wrong patient records not removed !"; 
 		$task = "<script>$('#notifications').click();</script>"; 
	}  
}


// add physician 
if(isset($_POST['add_physician'])){ 
	$name = filters('name'); 
	$phone = filters('phone');
	$img = $_FILES['img']['name'];
	$target_dir = "img/";
	$target_file = $target_dir.basename($_FILES["img"]["name"]); 
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);   
	    if(udi("$i physician values('','$name','$phone','$img','1')")){
	    	$notifications = "New Physician has been added to records !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong Physician not saved !"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  
}
//achive physician 
if(isset($_POST['archive_physician'])){ 
	$physician_id = filters('physician_id'); 
	if(udi("$u physician set status='0' where physician_id='$physician_id'")){
		$notifications = "Physician record has been trashed !";
		$task = "<script>$('#notifications').click();</script>"; 
	} else { 
		$notifications = "Something went wrong physician records not removed !"; 
 		$task = "<script>$('#notifications').click();</script>"; 
	}  
}


// add_services 
if(isset($_POST['add_services'])){ 
	$name = filters('name');   
	$category = filters('category');  
	$price = filters('price');    
	$description = filters('description');   
	    if(udi("$i services values('','$name','$category','$description','$price','1')")){
	    	$notifications = "New Services has been added to records !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong Services not saved !"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  
}

//archive_services 
if(isset($_POST['archive_services'])){ 
	$services_id = filters('services_id'); 
	if(udi("$u services set status='0' where services_id='$services_id'")){
		$notifications = "Services has been trashed !";
		$task = "<script>$('#notifications').click();</script>"; 
	} else { 
		$notifications = "Something went wrong service records not removed !"; 
 		$task = "<script>$('#notifications').click();</script>"; 
	}  
}


//update_account
if(isset($_POST['update_account'])){ 
	$id = $_SESSION['id']; 
	$name = filters('name'); 
	$user = filters('user');
	$pass = filters('pass');
	@$img = $_FILES['img']['name'];
	if(!empty($img)){
		$target_dir = "img/";
		$target_file = $target_dir.basename($_FILES["img"]["name"]); 
	    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);   
	    if(udi("$u users set name='$name',user='$user',pass='$pass',img='$img' where user_id='$id'")){
	    	$notifications = "Account Profile has been updated !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong account not updated!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  
	} else {  
	    if(udi("$u users set name='$name',user='$user',pass='$pass' where user_id='$id'")){
	    	$notifications = "Account Profile has been updated !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong account not updated!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  
	}

}

//add_account
if(isset($_POST['add_account'])){  
	$name = filters('name'); 
	$user = filters('user');
	$pass = filters('pass');
	$img = $_FILES['img']['name']; 
	$target_dir = "img/";
	$target_file = $target_dir.basename($_FILES["img"]["name"]); 
	move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);   
	if(udi("$i users values('','$name','$user','$pass','0','$img','1')")){
	   	$notifications = "New Account has been added !";
	   	$task = "<script>$('#notifications').click();</script>"; 
	} else { 
	   	$notifications = "Something went wrong account not added!"; 
	   	$task = "<script>$('#notifications').click();</script>"; 
	}    
}

//archive_user 
if(isset($_POST['archive_user'])){ 
	$user_id = filters('user_id'); 
	if(udi("$u users set status='0' where user_id='$user_id'")){
		$notifications = "User account has been trashed !";
		$task = "<script>$('#notifications').click();</script>"; 
	} else { 
		$notifications = "Something went wrong user account not removed !"; 
 		$task = "<script>$('#notifications').click();</script>"; 
	}  
}

//update_subaccount
if(isset($_POST['update_subaccount'])){ 
	$user_id = filters('user_id');  
	$name = filters('name'); 
	$user = filters('user');
	$pass = filters('pass');
	@$img = $_FILES['img']['name'];
	if(!empty($img)){
		$target_dir = "img/";
		$target_file = $target_dir.basename($_FILES["img"]["name"]); 
	    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);   
	    if(udi("$u users set name='$name',user='$user',pass='$pass',img='$img' where user_id='$user_id'")){
	    	$notifications = "Account Profile has been updated !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong account not updated!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  
	} else {  
	    if(udi("$u users set name='$name',user='$user',pass='$pass' where user_id='$user_id'")){
	    	$notifications = "Account Profile has been updated !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong account not updated!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  
	}

}


//update_services
if(isset($_POST['update_services'])){ 
	$services_id = filters('services_id'); 
	$name = filters('name'); 
	$price = filters('price'); 
	$category = filters('category'); 
	$description = filters('description'); 
	if(udi("$u services set name='$name',price='$price',category='$category',description='$description' where services_id='$services_id'")){
		$notifications = "This has been Updated !";
		$task = "<script>$('#notifications').click();</script>"; 
	} else { 
		$notifications = "Something went wrong Services not Updated ! "; 
 		$task = "<script>$('#notifications').click();</script>"; 
	}  
}


//edit_physician 
if(isset($_POST['edit_physician'])){ 
	$physician_id = filters('physician_id');  
	$name = filters('name'); 
	$phone = filters('phone'); 
	@$img = $_FILES['img']['name'];
	if(!empty($img)){
		$target_dir = "img/";
		$target_file = $target_dir.basename($_FILES["img"]["name"]); 
	    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);   
	    if(udi("$u  physician set name='$name',phone='$phone',img='$img' where physician_id='$physician_id'")){
	    	$notifications = "Physician has been updated !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong physician not updated!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  
	} else {  
	    if(udi("$u  physician set name='$name',phone='$phone' where physician_id='$physician_id'")){
	    	$notifications = "Physician has been updated !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong physician not updated!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  
	}

}


//edit_patient
if(isset($_POST['edit_patient'])){ 
	$patient_id = filters('patient_id'); 
	$name = filters('name');
	$birthday = filters('birthday');
	$gender = filters('gender');
	$address = filters('address');
	$phone = filters('phone');
	@$img = $_FILES['img']['name'];
	if(!empty($img)){
		$target_dir = "img/";
		$target_file = $target_dir.basename($_FILES["img"]["name"]); 
	    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);   
	    if(udi("$u patients set name='$name',phone='$phone',birthday='$birthday',gender='$gender',address='$address',img='$img' where patient_id='$patient_id'")){
	    	$notifications = "Patient has been updated !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong patient not updated!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  
	} else {  
	    if(udi("$u patients set name='$name',phone='$phone',birthday='$birthday',gender='$gender',address='$address' where patient_id='$patient_id'")){
	    	$notifications = "Patient has been updated !";
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong patient not updated!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  
	}

}


//newtransaction  
if(isset($_POST['newtransaction'])){ 
	$patient_id = filters('patient_id'); 
	$physician_id = filters('physician_id'); 
		if(udi("$i transactions values('',CURRENT_TIMESTAMP,'$patient_id','$physician_id','0','0','1')")){
			$transaction_id = get("transaction_id","$s transactions $o transaction_id $ds $l 1");
	    	echo "<script>document.location.href = 'transaction_details.php?1&transaction_id=$transaction_id';</script>";
	    } else { 
	    	$notifications = "Something went wrong transaction not created!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  

}

//add_servicetransaction
if(isset($_POST['add_servicetransaction'])){ 
	$transaction_id = filters('transaction_id'); 
	$services_id = filters('services_id'); 
	$qty = filters('qty');    
		if(udi("$i orders values('','$transaction_id','$services_id','$qty')")){
	    	$notifications = "Transaction added!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong transaction not added!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }  


}	


//remove_servicetransaction
if(isset($_POST['remove_servicetransaction'])){ 
	$orders_id = filters('orders_id');     
		if(udi("$d orders where orders_id='$orders_id'")){
	    	$notifications = "Transaction/Services removed!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    } else { 
	    	$notifications = "Something went wrong Transaction/Services not removed!"; 
	    	$task = "<script>$('#notifications').click();</script>"; 
	    }   
}	


//transaction_id 
if(isset($_GET['transaction_idS'])){ 
	echo $transaction_id = $_GET['transaction_idS'];   
		if(udi("$u transactions set status='0' where transaction_id='$transaction_id'")){
	    	echo "<script>document.location.href = '../transaction_details.php?1&transaction_id=$transaction_id';</script>";
	    } else { 
	    	echo "<script>document.location.href = '../transaction_details.php?1&transaction_id=$transaction_id';</script>";
	    }     
}	

