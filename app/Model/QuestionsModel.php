<?php

namespace Model; 

/**
* 
*/
class QuestionsModel extends \W\Model\Model
{
	 public function findQuestions() 
    {

        $app = getApp();

        $sql = 'SELECT q.*, c.id FROM questions AS q LEFT JOIN categories AS c ON c.id = q.id_category';

        //$dbh = ConnectionModel::getDbh();

        $sth = $dbh->prepare($sql);

        if($sth->execute()) {

            $selectQuestions = $sth->fetchAll();

        }

    return false;

    }

}




