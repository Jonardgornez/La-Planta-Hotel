# Fix TCPDF PNG Alpha Channel Error

## Problem

When generating the PDF using TCPDF, the following error appears:

```
TCPDF ERROR: TCPDF requires the Imagick or GD extension to handle PNG images with alpha channel.
```

This happens because PHP does not have the **GD extension enabled**, which TCPDF needs to process PNG images with transparency.

---

# Solution: Enable GD Extension in PHP

## Step 1: Locate the php.ini file

If you are using **XAMPP**, the file is usually located at:

```
C:\xampp\php\php.ini
```

If you are using **WAMP**, it may be located at:

```
C:\wamp64\bin\php\php8.x.x\php.ini
```

---

## Step 2: Open php.ini

Open the `php.ini` file using:

- Notepad
- Notepad++
- VS Code

---

## Step 3: Find the GD extension

Search for the following line:

```
;extension=gd
```

The semicolon `;` means the extension is **disabled**.

---

## Step 4: Enable GD

Remove the semicolon so it becomes:

```
extension=gd
```

---

## Step 5: Save the file

Save the `php.ini` file after editing.

---

## Step 6: Restart Apache

If you are using **XAMPP**:

1. Open the **XAMPP Control Panel**
2. Stop **Apache**
3. Start **Apache** again

---

## Step 7: Verify GD is enabled

Create a file called `phpinfo.php` and add the following code:

```php
<?php phpinfo(); ?>
```

Open it in your browser and search for:

```
GD Support
```

If it shows **enabled**, the GD extension is working.

---

# Alternative Quick Fix

If you cannot enable GD on the server, you can convert your images from:

```
PNG → JPG
```

Then update your image paths in the code to use `.jpg` instead of `.png`.

---

# After Fix

Once GD is enabled or images are converted, the TCPDF error will no longer appear and the PDF will generate correctly.
