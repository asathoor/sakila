## Attacks

You need to protect your forms and the data that will go in and out of your database.

* JavaScrit attacks
* SQL injection

Let's look at the problem and the cure.

### Escape strings like this

Inject JavaScript:

<script>alert(\'nasty code here\'); </script>

Since the script will be stored in a database, it is a *persistent attack*.

Nasty code samples:

* Cookies
* Redirects
* Links to malware

## SQL Injection

### In literature

Hacking databases is more or less standard in tech fiction pop film and literature. J. K. Rowlings has used SQL injection as a prop in her novel "The Casual Vacancy":

>'Fucking hell,' said Fats.

>Andrew's mouth was dry. His hand lay quiescent on the mouse. 
>'How'd you get in?' Fats whispered. 

>'SQL injection,' said Andrew. 'It's all on the net. Their security's shit.' 

>Fats looked exhilarated; wildly impressed. Andrew was half pleased, half scared, by the reaction. 

>'You've gotta keep this to — '

>'Lemme do one about Cubby!' 

>'No!' 

> (J.K. Rowlings: *"The Casual Vacancy"*, 2012)

### SQL injection theory

* For more information, see: [Steve Friedl's article on SQL Injection](http://www.unixwiz.net/techtips/sql-injection.html)

Steve Friedl gives this sample. A hacker might guess that the sql from a form looks like:

~~~~
SELECT fieldlist
  FROM table
 WHERE field = '$EMAIL';
~~~~

So she will asume that the string in the form will look like:

~~~~
petj@somesite.dk
~~~~

In the form field she will enter something like:

~~~~
blahblah' OR 'x'='x
~~~~

In the SQL the result is:

SELECT fieldlist  
  FROM table  
 WHERE field = **'blahblah' OR 'x'='x** ';


A very serious attack could now be:

SELECT email, passwd, login_id, full_name  
  FROM members  
 WHERE email = '**x'; DROP TABLE members; --**';  -- Boom!


## The Cure
