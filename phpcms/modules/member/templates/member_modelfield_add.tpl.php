<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<?php include $this->admin_tpl('header','admin');?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform"});
	$("#field").formValidator({onshow:"<?php echo L('input').L('fieldname')?>",onfocus:"<?php echo L('fieldname').L('between_1_to_20')?>"}).regexValidator({regexp:"^[a-zA-Z]{1}([a-zA-Z0-9]|[_]){0,19}$",onerror:"<?php echo L('filedname_incorrect')?>"}).inputValidator({min:1,max:20,onerror:"<?php echo L('fieldname').L('between_1_to_20')?>"}).ajaxValidator({
	    type : "get",
		url : "",
		data : "m=member&c=member_modelfield&a=public_checkfield&modelid=<?php echo $modelid?>",
		datatype : "html",
		cached:false,
		getdata:{issystem:'issystem'},
		async:'false',
		success : function(data){	
            if( data == "1" )
			{
                return true;
			}
            else
			{
                return false;
			}
		},
		buttons: $("#dosubmit"),
		onerror : "<?php echo L('fieldname').L('already_exist')?>",
		onwait : "<?php echo L('connecting_please_wait')?>"
	});
	$("#formtype").formValidator({onshow:"<?php echo L('filedtype_need')?>",onfocus:"<?php echo L('filedtype_need')?>",oncorrect:"<?php echo L('input_correct')?>",defaultvalue:""}).inputValidator({min:1,onerror: "<?php echo L('filedtype_need')?>!"});
	$("#name").formValidator({onshow:"<?php echo L('filed_nickname_need')?>",onfocus:"<?php echo L('filed_nickname_need')?>",oncorrect:"<?php echo L('input_correct')?>"}).inputValidator({min:1,onerror:"<?php echo L('filed_nickname_need')?>"});
})

//-->
</script>
<div class="pad_10">
<form name="myform" id="myform" action="?m=member&c=member_modelfield&a=add" method="post">
<div class="common-form">
<fieldset>
	<legend><?php echo L('basic_configuration')?></legend>
	<table width="100%" class="table_form contentWrap">
		<tr> 
		  <th><strong><?php echo L('filedtype')?></strong><br /></th>
		  <td>
			<?php echo form::select($fields,'','name="info[formtype]" id="formtype" onchange="javascript:field_setting(this.value);"',L('filedtype_need'));?>
		  </td>
		</tr>
		<tr> 
		  <th width="25%"><font color="red">*</font> <strong><?php echo L('filedname')?></strong><br />
		  <?php echo L('username_rule')?>
		  </th>
		  <td><input type="text" name="info[field]" id="field" size="20" class="input-text"></td>
		</tr>
		<tr> 
		  <th><font color="red">*</font> <strong><?php echo L('filed_nickname')?></strong><br /><?php echo L('exaple_title')?></th>
		  <td><input type="text" name="info[name]" id="name" size="30" class="input-text"></td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('field_cue')?></strong><br /><?php echo L('nickname_alert')?></th>
		  <td><textarea name="info[tips]" rows="2" cols="20" id="tips" style="height:40px; width:80%"></textarea></td>
		</tr>

		<tr> 
		  <th><strong><?php echo L('correlation_param')?></strong><br /><?php echo L('correlation_attribute')?></th>
		  <td><div id="setting"></div></td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('extra_attribute')?></strong><br /><?php echo L('add_javascript')?></th>
		  <td><input type="text" name="info[formattribute]" value="" size="50" class="input-text"></td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('form_css')?></strong><br /><?php echo L('user_form_css')?></th>
		  <td><input type="text" name="info[css]" value="" size="10" class="input-text"></td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('string_len_range')?></strong><br /><?php echo L('post_alert')?></th>
		  <td><?php echo L('min')?><input type="text" name="info[minlength]" id="field_minlength" value="0" size="5" class="input-text"> <?php echo L('max')?><input type="text" name="info[maxlength]" id="field_maxlength" value="" size="5" class="input-text"></td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('date_regular')?></strong><br /><?php echo L('validity_alert')?></th>
		  <td><input type="text" name="info[pattern]" id="pattern" value="" size="40" class="input-text"> 
			<select name="pattern_select" onchange="javascript:$('#pattern').val(this.value)">
			<option value=""><?php echo L('common_regular')?></option>
			<option value="/^[0-9.-]+$/"><?php echo L('number')?></option>
			<option value="/^[0-9-]+$/"><?php echo L('int')?></option>
			<option value="/^[a-z]+$/i"><?php echo L('alphabet')?></option>
			<option value="/^[0-9a-z]+$/i"><?php echo L('alphabet')?>+<?php echo L('number')?></option>
			<option value="/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/">E-mail</option>
			<option value="/^[0-9]{5,20}$/">QQ</option>
			<option value="/^http(s?):\/\//"><?php echo L('http')?></option>
			<option value="/^(1)[0-9]{10}$/"><?php echo L('mp')?></option>
			<option value="/^[0-9-]{6,13}$/"><?php echo L('tel')?></option>
			<option value="/^[0-9]{6}$/"><?php echo L('postcode')?></option>
			</select>
		  </td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('error_alert')?></strong><br /><?php echo L('form_error_alert')?></th>
		  <td><input type="text" name="info[errortips]" value="" size="50" class="input-text"></td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('unique')?></strong></th>
		  <td><input type="radio" name="info[isunique]" value="1" id="field_allow_isunique1"> <?php echo L('yes')?> <input type="radio" name="info[isunique]" value="0" id="field_allow_isunique0" checked> <?php echo L('no')?></td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('can_empty')?></strong></th>
		  <td><input type="radio" name="info[isbase]" value="1"  checked> <?php echo L('yes')?> <input type="radio" name="info[isbase]" value="0"> <?php echo L('no')?> </td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('search_condition')?></strong></th>
		  <td><input type="radio" name="info[issearch]" value="1" id="field_allow_search1"> <?php echo L('yes')?> <input type="radio" name="info[issearch]" value="0" id="field_allow_search0" checked> <?php echo L('no')?></td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('isadd_condition')?></strong></th>
		  <td><input type="radio" name="info[isadd]" value="1" checked><?php echo L('yes')?><input type="radio" name="info[isadd]" value="0" ><?php echo L('no')?></td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('isomnipotent_condition')?></strong></th>
		  <td><input type="radio" name="info[isomnipotent]" value="1"><?php echo L('yes')?><input type="radio" name="info[isomnipotent]" value="0" checked><?php echo L('no')?></td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('deny_set_field_group')?></strong></th>
		  <td><?php echo form::checkbox($grouplist,$unsetgroupids,'name="unsetgroupids[]" id="unsetgroupids"',0,'100');?></td>
		</tr>
		<tr> 
		  <th><strong><?php echo L('deny_set_field_role')?></strong></th>
		  <td><?php echo form::checkbox($roles,$unsetroleids,'name="unsetroleids[]" id="unsetroleids"',0,'100');?> </td>
		</tr>
	</table>
