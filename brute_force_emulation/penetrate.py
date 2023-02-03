import requests, hashlib, random, os
from colorama import Fore, init; init(autoreset=True)
import time
SIZE = os.get_terminal_size()
TITLE = "WELCOME TO BRUTEFORCE v1.0"
WIDTH = (SIZE.columns / 2) - len(TITLE) / 2
def main():
    print("\n")
    print(f"{Fore.LIGHTBLUE_EX}{' ':<{WIDTH}}{TITLE}\n\n")
    print(f"{Fore.LIGHTCYAN_EX}What is the target url?")
    url = input()
    start = time.time()
    while True:
        end = int(requests.get(url + "/end").json()['end'])
        random_val = random.randint(0, end)
        print(f"{Fore.LIGHTGREEN_EX}{random_val}", end=f"")
        password_hash = hashlib.md5(str(random_val).encode()).hexdigest()
        data: requests.Response = requests.get(url + f"/{password_hash}")
        if data.json()['state']:
            ending = time.time()
            print(f"\n{Fore.LIGHTBLUE_EX}Password Retrived Successfully\n{Fore.LIGHTCYAN_EX}PASSWORD {random_val}\nEND {end}\nTime Taken {ending - start} seconds")
            break
        print(f"{Fore.LIGHTGREEN_EX}-", end="")
while True:
    main()
    if input("Done? ").lower() in ['yes', 'y']: break
