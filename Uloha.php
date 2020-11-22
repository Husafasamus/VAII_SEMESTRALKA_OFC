<?php


class Uloha
{
    private  $id;
    private  $co_robit;
    private  $stav;

    /**
     * Uloha constructor.
     * @param int $id
     * @param string $co_robit
     * @param string $stav
     */
    public function __construct( $id,  $co_robit,  $stav)
    {
        $this->id = $id;
        $this->co_robit = $co_robit;
        $this->stav = $stav;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCoRobit()
    {
        return $this->co_robit;
    }

    /**
     * @return string
     */
    public function getStav()
    {
        return $this->stav;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param string $co_robit
     */
    public function setCoRobit(string $co_robit)
    {
        $this->co_robit = $co_robit;
    }

    /**
     * @param string $stav
     */
    public function setStav(string $stav)
    {
        $this->stav = $stav;
    }



}