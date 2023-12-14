<?php

namespace App;

class TennisMatch
{
    protected Player $playerOne;
    protected Player $playerTwo;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function score(): string
    {
        if($this->hasWinner()){
            return 'Winner: ' . $this->leader()->name;
        }

        if($this->hasAdvantage()){
            return 'Advantage: ' . $this->leader()->name;
        }

        if($this->isDeuce()){
            return 'deuce';
        }

        return sprintf(
            '%s-%s',
            $this->playerOne->pointsToTerm(),
            $this->playerTwo->pointsToTerm()
        );
    }

    protected function leader(): Player
    {
        return $this->playerOne->points > $this->playerTwo->points?
            $this->playerOne:
            $this->playerTwo;
    }

    protected function isDeuce(): bool
    {
        return $this->enoughToWin() && $this->playerOne->points === $this->playerTwo->points;
    }

    protected function hasAdvantage(): bool
    {
        if($this->enoughToWin()){
            return ! $this->isDeuce();
        }
        return false;
    }

    protected function hasWinner(): bool
    {
        // no player reached winning threshold?
        if(max([$this->playerOne->points, $this->playerTwo->points]) < 4){
            return false;
        }
        return abs($this->playerOne->points - $this->playerTwo->points) >= 2;
    }

    protected function enoughToWin(): bool
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }

}