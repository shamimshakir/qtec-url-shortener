# Qtec URL Shortener

Qtec URL Shortener is a laravel test purpose simple yet powerful tool for shortening long URLs.

## Installation

#### 1. Clone the Repository:

```bash
 git clone https://github.com/shamimshakir/qtec-url-shortener.git
 cd qtec-url-shortener
```

#### 2. Install Dependencies:

```bash
 composer install
```

#### 3. Database Setup:
* Create a new database for the application.
* Copy the .env.example file to .env and configure the database connection.
* Run the database migrations:

```bash
 php artisan migrate
```

#### 4. Generate Application Key:
```bash
 php artisan key:generate
```
#### 5. Run the Application:
```
php artisan serve
```
The application will be accessible at http://localhost:8000.

## Usage

#### 1. Access the Application:
* Open your web browser and navigate to http://localhost:8000.

#### 2. Shorten a URL:

* On the homepage, enter the long URL you want to shorten.
* Click the "Shorten" button.
#### 3. Copy Shortened URL:

* Once the URL is shortened, copy the generated short URL.
#### 4. Visit Shortened URL:

* Paste the short URL into the browser to be redirected to the original long URL.

## Additional Configuration (Optional)
* Customize the application settings in the .env file.
* Explore and modify the views in the resources/views directory to match your branding.

### shamimshakir
Happy shortening! 🚀
