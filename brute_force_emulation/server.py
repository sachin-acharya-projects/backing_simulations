from flask import Flask, jsonify
import random, hashlib
app = Flask(__name__)

END = 500
CODE = random.randint(0, END)
PASSWORD = hashlib.md5(str(CODE).encode())
@app.route("/")
def index():
    return jsonify({
        "ID": PASSWORD.hexdigest(),
        "CODE": CODE,
        "END": END
    })
@app.route("/end")
def end():
    global END
    return jsonify({
        "end": END
    })
@app.route("/<password>")
def main(password):
    global PASSWORD, END, CODE
    if password == PASSWORD.hexdigest():
        END += 500
        CODE = random.randint(0, END)
        PASSWORD = hashlib.md5(str(CODE).encode())
        return jsonify({
            "message": "success",
            "state": 1
        })
    else:
        return jsonify({
            "message": "failed",
            "state": 0
        })
        
if __name__ == '__main__':
    app.run()