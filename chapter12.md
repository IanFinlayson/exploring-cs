Chapter 12: Computer Security
=============================

::: {.blackbox}
::: {.blackbox-title}
**Learning Objectives**
:::

::: {.blackbox-contents}
-   Get a feel for how software vulnerabilities can arise from programming
    mistakes
-   Learn how a simple encryption cipher can be implemented in Python
-   See how simple ciphers can be broken
-   Be introduced to the idea of asymmetric key cryptography
-   Understand how hashing and salt can make passwords more secure
:::
:::


12.1 Overview
-------------

Computers enable us to do many wonderful things such as to solve tricky problems
automatically, simulate the natural world, share information and work together,
and play games.  Computer systems of course have become a core part of the way
the world stores information and conducts business.  Because computers contain
so much valuable information, they have become a target for people who try to
break in and steal that information.  Here we will talk about some issues of
computer security -- the practice of designing systems that are resilient to
such attacks.

You probably are familiar with good practices for staying safe online, such
as using good passwords, not sharing passwords with people or writing them down,
not downloading suspicious files, and not clicking scam email links.  Here
we will talk about technical issues in keeping systems secure.


12.2 Software Flaws
-------------------

Many security vulnerabilities are the result of bugs in programs.  These often
depend on what programming language is being used.  As we'll see, Python does
a good job making these rare.  One that does exist in Python, however, has to
do with the function `eval`.  We haven't used this function yet, but it
takes a string of Python code as a parameter and evaluates it, returning the
result.

For example, the following call to `eval` will return 7:

``` python
num = eval("3 + 4")
print(num)
```

This kind of thing can be quite powerful, and is sort of interesting when you
think about it.  We are blurring the line between the code of our program and
the data.  Essentially we store a bit of code in a variable and then execute it
explicitly.  You can do some neat things with this, such as make a simple
calculator program:

``` python
expression = input("> ")
while expression != "stop":
    print(eval(expression))
    expression = input("> ")
```

Here's an example of the user running this program:

``` output
> 3 + (2*5)
13
> 13 / (1 + 6)
1.8571428571428572
> stop
```

The flaw in this program is that a user can type in whatever code they want!  It
doesn't have to be a math expression at all.  For example, a user could enter
code to delete files on the machine running the program:

``` output
> __import__('os').remove("ps.py")
```

Here, the file called "program.py", if it exists, will be deleted!  Clearly we
don't want to have the users of our programs able to do things like this,
especially if the program is running on a website.  Because of this, the `eval`
function should only be used in rare circumstances, or if you carefully make
sure the code you give it can't do anything unwanted.

There are other types of common flaws that can exist in other programming
languages.  Python tries to catch most of your mistakes and tell you about them.
Other languages, like C, are much more lax in enforcing rules which can lead to
issues.

For example, in Python if you go outside of the bounds of a string, you
will get an error:

``` python
>>> nums = [0, 1, 2, 3, 4]
>>> nums[5] = 5
Traceback (most recent call last):
  File "<stdin>", line 1, in 
IndexError: list assignment index out of range
```

In C, this error is not actually caught. C programs will allow you to
write whatever you want past the end of a list. Worse, writing outside
the boundaries of a list will often *change other variables* of the program.

Unfortunately this runs into something called **undefined behavior**.  This
means that if a programmer writes code to write past the end of a list,
they can't guarantee anything in particular will happen.  What does happen
can also be different on different systems.

For example, the following short C program writes before the start of a list.
Don't worry about the details of this program, since we obviously haven't looked
at this language at all.  For me, this program prints out 100, and not 42.

``` c
    int nums[] = {0, 1, 2, 3, 4};
    int answer = 42;

    nums[-1] = 100;
    printf("%d\n", answer);
    return 0;
```

That's because "answer" happens to be stored before the list in the computer's
memory. When we go off the left end of the list with -1, we overwrite the other
variable.  This kind of thing can be used by attackers to purposefully overwrite
variables.  For example, imagine a situation where the program stores the users
password in one list of characters (which is how C handles strings), and also
has a variable for whether their password was accepted.  If the program doesn't
check against it, it might be possible to type in a super long password which
overflows the list and writes into the variable marking it as accepted even if
it should not be.

