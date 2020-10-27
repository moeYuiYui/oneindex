# OneIndex
Onedrive Directory Index

## 功能：
不占用服务器空间，不走服务器流量，  

支持国际版与世纪互联版，

直接列出 OneDrive 目录，文件直链下载。  

## Demo
[https://xn.tn](https://xn.tn)  

## 安装运行

### 源码安装运行：

#### 需求：
1、PHP空间，PHP 5.6+ 需打开curl支持  
2、OneDrive 账号 (个人、企业版或教育版/工作或学校帐户)  
3、OneIndex 程序   

## 配置：
1、使用自己的OneDrive帐号登陆对应Azure面板。  
2、进入Azure Active Directory。  
3、选择应用注册，点击新注册，名称随意，受支持的帐户类型选择“任何组织目录(任何 Azure AD 目录 - 多租户)中的帐户”，重定向URI选择Web，地址输入https://你准备使用的域名。  
4、进入你注册好的应用，选择证书和密码，点击新客户端密码，说明随意，期限建议选择“从不”。  
5、回到你的网站填入“应用程序(客户端) ID”与应用机密（上一步创建的客户端密码），点击下一步。  
6、点击“绑定账号”，登陆你的OneDrive帐号接受即可。


### 计划任务  
[可选]**推荐配置**，非必需。后台定时刷新缓存，可增加前台访问的速度。  
```
# 每小时刷新一次token
0 * * * * /具体路径/php /程序具体路径/one.php token:refresh

# 每十分钟后台刷新一遍缓存
*/10 * * * * /具体路径/php /程序具体路径/one.php cache:refresh
```

### Docker 安装运行

- 请参考[TimeBye/oneindex](https://github.com/TimeBye/oneindex)

## 特殊文件实现功能  
` README.md `、`HEAD.md` 、 `.password`特殊文件使用  

可以参考[https://github.com/donwa/oneindex/tree/files](https://github.com/donwa/oneindex/tree/files)  

**在文件夹底部添加说明:**  
>在 OneDrive 的文件夹中添加` README.md `文件，使用 Markdown 语法。  

**在文件夹头部添加说明:**  
>在 OneDrive 的文件夹中添加`HEAD.md` 文件，使用 Markdown 语法。  

**加密文件夹:**  
>在 OneDrive 的文件夹中添加`.password`文件，填入密码，密码不能为空。  

**直接输出网页:**  
>在 OneDrive 的文件夹中添加`index.html` 文件，程序会直接输出网页而不列目录。  
>配合 文件展示设置-直接输出 效果更佳。  

## 命令行功能  
仅能在PHP CLI模式下运行  

**清除缓存:**  
```
php one.php cache:clear
```
**刷新缓存:**  
```
php one.php cache:refresh
```
**刷新令牌:**  
```
php one.php token:refresh
```
**上传文件:**  
```
php one.php upload:file 本地文件 [OneDrive文件]
```


**上传文件夹:**  
```
php one.php upload:folder 本地文件夹 [OneDrive文件夹]
```

例如：  
```
//上传demo.zip 到OneDrive 根目录  
php one.php upload:file demo.zip  

//上传demo.zip 到OneDrive /test/目录  
php one.php upload:file demo.zip /test/  

//上传demo.zip 到OneDrive /test/目录并将其命名为 d.zip  
php one.php upload:file demo.zip /test/d.zip  

//上传up/ 到OneDrive /test/ 目录  
php one.php upload:file up/ /test/
```
