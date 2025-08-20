

# Create the volume

docker volume create RamFar-DB-Volume

# Crreate de container 
docker run --name RamFar-DB --network ramfar \
	-v RamFar-DB-Volume:/var/lib/mysql \
	-v /home/andres/ramfarfotografia/mysql/:/docker-entrypoint-initdb.d \
	-e MYSQL_ROOT_PASSWORD=changeme \
	-d mysql:8.0

