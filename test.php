
 <!DOCTYPE html>
 <html>
 <head>
  
  
	<title>Tip Calculator</title>
    <link rel="stylesheet" type="text/css" href="css.css">
 </head>
 
 
 <body>
   <form action="test.php" method="get"  >
   <div class="inputPart">
		<h1>Tip Calculator</h1>
        <p>Bill subtotal:$
						<input type="text" name="number"/></p>
		<p>Tip Percentage: </p>
	    <ul>
					<li><input type="radio" name="rate" value="10%"/>10% </li>
					<li><input type="radio" name="rate" value="15%"/>15%</li>
					<li><input type="radio" name="rate" value="20%"/>20%</li>
					<li><input type="radio" name="rate" <span>Custom: <input type="text" name="percentage"/>%</span> </li>
					</ul>
					
	
		<p>Split: <input type="text" name="spit"/> person(s)</p>			
		<div class="submit">
				<input type="submit" name="" value="Submit"/>
				<br/>
		</div>
	   
	</div>
	</form>
	
		
			<?php
				if($_GET){
					
					$number = (int)$_GET['number'];
					$spit = 0;
					if($number>0){ //input bill subtotal >0
						/*if(count($_GET)>1){ //determine is the tip percentage 
											//is not empty;
							if(isset($_GET['rate'])) {
								$rate=(float)$_GET['rate'];
							}else if(isset($_GET['percentage'])){
								$rate=(float)$_GET['percentage'];
							}*/
						if(isset($_GET['rate'])){ //key 'rate' in the array
							$rate=(float)$_GET['rate'];
							if($rate==0){  //customer input radio, no value,so rate equal 0
								$rate = (float)$_GET['percentage'];
							}
							$tips = $number*$rate/100;
							$total = $number+$tips;
							if(isset($_GET['spit'])){ 
								$spit = (int)$_GET['spit'];
							}
							if($spit<=0){}	//invalid input on spit
							else if($spit==1){
							echo '<div class="php">Tips: $ '.round($tips,2)." <br/>Total: $".
							round($total,2)."</div>";
							}else{
								echo '<div class="php">Tips: $ '.round($tips,2)." <br/>Total: $".
								round($total,2)."<br/>Tip each: $".round((float)$tips/$spit,2)."<br/>Total each: $".round((float)$total/$spit,2)."</div>";
							}
						}
					}
					
				}
			?>
		
 </body>
 </html>
 
