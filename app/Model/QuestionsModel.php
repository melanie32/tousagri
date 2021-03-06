<?php  

namespace Model; 

use \W\Model\ConnectionModel;
 
/**
* 
*/
class QuestionsModel extends \W\Model\Model
{
	 public function findQuestions($id_category) 
    {
        if (!is_numeric($id_category)){
            return false;
        }
      
        $sql = 'SELECT * FROM questions WHERE id_category = :id';
       

        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $id_category);

        if($sth->execute()) {

            $selectQuestions = $sth->fetch();

            if(!empty($selectQuestions)){
               
                return $selectQuestions;
            }

        }

        return false;

    }

     public function deleteQuestionsIfDelCategory($id)
    {
        if (!is_numeric($id)){
            return false;
        }
        
        $sql = 'DELETE FROM questions WHERE id_category = :id';

        $sth = $this->dbh->prepare($sql);

        $sth->bindValue(':id', $id);

        return $sth->execute();

    }

   

}




