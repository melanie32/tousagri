<?php  

namespace Model; 

use \W\Model\ConnectionModel;
 
/**
* 
*/
class QuestionsModel extends \W\Model\Model
{
	 public function findQuestions($id) 
    {
        if (!is_numeric($id)){
            return false;
        }
      
        $sql = 'SELECT * FROM questions WHERE id_category = :id';
       

        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $id);

        if($sth->execute()) {

            $selectQuestions = $sth->fetchAll();

            if(!empty($selectQuestions)){
               
                return $selectQuestions;
            }

        }

        return false;

    }

   

}




