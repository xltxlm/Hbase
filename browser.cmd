cd %~pd0
rem 第一步:安装
rem npm install -g browser-sync
rem 第二步:启动服务
rem browser-sync start --proxy "[代码测试用的域名]"  --files "**/*.css,**/*.php,**/*.js,**/*.html" --host [正确的局域网ip地址,一般默认取到docker的地址]
browser-sync start --proxy "127.0.0.1"  --files "**/*.css,**/*.php,**/*.js,**/*.html" --host 192.168.2.108
