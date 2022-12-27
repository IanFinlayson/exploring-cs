# read in the starting cost and tip amount
cost = float(input("How much was the bill? "))
percentage = int(input("How much do you want to tip? "))

# figure out the cost with the tip added in
total = cost * (1 + percentage/100)

# print the result
print("The amount with tip is", total)

