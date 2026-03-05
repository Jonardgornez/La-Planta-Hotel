# 📌 How to Import a MySQL Database in XAMPP Using CMD

This guide explains how to upload or import a `.sql` database file into
XAMPP using Command Prompt (CMD).

This method is recommended for large database files because it avoids
phpMyAdmin upload limits.

------------------------------------------------------------------------

## ✅ Requirements

-   XAMPP installed
-   MySQL running in XAMPP
-   A `.sql` file (your database file)

Example file path:

C:`\xampp`{=tex}`\htdocs`{=tex}`\La`{=tex}-Planta-Hotel`\DB `{=tex}File`\resort`{=tex}\_management.sql

------------------------------------------------------------------------

## 🖥 Step 1: Open Command Prompt

1.  Press **Windows + R**
2.  Type `cmd`
3.  Press **Enter**

------------------------------------------------------------------------

## 📂 Step 2: Go to MySQL Bin Folder

    cd C:\xampp\mysql\bin

Press **Enter**.

------------------------------------------------------------------------

## 🔐 Step 3: Login to MySQL

    mysql -u root -p

Press **Enter**.

If it asks for a password: - Just press **Enter** (default XAMPP has no
password)

------------------------------------------------------------------------

## 🗄 Step 4: Create a Database (If Needed)

If your database does not exist, create one:

    CREATE DATABASE your_database_name;

Then select it:

    USE your_database_name;

After that, type:

    EXIT;

------------------------------------------------------------------------

## ⬆ Step 5: Import the SQL File

Use this format:

    mysql -u root -p database_name < "FULL_PATH_TO_SQL_FILE"

Example:

    mysql -u root -p resort_management < "C:\xampp\htdocs\La-Planta-Hotel\DB File\resort_management.sql"

Press **Enter**.

If there is no error message, the import is successful.

------------------------------------------------------------------------

## 🔍 Step 6: Verify the Import

1.  Open XAMPP
2.  Click **phpMyAdmin**
3.  Open your database
4.  Check if the tables are there

------------------------------------------------------------------------

## ❌ Common Errors and Fixes

### Access Denied

-   Make sure MySQL is running
-   Check database name
-   Make sure username is `root`
-   Check password

### Lost connection to MySQL server

Open:

C:`\xampp`{=tex}`\mysql`{=tex}`\bin`{=tex}`\my`{=tex}.ini

Under `[mysqld]`, add:

    max_allowed_packet=256M

Save and restart MySQL.

------------------------------------------------------------------------

## 🚀 Why Use CMD Instead of phpMyAdmin?

-   No upload file size limit
-   Faster for large databases
-   More stable for big projects

------------------------------------------------------------------------

## 📌 Summary

1.  Open CMD\
2.  Go to `xampp/mysql/bin`\
3.  Create database\
4.  Run import command\
5.  Check in phpMyAdmin

✅ Done!
