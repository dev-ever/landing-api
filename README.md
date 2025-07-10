
# 📦 Sistema de Administración de Contactos mediantes uso de API en Landing Page / TI Services

Este es un sistema de consulta de registros de contactos desde el sitio del landing page, en la sección de contacto se procesa la api de insercción de datos a la base de datos, dando seguimiento en Panel de administración para su visualización y eliminación.

## 🚀 Tecnologías Utilizadas

- ✅ PHP 8+ (API)
- ✅ MySQL
- ✅ jQuery / JAvaScript
- ✅ AJAX + JSON
- ✅ HTML5 / CSS3
- ✅ Bootstrap 5
- ✅ Librerias JS - Sweetalert2, AOS, Google Fonts

## 🎯 Funcionalidades Principales

BACKEND - Acceso al panel de adminstración
- Autenticación de usuarios (login/logout)
- Gestión de contactos desde la landing page (TI Services)
- Gestión de gestión de plantilla ADMINISTRATION PANEL
- Registro y visualización de contactos (MENU Catalog / Contacts Web)
- Ejecución de Eliminación de contacto (Botón Eliminación)
- Ejecución de descarga en formato Excel, PDF de los contactos (Botoneras de descarga)

BACKEND API - ENDPOINT
- Conexion a la base de datos (db.php)
- EndPoint POST de inserción de datos (contacto.php  / urlProyecto/contacto)
- EndPoint GET de listado de datos de contactos (contacto.php  / urlProyecto/contactos) 
- EndPoint DELETE de eliminación de datos (contacto.php  / urlProyecto/contacto/id) 

- Conexión a base de datos MYSQL (Se cambian de acuerdo a su configuración de su servicio)
  - $host = "localhost";
  - $user = "u725112231_contactos";   #tu user de base de datos
  - $pass = "*******";                #tu password
  - $dbname = "u725112231_contactos"; #tu nombre de base de datis


FONTEND - Landing Page
- Interfaz responsiva y amigable
- Comprende seccion de inicio, Nosotros, Servicios, Clientes, Contacto
- Procesamiento de formulario de Contacto mediante API, para el registro de contacto



## 📁 Estructura del Proyecto

```
/contactos
│
│── API/
│   ├──.htaccess           # Configuración
│   ├── bd.php             # Conexión a base datos api
│   ├── contacto.php       # EndPoint POST
│   ├── contactos.php      # EndPoint GET y DELETE
│
│
│── CPANEL/
│	├── index.php
│   ├── controller         # Lógica de negocio y procesamiento de formularios
│   ├── model              # Conexión a la base de datos y configuración general
│   ├── views              # Vistas HTML y componentes Bootstrap
│       ├── css            # Archivos CSS, JS y recursos
│		├── img            # Archivos img y recursos
│		├── js             # Archivos CSS, JS y recursos
│		├── module         # Archivos php y vistas
│		├── plugins        # Archivos recursos CSS y JS
│		├──.template.php   # plantilla base, Encabezados, menús, pie de página
│
│── LANDING PAGE/
│   ├── index.html         # Vista principal del landing page
│   ├── css                # Archivos CSS y recursos
│   ├── js                 # Archivos JS y recursos
│   ├── assets             # Archivos recursos de imagenes
│
│
├── sql/                   # Script de creación de la base de datos
└── README.md              # Descripción de instalación
```

## ⚙️ Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/dev-ever/landing-api.git
cd inventario-php
```

### 2. Configurar la base de datos

- Importa el archivo `sql/basededatos.sql` en tu servidor MySQL (phpMyAdmin o desde terminal).
- Modifica los datos de conexión en `api/db.php`:

```php
$host = "localhost";
$user = "u725112231_userBD";
$pass = "*********";
$dbname = "u725112231_nameBD";
```

- Modifica los datos de conexión en CPanel, en `model/conexion.php`:
```php

 class Conexion{        

	static public function conectar(){
		
    $link = new PDO("mysql:host=localhost;dbname=u725112231_nameBD",
    	            "u725112231_userBD",
    	            "*********",
	                 array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
	                 	   PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

		return $link;
    
	}

}
```


### 3. Ejecutar la aplicación

- Inicia tu servidor local (XAMPP, WAMP o similar).
- Accede al navegador:  
  [http://localhost/contactos](http://localhost/contactos)



## 👤 Usuario de prueba

```
Usuario: admin
Contraseña: admin
```

## 🧪 Demo de uso

- Visualiza los registros insertados
- Elimina los registros mediante Botonera(Eliminar)
- Botonera de descarga en excel y pdf
- Descarga reportes en Excel

## 🛠️ Requisitos

- Servidor local con PHP 7+ y MySQL
- Navegador moderno (Chrome, Firefox)
- Editor de texto o IDE (VSCode, Sublime Text recomendado)

## 📄 Licencia

Este proyecto de codigo abierto y está bajo la licencia MIT. Puedes usarlo, modificarlo y compartirlo libremente.

## 🤝 Autor

**Everardo Mauro Ramírez**  
[GitHub](https://github.com/dev-ever) · [Email](mailto:emr_123@hotmail.com)
