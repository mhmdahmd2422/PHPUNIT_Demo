<?php

namespace App;

class TennisMatch
{
    protected $playerOneScore = 0;
    protected $playerTwoScore = 0;

    public function score()
    {
        if($this->hasWinner()){
            return 'Winner: ' . $this->leader();
        }

        if($this->hasAdvantage()){
            return 'Advantage: ' . $this->leader();
        }

        if($this->isDeuce()){
            return 'deuce';
        }

        return sprintf(
            '%s-%s',
            $this->pointsToTerm($this->playerOneScore),
            $this->pointsToTerm($this->playerTwoScore)
        );
    }

    protected function hasWinner(): bool
    {
        if($this->playerOneScore > 3 && $this->playerOneScore >= $this->playerTwoScore+2){
            return true;
        }
        if($this->playerTwoScore > 3 && $this->playerTwoScore >= $this->playerOneScore+2){
            return true;
        }
        return false;
    }

    protected function hasAdvantage()
    {
        if($this->enoughToWin()){
            return ! $this->isDeuce();
        }
        return false;
    }

    public function isDeuce(): bool
    {
        return $this->enoughToWin() && $this->playerOneScore === $this->playerTwoScore;
    }

    protected function leader(): string
    {
        return $this->playerOneScore > $this->playerTwoScore?
            'Player 1':
            'Player 2';
    }

    public function enoughToWin(): bool
    {
        return $this->playerOneScore >= 3 && $this->playerTwoScore >= 3;
    }


    public function pointToPlayerOne()
    {
        $this->playerOneScore++;
    }

    public function pointToPlayerTwo()
    {
        $this->playerTwoScore++;
    }

    protected function pointsToTerm($points)
    {
        switch ($points){
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
        }
    }
}