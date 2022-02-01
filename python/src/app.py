'''
pwd == /home/satanon/ctf/python/src

flag at /home/satanon/ctf/python/flag.txt
'''


from flask import Flask, send_file, request
import os

app = Flask(__name__)

@app.route('/')
def main():
    return send_file("app.py")

@app.route('/getfile')
def getfile():
    try:
        f = request.args.get('f')
        if len(f) >= 19:
            return "No hacking"
        black = [["..", "."], ["flag", ""], ["txt", ""]]
        for b in black:
            f = f.replace(b[0], b[1])
        path = os.path.join("./", f)
        print(f)
        return send_file(path)
    except:
        return "500 - Error"

if __name__ == '__main__':
    app.run(host = "0.0.0.0", port = 8085)