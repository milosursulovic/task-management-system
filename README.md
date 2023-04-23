## Uputstvo

Nakon podesavanja env fajlova i povezivanja na bazu, da bi se osposobi administratorski nalog na servisu, potrebno je prvo
uraditi migracije

```php artisan migrate```

a zatim uraditi seed CustomUsersTableSeeder klase

```php artisan db:seed --class=CustomUsersTableSeeder```

Zatim se administartorskim nalogom moze ulogovati na http://localhost/login sa kredencijalima:

- User: admin@example.com
- Pass: password

Ostali deo posla, kao sto je dodavanje tj. registrovanje novih korisnika i dodavanje taskova je manuelan posao, ne postoji seed
sa nekim primernim podacima.