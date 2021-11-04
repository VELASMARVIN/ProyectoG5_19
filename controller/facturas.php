<?php
     header('Content-type: application/json');

     require_once("../config/conexion.php");
     require_once("../models/Facturas.php");
     $facturas = new Facturas();

     $body = json_decode(file_get_contents("php://input"), true);

     switch ($_GET["op"]) {

        case "GetFacturas":
           $datos=$facturas->get_facturas();
           echo json_encode($datos);
        break;      
    
        case "GetUno":
           $datos=$facturas->get_factura($body["ID"]);
           echo json_encode($datos);
        break;

        case "InsertFacturas":
              $datos=$facturas->insert_facturas($body["ID"],$body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]);
              echo json_encode("factura agregada");
        break;

       
        case "UpdateFactura":
               $datos=$facturas->update_facturas($body["ID"],$body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]);
               echo json_encode("factura actualizada");
        break;

        case "DeleteFacturas":
         $datos=$facturas->delete_facturas($body["ID"]);
         echo json_encode("factura eliminada");
   break;
    }
?>