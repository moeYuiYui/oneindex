<?php view::layout('layout')?>

<?php view::begin('content');?>
<div class="mdui-container-fluid">

	<div class="mdui-typo">
	  <h1> 基本设置 <small>设置OneIndex基本参数</small></h1>
	</div>
	<form action="" method="post">
		<div class="mdui-textfield">
		  <h4>网站名称</h4>
		  <input class="mdui-textfield-input" type="text" name="site_name" value="<?php echo $config['site_name'];?>"/>
		</div>
  		<div class="mdui-textfield">
 		  <h4>副标题</h4>
 		  <input class="mdui-textfield-input" type="text" name="title_name" value="<?php echo $config['title_name'];?>"/>
 		</div>
		<div class="mdui-textfield">
		  <h4>API<small></small></h4>
		  <input class="mdui-textfield-input" type="text" name="api_url" value="<?php echo $config['api_url'];?>"/>
 		</div>
		<div class="mdui-textfield">
 		  <h4>侧边栏代码(html格式)</h4>
		  <textarea class="mdui-textfield-input"  name="drawer"><?php echo $config['drawer'];?></textarea>
 		</div>
 		<div class="mdui-textfield">
 		  <h4>侧边栏图片</h4>
		  <input class="mdui-textfield-input" type="text" name="drawer_img" value="<?php echo $config['drawer_img'];?>"/>
 		</div>
 		<div class="mdui-textfield">
 		  <h4>网站图标</h4>
		  <input class="mdui-textfield-input" type="text" name="icon_url" value="<?php echo $config['icon_url'];?>"/>
 		</div>

		<div class="mdui-textfield">
		  <h4>网站主题<small></small></h4>
		  <select name="style" class="mdui-select">
			  <?php 
				foreach(scandir(ROOT.'view') as $k=>$s){
				    $styles[$k] = trim($s, '/');
				}
				$styles = array_diff($styles, [".", "..", "admin"]);
				$style = config("style")?config("style"):'material';
				$cache_type  = config("cache_type")?config("cache_type"):'secache';
			 	foreach($styles as $style_name):
			  ?>
			  <option value ="<?php echo $style_name;?>" <?php echo ($style==$style_name)?'selected':'';?>><?php echo $style_name;?></option>
			  <?php endforeach;?>
		  </select>
		</div>

		<div class="mdui-textfield">
		  <h4>OneDrive起始目录(空为根目录)<small>例：仅共享share目录 /share</small></h4>
		  <input class="mdui-textfield-input" type="text" name="onedrive_root" value="<?php echo $config['onedrive_root'];?>"/>
		</div>


		<div class="mdui-textfield">
		  <h4>需要隐藏的目录<small> 不需要列出的目录(一行一个) 清空缓存后生效</small></h4>
		  <textarea class="mdui-textfield-input" placeholder="输入后回车换行" name="onedrive_hide"><?=@$config['onedrive_hide'];?></textarea>
		  <small>这里是通配识别，就是存在以上字符文件夹一律会隐藏</small>
		</div>

		<div class="mdui-textfield">
		  <h4>防盗链(白名单)<small> 不填写则不启用, 多个用英文 <code>;</code> 分割</small></h4>
		  <input class="mdui-textfield-input" name="onedrive_hotlink" value="<?=@$config['onedrive_hotlink'];?>"/>
		  <small>支持通配符 例: <code>*.domain.com</code></small>
		</div>
		<div class="mdui-textfield">
		  <h4>sharepoint域名-留空不使用该功能<small>（反代功能仅“nexmoeX主题”可用）</small></h4>
		  <input class="mdui-textfield-input" type="text" name="main_domain" value="<?php echo $config['main_domain'];?>"/>
		</div>
		<div class="mdui-textfield">
		  <h4>sharepoint CDN 域名-留空不使用该功能<small>（反代功能仅“nexmoeX主题”可用）</small></h4>
		  <input class="mdui-textfield-input" type="text" name="proxy_domain" value="<?php echo $config['proxy_domain'];?>"/>
		</div>

		<div class="mdui-textfield">
		  <h4>缓存类型<small></small></h4>
		  <select name="cache_type" class="mdui-select">
			  <?php 
			 	foreach(['secache', 'filecache', 'memcache', 'redis'] as $type):
			  ?>
			  <option value ="<?php echo $type;?>" <?php echo ($type==$cache_type)?'selected':'';?>><?php echo $type;?></option>
			  <?php endforeach;?>
		  </select>
		</div>

		<div class="mdui-textfield">
		  <h4>缓存过期时间(秒)</h4>
		  <input class="mdui-textfield-input" type="text" name="cache_expire_time" value="<?php echo $config['cache_expire_time'];?>"/>
		</div>

		<div class="mdui-textfield">
		  <h4>去掉地址栏中的<code style="color: #c7254e;background-color: #f7f7f9;font-size:16px;">/?/</code> (需配合伪静态使用!!)</h4>
		  <label class="mdui-textfield-label"></label>
		  <label class="mdui-switch">
			  <input type="checkbox" name="root_path" value="?" <?php echo empty($config['root_path'])?'checked':'';?>/>
			  <i class="mdui-switch-icon"></i>
		  </label>
		</div>
		

		

	   <button type="submit" class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-float-right">
	   	<i class="mdui-icon material-icons">&#xe161;</i> 保存
	   </button>
	</form>
</div>
<?php view::end('content');?>