</fieldset>
    <div class="bk15"></div>
    <input name="info[modelid]" type="hidden" value="<?php echo $modelid?>">
    <input name="dosubmit" id="dosubmit" type="submit" value="<?php echo L('submit')?>" class="dialog">
	</form>
<div id="PC__contentHeight" style="display:none">90</div>
<script type="text/javascript">
<!--
	function field_setting(fieldtype) {
		$.getJSON("?m=member&c=member_modelfield&a=public_field_setting&fieldtype="+fieldtype, function(data){
			if(data.field_basic_table=='1') {
				$('#field_basic_table0').attr("disabled",false);
				$('#field_basic_table1').attr("disabled",false);
			} else {
				$('#field_basic_table0').attr("checked",true);
				$('#field_basic_table0').attr("disabled",true);
				$('#field_basic_table1').attr("disabled",true);
			}
			if(data.field_allow_search=='1') {
				$('#field_allow_search0').attr("disabled",false);
				$('#field_allow_search1').attr("disabled",false);
			} else {
				$('#field_allow_search0').attr("checked",true);
				$('#field_allow_search0').attr("disabled",true);
				$('#field_allow_search1').attr("disabled",true);
			}
			if(data.field_allow_fulltext=='1') {
				$('#field_allow_fulltext0').attr("disabled",false);
				$('#field_allow_fulltext1').attr("disabled",false);
			} else {
				$('#field_allow_fulltext0').attr("checked",true);
				$('#field_allow_fulltext0').attr("disabled",true);
				$('#field_allow_fulltext1').attr("disabled",true);
			}
			if(data.field_allow_isunique=='1') {
				$('#field_allow_isunique0').attr("disabled",false);
				$('#field_allow_isunique1').attr("disabled",false);
			} else {
				$('#field_allow_isunique0').attr("checked",true);
				$('#field_allow_isunique0').attr("disabled",true);
				$('#field_allow_isunique1').attr("disabled",true);
			}
			$('#field_minlength').val(data.field_minlength);
			$('#field_maxlength').val(data.field_maxlength);
			$('#setting').html(data.setting);
	
		});
	}

//-->
</script>
</body>
</html>