These are called "buffer" overflow attacks. An attacker can try to put in data
that goes past the bounds of a list in order to put data they want into other
variables in the program.  Programmers have to be really careful in these
languages to not let this sort of thing ever happen! Unfortunately a lot of
systems software is written in C, so these things can happen.


12.3 Cryptography
-----------------

Cryptography is the changing of some message to make it unreadable to
anyone who doesn't know how to interpret it. It consists of two parts:

-   **Encryption**

    Changing "plain text" which is easily readable into "cipher
    text" which looks like gibberish.

-   **Decryption**

    Changing the cipher text back into plain text.

Cryptography has been practiced in some form for thousands of years. In
the past, it has been used for communication among individuals, and
especially for communication during war. Now, almost all cryptography is
done between computers. When sensitive information is sent across the
Internet, it is first encrypted.

As a very simple example, we could use a "rotation cipher" which is
also called a Caesar cipher because Julius Caesar used it to communicate
with his generals.

The basic algorithm for a rotation cipher is given below:

1.  Set our cipher text to ""
2.  For each letter in the message:
    1.  Add rotation amount to the letter.
    2.  If the letter is now greater than 'Z', subtract 26 to loop
        around.
    3.  Append the letter to our cipher text.

A Python function for this could be:

``` python
# function to encrypt text with some rotation
def encrypt(plain, rotation):
    cipher = ""
    for letter in plain:
        ascii = ord(letter)

        # if it's lowercase
        if ascii >= ord("a") and ascii <= ord("z"):
            rotated = ord(letter) + rotation
            # fix wrap around
            if rotated > ord("z"):
                rotated = rotated - 26
            cipher = cipher + chr(rotated)

        # otherwise
        else:
            # leave it alone
            cipher = cipher + letter
    return cipher
```

We could use this to encrypt some sample text:

``` python
mesg = encrypt("coding is fun", 8)
print(mesg)
```

This gives us the following output:

``` output
kwlqvo qa ncv
```

To keep things simple, this only works on lowercase letters. It uses the
ord function which gets the number of each character.

We also need a function to decrypt. This would work almost the same
except that it will *subtract* instead of add:

``` python
# function to encode text
def decrypt(cipher, rotation):
    plain = ""
    for letter in cipher:
        ascii = ord(letter)

        # if it's lowercase
        if ascii >= ord("a") and ascii <= ord("z"):
            rotated = ord(letter) - rotation
            # fix wrap around
            if rotated < ord("a"):
                rotated = rotated + 26
            plain = plain + chr(rotated)

        # otherwise
        else:
            # leave it alone
            plain = plain + letter
    return plain
```

Now we can decrypt our secret message "kwlqvo qa ncv" back into the original,
but only if we provide the same rotation amount of 8.  If we provide something
else as the rotation amount we'll get different scrambled text back instead of
the original.  Here, the rotation amount serves as the **key**, the secret
knowledge we need to read the messages.

Of course this is not a very good encryption scheme.  Since there are only 26
different keys, we can simply try them all and see which one works!  Moreover,
we can probably guess the message based on what letters appear the most.  The
most common letter in English is 'E'.  So we can use that knowledge to suppose
the most common letter in our coded message must be E and continue from there.
This is called "frequency analysis" and can be used to break weaker encryption
schemes like this.


12.4 Modern Cryptography
------------------------

The simple Caesar cipher is not good enough for real secret communications.
There are stronger schemes that have so many possible keys that even a
super-computer cannot try them all in a reasonable amount of time and which
don't allow frequency analysis to be done.  One widely used scheme is the
Advanced Encryption Standard (AES).  This can actually be used in Pyhton
with the cryptography package, which can be installed as we discussed in
Chapter 7.

One other interesting problem in cryptography is: how do we communicate
keys with the people we want to communicate with?
One way would be to communicate the key ahead of time. This is what
Caesar's generals did, and was also done in World War 2 with the German
Enigma machine. Those decrypting the secret messages had a book of keys
and had a system of knowing when to use each key.

