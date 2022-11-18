<?php
require_once "database.php";

class Post extends Database{


function insertPost($author,$caption,$content){
// prepare statement
$statement = $this->dbcon->prepare("INSERT INTO post(author,caption,content) VALUES(?,?,?)");
$statement->bind_param("sss", $author,$caption,$content);

// execute
$statement->execute();
if($statement->affected_rows == 1){
    return "success";   
}else{
    return "Oops! something went wrong".$statement->error;
}

}   

function getAllPost(){
    $statement = $this->dbcon->prepare("SELECT * FROM post");
    $statement->execute();

    $result= $statement->get_result();

    $records = array();
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[]= $row;
    }

}

return $records;



}

function viewPost($id){
    $statement = $this->dbcon->prepare("SELECT * FROM post WHERE id=?");
    $statement->bind_param("i",$id);
    $statement->execute();

    $result= $statement->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
}

}

function updatePost($author,$caption,$content,$id){
    // prepare statement
    $statement = $this->dbcon->prepare("UPDATE post SET author=?,caption=?,content=? WHERE id=? ");
    $statement->bind_param("sssi", $author,$caption,$content,$id);
    
    // execute
    $statement->execute();
    if($statement->affected_rows == 1){
        return "success";   
    }elseif ($statement->affected_rows == 0) {
        return "nothing to update";
    }else{
        return "Oops! something went wrong".$statement->error;
    }
    
    }   
    function deletePost($id){
        $statement = $this->dbcon->prepare("DELETE FROM post WHERE id=?");
        $statement->bind_param("i",$id);
        $statement->execute();
        if ($statement->affected_rows == 1) {
            
            return true;
    }else {
        return false;
    }
    
    }


}


?>