// app/controllers/ProductController.php
<?php
require_once 'app/models/Product.php';
require_once 'config/Database.php';

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function create($nombre, $descripcion, $precio) {
        $this->product->nombre = $nombre;
        $this->product->descripcion = $descripcion;
        $this->product->precio = $precio;

        if ($this->product->create()) {
            echo "Producto creado exitosamente.";
        } else {
            echo "Error al crear el producto.";
        }
    }

    public function read() {
        $stmt = $this->product->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $nombre, $descripcion, $precio) {
        $this->product->id = $id;
        $this->product->nombre = $nombre;
        $this->product->descripcion = $descripcion;
        $this->product->precio = $precio;

        if ($this->product->update()) {
            echo "Producto actualizado exitosamente.";
        } else {
            echo "Error al actualizar el producto.";
        }
    }

    public function delete($id) {
        $this->product->id = $id;

        if ($this->product->delete()) {
            echo "Producto eliminado (borrado lógico) exitosamente.";
        } else {
            echo "Error al eliminar el producto.";
        }
    }
}
