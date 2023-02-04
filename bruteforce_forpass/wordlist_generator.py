import random
import string

def generate_password(filename: str = None, wordlen: int = 8, password_count: int = 200):
    filename = 'wordlist.txt' if not filename else filename
    wordlen = 8 if not wordlen else wordlen
    password_count = 200 if not password_count else password_count
    characters = string.ascii_letters + string.digits + string.punctuation
    with open(filename, 'w') as file:
        for _ in range(password_count):
            password = ''.join(random.choice(characters) for _ in range(wordlen))
            file.write(password + '\n')

if __name__ == '__main__':
    print("Wordlist Generator (Note: This way of generating is not ideal for most cases)")
    while True:
        filename = input("Filename (wordlist.txt) ")
        wordlen = input("Length of individual words (8) ")
        pass_count = input("Total number of passwords (200) ")
        generate_password(filename if filename != '' else None, int(wordlen) if wordlen != '' and wordlen.isdigit() else None, int(pass_count) if pass_count != '' and wordlen.isdigit() else None)
        print("Generated Successfully")
        
        if input("Done? ").lower() in ['y', 'yes']:
            break