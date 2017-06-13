<?php

require_once (str_replace("Database", "", __DIR__) . "global.php");

/**
 * @return PDO Nouvelle connexion à la base de donnée
 */
function getPDO() {
    try {
        $config = include $_SERVER['DOCUMENT_ROOT'] . '/env.php';
        $pdo = new PDO(
            "mysql:host=". $config['dbhost'] .";dbname=". $config['dbname'] .";charset=". $config['charset'],
            $config["dbuser"],
            $config["dbpass"]
        );
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch(Exception $ex) {
        throw new $ex;
    }
}

/**
 * @param string $query Requête SQL
 * @param bool $find Doit retourner un tableau de résultat ?
 * @return array|bool
 */
function runQuery($query, $find = false) {
    try {
        $statement = getPDO()->prepare($query);
        $statement->execute();
        if ($find && $statement->rowCount() !== 0) {
            if ($statement->rowCount() === 1) {
                return $statement->fetch();
            } else {
                return $statement->fetchAll();
            }
        }
        return null;
    } catch(Exception $ex) {
        throw new $ex;
    }
}


/**=========================================================================**/
/**     FIND | SELECT                                                       **/
/**=========================================================================**/

/**
 * @param string $table Nom de la table
 * @return array
 */
function findAll($table) {
    return runQuery("SELECT * FROM $table", true);
}

/**
 * @param string $table Nom de la table
 * @param array $search Paramètres de recherche
 * @return array|null
 */
function find($table, $search = []) {
    if (is_array($search) && is_string(key($search))) {
        $query = "SELECT * FROM $table WHERE ";
        $last = getLastArrayKey($search);
        foreach ($search as $key => $value) {
            if (is_string($value)) {
                $value = "'" . $value . "'";
            }
            $query .= "$key = $value" . (($last === $key) ? '': ' AND ');
        }
        return runQuery($query, true);
    } else {
        return null;
    }
}


/**=========================================================================**/
/**     INSERT                                                              **/
/**=========================================================================**/

/**
 * @param string $table Nom de la table
 * @param array $values Valeur a mettre dans la table
 * @return bool|null
 */
function insert($table = "", $values = []) {
    if (is_array($values) && is_string(key($values))) {
        $query = "INSERT INTO $table (";
        $champs = "";
        $content = "";
        $lastKey = getLastArrayKey($values);
        foreach ($values as $key => $value) {
            $last = ($lastKey === $key) ? true: false;
            $champs .= $key . (($last) ? "": ",");
            if (is_string($value)) {
                $content .= "'". $value . "'";
            } else {
                $content .= $value;
            }
            $content .= (($last) ? "": ",");
        }
        return runQuery(($query . $champs . ") VALUES (" . $content . ");"));
    } else {
        return null;
    }
}


/**=========================================================================**/
/**     UPDATE                                                              **/
/**=========================================================================**/


function update($table = "", $values = []) {
    return "TODO";
}