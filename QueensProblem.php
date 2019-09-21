<?php declare( strict_types = 1 );

class QueensProblem {
  private $boardSize;
  private $solutions = [];

  public function __construct ( $boardSize = 7 ) {
    $this->boardSize = $boardSize;
  }

  /**
   * Start the process of finding all possible solutions.
   *
   * Disclaimer: You can also refactor this to have the constructor trigger this method.
   * Chosen to trigger it separately as it provided more control.
   */
  public function process (): void {
    $this->solve( 0, $this->generateBoard() );
  }

  /**
   * Find a solution for the current board.
   * When found, add it to all solutions and exit without checking for more.
   *
   * @param int $column
   * @param array $board
   */
  private function solve ( int $column, array $board ): void {
    if ($column === $this->boardSize) {
      $this->solutions[] = $board;

      return;
    }

    for ($row = 0; $row < $this->boardSize; $row++) {
      if ($this->isSafeLocation( $row, $column, $board )) {
        $board[ $row ][ $column ] = 1;
        $this->solve( $column + 1, $board );
        $board[ $row ][ $column ] = 0;
      }
    }
  }

  /**
   * Check if the current location is safe for a queen to be, without being in 'range' of any other queen on the board.
   *
   * Initially, it'll check if there's a queen to the left from the requested location.
   * After that it'll check top-left from the requested location.
   * And finally to the bottom-left from the requested location.
   *
   * @param int $row
   * @param int $column
   * @param array $board
   *
   * @return bool
   */
  private function isSafeLocation ( int $row, int $column, array $board ): bool {
    $safeToPlace = true;

    for ($x = 0; $x < $column; $x++) {
      if ($board[ $row ][ $x ] === 1) {
        $safeToPlace = false;
      }
    }

    for ($x = $row, $y = $column; $x >= 0 && $y >= 0; $x--, $y--) {
      if ($board[ $x ][ $y ] === 1) {
        $safeToPlace = false;
      }
    }

    for ($x = $row, $y = $column; $y >= 0 && $x < $this->boardSize; $x++, $y--) {
      if ($board[ $x ][ $y ] === 1) {
        $safeToPlace = false;
      }
    }

    return $safeToPlace;
  }

  /**
   * Generate a two-dimensional array that will act as the initial 'empty' board.
   *
   * @return array
   */
  private function generateBoard (): array {
    $board = [];

    for ($row = 0; $row < $this->boardSize; $row++) {
      for ($column = 0; $column < $this->boardSize; $column++) {
        $board[ $row ][ $column ] = 0;
      }
    }

    return $board;
  }

  /**
   * Draw all found solutions to the console.
   */
  public function drawAllSolutions (): void {
    echo "Solutions found: " . count( $this->solutions ) . "\n\n";

    foreach ($this->solutions as $index => $board) {
      echo "Board #" . ( $index + 1 ) . "\n";

      for ($row = 0; $row < $this->boardSize; $row++) {
        for ($column = 0; $column < $this->boardSize; $column++) {
          echo $board[ $row ][ $column ] ? "Q" : "x";
        }
        echo "\n";
      }
      echo "\n";
    }

    echo "Solutions found: " . count( $this->solutions ) . "\n\n";
  }

  /**
   * If you want the array object instead of a console output
   *
   * @return array
   */
  public function getAllFoundSolutions (): array {
    return $this->solutions;
  }
}

// Let's keep in in console and run the class
$queenProblem = new QueensProblem();
$queenProblem->process();
$queenProblem->drawAllSolutions();
