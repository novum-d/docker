build: # Dockerfileを使ってイメージを作成する
	@docker build -t centos7 . --no-cache=true
run: # コンテナを作る
	@docker run --name centos7 -it centos7 /bin/bash
exec: # 稼働中のコンテナにログインする
	@docker exec -it centos7 /bin/bash
start: # コンテナを起動する
	@docker start -ia centos7 
stop: # コンテナを停止する
	@docker stop centos7
ps: # コンテナのステータスを表示する
	@docker ps -a
