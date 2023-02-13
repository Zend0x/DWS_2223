from flask import Flask,jsonify,request
import math

app = Flask("app")

def generar_respuesta_json(resultado,operacion):

    data = {
        "Operacion" : operacion,
        "Resultado" : str(resultado)
    }
    return jsonify(data)

@app.route('/')
def hello_world():
    return 'Hola mundo'

@app.route("/factorial/<int:x>/")
def factorial(x):
    resultado = factorial_recursive(x)
    return generar_respuesta_json (resultado,"factorial")

def factorial_recursive(x):
    if (x==0):
        return 1;
    else:
        return x*factorial_recursive(x-1)


@app.route("/triangulo/<string:base>/<string:altura>/")
def triangulo(base, altura):

    area = (int(base)*int(altura))/ 2

    return generar_respuesta_json(area,"calcular_area_triangulo")



if __name__ == "__main__":
    app.run()