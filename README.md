## Backend Assignment

## Task
You were given a sample [Laravel][laravel] project which implements sort of a personal wishlist
where user can add their wanted products with some basic information (price, link etc.) and
view the list.

#### Refactoring
The `ItemController` is messy. Please use your best judgement to improve the code. Your task
is to identify the imperfect areas and improve them whilst keeping the backwards compatibility.

#### New feature
Please modify the project to add statistics for the wishlist items. Statistics should include:

- total items count
- average price of an item
- the website with the highest total price of its items
- total price of items added this month

The statistics should be exposed using an API endpoint. **Moreover**, user should be able to
display the statistics using a CLI command.

Please also include a way for the command to display a single information from the statistics,
for example just the average price. You can add a command parameter/option to specify which
statistic should be displayed.

## Open questions
Please write your answers to following questions.

> **Please briefly explain your implementation of the new feature**  
>  For the new feature, I created a new service called `ItemStatsService` and wrote all functions in it. I prefer doing all calculations at the DB level and just return the finalized value.
>
> ** For stats we have a new route, you need to hit that one `/items-stats`.
> 
>  **If you want to fetch these stats form the command you need to run following**
> 1. For all stats:  `php artisan stats:items`.
> 2. For Only Total Items: `php artisan stats:items total-items`
> 3. For Only Average Item Price: `php artisan stats:items avg-item-price`
> 4. For Website With Highest Total Price: `php artisan stats:items website-with-highest-total-price`
> 5. For Current Month Items Total Price: `php artisan stats:items current-month-items-total-price`
>
> **Note:At the moment, the command would accept only one argument and if there is no argument then all stats would be returned**


> **For the refactoring, would you change something else if you had more time?**  
>  I think I have done enough refactoring. I moved the validation in the `Form requests`. Instead of using custom serializers, I prefer to use Laravel Api resource. 
> 
> **However, If I got some more time, I would love to try to work with laravel collections. So get all items from the DB and perform other calculation on it at the laravel code level. Just for experiment would also love to use laravel lazy collection**.

## Running the project
This project requires a database to run. For the server part, you can use `php artisan serve`
or whatever you're most comfortable with.

You can use the attached DB seeder to get data to work with.

#### Running tests
The attached test suite can be run using `php artisan test` command.

[laravel]: https://laravel.com/docs/8.x
