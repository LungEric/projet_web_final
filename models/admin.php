<?php

include 'models/config.php';
// Connection DB.

    $sql_demande = "SELECT * FROM produit" ;
    $gundam_querry = get_db()->query($sql_demande);  
    $list_data = $gundam_querry->fetchAll(PDO::FETCH_ASSOC);

// fonction pour derouler la liste des articles
function all_items(){
    global $list_data;
    return $list_data;
}

// ajouter le produit
function add_product($nom,$prix,$description){
    $results = get_db()->prepare("INSERT INTO produit (produit_name, produit_price,produit_description) VALUES (:nom,:prix,:description)");
    $results ->execute(array(':nom'=>$nom,':prix'=>$prix,':description'=>$description));
    $results ->closeCursor();
}

// ajouter image
function add_image($fileNameLoad,$nomdb){
    $results = get_db()->prepare("INSERT INTO image (nom,image) VALUES (:nom,:image)");
    $results ->execute(array(':nom'=>$nomdb,':image'=>$fileNameLoad));
    $results ->closeCursor();
}

// changement de nom
function change_name($ref,$nom){
    $sql = "UPDATE produit SET produit_name='$nom' WHERE id_produit=$ref" ;
    $search= get_db()->query($sql);
    $search->execute();
}

// changement de prix
function change_prix($ref,$prix){
    $sql = "UPDATE produit SET  produit_price='$prix'  WHERE id_produit=$ref" ;
    $search= get_db()->query($sql);
    $search->execute();
}

// changement de description
function change_description($ref,$description){
    $sql = "UPDATE produit SET produit_description='$description'  WHERE id_produit=$ref" ;
    $search= get_db()->query($sql);
    $search->execute();
}


// supprimer mon produit
function delete_product($ref){
    $sql = "DELETE FROM produit WHERE id_produit=$ref" ;
    $search= get_db()->query($sql);
    $search->execute();
}

// image

function images_admin(){
    $sql_image="SELECT * FROM image ";
    $image_prepare = get_db()->prepare($sql_image);
    $image_prepare->execute();
    $result_image = $image_prepare->fetchAll();
    $image_prepare->closeCursor();
    return $result_image;
}

?>