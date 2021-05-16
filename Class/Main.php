<?php
include "DB.php";

    abstract class Main {
        
        protected $tbl;
        public function readAll(){
            $sql = "SELECT * FROM $this->tbl";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function readById($id) {
            $sql = "SELECT * FROM $this->tbl WHERE id=:id";
            $stmt = DB::prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();

        }

        public function deleteData($id){
            $sql = "DELETE FROM $this->tbl WHERE id=:id";
            $stmt = DB::prepare($sql);
            $stmt->bindparam(':id', $id);
            return $stmt->execute();
        }

        abstract public function insert();
        abstract public function update($id);
    }
    

?>