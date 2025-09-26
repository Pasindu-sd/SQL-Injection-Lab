# SQL Injection Lab

A simple vulnerable login system made with PHP and MySQL to demonstrate **SQL Injection** attacks.

⚠️ Educational use only.

## Setup

1. Install XAMPP or Laragon.
2. Import `sql_dump.sql` into phpMyAdmin.
3. Place `vulnerable-site/` in your `htdocs/`.
4. Open browser: http://localhost/vulnerable-site/login.php

## Try These Attacks

- `' OR '1'='1`
- `' OR '1'='1' -- `
- `admin' --`

## Learning Outcome

- Learn how SQL Injection works
- See the vulnerability in real-time
- Practice attacks safely
