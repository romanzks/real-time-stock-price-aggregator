# Real-time Stock Price Aggregator

## How to run the project

**Docker is required to run the project**

1. Copy `.env.example` to `.env`

2. Add your Alpha Vantage API key to `.env` file:

        ALPHA_VANTAGE_API_KEY=

3. Run project:

        ./vendor/bin/sail up

4. Run migrations and data seeding:

        ./vendor/bin/sail artisan migrate:fresh --seed


## RestAPI Endpoints

* `http://localhost/companies` - list of companies

* `http://localhost/companies/{company_id}/price` - company stock price with price change

## Completed guidelines

1. ✅ Set up a new Laravel project.
2. ✅ Design the database schema and models to store real-time stock price data efficiently.
3. ✅ Fetch the data from the source and store in your database.
4. ❌ Implement caching mechanisms and make sure to keep your cache updated.
5. ✅ Optimize your queries for quick retrieval of data, ensuring data integrity.
6. ✅ Create a RestAPI that returns reports based on your data.
7. ❌ Thoroughly test your application, using manual and automated tests, considering API responses, caching behavior, and job processing.
8. ✅ Document the project’s setup, your design decisions , and provide clear instructions for running the application.
