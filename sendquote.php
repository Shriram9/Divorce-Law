<?php 
	//Getting values
	if(isset($_POST['fname']) && ($_POST['fname'] != "") &&
	isset($_POST['lname']) && ($_POST['lname'] != "") &&
	isset($_POST['email']) && ($_POST['email'] != "") &&
	isset($_POST['phone']) && ($_POST['phone'] != "") &&
	isset($_POST['message']) && ($_POST['message'] != ""))
	
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		
		if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
			{ 
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('invalid email.')
    window.location.href='http://localhost/legal/index.html';
    </SCRIPT>");
			}else if(!preg_match("^[a-zA-Z]$^",$fname))
			{ 
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('please enter proper first name.')
    window.location.href='http://localhost/legal/index.html';
    </SCRIPT>");
			}else if(!preg_match("^[a-zA-Z]$^",$lname))
			{ 
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('please enter proper last name.')
    window.location.href='http://localhost/legal/index.html';
    </SCRIPT>");
			}else if(!preg_match("/^\d{10}$/",$phone))
			{ 
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('please enter proper mobile number.')
    window.location.href='http://www.divorcelawsindia.com/index.html';
    </SCRIPT>");
			}
			else
			{
		
		mysql_connect("166.62.8.14","demo7767","demoP@123");
		mysql_select_db("demo7767");

		//Creating an sql query
		$sql = "INSERT INTO query(fname,lname,email,phone,message) VALUES ('$fname','$lname','$email','$phone','$message')";
		
		$r=mysql_query($sql);
		
		//Executing query to database
		if($r){
			$to = "reshmi.dhongde@gmail.com";  
			$subject = "divorce law query";  
			$email = $_POST['email'] ;  
			$message = $_POST['message'] ;  
			$headers = "From: $email";  
			$sent = mail($to, $subject, $message, $email) ;
			
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Your Query submitted successfully.')
    window.location.href='http://www.divorcelawsindia.com/index.html';
    </SCRIPT>");
			
		}else{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('mysql_error();')
    window.location.href='http://www.divorcelawsindia.com/index.html';
    </SCRIPT>");
			
		}
		}
	}
	
	
	else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Please fill all data.')
    window.location.href='http://www.divorcelawsindia.com/index.html';
    </SCRIPT>");
			
	}
		
		
	
?>