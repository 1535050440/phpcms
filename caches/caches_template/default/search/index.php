<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('search', 'header'); ?>
	<div class="clr sr_body">
    	<div class="sr_main">
        	<div class="sr_head">
            	<div class="l" id="search">
				<?php $j=0?>
				<?php $n=1;if(is_array($search_model)) foreach($search_model AS $k=>$v) { ?>
				<?php $j++;?>
					<a href="javascript:;" onclick="setmodel(<?php echo $v['typeid'];?>, $(this));" <?php if($j==1 && $typeid=$v['typeid']) { ?> class="on" <?php } ?>><?php echo $v['name'];?></a><?php if($j != count($search_model)) { ?> - <?php } ?>
				<?php $n++;}unset($n); ?>
				<?php unset($j);?>
				</div>
            	<div class="r"><script type="text/javascript">document.write('<iframe src="<?php echo APP_PATH;?>index.php?m=member&c=index&a=mini&forward='+encodeURIComponent(location.href)+'&siteid=<?php echo get_siteid();?>" allowTransparency="true"  width="300" height="24" frameborder="0" scrolling="no"></iframe>')</script>
				</div>
            </div>
            <div class="sr_logo"><a href="javascript:;"><img src="<?php echo IMG_PATH;?>search/se_logo.png" width="230" height="158" /></a></div>

			<form name="search" type="get">
			  <input type="hidden" name="m" value="search"/>
			  <input type="hidden" name="c" value="index"/>
			  <input type="hidden" name="a" value="init"/>
			  <input type="hidden" name="typeid" value="<?php echo $typeid;?>" id="typeid"/>
			  <input type="hidden" name="siteid" value="<?php echo $siteid;?>" id="siteid"/>
            <div class="sr_frm">
            	<div class="sr_frm_box">
                	<div class="sr_frmipt"><input type="text" name="q" id="q" class="ipt"><div class="sp" id="aca">▼</div><input type="submit" class="ss_btn" value="搜 索"></div>
                </div>
                <div id="sr_infos" class="wrap sr_infoul">
                </div>
            </div>
			</form>
<?php if($setting['suggestenable']) { ?>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.suggest.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>search_suggest.js"></script>
<?php } ?>
<script language="JavaScript">
<!--
$(document).ready(function(){
	$("#q").focus();
}); 
//-->
</script>
<?php include template('search', 'footer'); ?>