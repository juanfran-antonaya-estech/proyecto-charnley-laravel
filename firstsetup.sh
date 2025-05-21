dirname="borrarluego"
mkdir -p $dirname
cd $dirname
git clone https://github.com/juanfran-antonaya-estech/image2recognition2dot0.git
cd image2recognition2dot0
git cp .env.example .env
# Variables de entorno
sed -i '' 's/^EMAIL=.*/EMAIL=botino@example.com/' .env
sed -i '' 's/^PASSWORD=.*/PASSWORD=password/' .env

docker build -t image2recognition2dot0 .

cd ../..

rm -rf $dirname

touch ./database/database.sqlite
cp .env.example .env
composer install
composer update
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm update

current_dir=$(pwd)
osascript -e "tell application \"Terminal\" to do script \"cd '$current_dir' && php artisan serve\""
osascript -e "tell application \"Terminal\" to do script \"cd '$current_dir' && npm run dev\""
unset current_dir
