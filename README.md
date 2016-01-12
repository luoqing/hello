# hello
### 目的


### 代码部署方法
  * 需要部署lamp环境，在lamp官网下载安装lamp
  * 启动lamp服务，/opt/lamp/lamp start
  * 将代码放在lamp的apache默认配置目录下---/opt/lamp/htdocs
  * 为了读写文件，最好对代码文件的权限置为777
  * 后续你可以创建自己的controller文件，在该文件中创建自己的controller类；并且通过该类调用相应的model来访问db，获取相关数据，将计算结果赋值给mview对象，并且调用mview对象的diplay函数输出相应的视图html文件。
  

### 需要进一步多加思考的问题

	* 如何解析url将域名转化为服务器ip，并且找到服务器服务程序所在的目录
	* 用户如何通过url将请求参数传回给服务端
	* html，css，js之间如何相互协作，将DOM渲染出来
	* 服务端将处理的结果如何返回给客户端浏览器显示
	* 上述的问题应该可以参见一篇博文，从浏览器输入url到页面输出结果，这个过程都发生了什么
	* [http://fex.baidu.com/blog/2014/05/what-happen/]
	
#### 从输入 URL 到页面加载完成的过程中都发生了什么事情？
  * 第一个问题：从输入 URL 到浏览器接收的过程中发生了什么事情？
  * 第二个问题：浏览器如何向网卡发送数据？
  * 第三个问题：数据如何从本机网卡发送到服务器？
  * 第四个问题：服务器接收到数据后会进行哪些处理第
  * 五个问题：服务器返回数据后浏览器如何处理？？


#### http从点击到呈现 
* http://zrj.me/archives/tag/%E4%BB%8E%E7%82%B9%E5%87%BB%E5%88%B0%E5%91%88%E7%8E%B0 
* http://www.cnblogs.com/winter-cn/archive/2013/05/21/3091127.html html的词法解析


### 参考资料
* 主要参照了美女sunny的github---一个简单的php框架-----https://github.com/linsunny/one
* 参照了之前刚入职做的一个管理网站的架构对上述框架进行精简
* 参照了刚入职做的管理网站的主页模版。
