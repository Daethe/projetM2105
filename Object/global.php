<?php

/**
 * @param array $array Tableau associatif
 * @return mixed|null Retourne la dernière clé du tableau
 */
function getLastArrayKey($array) {
    if (is_array($array) && is_string(key($array))) {
        $keys = array_keys($array);
        return end($keys);
    }
    return null;
}