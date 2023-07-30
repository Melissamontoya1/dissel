Instrucciones para la configuración de la base de datos y el envío de correos electrónicos:

Configuración de la conexión a la base de datos:

Ubica el archivo de conexión a la base de datos "connection.php" en la siguiente ruta: "admin/includes/connection.php".
Abre el archivo "connection.php" con un editor de texto o IDE de tu elección.
Actualiza los datos de configuración de la base de datos, como el nombre de usuario, contraseña, nombre de la base de datos, y el servidor, según corresponda.
Guarda los cambios realizados en el archivo "connection.php".

Configuración del envío de correos electrónicos:

Encuentra el archivo de configuración de correo electrónico "configmail.php" en la ruta "admin/includes/configmail.php".
Abre el archivo "configmail.php" con un editor de texto o IDE.
Asegúrate de proporcionar los datos correctos del servidor de correo saliente (SMTP) y las credenciales de autenticación.
Si es necesario, ajusta otros parámetros de configuración de correo según las necesidades.
Guarda los cambios realizados en el archivo "configmail.php".
Configuración de recuperación de cuenta mediante correo electrónico:

Localiza el archivo "mail.reset.php" en el directorio raíz del proyecto.
Ábrelo con un editor de texto o IDE.
Busca la línea de código que contiene el enlace para restablecer la contraseña:
<a href="http://localhost/Dissel/verificar.php?email='.$email.'&token='.$token.'"> para restablecer da clic aquí </a>
Actualiza la URL dentro del atributo "href" con la dirección del sitio web que se utilizará para el restablecimiento de contraseñas.
Guarda los cambios realizados en el archivo "mail.reset.php".
Recuerda guardar todos los archivos después de realizar las modificaciones. Siguiendo estas instrucciones, podrás configurar correctamente la conexión a la base de datos y el envío de correos electrónicos para el proyecto.
