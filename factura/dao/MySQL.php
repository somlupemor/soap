<?php
class MySQL
    {
        private $conexion;
        private $total_consultas;
        private $host="localhost";
        private $user="root";
        private $password="iiteplus@#";
        private $database="factura33";

        public function __construct() {
            if(!isset($this->conexion))
            {
                $this->conexion = (mysqli_connect($this->host,$this->user,$this->password)) or die(mysql_error());
                mysqli_select_db($this->conexion,$this->database) or die(mysql_error());
                $this->consulta("SET NAMES 'utf8'");
                //echo  "conexion establecida";
            }
        }

        public function consulta($consulta)
        {
            $this->total_consultas++;
            $resultado = mysqli_query($this->conexion,$consulta);
            if(!$resultado)
            {
                echo 'MySQL Error: ' . mysql_error();
                exit;
            }
            return $resultado;
        }

        public function countUpdate()
        {
         return mysqli_affected_rows($this->conexion);
        }

        public function fetch_array($consulta)
        {
            return mysqli_fetch_array($consulta);
        }

        public function num_rows($consulta)
        {
            return mysqli_affected_rows($consulta);
        }

        public function getTotalConsultas()
        {
            return $this->total_consultas;
        }
    }
