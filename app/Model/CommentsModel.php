<?php

namespace Model; 

/**
* 
*/
class CommentsModel extends \W\Model\Model
{
	public function findComments($id) 
    {
        if (!is_numeric($id)){
            return false;
        }
      
        $sql = 'SELECT * FROM comments WHERE id_category = :id';
       

        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $id);

        if($sth->execute()) {

            $selectComments = $sth->fetchAll();

            if(!empty($selectComments)){
               
                return $selectComments;
            }

        }

        return false;

    }

    

    public function findCategoryForComments($validate = '') 
    {
              
        $sql = 'SELECT comments.*, categories.title FROM comments LEFT JOIN categories ON comments.id_category = categories.id';

        if(!empty($validate)) {
            $sql .= ' WHERE validate = :validate';
        }
             
        $sth = $this->dbh->prepare($sql);
      
        if(!empty($validate)) {
             $sth->bindValue(':validate', $validate);
        }


        if($sth->execute()) {

            $selectComments = $sth->fetchAll();

            if(!empty($selectComments)){
               
                return $selectComments;
            }

        }

        return false;

    }

}

