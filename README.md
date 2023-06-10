# Book Store
<h3> 
Un gestor de libros en el que se pueden satisfacer las necesidades de aquellas personas que quieran comprar libros por internet. Pero no solo puedes comprarlos, también puedes prestárselos a otros usuarios, definir el estado de los mismos, valorarlos y dejar tu opinión.
</h3>
<br><br>

<h3>
Tutorial de uso de la aplicación:
</h3>

Las funciones de esta web se dividen en dos tipos de usuarios: usuario estándar y usuario administrador.
-	Como usuario estándar podrás ver los libros disponibles, comprarlos, dejar tu opinión y valoración sobre ellos, prestarlos a otros usuarios que también quieran leerlos, marcarlos como leídos y ver los libros que tienes en tu biblioteca. También podrás realizar búsquedas para encontrar un libro más rápido, y ver la información de tu perfil en el que puedes cambiar datos.

-	Como usuario administrador podrás añadir nuevos libros, editar libros ya existentes y eliminar libros de tu biblioteca. Lo mismo para administrar usuarios

<h3>
Manual de administrador
</h3>

Lo primero que veremos en la web será el login, en el que debemos introducir el email del usuario con el que queremos iniciar sesión (en este caso el del administrador), y su contraseña correspondiente.
<br>
<br>
<img width="auto" height="400px" src="/imagenes/loginadmin.png" />
<br>
<br>
Una vez hayamos iniciado sesión, nos dirige a la página principal en la que nos aparecerá la colección de libros al completo. En esta pantalla, podremos buscar un libro ya sea por título, autor o género, como también podremos añadir un libro a nuestra colección pulsando en el botón Añadir Libro.
<br>
<br>
<img width="auto" height="400px" src="/imagenes/inicioadmin.png" />
<br>
<br>
<img width="auto" height="400px" src="/imagenes/botonañadir.png" />
<br>
<br>
Una vez hagamos clic en este botón, nos aparece una pantalla con un formulario para rellenar los datos del libro que queremos añadir. Y si le damos al botón de Volver, no se guardará ningún cambio y volveremos a la colección de libros.
<br>
<br>
<img width="auto" height="400px" src="/imagenes/añadirlibro.png" />
<br>
<br>
Rellenamos el formulario y ya podemos añadir nuestro nuevo libro, esto nos redirige de nuevo a la colección de libros.
Para visualizar un libro con toda su información tenemos que hacer clic en él.
<br>
<br>
<img width="auto" height="400px" src="/imagenes/verlibroadmin.png" />
<br>
<br>
Si le damos al botón Editar, nos aparece una pantalla con un formulario para editar los datos del libro.
<br>
<br>
<img width="auto" height="400px" src="/imagenes/editarlibro.png" />
<br>
<br>
Cuando le damos al botón de actualizar, estos datos que hayamos cambiado se actualizan en la base de datos. Y si le damos al botón de Volver, no se guardará ningún cambio y volveremos a la visualización del libro.
Si hacemos clic en el botón Eliminar, borramos toda su información de la base datos.
Ahora vamos a la parte de usuarios, que nos aparece en la barra de navegación.
<br>
<br>
<img width="auto" height="400px" src="/imagenes/usuarios.png" />
<br>
<br>
En esta pantalla podremos:
-	Eliminar un usuario por completo de la base de datos pulsando en la papelera.
-	Editar un usuario, pulsando en el lápiz.
<br>
<img width="auto" height="400px" src="/imagenes/editarusuario.png" />
<br>
Cuando le damos al botón de actualizar, estos datos que hayamos cambiado se actualizan en la base de datos. Y si le damos al botón de Volver, no se guardará ningún cambio y volveremos a la visualización de los usuarios.

-	Añadir un nuevo usuario, pulsando en el botón Añadir usuario.
Una vez hagamos clic en este botón, nos aparece una pantalla con un formulario para rellenar los datos del usuario que queremos añadir. Y si le damos al botón de Volver, no se guardará ningún cambio y volveremos a la visualización de los usuarios.
<br>
<img width="auto" height="400px" src="/imagenes/añadirusuario.png" />
En el perfil del usuario nos aparece esta pantalla:
<br>
<br>
<img width="auto" height="400px" src="/imagenes/perfiladmin.png" />
<br>
En esta pantalla podemos actualizar la información del usuario, como el nombre, el email o la contraseña.
<h3>
Manual de usuario
</h3>
Lo primero que veremos en la web será el login, en el que debemos introducir el email del usuario con el que queremos iniciar sesión y su contraseña correspondiente.
<br>
<br>
<img width="auto" height="400px" src="/imagenes/loginusuario.png" />
Una vez hayamos iniciado sesión, nos dirige a la página principal en la que nos aparecerá la colección de libros al completo. En esta pantalla, podremos buscar un libro ya sea por título, autor o género.
<br>
<br>
<img width="auto" height="400px" src="/imagenes/iniciousuario.png" />
Para visualizar un libro con toda su información tenemos que hacer clic en él.
<br>
<br>
<img width="auto" height="400px" src="/imagenes/verlibrousuario.png" />
Si este libro no lo tenemos comprado, podemos hacerlo pulsando en el botón de Comprar.
Una vez comprado, nos aparecerán:
<br>
<br>
<img width="auto" height="400px" src="/imagenes/comprado.png" />
-	El estado del mismo (si está leído o en proceso de lectura).<br>
-	Un campo de texto donde podremos añadir un comentario.<br>
-	Unas estrellas para valorar el libro.<br>
-	La posibilidad de prestar el libro a un usuario que no lo tenga. En este caso solo me sale el usuario Pedro, si se lo presto, a Pedro le aparecerá que este libro se lo ha prestado Raúl.
<br>
<br>
<img width="auto" height="400px" src="/imagenes/prestado.png" />
Aun así, si a un usuario le prestan un libro, este sigue teniendo la posibilidad de comprar el libro, devolviéndoselo a la persona que se lo ha prestado.
<br>
<br>
<img width="auto" height="400px" src="/imagenes/comprado2.png" />
Como se puede observar, no nos sale la opción de prestar el libro a ningún usuario, esto quiere decir que todos los demás usuarios registrados, ya tienen comprado este libro.
Ahora vamos a la parte de Mis Libros, que nos aparece en la barra de navegación.
<br>
<br>
En esta pantalla podemos visualizar los libros que tenga comprados este usuario. En el perfil del usuario nos aparece esta pantalla:
<br>
<br>
<img width="auto" height="400px" src="/imagenes/perfilusuario.png" />
En esta pantalla podemos actualizar la información del usuario, como el nombre, el email o la contraseña.
