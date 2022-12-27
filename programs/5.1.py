age = int(input("What is your age? "))

if age < 5:
    print("That is too young!  Try again.")
    age = int(input("What is your age? "))

if age > 125:
    print("That is too old!  Try again.")
    age = int(input("What is your age? "))

print("Your age is", age)

