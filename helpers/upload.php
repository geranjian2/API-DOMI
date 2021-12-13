<?php

function upload( $files, $route ) {
    // validamos que el nombre de la foto exista y este definido
    $name = $files['name'];
    $temp = $files['tmp_name'];
    // isset es una funcion que evalua que un valor este definido
    // empty es una funcion que evalua si una variable esta vacia
    // al colocar nosotros !empty estamos diciendo que evalue que no este vacio
    if ( isset( $name ) && !empty( $name ) ) {
        $extensions = array( 'image/jpeg', 'image/jpg', 'image/png', 'image/gif' );

        if ( in_array( $files['type'], $extensions ) ) {
            $archivo= str_replace(' ','',$name);
            if (move_uploaded_file($temp, './images/'.$route.'/'.$archivo)){
                return './images/'.$route.'/'.$archivo;

            }
        }else{
            return 0;
        }

    }else{
        return 0;
    }

}

?>