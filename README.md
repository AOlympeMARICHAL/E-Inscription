[![codecov](https://cdn.prod.website-files.com/5e0f1144930a8bc8aace526c/65dd9eb5aaca434fac4f1c31_Coverage-83%2525-yellow.svg)]()

![E-Inscription](https://media-hosting.imagekit.io//22a2b80c8c8e47cf/image%20(2).png?Expires=1836916609&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=dIooaW6GajeSfJA437fSLZMbvGONJqK1qRT5Bs1JUHHI5tgxzFsrNAr6xBm7tlMzDBWzLXskSmtYBwCEnHAuqQeyAy4pmU9eUvZe7xqFHM81H~Gw-jjXmpADOB2uFWmSgSE4upqZ5TBsY8dkA2C0l5Kc9a7J0coQUUzltsEG7EklgNz2uR8d0l0XNzWdol4mMiDFzTTry9QwOEeAs0OziYwYVP3e~lzBS1XlF0oy~y7DK0JJnUJKj-pAm6mKvm4BoOoue2iLkJc~l9gwHLHkWIWKREDTLjnaYUXfkqvRNnURxs9-NmUl8t6X5eqqDFBKTd7kT59A2LOX5nAo3PLFlw__)

---

## 📌 Les prérequis

Pour l’installation des applications ainsi que de la base de données, il est nécessaire d’avoir ces éléments.  
Merci de **lire la documentation** avant d’installer les composants.

- **Debian12**
- **Symfony CLI**
- **PHP** (Dernière version)
- **MariaDB** (Dernière version)
- **DSRF** : [Lien vers la release](https://github.com/GouvernementFR/dsfr/releases/tag/v1.13.0)
- **Node.js**

--- 

## ⚙️ Installation des composants

### Mise à jour des paquets  
```bash
sudo apt update && sudo apt upgrade -y

```
<h2> 🗄 Installation Mariadb</h2>

`Installez MariaDB :` 
```bash
sudo apt install mariadb-server -y
```

<h4>Vérifiez l'état de MariaDB :</h4>

```bash
sudo systemctl status mariadb
```

<h4>Démarrez et activez MariaDB au démarrage : </h4>

  ```bash
sudo systemctl start mariadb 
  ```
```bash

sudo systemctl enable mariadb   
  ```
<h4> Sécurisez l'installation de MariaDB : </h4>

  ```bash
sudo mysql_secure_installation 
  ```

<h5>Définissez un mot de passe pour l'utilisateur root.</h5> 

<h5> Désactivez les connexions root distantes. </h5>

<h5> Configurez l'adresse de liaison (bind address) : </h5>

```bash
sudo nano /etc/mysql/mariadb.conf.d/50-server.cnf
  ```
`Modifiez ou ajoutez la ligne suivante :
```bash
 bind_address = 0.0.0.0 
  ```

<h5>Redémarrez MariaDB : </h5>
  
  ```bash
sudo systemctl restart mariadb 
  ```

 <h5>`Créez un utilisateur et accordez des privilèges : Connectez-vous à MariaDB :` </h5> 

```bash
sudo mysql -u root -p 
  ```

 <h5>`Créez un utilisateur : </h5> 

```bash
CREATE USER 'nouvel_utilisateur'@'%' IDENTIFIED BY 'mot_de_passe'; 
  ```

 <h5>`Accordez tous les privilèges :` </h5>
 
 ```bash
GRANT ALL PRIVILEGES ON *.* TO 'nouvel_utilisateur'@'%' WITH GRANT OPTION; 
 ``` 

 <h5>`Quittez MariaDB : </h5>

```bash
EXIT;
```
### Installation PHP et APACHE2

<h5>Installation de apache2 , php , composer uwf</h5>

```bash
sudo apt update 
sudo apt install apache2 
sudo apt install php libapache2-mod-php php-mysql php-xml php-curl php-zip php-mbstring  
sudo apt install composer
sudo apt install curl
```

```bash
curl -sS https://get.symfony.com/cli/installer | bash 
```

```bash
sudo mv ~/.symfony*/bin/symfony /usr/local/bin/symfony 
```
 
```bash
sudo apachectl -v 
```

```bash
sudo systemctl start apache2 
```
```bash
sudo ufw reload 
```
```bash
sudo systemctl status apache2 
```
```bash
sudo systemctl start apache2 
```
```bash
sudo system restart apache2 
```
Activation des extentions php
```bash
sudo nano /etc/php/8.2/apache2/php.ini
```
Dans Dynamic Extention activez les extentions suivante : <br>
`extention=curl`<br>
`extention=ftp`<br>
`extention=fileinfo`<br>
`extention=intl`<br>
`extention=mysqli`<br>
`extention=openssl`<br>
`extention=pdo_mysql`<br>
Transférer du projet dans la VM à l'aide d'un SFTP
puis 

```bash
cd /endroit/du/projet
sudo mv projet/ /var/www
```
<h4>Installation du projet avec composer</h4>

```bash
cd /var/www/projectname
composer install
```
Faite Y à chaque message

```bash
composer update
composer require symfony/apache-pack
```
Faite Y à chaque message

(Pensez à modifier l'ip et les infos de connextion dans le .env et de le mettre APP_ENV = prod )
<h4>Activation dans Apache2</h4>

Allez dans 
```bash
sudo nano /etc/apache2/sites-available/
```
Votre fichier devrait être similaire à celui-ci : 

```bash
<VirtualHost *:80>
    ServerAdmin 172.16.119.8
    DocumentRoot /var/www/E-Inscription/public

    <Directory /var/www/E-Inscription/public>
        AllowOverride All
        Require all granted
        FallbackResource /index.php
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```
Modifier/crée le .htaccess

```bash
cd /var/www/E-Inscription/public
mkdir .htaccess
sudo nano .htaccess
```

Ajouter ceci dans le .htaccess
```bash
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Définir le répertoire racine
    RewriteBase /

    # Rediriger tout sauf les fichiers et dossiers existants vers index.php
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php [QSA,L]
</IfModule>


# Désactiver l'indexation des dossiers
Options -Indexes

# Optimisation pour Symfony (si applicable)
<IfModule mod_headers.c>
    Header set X-Frame-Options "SAMEORIGIN"
    Header set X-XSS-Protection "1; mode=block"
    Header set X-Content-Type-Options "nosniff"
</IfModule>
```
```
