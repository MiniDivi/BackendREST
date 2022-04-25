# BackendREST

Progetto backend che fornisce delle api alle quali il frontend può fare delle richieste HTTP.

## Installazione

Per far funzionare il progetto sarà necessario [docker](https://docs.docker.com/get-docker/).

* Avviare il web server con docker.
```bash
docker run -d -p 8080:80 --name my-apache-php-app -v percorso_assoluto_cartella:/var/www/html zener79/php:7.4-apache
```
* Avviare il mysql-server con un volume per la persistenza dei dati del DBMS e un altro volume per accedere al file contenuto nella cartella dump.
```bash
docker run --name my-mysql-server -v percorso_assoluto_cartella/mysqldata:/var/lib/mysql -v percorso_assoluto_cartella/dump:/dump -e MYSQL_ROOT_PASSWORD=my-secret-pw -p 3306:3306 -d mysql:latest
```
* Ottenere la bash per importare il dump.
```bash
docker exec -it my-mysql-server bash
```
* Importare il dump.
```bash
mysql -u root -p < /dump/create_employee.sql; exit;
```

## API Reference

#### Mostra una lista di impiegati.

```http
  GET /employees?page=${page}&size=${size}
```

| Parametro | Tipo     | Descrizione                |
| :-------- | :------- | :------------------------- |
| `page` | `int` |numero della pagina da mostrare |
| `size` | `int` |numero dell'impiegato da mostrare |


#### Mostra le informazioni di un singolo impiegato.

```http
  GET /employees?id=${id}
```

| Parametro | Tipo     | Descrizione                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `int` | **Richiesto**. Id del dipendente da mostrare |

#### Rimuovere un impiegato dalla lista.

```http
  DELETE /employees?id=${id}
```

| Parametro | Tipo     | Descrizione                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `int` | **Richiesto**. Id del dipendente da rimuovere |

#### Aggiungi un impiegato alla lista
```http
  POST /
```
E' richiesto un payload con i dati del dipendente da aggiungere.

#### Modifica le informazioni di un impiegato 
```http
  PUT /employees/${id}
```
| Parametro | Tipo     | Descrizione                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `int` | **Richiesto**. Id del dipendente da modificare |

E' richiesto un payload con i dati del dipendente da modificare.
