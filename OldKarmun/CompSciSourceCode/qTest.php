<!DOCTYPE html>
<html>
<head>
	<title>lol</title>
</head>
<body>
	<div>
		<?php 
			public class Queue {
				public empty($_values[]);
				public function enqueue($value){
					array_push($_values[], $value);
				}
				public function dequeue(){
					return array_shift($_values[]);
			
				}
			}
			$q = new Queue();
			$.enqueue("helloooo");
			$.enqueue("clusterfuck");

			while($q){
				$val = $.dequeue();
				echo $val;
			}
		 ?>
	</div>
</body>
</html>