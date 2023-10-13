git config credential.helper store
git add .
git commit -m 'config'
git pull
git push

docker stop bisa-design
docker rm bisa-design
docker build -t strongpapazola/ubuntu:bisa_design .
docker run -d -p 127.0.0.1:8092:443 --name bisa-design --restart always strongpapazola/ubuntu:bisa_design
