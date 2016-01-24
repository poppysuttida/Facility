<?php
class ADT {
	public $column = array();
	private $valueMap = array();
	
	public function draw(){
		$tools = array();//new tools attr	
		$valueMapTmp = array();
		$iTmp = 0;
		foreach($this->column as $colVal){
			if($colVal[1]['adt_type']=='tools'){
				$tools = $colVal[1]['adt_attr'];
			}else if($colVal[1]['adt_type']=='input'){
				foreach($colVal[1]['adt_attr'] as $key => $value){
					if(isset($value['name'])){
						$valueMapTmp[$value['name']]['index'] = $iTmp;
						$valueMapTmp[$value['name']]['request'] = $value['adt_request'];
					}
					$iTmp++;
				}
			}
		}
		$this->valueMap = $valueMapTmp;
		unset($valueMapTmp);
		
		$GUItable = '<table id="adt_table">';//start table
		
		$thead = '<thead><tr>';//start thead
		foreach($this->column as $colVal){
			if($colVal[1]['adt_type']=='tools'){
				if((!isset($tools['update']) && !isset($tools['delete']))||($tools['update']==FALSE && $tools['delete']==FALSE)) continue;
			}
			$thead .= '<th>'.$colVal[0].'</th>';
		}
		$thead .= '</tr></thead>';//end thead
		$GUItable .= $thead;//add thead
		
		$GUItable .= '<tbody id="adt_list_items"></tbody>';//add tbody
		
		$tfoot = '<tfoot><tr>';//start thead
		$tfoot .= '<td colspan="'.(count($this->column)-1).'">';
		if(isset($tools['create']) && $tools['create'] != false){
			$tfoot .=  '<input type="button" onclick="adt_add_item();" value="'.$tools['create']['label'].'"/>';
		}
		//$tfoot .= '</td><td id="sum_list_items">&nbsp;</td>';
		//if((isset($tools['update']) && $tools['update']!=FALSE)||(isset($tools['delete']) && $tools['delete']!=FALSE)){
			//$tfoot .= '<td>&nbsp;</td>';
		//}
		$tfoot .= '</tr></tfoot>';//end thead
		$GUItable .= $tfoot;//add tfoot
		
		$GUItable .= '</table>';//end table
		echo $GUItable;//deaw table
		
		$DYscript = '<script type="text/javascript" language="javascript">';//start script
		$DYscript .= 'var adtval_list_tmp = [];';//new list tmp
		
		$DYscript .= 'function adt_add_item(){';//start function add item
		$DYscript .= 'for(var key in adtval_list_tmp) if(adtval_list_tmp[key][0]==false) adt_save_item(key);';
		$DYscript .= 'adtval_list_tmp.push([false';
		foreach($this->column as $colVal){
			if($colVal[1]['adt_type']=='input'){
				foreach($colVal[1]['adt_attr'] as $key => $value){
					if(isset($value['name'])){
						$DYscript .= ', \'\'';
					}
				}
			}
		}
		$DYscript .= ']);adt_refresh_items(); }';
		
		$DYscript .= 'function adt_edit_item(index){ for(var key in adtval_list_tmp)';//start function edit item
		$DYscript .= 'if(adtval_list_tmp[key][0]==false) adt_save_item(key); adtval_list_tmp[index][0] = false; adt_refresh_items(); }';
		
		$DYscript .= 'function adt_del_item(index, unchk){ if(unchk==true){ adtval_list_tmp.splice(index, 1); }else{';//start function del item
		if(isset($tools['delete']['confirm'])) $DYscript .= 'if(confirm(\''.$tools['delete']['confirm'].'\'))';
        $DYscript .= 'adtval_list_tmp.splice(index, 1); } adt_refresh_items(); }';
        
		$DYscript .= 'function adt_save_item(index){if(';//start function save item
		$iTmp = 0;
		foreach($this->valueMap as $key => $value){
			if($value['request']==TRUE){
				if($iTmp>0) $DYscript .= ' || ';
				$DYscript .= '($(\'#'.$key.'\').val()==\'\')';
				$iTmp++;
			}
		}
		$DYscript .= '){ adt_del_item(index, true); return false; }adtval_list_tmp[index][0] = true;';
		$iTmp = 0;
		foreach($this->valueMap as $key => $value){
			$iTmp++;
			$DYscript .= 'adtval_list_tmp[index]['.$iTmp.'] = $(\'#'.$key.'\').val();';
		}
		$DYscript .= 'adt_refresh_items();}';
		
		$DYscript .= 'function adt_refresh_items(){';//start function refresh item
		$DYscript .= '$(\'#adt_list_items\').html(\'\'); adtval_sum_all = 0; for(var key in adtval_list_tmp){';
		$DYscript .= 'if(adtval_list_tmp[key][0]==true){ $(\'#adt_list_items\').append(\'<tr id="rowIndex_\'+key+\'">\n\'';
		$iTmp = 1;
		foreach($this->column as $colVal){
			$valRowTmp = $colVal[1];
			if($valRowTmp['adt_type']=='no'){
				$DYscript .= '+\'<td class="center">\'+(parseFloat(key)+1)+\'</td>\n\'';
			}else if($valRowTmp['adt_type']=='tools'){
				if((!isset($tools['update']) && !isset($tools['delete']))||($tools['update']==FALSE && $tools['delete']==FALSE)){
					continue;
				}
				$iTmp++;
				$DYscript .= '+\'<td style="cursor: pointer;" class="adt_tools">\'';
				if(isset($tools['update']) && $tools['update'] != false){
					$DYscript .= '+\'<a onclick="adt_edit_item(\'+(key)+\');">'.$tools['update']['label'].'</a>\'';
				}
				if(isset($tools['delete']) && $tools['delete'] != false){
					$DYscript .= '+\'&nbsp;<a onclick="adt_del_item(\'+(key)+\', false);">'.$tools['delete']['label'].'</a>\'';
				}
				$DYscript .= '+\'</td>\'';
				
			}else if($valRowTmp['adt_type']=='input'){
				$iTmp++;
				$DYscript .= '+\'<td>\'+adtval_list_tmp[key]['.$iTmp.']+\'</td>\n\'';
			}
		}
		$DYscript .= '+\'</tr>\n\');}else{$(\'#adt_list_items\').append(\'<tr id="rowIndex_\'+key+\'">\n\'';
		$iTmp = 1;
		foreach($this->column as $colVal){
			$valRowTmp = $colVal[1];
			if($valRowTmp['adt_type']=='no'){
				$DYscript .= '+\'<td class="center">\'+(parseFloat(key)+1)+\'</td>\n\'';
			}else if($valRowTmp['adt_type']=='tools'){
				if((!isset($tools['update']) && !isset($tools['delete']))||($tools['update']==FALSE && $tools['delete']==FALSE)){
					continue;
				}
				$iTmp++;
				$DYscript .= '+\'<td style="cursor: pointer;" class="adt_tools">\'';
				if(isset($tools['delete']) && $tools['delete'] != false){
					$DYscript .= '+\'<a onclick="adt_del_item(\'+(key)+\', false);">'.$tools['delete']['label'].'</a>\'';
				}
				$DYscript .= '+\'</td>\'';
				
			}else if($valRowTmp['adt_type']=='input'){
				$iTmp++;
				$DYscript .= '+\'<td>';
				foreach($valRowTmp['adt_attr'] as $keyInputTmp => $valInputTmp){
					$DYscript .= $this->createInput($iTmp, $valInputTmp);
				}
				$DYscript .= '</td>\n\'';
			}
		}
		$DYscript .= '+\'</tr>\n\');}';
		$DYscript .= '}$(\'#sum_list_items\').html(adtval_sum_all);}';
		
		$DYscript .= '$(function(){ $("html").click(function(e){ 	if(adtval_list_tmp.length > 0){ count = 0; for(var key in adtval_list_tmp) if(adtval_list_tmp[key][0]==false) count = count+1; if(count > 0){ if(($(e.target).parents(\'#adt_table\').size()>0) ||($(e.target).parent(\'.adt_tools\').size()>0)){ /*console.log("Inside div");*/ }else{ /*console.log("Outside div");*/ save = -1; for(var key in adtval_list_tmp) if(adtval_list_tmp[key][0]==false) save = key; if(save > -1) adt_save_item(parseInt(save)); } } } }); });';//start click focus
		
		$DYscript .= '</script>';//end script
		echo $DYscript;//draw script
	}
	
