<?php
include "Main.php";

    class Teacher extends Main{
        protected $tbl = " teachet_data";
        private $name;
        private $dep;
        private $age;


        public function setName($name) {
            $this->name = $name;
        }

        public function setDep($dep) {
            $this->dep = $dep;
        }

        public function setAge($age) {
            $this->age = $age;
        }

        public function insert() {
            $sql = "INSERT INTO $this->tbl(Name, Department, Age) VALUES(:name, :dep, :age)";
            $stmt = DB::prepare($sql);
            $stmt->bindparam(':name', $this->name);
            $stmt->bindparam(':dep', $this->dep);
            $stmt->bindparam(':age', $this->age);
            return $stmt->execute();
        }

        public function update($id){
            $sql = "UPDATE $this->tbl SET Name=:name, Department=:dep, Age=:age WHERE id=:id";
            $stmt = DB::prepare($sql);
            $stmt->bindparam(':name', $this->name);
            $stmt->bindparam(':dep', $this->dep);
            $stmt->bindparam(':age', $this->age);
            $stmt->bindparam(':id', $id);
            return $stmt->execute();
        }

       
    }
    
?>