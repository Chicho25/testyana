Prueba tecnica YANA
=============

Los endpoint los pueden consultar con postman con las siguientes instrucciones 
subi a un servidor, ingrese a la direccion https://shlgruas.com/ci/ tendra estas 
mismas instrucciones en un formato html mas legible.

A continuacion los Endpoint solicitados

    Endpoint que cree una cuenta nueva de un usuario .

    Desde PostMan enviar los siguientes parametros:
    link: https://shlgruas.com/ci/Users_controller/create
    Parametros por <span>POST<span>
    email, password, rep_password, username, full_name, stat, type_user

    Endpoint que reciba las credenciales de un usuario y que valide.
    Desde PostMan enviar los siguientes parametros:
    link: https://shlgruas.com/ci/Users_controller/login
    Parametros por <span>POST<span>
    email, password

    Endpoint, este endpoint devuelve el historial de la conversación.
    Desde PostMan enviar los siguientes parametros:
    link: https://shlgruas.com/ci/Users_controller/get_conversations
    Parametros por <span>JSON<span>, enviar por uid -> 1 o 2
    {
            "uid": 1
    }

    