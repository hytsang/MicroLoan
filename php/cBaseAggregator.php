<?php

abstract class CBaseAggregator
{
   protected $postData = array();

   abstract protected function AddFormDataToDB();

   abstract protected function FillPostData();
   
   abstract protected function SendDataToAggregator();

   abstract protected function Execute();
}

?>