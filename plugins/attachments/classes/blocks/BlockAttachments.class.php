<?php
//
//  Attachments plugin
//  (P) Rafrica.net Studio, 2010 - 2012
//  http://we.rafrica.net/
//

class PluginAttachments_BlockAttachments extends Block {
	public function Exec() {
		$iTopicId = Router::GetParam(0);
		$aFiles = array();
		if($oTopic = $this->Topic_GetTopicById($iTopicId)){
			$aFiles = $oTopic->getAttachments();
		}		
		
		$this->Viewer_Assign('aFiles',$aFiles);
	}
}

?>