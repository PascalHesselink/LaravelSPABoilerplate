echo -e "Installing new Laravel SPA application..."

echo -e "Installing composer packages"
composer install

echo -e "Installing npm packages"
npm install

echo -e "Creating environment file"
cp .env.example-sqlite .env

echo -e "Creating encryption key"
php artisan key:generate

echo -e "Creating database"
touch database/database.sqlite

echo -e "Migrating the database"
php artisan db:seed

echo -e ""
echo -e ""
echo -e ""
echo -e "Project has been created!"
echo -e ""
echo -e "You can now login with these credentials:"
echo -e ""
echo -e "Username: Admin"
echo -e "Password: password"
echo -e ""
echo -e ""
