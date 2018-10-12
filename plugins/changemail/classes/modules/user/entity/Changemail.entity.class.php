<?php
/*-------------------------------------------------------
*
*	Plugin "Changemail"
*	Author: Vladimir Yuriev (extravert)
*	Site: lsmods.ru
*	Contact e-mail: support@lsmods.ru
*
---------------------------------------------------------
*/

class PluginChangemail_ModuleUser_EntityChangemail extends Entity
{    
    public function getCode() {
        return $this->_aData['changemail_code'];
    }  
    public function getUserId() {
        return $this->_aData['user_id'];
    }
    public function getDateAdd() {
        return $this->_aData['changemail_date_add'];
    }
    public function getDateUsed() {
        return $this->_aData['changemail_date_used'];
    }
    public function getDateExpire() {
        return $this->_aData['changemail_date_expire'];
    }
    public function getIsUsed() {
        return $this->_aData['changemail_is_used'];
    }
    public function getChangeMailTo() {
        return $this->_aData['changemail_mail_to'];
    }
        
    
	public function setCode($data) {
        $this->_aData['changemail_code']=$data;
    }
    public function setUserId($data) {
        $this->_aData['user_id']=$data;
    }   
    public function setDateAdd($data) {
        $this->_aData['changemail_date_add']=$data;
    } 
    public function setDateUsed($data) {
        $this->_aData['changemail_date_used']=$data;
    } 
    public function setDateExpire($data) {
        $this->_aData['changemail_date_expire']=$data;
    } 
    public function setIsUsed($data) {
        $this->_aData['changemail_is_used']=$data;
    }  
    public function setChangeMailTo($data) {
        $this->_aData['changemail_mail_to']=$data;
    }  
}
?>