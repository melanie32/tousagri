<?php

namespace Model; 

/**
* 
*/
class CommentsModel extends \W\Model\Model
{
    // sélection de tous les commentaires 
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

    
    //sélection des commentaires en fonction de leur validation oui ou non et de l'id de la catégorie
    public function findCategoryForComments($validate = '', $id) 
    {
              
        $sql = 'SELECT * FROM comments WHERE id_category = :id';

        if(!empty($validate)) {
            $sql.= ' AND validate = :validate';
        }

        $sql.= ' ORDER BY date DESC';
             
        $sth = $this->dbh->prepare($sql);
      
        if(!empty($validate)) {
             $sth->bindValue(':validate', $validate);
        }

        $sth->bindValue(':id', $id);

        if($sth->execute()) {

            $selectComments = $sth->fetchAll();

            if(!empty($selectComments)){
               
                return $selectComments;
            }

        }

        return false;

    }

        //sélection des commentaires en fonction de leur validation oui ou non
    public function findCategoryIfValidate($validate = '') 
    {
              
        $sql = 'SELECT * FROM comments';

        if(!empty($validate)) {
            $sql.= ' WHERE validate = :validate';
        }

        $sql.= ' ORDER BY date DESC';
             
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

    public function selectCommentsByCategory($id_category = 0, $validate = '') 
    {
              
        $sql = 'SELECT comments.*, categories.title FROM comments LEFT JOIN categories ON comments.id_category = categories.id';

        if(!empty($id_category) && is_numeric($id_category) || !empty($validate)){
            $sql.= ' WHERE ';
            if(!empty($id_category) && is_numeric($id_category)){
                $sql.= ' comments.id_category = :id';
                if(!empty($validate)) {
                    $sql .= ' AND validate = :validate';
                }
            }
            elseif(!empty($validate)){ // Sans $id_category
                $sql .= ' validate = :validate';
            }
        }

          
        $sth = $this->dbh->prepare($sql);

        
        if(!empty($id_category) && is_numeric($id_category)){
            $sth->bindValue(':id', $id_category);
        }
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

    public function selectCommentsAndCategoryByVal($validate = '') 
    {
              
        $sql = 'SELECT comments.*, categories.title FROM comments LEFT JOIN categories ON comments.id_category = categories.id';

        if(!empty($validate)) {
            $sql.= ' WHERE validate = :validate';
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

    public function deleteCommentsIfDelCategory($id)
    {
        if (!is_numeric($id)){
            return false;
        }
        
        $sql = 'DELETE FROM comments WHERE id_category = :id';

        $sth = $this->dbh->prepare($sql);

        $sth->bindValue(':id', $id);

        return $sth->execute();

    }

}

