# get the first number
number = int(input("What's the first number? "))
total = number

# keep going until they enter 0
while number != 0:
    print("Running total is", total)
    number = int(input("Next: "))
    total = total + number

# print the final result
print("The total is", total)

