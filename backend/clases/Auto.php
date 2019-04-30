<?php
require_once "Databases.php";
require_once "DBMethods.php";

class Auto implements DBMethods
{
    public $id;
    public $modelo;
    public $marca;
    public $precio;
    public $cantidadPuertas;
    public $RutaDeFoto;

    public function __construct(
        $idConst = null,
        $modeloConst = null,
        $marcaConst = null,
        $precioConst = null,
        $cantidadPuertasConst = null,
        $RutaDeFotoConst = null
    ) {
        $this->id = $idConst;
        $this->modelo = $modeloConst;
        $this->marca = $marcaConst;
        $this->precio = $precioConst;
        $this->cantidadPuertas = $cantidadPuertasConst;
        $this->RutaDeFoto = $RutaDeFotoConst;
    }

    public function __toString()
    {
        return "{$this->id}-{$this->modelo}-{$this->marca}-{$this->precio}-{$this->cantidadPuertas}-{$this->RutaDeFoto}";
    }

    public function Insertar()
    {
        $objDB = DB::GetDBObject();
        $consulta = $objDB->ReturnQuery(
            'INSERT INTO autos (modelo,marca,precio,cantidadPuertas,RutaDeFoto) VALUES (:modelo, :marca, :precio, :cantidadPuertas, :RutaDeFoto)'
        );

        $consulta->bindValue(':modelo', $this->modelo, PDO::PARAM_STR);
        $consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
        $consulta->bindValue(':cantidadPuertas', $this->cantidadPuertas, PDO::PARAM_STR);
        $consulta->bindValue(':RutaDeFoto', $this->RutaDeFoto, PDO::PARAM_STR);
        
        try {
            $consulta->execute();
        } catch (Exception $e) {
            echo $e;
        }
        return $objDB->ReturnLastInserted();
    }

    public static function TraerTodos()
    {
        $objDB = DB::GetDBObject();
        $consulta = $objDB->ReturnQuery('SELECT * FROM autos');

        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_LAZY);
        return $consulta;
    }

    public static function TraerUno($obj)
    {
        $objDB = DB::GetDBObject();
        $consulta = $objDB->ReturnQuery(
            'SELECT
                id,
                modelo,
                marca,
                precio,
                cantidadPuertas,
                RutaDeFoto
            FROM autos
            WHERE id = ' + $obj->id
        );
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_INTO, new Auto());

        return $consulta;
    }

    public function Borrar()
    {
        $objDB = DB::GetDBObject();
        $consulta = $objDB->ReturnQuery('DELETE FROM autos WHERE id = ' . $this->id);
        $consulta->execute();

        return $consulta->rowCount();
    }

    public function Modificar()
    {
        $objDB = DB::GetDBObject();
        $consulta = $objDB->ReturnQuery(
            'UPDATE autos
            SET
                modelo = :modelo,
                marca = :marca,
                precio = :precio,
                cantidadPuertas= :cantidadPuertas,
                RutaDeFoto = :RutaDeFoto
            WHERE id = ' + $this->id
        );

        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':modelo', $this->modelo, PDO::PARAM_STR);
        $consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
        $consulta->bindValue(':cantidadPuertas', $this->cantidadPuertas, PDO::PARAM_STR);
        $consulta->bindValue(':RutaDeFoto', $this->RutaDeFoto, PDO::PARAM_STR);

        $consulta->execute();
        return $consulta->rowCount();
    }
}
