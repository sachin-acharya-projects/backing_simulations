import time
import sys

for i in range(101):
    LINE_UP = '\033[1A'
    LINE_CLEAR = '\x1b[2K'
    print(f"Progressing {i}")
    print("Hello World")
    print(LINE_UP, end=LINE_CLEAR)
    print(LINE_UP, end=LINE_CLEAR)
    time.sleep(0.1)