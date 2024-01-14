<?php

class Events
{
    private $conn;
    private $table_name = "events";

    // właściwości obiektu
    public $id;
    public $name;
    public $location;
    public $date;
    public $description;
    public $type;
    public $user_id; // jeśli chcesz śledzić, który użytkownik utworzył wydarzenie

    // konstruktor z $db jako połączeniem z bazą danych
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // metoda do odczytu wydarzeń
    function read()
    {
        // zapytanie do bazy
        $query = "SELECT * FROM " . $this->table_name;

        // przygotowanie zapytania
        $stmt = $this->conn->prepare($query);

        // wykonanie zapytania
        $stmt->execute();

        return $stmt;
    }

    // metoda do utworzenia nowego wydarzenia
    function create()
    {
        // zapytanie do wstawienia rekordu
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, location=:location, date=:date, description=:description, type=:type, user_id=:user_id";

        // przygotowanie zapytania
        $stmt = $this->conn->prepare($query);

        // oczyszczenie
        $this->name = htmlspecialchars(strip_tags($this->name));
        // powtórz tę operację dla pozostałych właściwości

        // powiązanie wartości
        $stmt->bindParam(":name", $this->name);
        // powtórz tę operację dla pozostałych właściwości

        // wykonanie zapytania
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // metoda do aktualizacji wydarzenia
    function update()
    {
        // zapytanie do aktualizacji rekordu
        $query = "UPDATE " . $this->table_name . " SET name=:name, location=:location, date=:date, description=:description, type=:type, user_id=:user_id WHERE id=:id";

        // przygotowanie zapytania
        $stmt = $this->conn->prepare($query);

        // oczyszczenie i powiązanie wartości (jak w metodzie create)

        // wykonanie zapytania
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // metoda do usuwania wydarzenia
    function delete()
    {
        // zapytanie do usunięcia rekordu
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";

        // przygotowanie zapytania
        $stmt = $this->conn->prepare($query);

        // oczyszczenie i powiązanie wartości id
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);

        // wykonanie zapytania
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