However this is sort of a hassle. If you want to do online banking, you
don't want to meet with your bank and decide upon a secret key to use
ahead of time. Also, having the keys in a book or written down somewhere
is not very secure.  If someone steals the book, you're done.

Instead, modern cryptography uses *asymmetric* keys.
Symmetric cryptography (like the Caesar cipher and AES) uses the same key for
encryption and decryption. Asymmetric cryptography uses different keys
to do the encryption and the decryption.

In this system there is a *public key* and a *private key*. The public
key can be known by anybody, but the private key should be kept safe.
The keys are linked together mathematically in some way.

The first widely used such system was called RSA and was named after its three
developers Rivest, Shamir, and Adleman.  It is based on prime and composite
numbers.  The private key is essentially two very large prime numbers.  The
public key is the product of those two numbers.  If you know the private key,
getting the public key is easy, you just multiply.  However there is no easy
way to know the factors of a huge number besides just trying all of them.

When we want to encrypt something, we use the public key. When doing this, the
public key *can't* decrypt it, only the private key can. We then send the
encrypted message to the recipient who can use their private key to decrypt it.
This solves the problem of sharing keys. We can give anyone our public key so
they can encrypt messages for us. Then only we can read them with our private
key.

Nearly all traffic on the world wide web is now encrypted.
For example when you connect to your bank's web page, the bank will tell you
its public key.  You then use that to encrypt a message to the bank starting
the communication.  The bank will use its private key to read that message.
After that, you have a secure channel of communication established.  Your
browser and the bank will then usually generate a random symmetric key to
use something like AES for the rest of the communication.


12.5 How Passwords Work
-----------------------

Many programs and web sites require you to login with a username and password.
These programs have you create your password when you make an account, and then
check that it is correct each time you login.

When making an account, the program could store your username and password in a
file. Then when you login, it could simply compare the password you give with
what it has stored.  However, this is actually a very bad practice. The reason
is that, if the server is compromised, an attacker could read all user's
passwords.  Because many people reuse passwords, an attacker could use these to
access other services.

Instead, passwords should be stored as *hashed* values. A hash[^hashname] is a way
way of scrambling a string into a new string. It is sort of related to
encryption, except there is no key. Once the password is hashed, you get
a new scrambled string. There is no way to go from the scrambled string
back to the original one.

Like encryption, there are many hash algorithms.  Python has a programs can do
hashing with the `hashlib` library, which provides access to several, such as
MD5:

``` python
import hashlib
import getpass

pw = getpass.getpass("Password: ")

h = hashlib.md5()
h.update(pw.encode())
hash = h.hexdigest()
print("Hashed password is", hash)
```

For example, if we type in "bananaPIE" as our password, we get the following
hashed value:

``` output
Password: 
Hashed password is 322388ed5ff68e0da61ae1491e304048
```

By the way, we use `getpass.getpass` to read in the user password instead of
just `input()`.  That makes it so the password is not written back out to the
screen.

The important thing about hashing is that we always get the same hash value for
the same password.  So even though the hash value for bananaPIE looks quite
random, it actually is generated directly from the input bananaPIE.  That's
important because we need to be able to get the same hash every single time.

When a user registers for an account, we hash the password they
give us, and then store the hashed value in  a file. Then when they login, we hash
the password they give us and compare the hashes.  If they match, the password
must have been the same.  If not, they must have not matched.

This is why you can reset your password in most systems, but they can't tell you
what your current password is.  Your password itself is ever permanently
stored anywhere!

There's one more wrinkle in the saving passwords.  Imagine we are building a
system which has users and passwords.  We don't want our users' passwords to be
revealed even the system is compromised so we hash them, using a hash scheme
like MD5[^md5note].  There are not that many different hash schemes because developing
them to work well is a difficult mathematical problem.

However, the password
file being stolen still would not be ideal.  Because hash algorithms are
well-known, an attacker could try to hash common weak passwords and see if any
match.  For example, the MD5 hash of "password" is
"5f4dcc3b5aa765d61d8327deb882cf99".  If we get the hashed password file, we can
search for this value and see if anyone was foolish enough to use this as their
password.  If we find such a person, we now know their password to this system,
and could try the same username/password on other sites as well.

