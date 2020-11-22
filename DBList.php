<?php
declare(strict_types=1);
require "Uloha.php";
class DBList
{
    private $user = "root";
    private $pass = "dtb456";
    private $db = "semestralka";
    private $host = "localhost";


    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname={$this->db};host={$this->host}", $this->user, $this->pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }

    /**
     * @return Uloha[]
     */
    public function getData(): array
    {
        $query = $this->pdo->query("select * from to_do_list");
        $to_dos = [];
        while ($row = $query->fetch()) {
            $uloha = new Uloha($row['id'], $row['co_robit'], $row['stav']);
            $to_dos[] = $uloha;
        }
        return $to_dos;
    }

    public function vytvorUlohu($co_robit, $stav)
    {
        if ($co_robit == "" || $stav == "")
            return;
        $stmt = $this->pdo->prepare("INSERT INTO to_do_list (co_robit, stav) VALUES (?, ?)");
        $stmt->execute([$co_robit, $stav]);
    }

    public function vymazUlohu($delete)
    {

        $stmt = $this->pdo->prepare("DELETE FROM to_do_list WHERE id=?");
        $stmt->execute([$delete]);
    }

    public function editujUlohu($id, $co, $stav)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE to_do_list SET co_robit=?, stav=? WHERE id=?");
            $stmt->execute([$co, $stav, $id]);
        }
        catch (PDOException $e) {

        }





    }


}