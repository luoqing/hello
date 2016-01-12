    <div>
        <ul>
            <li>需要部署lamp环境，在lamp官网下载安装lamp</li>
	    <li>启动lamp服务，/opt/lamp/lamp start</li>
	    <li>将代码放在lamp的apache默认配置目录下---/opt/lamp/htdocs</li>
	    <li>为了读写文件，最好对代码文件的权限置为777</li>
	    <li>后续你可以创建自己的controller文件，在该文件中创建自己的controller类，并且通过该类调用相应的model来访问db，获取相关数据，将计算结果赋值给mview对象，并且调用mview对象的diplay函数输出相应的视图html文件。</li>
        </ul>
    </div>