This is called a "rainbow table" attack.  With access to hashed passwords, an
attacker could try hashing the most common 10,000 or so passwords pretty
quickly and probably find some matches.

To get around this, we introduce a new element to the password called the
"salt".  The salt[^saltname] is just a randomly generated string that is assigned for
each user when their password is set.  For example, let's say the user's
password is "bananaPIE".  We will generate a random string, like "UzfleHU6tU".
Now, when we hash their password, we _add the salt_ to the end of it.  So
we won't hash "bananaPIE" but rather "bananaPIEUzfleHU6tU".  Then the result of
the hash gets stored in the password file, along with the salt.

Now, when someone logs in, we take the password they enter, find the salt value
assigned to them, hash them both together, and compare that to the hash value
on file.

The benefit of this that the rainbow table attack no longer works.  If a bunch
of users used "password" as their password, they will all have been given
different random salt.  Therefore the hash values on file for them will all be
different.  Now getting access to the passwords file is even less helpful
to an attacker.




12.6 Comprehension Questions
----------------------------


1. What does the `eval` function do and why can this be dangerous?
2. What is a buffer overflow?  Why are they not a big issue in Python?
3. Why is the Caesar cipher not sufficient for encrypting information you want
   to remain secure?
4. What's the difference between symmetric and asymmetric key encryption?
5. Why is it important that a password always give the same hash value?
6. What is the purpose of salt in hashing?

12.7 Programming Exercises
--------------------------


1. Modify the calculator example in Section 12.2 to check that only numbers,
   parentheses, and math operators are in the string before supplying them to
   eval.

2. Extend the Caesar cipher functions given in Section 12.3 to handle all types
   of characters instead of just lower-case letters.

3. Write a program to crack the Caesar cipher program.  For this, you will need
   to try all possible keys and see if the resulting text "looks like" English.
   This last part is a little tricky, but can be done with a dictionary file.
   You can find lists of all English words online and read them into a list.  If
   a certain percentage of words in the decrypted text are in the list of all
   words, you can conclude you found the key.

4. There's an extension to the Caesar cipher called the Vigenère cipher.  Here
   the key is more than just one number: it's a list of numbers.  For example instead of using 8 as the rotation amount
   for every letter, we could use [8, 17, 3] as our key.  That means the first
   character of the message is shifted by 8, the second by 17, and the third by 3.
   At that point it wraps around back to 8.  Implement encryption and decryption
   for the Vigenère cipher.

::: {.blackbox}
::: {.blackbox-title}
**Chapter Summary**
:::

::: {.blackbox-contents}
-   Security vulnerabilities are often caused by programming mistakes that
    attackers take advantage of.  An example of this in Python is the use of the
    `eval` function which can allow users to execute arbitrary code in a
    program.
-   In the C programming language, the lack of checking on list indices means
    that users can potentially overwrite other variables, which is called a
    buffer overflow attack.
-   The Caesar cipher is a simple encryption method which can be implemented
    in Python, but which is not secure due to the small set of keys and the
    possibility of doing frequency analysis on it.
-   Symmetric key encryption schemes have one key for doing both encryption and
    decryption.  There are strong ones, such as AES, but have the issue that
    exchanging keys securely is tricky.
-   Asymmetric key cryptography has separate keys for encryption and decryption.
    This solves the key exchange problem, since we can freely share the public
    key.
-   Passwords on a system should be stored as hashed values so that nobody can
    read your password even if they get access to the file they are stored in.
-   The hashed passwords should also be salted (having a random number appended
    to them) to prevent attackers seeing common hashed password values in the
    password file.

:::
:::

Footnotes {#footnote-label12 .visually-hidden}
---------

[^hashname]: The reason they are called hashes is kind of fun.  The way a hash
    is computed is by breaking the input into parts and scrambling them around.
    For example in a password we might map each character to a number and then
    put them into some complex math formula.  This chopping and mixing of
    ingredients is reminiscent of a breakfast hash.
    
[^saltname]: Just like hash browns are better with salt, so too are hashed
    passwords better with salt.

[^md5note]: The MD5 hash algorithm is easy to use and fast, but there are
    actually better ones to use in practice which generate even longer hashed
    values.

