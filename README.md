# Product Cost Calculator Application

This application is designed to calculate cost estimates for products based on various pricing strategies and discounts.
It utilizes a clean architecture approach to ensure modularity, maintainability, and scalability.

## Requirements

- PHP >= 8.2
- Composer
- Laravel 11.x
- MySql 8.x
- Vue.js 3.5.x
- Pinia 2.2.x
- Axios 1.7.x
- Vite 5.x

## Running the Application

1. **You need to install [docker](https://www.docker.com/).**
2. Add next records into your `hosts` file:
   ```
   127.0.0.1 product-cost-calculator-app.test
   ```
3. Install docker containers `docker-compose up -d`;
4. Run the following commands:
   ```bash
   docker-compose exec ws bash
   ```

## Installation

1. **Install dependencies:**
   ```bash
   composer install
   npm install
   npm run build
   php artisan key:generate
   php artisan key:generate --env=testing
   ```

2. **Set up your environment:**
    - Copy the `.env.example` file to `.env`.
    - Update the `.env` file with your database configuration.

3. **Run the migrations to set up the database:**
   ```bash
   php artisan migrate
   ```

4. **Running Seeders:**
   ```bash
   php artisan db:seed
   ```

## Testing

To run the tests, use the following command:

```bash
php artisan test
```

## Business Rules Implementation

The business logic for calculating cost estimates is implemented in the `CostCalculatorService` class. Here’s a brief
overview of how the business rules are structured:

- **Strategy Pattern**: We utilize the Strategy Pattern through the `MarkupDiscountFactory` to encapsulate various
  pricing strategies. This approach allows for easy addition or modification of pricing strategies without altering the
  core calculation logic.

- **Dynamic Markup and Discount Retrieval**: The application dynamically fetches applicable markups and discounts based
  on the product category, location, and quantity. This is achieved by the `fetchApplicableMarkups` method, which
  consolidates various data sources, ensuring that the calculation considers all relevant factors.

- **Clean Architecture**: The application is structured using clean architecture principles, ensuring separation of
  concerns between the UI, application logic, and data access layers. This enhances testability and maintainability.

### Why This Approach?

1. **Modularity**: By implementing the strategy pattern and adhering to clean architecture, we ensure that different
   components of the application can evolve independently. This makes the application more adaptable to changes.

2. **Testability**: The clear separation of responsibilities allows for easier unit testing of individual components.
   Each strategy can be tested in isolation, ensuring correctness.

3. **Scalability**: As new pricing strategies or business rules are introduced, they can be integrated with minimal
   disruption to the existing system. This flexibility is crucial for evolving business requirements.


