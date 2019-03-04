IMAGE_NAME=kp
CONTAINER_NAME=rentalmobil
PUBLIC_WWW_DIR='/'


echo "Running container '$CONTAINER_NAME' from image '$IMAGE_NAME'..."

docker start $CONTAINER_NAME > /dev/null 2> /dev/null || {
	echo "Creating new container..."
	docker run \
	       --detach \
	       --tty \
	       -p 80:80 \
	       -p 3306:3306 \
	       --name $CONTAINER_NAME \
	       --mount "source=$CONTAINER_NAME-vol,destination=/opt/lampp/var/mysql/" \
			$IMAGE_NAME
}

if [ "$#" -eq  "0" ]; then
	docker exec --interactive --tty $CONTAINER_NAME bash
elif [ "$1" = "stop" ]; then
	docker stop $CONTAINER_NAME
else
	docker exec $CONTAINER_NAME $@
fi

