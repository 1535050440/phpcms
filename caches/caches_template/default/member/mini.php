<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><style>
body,html{background:none; padding:0; margin:0}
.log{line-height:24px;*line-height:27px; height:24px;float:right; font-size:12px}
.log span{color:#ced9e7}
.log a{color:#049;text-decoration: none;}
.log a:hover{text-decoration: underline;}
.log .snda{ position:relative; bottom:-3px}
.log .upv_btn{height: 24px; padding-left: 14px; position: relative; background:url(<?php echo IMG_PATH;?>up_btn.gif) no-repeat 0px 0px; margin-left:0px; margin-right:10px; *background-position:0px 5px;}
.log .r{float:right;}
.log .w27{* width:320px;}
</style>
<body style="background-color:transparent">
<div class="log w27"><?php if($_username) { ?><?php echo L('hellow');?> <?php echo get_nickname();?>, <a href="<?php echo APP_PATH;?>index.php?m=member&siteid=<?php echo $siteid;?>" target="_blank"><?php echo L('member_center');?></a> <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout&forward=<?php echo urlencode($_GET['forward']);?>&siteid=<?php echo $siteid;?>" target="_top"><?php echo L('logout');?></a>&nbsp;&nbsp;<a href="<?php echo APP_PATH;?>index.php?m=member&c=content&a=upload_video" target="_top" class="upv_btn">上传视频</a><?php } else { ?> <span class="r"><a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=register&siteid=<?php echo $siteid;?>" target="_blank"><?php echo L('register');?></a> <span>|</span> <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login&forward=<?php echo urlencode($_GET['forward']);?>&siteid=<?php echo $siteid;?>" target="_top"><?php echo L('login');?></a>&nbsp;&nbsp;<a href="<?php echo APP_PATH;?>index.php?m=member&c=content&a=upload_video" target="_top" class="upv_btn">上传视频</a></span>
<?php } ?></div>
</body>