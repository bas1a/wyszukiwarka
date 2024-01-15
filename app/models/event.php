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
    public $user_id;
    public $image_url;


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

    // metoda do odczytu wydarzeń po typie
    public function readByType($type)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE type = :type";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":type", $type);
        $stmt->execute();

        return $stmt;
    }


    // metoda do utworzenia nowego wydarzenia
    function create()
    {
        // zapytanie do wstawienia rekordu
        $query = "INSERT INTO " . $this->table_name . " (name, location, date, description, type, image_url) VALUES (:name, :location, :date, :description, :type, :image_url)";


        // przygotowanie zapytania
        $stmt = $this->conn->prepare($query);

        // oczyszczenie
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->type = htmlspecialchars(strip_tags($this->type));

        // powiązanie wartości
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":image_url", $this->image_url);

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

    public function search($searchTerm)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE name LIKE :searchTerm OR description LIKE :searchTerm";

        $stmt = $this->conn->prepare($query);
        $searchTerm = "%{$searchTerm}%";
        $stmt->bindParam(":searchTerm", $searchTerm);
   
        $stmt->execute();

        return $stmt;
    }
}
