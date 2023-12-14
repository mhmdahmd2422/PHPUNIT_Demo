<?php


use App\Player;
use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    /**
     * @test
     * @dataProvider scores
     */
    public function it_evaluates_a_tennis_match($playerOneScore, $playerTwoScore, $exp)
    {
        $match = new TennisMatch(
            $khaled = new Player('Khaled'),
            $ahmed = new Player('Ahmed')

        );

        for($i=0;$i<$playerOneScore;$i++){
            $khaled->scores();
        }
        for($i=0;$i<$playerTwoScore;$i++){
            $ahmed->scores();
        }

        $this->assertEquals($exp, $match->score());
    }

    public static function scores()
    {
        return [
            [0,0,'love-love'],
            [1,0,'fifteen-love'],
            [1,1,'fifteen-fifteen'],
            [2,0,'thirty-love'],
            [3,0,'forty-love'],
            [2,2,'thirty-thirty'],
            [3,3,'deuce'],
            [4,4,'deuce'],
            [5,5,'deuce'],
            [4,3,'Advantage: Khaled'],
            [3,4,'Advantage: Ahmed'],
            [4,0,'Winner: Khaled'],
            [0,4,'Winner: Ahmed'],
        ];
    }
}
