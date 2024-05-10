# Class-Assignment---XSS & CSRF

For this assignment, I have adding 3 defense that can enhance my sweb application security which are CSP, XSS, and CSRF.

### CSP (Content Security Policy)

This is the list of page that I have put Content Security Policy:
1. [login.php](login.php)
2. [signup.php](signup.php)
3. [user_index.php](user_index.php)
4. [admin_index.php](admin_index.php)
5. [user_record.php](user_record.php)
6. [admin_record.php](admin_record.php)
7. [admin_update.php](admin_update.php)
8. [admin_update.php](admin_update.php)

Basically, I have add a Content-Security-Policy meta tag in the HTML head section. This policy allows you to specify the origins that the browser should consider as valid sources of executable scripts. A policy needs to be carefully crafted not to allow any unwanted sources, but also not to block necessary ones. The meta tag code:

```<meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src 'self'; script-src 'self'; style-src 'self';">```

In the Content-Security-Policy meta tag, default-src 'self'; allows all content from your site’s own origin (same origin). img-src 'self'; allows images from your site’s origin. script-src 'self'; allows scripts from your site’s origin. style-src 'self'; allows stylesheets from your site’s origin.

### XSS (Cross-Site Scripting)

For this defense, I have put htmlspecialchars() function in every HTTP POST request. The htmlspecialchars() function in PHP is used to convert special characters to their HTML entities. This is particularly useful to prevent Cross-Site Scripting (XSS) attacks.

![Screenshot 2024-05-10 120509](https://github.com/hyzo70/Class-Assignment---XSS-CSRF/assets/122088412/8c3e764e-f814-4213-87d1-13b2dc93c62d)

The code have done certain defensive mechanisms:
- & (ampersand) becomes &amp;
- " (double quote) becomes &quot; when ENT_NOQUOTES is not set.
- ' (single quote) becomes &#039; (or &apos;) only when ENT_QUOTES is set.
- < (less than) becomes &lt;
- > (greater than) becomes &gt;

The htmlspecialchars() function also help to sanitize user input. This is a good practice as it helps prevent XSS attacks where an attacker might try to inject malicious scripts into your web pages.

### CSRF (Cross-Site Request Forgery)

In this part, I have put the CSRF Token at the beginning after the ```session_start();``` and verify the CSRF token in the form data against the CSRF token in the session. Then, in my HTML form, I have included a hidden field for the CSRF token:

```<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">```

![Screenshot 2024-05-10 121732](https://github.com/hyzo70/Class-Assignment---XSS-CSRF/assets/122088412/388ae85b-9806-47fb-9779-ceb63bd411eb)

This code uses the hash_equals function to securely compare the CSRF token in the session with the CSRF token in the form data. If they don’t match, it stops the script execution. The token ensures that the person submitting the form or performing the action is the one who initially requested the page. It associates a client’s session with the client’s actions.
