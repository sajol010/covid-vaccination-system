
## Covid vaccination system

### to setup this project locally, follow the following step
- clone the project and run  `composer update`
- copy .env.example content by creating new file .env
- setup database. i already added sqlite there. if want keep it as it is. 
- run the following command `npm run dev `
- after that run laravel migration command with seed `php artisan migrate --seed` as we seed vaccine centers
- and finally run `php artisan serve` the main application. 

## Some notes about project. 
1. i named the user who will take vaccine as registrants. so in the future we can use employee as users
2. i have added a admin page {baseUrl}/admin/dashboard. where we can see registrants list. and can mark them as vaccinated.
