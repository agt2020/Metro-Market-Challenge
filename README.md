# Metro Market Challenge

This is a live coding challenge for Metro Market company.
### Prerequisites

* PHP 8
* Composer V2

## Installation

Use the dependency manager [composer](https://getcomposer.org/) to install Metro Market Challenge.

1. Clone the repo
   ```sh
   git clone https://github.com/agt2020/Metro-Market-Challenge.git
   ```
3. Change directory
   ```sh
   cd Metro-Market-Challenge
   ```
3. Install Composer
   ```sh
   composer install
   ```
4. Make a PHP server to publich json data on HTTP
   ```sh
   php -S localhost:8000 -t public
   ```
## Usage

```sh
# FILTER BY PRICE RANGE
php run.php count_by_price_range 12.00 145.80
 
# FILTER BY OFFER ID
php run.php count_by_offer_id 85

# FILTER BY VENDOR ID
php run.php count_by_vendor_id 35

# FILTER BY PRODUCT TITLE
php run.php count_by_product_title Napkins

```
## Test

```sh

vendor/bin/phpunit --testdox

```
## License

[MIT](https://choosealicense.com/licenses/mit/)
