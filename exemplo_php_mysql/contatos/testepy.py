def f(x):
    return 2*x - 1

def g(x):
    return x**2 + 2*x

def fg(x):
    return f(g(x))

def fgIntervaloRecursivo(inicio, fim):
    if inicio > fim:
        return []
    else:
        return [fg(inicio)] + fgIntervaloRecursivo(inicio+1, fim)