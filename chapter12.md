# Computer Security

## Overview

Computers enable us to do many wonderful things such as to solve tricky
problems automatically, simulate the natural world, share information
and work together, and even play games.

Unfortunately, some use computers to try to break into systems, spy on
people or steal information. Here we will talk about some issues of
computer security.

------------------------------------------------------------------------

## Software Flaws

Most security vulnerabilities are the result of bugs in programs.
Languages like Python try to catch your mistakes and tell you about
them. Other languages, like C, do not always catch bugs.

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
the boundaries of a list will *change other variables* of the program.

For me, this program prints out 100, and not 42:

``` c
#include <stdio.h>

int main() {
    int nums[] = {0, 1, 2, 3, 4};
    int answer = 42;

    nums[-1] = 100;
    printf("%d\n", answer);
    return 0;
}
```

That\'s because \"answer\" happens to be stored before the list in the
computer\'s memory. When we go off the left end of the list with -1, we
overwrite the other variable.

These are called \"buffer\" overflow attacks. An attacker can try to put
in data that goes past the bounds of a list in order to put data they
want into other variables in the program.

Programmers have to be really careful in these languages to not let this
sort of thing ever happen! Unfortunately most systems software is
written in C, so these things can happen.

------------------------------------------------------------------------

## Cryptography

Cryptography is the changing of some message to make it unreadable to
anyone who doesn\'t know how to interpret it. It consists of two parts:

-   **Encryption**

    Changing \"plain text\" which is easily readable into \"cipher
    text\" which looks like gibberish.

-   **Decryption**

    Changing the cipher text back into plain text.

Cryptography has been practiced in some form for thousands of years. In
the past, it has been used for communication among individuals, and
especially for communication during war. Now, almost all cryptography is
done between computers. When sensitive information is sent across the
Internet, it is first encrypted.

As a very simple example, we could use a \"rotation cipher\" which is
also called a Caesar cipher because Julius Caesar used it to communicate
with his generals.

The basic algorithm for a rotation cipher is given below:

1.  Set our cipher text to \"\"
2.  For each letter in the message:
    1.  Add rotation amount to the letter.
    2.  If the letter is now greater than \'Z\', subtract 26 to loop
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

How could this encryption be broken?

------------------------------------------------------------------------

## Modern Cryptography

The simple Caesar cipher is not good enough for real secret
communications. One issue with it is how easy it would be to find the
key. Another issue is how do we tell our partner the key?

One way would be to communicate the key ahead of time. This is what
Caesar\'s generals did, and was also done in World War 2 with the German
Enigma machine. Those decrypting the secret messages had a book of keys
and had a system of knowing when to use each key.

However this is sort of a hassle. If you want to do online banking, you
don\'t want to meet with your bank and decide upon a secret key to use
ahead of time. Also, having a key makes the system less secure.

Instead, modern cryptography is mostly based on *asymmetric* keys.
Symmetric cryptography (like the Caesar cipher) uses the same key for
encryption and decryption. Asymmetric cryptography uses different keys
to do the encryption and the decryption.

In this system there is a *public key* and a *private key*. The public
key can be known by anybody, but the private key should be kept safe.

When we want to encrypt something, we use the public key. When doing
this, the public key *can\'t* decrypt it, only the private key can. We
then send the encrypted message to the recipient who can use their
private key to decrypt it.

This solves the problem of sharing keys. We can give anyone our public
key so they can encrypt messages for us. Then only we can read them with
our private key.

------------------------------------------------------------------------

## How Passwords Work

Many programs require you to login with a username and password. These
programs have to create your password when you make an account, and then
check that it is correct when you login.

When making an account, the program could store your username and
password in a file. Then when you login, it could simply compare the
password you give with what it has stored.

However, this is actually a very bad practice. The reason is that, if
the server is compromised, an attacker could read all user's passwords.
Because many people reuse passwords, an attacker could use these to
access other services.

Instead, passwords should be stored as *hashed* values. A hash is a way
way of scrambling a string into a new string. It is sort of related to
encryption, except there is no key. Once the password is hashed, you get
a new scrambled string. There is no way to go from the scrambled string
back to the original one.

Python has a built-in way to do hashing:

``` python
import hashlib

pw = input("Password: ")

h = hashlib.md5()
h.update(pw.encode())
hash = h.h.hexdigest()
print("Hashed password is", hash)
```

When a user registers for an account, we should hash the password they
give us, and then store the hashed value. Then when they login, we hash
the password they give us and compare the hashes.

A program should never store passwords directly!

------------------------------------------------------------------------

## Social Engineering

A well-designed password system is extremely secure against any attempts
to steal passwords. Most of the times when passwords are compromised
come from either poorly designed systems (those with vulnerabilities),
or by *social engineering* attacks.

Here an attacker will not try to break into a system technologically,
but will instead try to manipulate a person into revealing their
password or other secure information.

The most common social engineering attack is *phishing* where an
attacker will send an email impersonating somebody else (such as your
school or bank) and ask for personal information or passwords.
