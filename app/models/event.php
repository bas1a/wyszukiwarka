<?php

class Event
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

    // metoda do odczytu wydarzeń po typie
    public function readByType($type)
    {
        $query = "SELECT 
                events.*, 
                users.first_name, 
                users.last_name, 
                users.email 
              FROM " . $this->table_name . " 
              JOIN users ON events.user_id = users.user_id
              WHERE type = :type";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":type", $type);
        $stmt->execute();

        return $stmt;
    }


    public function readOne($id)
    {
        // Zapytanie do bazy danych
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";

        // Przygotowanie zapytania
        $stmt = $this->conn->prepare($query);

        // Powiązanie ID wydarzenia z parametrem zapytania
        $stmt->bindParam(':id', $id);

        // Wykonanie zapytania
        $stmt->execute();

        // Pobranie wiersza z bazy danych
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    // metoda do utworzenia nowego wydarzenia
    function create()
    {
        // zapytanie do wstawienia rekordu
        $query = "INSERT INTO " . $this->table_name . " 
              (name, location, date, description, type, image_url, user_id) 
              VALUES (:name, :location, :date, :description, :type, :image_url, :user_id)";

        // przygotowanie zapytania
        $stmt = $this->conn->prepare($query);

        // oczyszczenie
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id)); // Dodane

        // powiązanie wartości
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":image_url", $this->image_url);
        $stmt->bindParam(":user_id", $this->user_id); // Dodane

        // wykonanie zapytania
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // metoda do aktualizacji wydarzenia
    function update($id, $name, $location, $date, $description, $image_url, $type)
    {
        $query = "UPDATE " . $this->table_name . " 
              SET name = :name, 
                  location = :location, 
                  date = :date, 
                  description = :description, 
                  image_url = :image_url, 
                  type = :type 
              WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Powiązanie wartości
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":location", $location);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":image_url", $image_url);
        $stmt->bindParam(":type", $type);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


    // metoda do usuwania wydarzenia
    function delete($id)
    {
        // zapytanie do usunięcia rekordu
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        // przygotowanie zapytania
        $stmt = $this->conn->prepare($query);

        // powiązanie wartości id
        $stmt->bindParam(":id", $id);

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
