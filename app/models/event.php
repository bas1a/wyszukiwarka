require_once('../config/database.php');

class Event {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function create($data) {
        // TODO: Implement create method
    }

    public function read($id) {
        // TODO: Implement read method
    }

    public function update($id, $data) {
        // TODO: Implement update method
    }

    public function delete($id) {
        // TODO: Implement delete method
    }
}
