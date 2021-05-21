@@ -1,3 +0,0 @@
#!/bin/sh
docker build -t pad-php .
docker run --rm --name pad-php-session -p 8080:80 pad-php