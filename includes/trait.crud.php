<?php

    trait CoreFunctions {

        public function queryDb($query, $params, $bindings, $fetch = PDO::FETCH_BOTH) {
            try {
                $i = 0;
                $stmt = $this->_db->prepare($query);
                foreach($params as $param) {
                    $stmt->bindParam($param, $bindings[$i]);
                    $i++;
                }
                $stmt->execute();
                return $stmt->fetchAll($fetch);
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
        
        public function incrementField($table, $field, $fieldid, $incrementation) {
            $select = "SELECT $field FROM $table WHERE id=:id";
            $result = $this->queryDb($select, [':id'], [$fieldid])[0][$field];
            $update = "UPDATE $table SET $field = ? WHERE id = ?";
            $this->updateDb($update, [$result + $incrementation, $fieldid]);
        }
    }
