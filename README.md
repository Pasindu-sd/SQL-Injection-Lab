# SQL Injection Lab - Pasindu

A simple, **educational** PHP + MySQL vulnerable web application to demonstrate **SQL Injection (SQLi)** attacks. Designed for beginners to learn, practise, and understand SQLi techniques safely in a local environment.

> ⚠️ **For learning and testing only.** Do **NOT** deploy this application to a public server or use it against systems you do not own or have explicit permission to test.

---

## Table of Contents

* [Overview](#overview)
* [Features](#features)
* [Setup (step-by-step)](#setup-step-by-step)
* [How to use](#how-to-use)
* [Example attack payloads](#example-attack-payloads)
* [Learning outcomes](#learning-outcomes)
* [How it works (technical)](#how-it-works-technical)
* [Extending the lab (ideas)](#extending-the-lab-ideas)
* [Contributing](#contributing)
* [License & Contact](#license--contact)

---

## Overview

This repository contains a deliberately vulnerable login page (`vulnerable-site/login.php`) and a sample database dump (`sql_dump.sql`). The app demonstrates how an application that concatenates user input into SQL queries without proper validation or parameterization becomes vulnerable to SQL Injection.

Use this lab on your local machine (XAMPP, Laragon, MAMP, or a LAMP stack) to practise common SQLi payloads and to learn detection and mitigation techniques.

---

## Features

* Minimal PHP login page that uses unescaped user input in SQL queries.
* A sample `sql_dump.sql` file with one `users` table and example accounts.
* Clear setup instructions to run locally.
* Example payloads to try.

---

## Setup (step-by-step)

1. Install a local PHP/MySQL environment: **XAMPP** (Windows), **Laragon** (Windows), **MAMP** (macOS) or a LAMP stack (Linux).
2. Start Apache and MySQL services.
3. Open phpMyAdmin (usually [http://localhost/phpmyadmin](http://localhost/phpmyadmin)) and create/import a database:

   * Click **Import** → choose `sql_dump.sql` from this repo → **Go**.
   * Alternatively, create a new database (e.g., `sqli_lab`) and import the dump.
4. Copy the `vulnerable-site/` folder into your web root:

   * XAMPP: `C:\xampp\htdocs\`
   * Laragon: `C:\laragon\www\`
   * MAMP: `/Applications/MAMP/htdocs/`
   * Linux (Apache): `/var/www/html/` (ensure permissions)
5. Edit `vulnerable-site/config.php` (if present) to match your DB credentials (default: `root` with no password in local setups).
6. Open the app in your browser: `http://localhost/vulnerable-site/login.php`.

**Tip:** If you get a blank page, enable PHP error display (temporary) to debug: in `php.ini` set `display_errors = On` and restart Apache.

---

## How to use

1. Open `login.php` and inspect the code to find how the SQL query is constructed.
2. Try logging in with known valid credentials from the imported SQL dump (if provided).
3. Try the example payloads in the username or password fields to bypass authentication or extract data.

---

## Example attack payloads

Try these inputs in the username or password fields (one at a time):

* `' OR '1'='1`
* `' OR '1'='1' -- `
* `admin' --`
* `anything' UNION SELECT 1, database(), user() -- ` *(if lab has UNION/SELECT possibility)*

> These payloads show how attackers can manipulate the WHERE clause or inject additional SQL to bypass checks.

---

## Learning outcomes

After working with this lab you should be able to:

* Explain what SQL Injection is and why it happens.
* Identify insecure patterns in PHP code that lead to SQLi (concatenation of untrusted input).
* Execute simple authentication bypasses using SQLi payloads in a controlled environment.
* Apply basic mitigations such as prepared statements and input validation.

---

## How it works (technical)

In the vulnerable code, user-supplied values are inserted directly into an SQL query string, for example:

```php
// vulnerable example (do NOT use in production)
$query = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "'";
```

If an attacker submits `username = ' OR '1'='1`, the WHERE clause becomes always true and the attacker is authenticated.

---

## Extending the lab (ideas)

* Add an example page vulnerable to **Blind SQLi** and practise time-based or boolean-based extraction.
* Create an admin page that leaks user data and practise UNION-based extractions.
* Add logging to demonstrate detection of suspicious inputs.
* Build a fixed version side-by-side (`fixed-site/`) that uses prepared statements so learners can compare.

---

## Contributing

Contributions are welcome — bug reports, improvements, and educational additions.

If you'd like to contribute:

1. Fork the repository.
2. Create a feature branch: `git checkout -b feature/your-change`.
3. Make changes, update `README.md` or add examples.
4. Submit a Pull Request describing your changes.

---

## License & Contact

This project is provided for educational use. Include a license file if you want to set terms (e.g., MIT).

If you want feedback or help, open an issue or contact me via my GitHub profile: `Pasindu-sd`.

---
