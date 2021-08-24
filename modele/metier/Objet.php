<?php


class Objet
{
    private $id;
    private $name;
    private $total;
    private $last;
    private $participant;

    /**
     * @return mixed
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    public function __construct($id, $name, $total, $last, $participant)
    {
        $this->id = $id;
        $this->name = $name;
        $this->total = $total;
        $this->last = $last;
        $this->participant = $participant;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        return $this->last;
    }

}