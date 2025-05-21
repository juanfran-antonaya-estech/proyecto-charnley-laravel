current_dir=$(pwd)
osascript -e "tell application \"Terminal\" to do script \"cd '$current_dir' && php artisan serve\""
osascript -e "tell application \"Terminal\" to do script \"cd '$current_dir' && npm run dev\""
unset current_dir
