<?php


class Participant
{
    private $pseudo;
    private $number;

    /**
     * Participant constructor.
     * @param $pseudo
     * @param $number
     */
    public function __construct($pseudo, $number)
    {
        $this->pseudo = $pseudo;
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }
    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

}