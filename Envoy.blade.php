@servers(['production' => 'spammelies@139.162.160.45'])

@task('deploy-production', ['on' =>'production'])
cd /home/internsheep/internsheep
    # navigatie juiste map
php artisan down
    # website even offline halen (offline scherm)
git reset --hard HEAD
    # wijzigingen even opzij zetten (permissie wijzigingen, ...)
git pull origin master
php composer.json dump-autoload
    # dependencies updaten
php artisan migrate --force
    # databank updaten
php artisan cache:clear
    # cache clearen
php artisan up
    # website terug online plaatsen
@endtask

#cd ..
#chown -R spammelies:apache internsheep/
#chmod -R 750 internsheep/
#cd internsheep/
#chmod -R 770 storage/