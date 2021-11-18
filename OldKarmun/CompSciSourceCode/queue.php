<<?php 
public class Queue {
		public $_values = array();
		public function enqueue($value){
			array_push($_values[], $value);
		}
		public function dequeue(){
			return array_shift($_values[]);
			
		}
	}
 ?>