temp = float(input("What temperature is it out? "))

if temp < 10:
    print("It's super cold, maybe stay home?")
elif temp < 30:
    print("Wear a snowsuit")
elif temp < 60:
    print("Wear a coat.")
elif temp < 80:
    print("You should wear pants.")
elif temp < 95:
    print("You should wear shorts.")
else:
    print("It's super hot, maybe stay home?")

