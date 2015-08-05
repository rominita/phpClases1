<?php
//SERVER

function calculate($edad){
	$result="";
	$error="";
  	if(empty($edad)){
  		$error= "error,debes ingresar un valor";
  	} else{
  			if (is_numeric($edad)){
 		//echo"la edad ingresasa es:$edad";
 		  if((18<=$edad)&($edad<=65)){
 		  $result='usted es adulto:'.$edad;
 	} else {
 		 if($edad<18){
 		$result=" ud es joven";
 	}else{
 		if($edad>65)
 		$result=" ud es jubilado";
 		}
 		 }
 		  }   else{
 		$error="debe ingresar un valor numerico";
 	}

 }   
      $response = array();
     if ($error == null){
     	$response = array
     	("status" => true,
     	 "data"=> $result);	
     } else{
      $response = array("status" => false,"data"=>$error);		
     }
       return $response;
   }
 
 if($_SERVER["REQUEST_METHOD"]==="GET"){
     $value=$_GET["edad"];
 } else {
     $value=$_POST["edad"];
 }
 $res = calculate($value);
 ?>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<div>
 		<SELECT>
 			<?php for ($i=1;$i<10;$i++){
 				echo "<option>$i</option>";
 			}?>
 		</SELECT>
 		<?php
 		if($res["status"]){?>;
 		EXITO:<?php echo $res["data"]; ?>
 		<?php }else{ ?>
 		Error: <p style="color:red;">
 		<?php echo $res["data"]; ?>
 	</p>
 		<?php } ?>
 	</div>
 
 </body>
 </html>