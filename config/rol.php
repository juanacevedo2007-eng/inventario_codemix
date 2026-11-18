<?php

return[
    'administrador' => [
        'productos.ver',
        'productos.crear',
        'productos.eliminar',
        'productos.editar',
    ],

    'bodega' => [
        'productos.editar',
    ],

    'cajero' => [
        'productos.eliminar',
    ],
];
// aqui vamos a crear que permisos va a tener cada uno de los roles y, luego se hace con la funcion 
// debe conuncidir con el viewer,no hace referencia el nombre despues del productos 