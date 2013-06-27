<?php

    trait CoreFunctions {

        public function queryDb($query, $params, $bindings) {
            try {
                $i = 0;
                $stmt = $this->_db->prepare($query);
                foreach($params as $param) {
                    $stmt->bindParam($param, $bindings[$i]);
                    $i++;
                }
                $stmt->execute();
                return $stmt->fetchAll();
            }
            catch(PDOException $e) {
                return FALSE;
            }
        }
        public function insert($query, $params, $bindings) {

            $stmt = $this->_db->prepare($query);

            $executearray = [];

            for($i=0;$i<count($params); $i++) {
                $executearray[$params[$i]] = $bindings[$i];
            }
            $stmt->execute($executearray);

        }
        public function updateDb($query, $bindings) {

            $stmt = $this->_db->prepare($query);
            $stmt->execute($bindings);

        }
        public function deleteFromDb($query, $params, $bindings) {
            try {
                $i = 0;
                $stmt = $this->_db->prepare($query);
                foreach($params as $param) {
                    $stmt->bindParam($param, $bindings[$i]);
                    $i++;
                }
                $stmt->execute();
            }
            catch(PDOException $e) {
                return FALSE;
            }
        }
    }
