<?php
require_once "Stack.php";
require_once "SudokuSolver.php";
class SudokuGenerator extends SudokuSolver
{
    public $EleArray = NULL;
    const METRIC_EASY = 45;
    const METRIC_MEDIUM = 33;
    const METRIC_HARD = 21;
	const METRIC_EXTREME = 15;
    public function __construct()
    {
        $this->EleArray();
        parent::__construct();
    }
    /*
    Creates an array of possible (row, col) combinations. So that uniquely a random element can be selected
     */
    public function EleArray() 
    {
        $EleArray = array();
        foreach(range(0, 8) as $i )
            foreach(range(0, 8) as $j )
                    $EleArray[] = array($i, $j);
        $this->EleArray = $EleArray;
    }
    public function FillRandomValue()
    {
        if( $this->EleArray === NULL )
            throw new Exception('$this->EleArray() must be called before FillRandomValue', 1);
            
        $ele = array_rand( $this->EleArray );
        $randCol = $this->EleArray[$ele][0];
        $randRow = $this->EleArray[$ele][1];
        unset($this->EleArray[$ele]);
        for ( $i = 1; $i <= 9; $i++ )
        {
			$p=rand(1,9);
            if( $this->checkValid($randRow, $randCol, $p) )
            {
                $this->_oSudoku[$randRow][$randCol] = $p;
                break;
            }
        }
    }
    public function GenerateSudoku( $difficulty )
    {
        $this->EleArray();
		for( $i = 0; $i < $difficulty; $i++ )
            $this->FillRandomValue();
		        do {
            $this->FillRandomValue();
            $this->Solve();
        } while( $this->HasUnique() === self::NOT_UNIQUE );
        
    }
}