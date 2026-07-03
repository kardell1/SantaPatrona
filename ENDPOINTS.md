## Documentacion del **_API_**

### Version 1.0

#### Base URL :

http:localhost:3000/api/v1

#### Autenticacion

Jasonweb Token

#### Formato de respuesta

JSON

#### Convencion de respuestas internas

1. Data : Puede ser de tipo objeto u array, dependiendo de lo que la ruta necesite devolver
1. Error : Es de tipo array, donde se mapean todos los errores recopilados hasta ese momento de ejecucion

```json

{
    data : mixed | null,
    message : string,
    error : mixed | null,
    success : bool,
}

```

#### Rutas Internas

##### Autenticacion

Endpoint

```
POST /login
```

Body

```json

{
    username : string,
    password : string
}

```

Respuesta exitosa (Usa la convencion y devuelve la informacion dentro de data)

```json
{
    token : string
    username : string,
    first_name : string,
    position : string,
}
```

Respuesta errada (Usa la convencion y devuelve el error dentro del campo error)

```
{

}
```
