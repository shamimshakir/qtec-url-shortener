Qtec URL Shortener
Qtec URL Shortener is a simple yet powerful tool for shortening long URLs.

Installation
Clone the Repository:

bash
Copy code
git clone https://github.com/shamimshakir/qtec-url-shortener.git
cd qtec-url-shortener
Install Dependencies:

bash
Copy code
composer install
Database Setup:

Create a new database for the application.
Copy the .env.example file to .env and configure the database connection.
Run the database migrations:
bash
Copy code
php artisan migrate
Generate Application Key:

bash
Copy code
php artisan key:generate
Run the Application:

bash
Copy code
php artisan serve
The application will be accessible at http://localhost:8000.

Usage
Access the Application:
Open your web browser and navigate to http://localhost:8000.

Shorten a URL:

On the homepage, enter the long URL you want to shorten.
Click the "Shorten" button.
Copy Shortened URL:

Once the URL is shortened, copy the generated short URL.
Visit Shortened URL:

Paste the short URL into the browser to be redirected to the original long URL.
Additional Configuration (Optional)
Customize the application settings in the .env file.
Explore and modify the views in the resources/views directory to match your branding.
Troubleshooting
If you encounter any issues during the installation, refer to the Laravel documentation or the repository's issue section for assistance.
Contributing
If you would like to contribute to the project, please follow the Contribution Guidelines.

License
This project is licensed under the MIT License.

Acknowledgments
Mention any third-party libraries or resources used in your project.
Contact
For any questions or inquiries, feel free to contact the project maintainer:

Shamim
Happy shortening! 🚀
