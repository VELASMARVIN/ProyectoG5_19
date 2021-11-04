<?php

    class Facturas extends Conectar{

        public  function get_facturas(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM g5_19.ma_facturas ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_factura($ID){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM g5_19.ma_facturas  WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_facturas($ID,$NUMERO_FACTURA,$ID_SOCIO,$FECHA_FACTURA,$DETALLE,$SUB_TOTAL,$TOTAL_ISV,$TOTAL,$FECHA_VENCIMIENTO,$ESTADO){
           $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO g5_19.ma_facturas(ID,NUMERO_FACTURA,ID_SOCIO,FECHA_FACTURA,DETALLE,SUB_TOTAL,TOTAL_ISV,TOTAL,FECHA_VENCIMIENTO,ESTADO)
            VALUES (?,?,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->bindValue(2, $NUMERO_FACTURA);
            $sql->bindValue(3, $ID_SOCIO);
            $sql->bindValue(4, $FECHA_FACTURA);
            $sql->bindValue(5, $DETALLE);
            $sql->bindValue(6, $SUB_TOTAL);
            $sql->bindValue(7, $TOTAL_ISV);
            $sql->bindValue(8, $TOTAL);
            $sql->bindValue(9, $FECHA_VENCIMIENTO);
            $sql->bindValue(10,$ESTADO);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_facturas($ID,$NUMERO_FACTURA,$ID_SOCIO,$FECHA_FACTURA,$DETALLE,$SUB_TOTAL,$TOTAL_ISV,$TOTAL ,$FECHA_VENCIMIENTO,$ESTADO){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE g5_19.ma_facturas SET
               NUMERO_FACTURA =?,
               ID_SOCIO=?,
               FECHA_FACTURA=?,
               DETALLE=?,
               SUB_TOTAL=?,
               TOTAL_ISV=?,
               TOTAL=?,
               FECHA_VENCIMIENTO=?,
               ESTADO=?
                WHERE ID=? ";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NUMERO_FACTURA);
            $sql->bindValue(2, $ID_SOCIO);
            $sql->bindValue(3, $FECHA_FACTURA);
            $sql->bindValue(4, $DETALLE);
            $sql->bindValue(5, $SUB_TOTAL);
            $sql->bindValue(6, $TOTAL_ISV);
            $sql->bindValue(7, $TOTAL);
            $sql->bindValue(8, $FECHA_VENCIMIENTO);
            $sql->bindValue(9,$ESTADO);
            $sql->bindValue(10, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public  function delete_facturas($ID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM g5_19.ma_facturas  WHERE  ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }  




 ?> 