<?php 

namespace Model; 

use \W\Model\ConnectionModel;
 
/**
* 
*/
class QuestionsModel extends \W\Model\Model
{
	 public function findQuestions() 
    {
        $app = getApp();

        $dbh = ConnectionModel::getDbh();


        $sql = 'SELECT q.*, c.id FROM questions AS q LEFT JOIN categories AS c ON c.id = q.id_category';

        //$dbh = ConnectionModel::getDbh();

        $sth = $dbh->prepare($sql);

        if($sth->execute()) {

            $selectQuestions = $sth->fetchAll();

            if($selectQuestions){
                return $selectQuestions;
            }

        }
    return false;

    }

}




