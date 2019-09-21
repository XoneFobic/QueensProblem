# Queen's Problem (Brute forcing the solution)

For a job interview I was asked to solve the queen's problem for a 7x7 chess-board.  

- - - 

## Requirements

* Have PHP setup on your machine and accessible through the terminal

## Running the code

* Go to the folder where the `QueensProblem.php` is located.
* run `php QueensProblem.php`

Now it'll print all the found solutions, including a printed count before and after showing all the solutions.

## Results (count) for QueensProblem

| Board size | Solutions Found | Process Time (ms) |
| :--------- | --------------: | ----------------: |
| 1x1 | 1 | 0.032 |
| 2x2 | 0 | 0.007 |
| 3x3 | 0 | 0.013 |
| 4x4 | 2 | 0.039 |
| 5x5 | 10 | 0.147 |
| 6x6 | 4 | 0.608 |
| 7x7 | 40 | 2.505 |
| 8x8 | 92 | 11.896 |
| 9x9 | 352 | 63.371 |
| 10x10 | 724 | 308.285 |
| 11x11 | 2680 | 1775.765 |
| 12x12 | 14200 | 10726.574 |
| 13x13 | 73712 | 64000.195 |
| 14x14 | 365596 | 437023.721 |

## Disclaimer

As the test didn't specify that a framework nor a browser interface was required, I went with the most straight forward solution and print it all to console.  

`QueensProblem` is a class, which means it should be fairly easy to import it into any project, just dont forget to remove the lines at the bottom. Else it'll try and output it.
