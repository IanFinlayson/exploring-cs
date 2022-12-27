# program that checks for bad data over and over
age = int(input("How old are you? "))

while age < 0:
    print("Hey, your age can't be negative!")
    age = int(input("How old are you for real? "))

print("You are", age, "years old.")

