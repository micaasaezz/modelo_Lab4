<?php
class AutosApi
{
    public static function CargarAuto($request, $response)
    {
        // return $response->withJson("Cargar Auto");
        $body = $request->getParsedBody();
        // var_dump($body);
        $jsonAuto = json_decode(json_encode($body['auto']));
        // var_dump($jsonAuto);
        $auxResponse = new stdClass();
        $auto = new Auto(
            null,
            $jsonAuto->modelo,
            $jsonAuto->marca,
            $jsonAuto->precio,
            $jsonAuto->cantidadPuertas,
            $jsonAuto->RutaDeFoto
        );
        $auxResponse->id = $auto->Insertar();

        return $response->withJson($auto, 200);
    }

    public static function ModificarAuto($request, $response)
    {
        $body = $request->getParsedBody();
        $jsonAuto = json_decode($body['auto']);

        $auxResponse = new stdClass();
        $auto = new Auto(
            $jsonAuto->id,
            $jsonAuto->modelo,
            $jsonAuto->marca,
            $jsonAuto->precio,
            $jsonAuto->cantidadPuertas,
            $jsonAuto->RutaDeFoto
        );
        $auxResponse->modificados = $auto->Modificar();
        return $response->withJson($auxResponse, 200);
    }

    public static function MostrarAutos($request, $response)
    {
        // return $response->withJson('Mostrar Autos');
        $retornoDatabase = Auto::TraerTodos();
        $lista = array();

        foreach ($retornoDatabase as $data) {
            $auto = new Auto(
                $data->id,
                $data->modelo,
                $data->marca,
                $data->precio,
                $data->cantidadPuertas,
                $data->RutaDeFoto
            );
            array_push($lista, $auto);
        }

        return $response->withJson($lista, 200);
    }

    public static function BorrarAuto($request, $response)
    {
        // return $response->withJson("Cargar Auto");
        $body = $request->getParsedBody();
        /* var_dump($body);
        die(); */
        $idAuto = $body['id'];
        $auto = new Auto($idAuto);

        $respuesta = new stdClass();
        $respuesta->resp = "error";
        if ($auto->Borrar() > 0) {
            $respuesta->resp = "ok";
        }

        return $response->withJson($respuesta, 200);
    }
}