	private function createInput($iTmp, $valInputTmp){
		$inputTmp = '';
		if(in_array($valInputTmp['type'], array('text', 'hidden'))){//apply type 'text', 'hidden'
			$inputTmp .= '<'.$valInputTmp['adt_tag'].' ';
			foreach($valInputTmp as $keyAttrTmp => $valAttrTmp){							
				$tmpADT = explode('_', $keyAttrTmp); 
				if($keyAttrTmp!='value' && $tmpADT[0]!='adt') $inputTmp .= $keyAttrTmp.'="'.str_replace('\'', '\\\'', $valAttrTmp).'" ';
			}
			$inputTmp .= 'value="\'+adtval_list_tmp[key]['.$iTmp.']+\'" />';
		/*}else if($valInputTmp['adt_tag']=='select'){//apply type 'select'
			$inputTmp .= '<'.$valInputTmp['adt_tag'].' ';
			foreach($valInputTmp as $keyAttrTmp => $valAttrTmp){							
				$tmpADT = explode('_', $keyAttrTmp); 
				if(!in_array($keyAttrTmp, array('value', 'options')) && $tmpADT[0]!='adt'){
					$inputTmp .= $keyAttrTmp.'="'.str_replace('\'', '\\\'', $valAttrTmp).'" ';
				}
			}
			$inputTmp .= '>\n';
			foreach($valInputTmp['options'] as $keyOtpTmp => $valOtpTmp){	
				$inputTmp .= '<option value="'.$keyOtpTmp.'">'.$valOtpTmp.'</option>';
			}
			$inputTmp .= '</'.$valInputTmp['adt_tag'].'>\n';*/
		}else{//apply other tags
			$inputTmp .= '<'.$valInputTmp['adt_tag'].' ';
			foreach($valInputTmp as $keyAttrTmp => $valAttrTmp){							
				$tmpADT = explode('_', $keyAttrTmp); 
				if($tmpADT[0]!='adt') $inputTmp .= $keyAttrTmp.'="'.str_replace('\'', '\\\'', $valAttrTmp).'" ';
			}
			$inputTmp .= ' >';
			if(isset($valInputTmp['adt_html'])) $inputTmp .= $valInputTmp['adt_html'];
			$inputTmp .= '</'.$valInputTmp['adt_tag'].'>';
		}
		return $inputTmp;
	}
}
?>