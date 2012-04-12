<?php
    
class Table{
	private $rows;
	private $columns;
	private $separator = " | ";

	function __construct($rows, $columns){
		$this->rows = $rows;
		$this->columns = $columns;
	}
	
	
	private function computeHeaderWidths(){
		foreach($this->columns as &$col){
			$col['width'] = strlen($col['name']);
		}		
		
		
	}
	
	private function computeRowWidths(){
		foreach($this->rows as $row){
			foreach($row as $index => $cell){
				//make sure the header widths are big enough to show all the data
				if($this->columns[$index] < strlen($value)){
					$this->columns[$index]['width'] = strlen($cell);
				}
			}	
		}	
	}
	
	public function printText(){
		$this->computeHeaderWidths();
		$this->computeRowWidths();
		
		$this->printHeader();
		
		foreach($this->rows as $row){
			$this->printRow($row, 0);
		}
		
		
	}
	
	private function printHeader($style = 'text'){
		if($style == 'text'){
			$row = array();
			
			foreach ($this->columns as $column) {
				$row[] = $column['name'];
			}
			$this->printRow($row, 0);
			$this->printHeaderBounds();
			
		}else if ($style == 'HTML'){
			
		}else{
			throw new Exception("Style: $style is not supported", 1);
			
		}
	}
	
	private function printHeaderBounds(){
		$totalWidth= 0;
		foreach ($this->columns as $column) {
			$totalWidth += $column['width'];
		}
		$totalWidth += (count($this->columns) - 1) * strlen($this->separator);	
		
		$bounds = "";
		for($i = 0; $i < $totalWidth; $i++){
			$bounds .= "=";
		}
		
		print $bounds."\n";
	}
	
	private function printRow($row, $indent){
		//error_log(" Trying to print row ".json_encode($row));
		$rowStr = "";
		foreach ($row as $colIndex => $value) {
			$headerWidth = $this->columns[$colIndex]['width'];
			$indentSpacing = 0;
			$colAlignment = $this->columns[$colIndex]['alignment'];
			
			//error_log("At index $colIndex got width: $headerWidth and alignment: $colAlignment");
			
			if( $colIndex == 0){
				$indentSpacing = $indent;
				for($i = 0; $i < $indentSpacing; $i++){
					$rowStr .= ' ';
				}
			}
			
			if($colIndex > 0){
				$rowStr .= $this->separator;
			}
			
			if($colAlignment != 'right'){
				$rowStr .= $value;
			}
			
			for($i =0; $i < $headerWidth - strlen($value)-$indentSpacing; $i++){
				$rowStr .= ' ';
			}
			
			if($colAlignment == 'right'){
				$rowStr .= $value;
			}
			
			//error_log("After processing index $colIndex string is $rowStr");
			
			
		}
		print $rowStr."\n";
	}
	
	
	

    	
}
    
    
?>