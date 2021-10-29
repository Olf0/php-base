docker build -t myapp . && \
docker run --rm -p 80:80 -v $(pwd):/var/www/html -d myapp