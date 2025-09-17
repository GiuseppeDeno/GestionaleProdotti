# Gestionale-GD

Un sistema completo di gestione inventario sviluppato con Laravel 12, che permette la gestione completa di prodotti con sistema di autenticazione integrato.

##  Descrizione del Progetto

**Gestionale-GD** è un'applicazione web moderna per la gestione dell'inventario aziendale. Offre un'interfaccia intuitiva per la creazione, modifica, visualizzazione e cancellazione dei prodotti, con un sistema di autenticazione sicuro per proteggere i dati.

##  Funzionalità Principali

###  Sistema di Autenticazione
- **Registrazione utenti** con validazione email
- **Login/Logout** sicuro con sessioni
- **Reset password** tramite email
- **Protezione delle rotte** con middleware
- **Verifica email** (opzionale)

###  Gestione Prodotti (CRUD Completo)
- **Creazione prodotti** con nome, descrizione, prezzo e stock
- **Visualizzazione lista** paginata con filtri visivi
- **Dettaglio singolo prodotto** con informazioni complete  
- **Modifica prodotti** esistenti
- **Eliminazione prodotti** con conferma
- **Validazione dati** completa lato server

###  Interfaccia Utente
- **Design responsive** per desktop e mobile
- **Interfaccia moderna** con componenti stilizzati
- **Feedback utente** con messaggi di successo/errore
- **Indicatori visivi** per stock basso/alto
- **Dashboard informativa** con statistiche

## Stack Tecnologico

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade Templates
- **CSS Framework**: Bootstrap 5 / Tailwind CSS (configurabile)
- **Database**: MySQL
- **Autenticazione**: Laravel Breeze / Laravel Fortify (configurabile)
- **Build Tool**: Vite
- **Packaging**: Composer, NPM

##  Prerequisiti

- PHP 8.2 o superiore
- Composer
- Node.js e NPM
- MySQL
- Laravel Artisan serve

##  Installazione

### 1. Clona il Repository
```bash
git clone https://github.com/tuousername/gestionale-gd.git
cd gestionale-gd
```

### 2. Installa le Dipendenze PHP
```bash
composer install
```

### 3. Configurazione Environment
```bash
# Copia il file di configurazione
cp .env.example .env

# Genera la chiave dell'applicazione
php artisan key:generate
```

### 4. Configurazione Database
Modifica il file `.env` con le tue credenziali database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestionale_gd
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Crea il Database
Crea il database `gestionale_gd` nel tuo MySQL.

### 6. Esegui le Migrazioni
```bash
php artisan migrate
```

### 7. Installa le Dipendenze Frontend
```bash
npm install
```

### 8. Compila gli Asset
```bash
# Per sviluppo
npm run dev

# Per produzione  
npm run build
```

### 9. Avvia il Server
```bash
php artisan serve
```

L'applicazione sarà disponibile su `http://localhost:8000`

## Struttura del Progetto

```
gestionale-gd/
├── app/
│   ├── Http/Controllers/
│   │   └── ProductController.php     # Controller CRUD prodotti
│   ├── Models/
│   │   ├── User.php                  # Model utente
│   │   └── Product.php               # Model prodotto
│   └── Providers/
│       └── FortifyServiceProvider.php # Configurazione Fortify (se usato)
├── database/
│   └── migrations/
│       └── xxxx_create_products_table.php # Migrazione tabella prodotti
├── resources/
│   ├── views/
│   │   ├── auth/                     # Viste autenticazione
│   │   ├── layouts/                  # Layout base
│   │   ├── products/                 # Viste prodotti
│   │   │   ├── index.blade.php       # Lista prodotti
│   │   │   ├── create.blade.php      # Creazione prodotto
│   │   │   ├── edit.blade.php        # Modifica prodotto
│   │   │   └── show.blade.php        # Dettaglio prodotto
│   │   └── dashboard.blade.php       # Dashboard principale
│   ├── css/
│   │   └── app.css                   # Stili CSS
│   └── js/
│       └── app.js                    # JavaScript
├── routes/
│   └── web.php                       # Definizione rotte
├── .env.example                      # Template configurazione
└── README.md                         # Questo file
```

##  Utilizzo dell'Applicazione

### Primo Accesso
1. **Registra un nuovo utente** su `/register`
2. **Verifica l'email** (se abilitato)
3. **Accedi alla dashboard** su `/dashboard`

### Gestione Prodotti
1. **Lista Prodotti**: Vai su "Prodotti" nel menu per vedere tutti i prodotti
2. **Nuovo Prodotto**: Clicca su "Nuovo Prodotto" e compila il form
3. **Modifica**: Usa il pulsante "Modifica" nella lista o nel dettaglio
4. **Visualizza**: Clicca su "Visualizza" per vedere tutti i dettagli
5. **Elimina**: Usa il pulsante "Elimina" (con conferma di sicurezza)

### Validazione Dati
Il sistema valida automaticamente:
- **Nome prodotto**: obbligatorio, max 255 caratteri
- **Prezzo**: obbligatorio, numero positivo con 2 decimali
- **Stock**: obbligatorio, numero intero positivo
- **Descrizione**: opzionale, testo libero

## 🔧 Configurazioni Avanzate

### Opzioni di Autenticazione

Il progetto supporta due sistemi di autenticazione:



#### Laravel Fortify (Per sviluppatori esperti)
- Controllo totale sul frontend
- Backend di autenticazione senza viste
- Perfetto per progetti personalizzati

### Opzioni CSS Framework

#### Bootstrap 5
```bash
npm install bootstrap 
```



### Performance e Caching
```bash
# Cache delle configurazioni
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Per development, pulisci le cache
php artisan config:clear
php artisan route:clear  
php artisan view:clear
```

##  Testing

### Funzionalità da Testare
1. **Registrazione e Login** degli utenti
2. **Creazione prodotti** con dati validi e non validi
3. **Modifica prodotti** esistenti
4. **Eliminazione prodotti** con conferma
5. **Paginazione** con molti prodotti
6. **Protezione rotte** senza autenticazione

### Test Automatici (Opzionale)
```bash
# Esegui i test
php artisan test

# Test con copertura
php artisan test --coverage
```

##  Database Schema

### Tabella Users
```sql
- id (bigint, primary key)
- name (varchar)
- email (varchar, unique)
- email_verified_at (timestamp, nullable)
- password (varchar)
- remember_token (varchar, nullable)
- created_at, updated_at (timestamps)
```

### Tabella Products
```sql
- id (bigint, primary key)  
- name (varchar, 255)
- description (text, nullable)
- price (decimal, 10,2)
- stock (integer, default 0)
- created_at, updated_at (timestamps)
```

##  Sicurezza

### Implementazioni di Sicurezza
- **CSRF Protection**: Tutti i form protetti da token CSRF
- **Validazione Input**: Sanitizzazione di tutti gli input utente
- **Middleware Auth**: Tutte le rotte prodotti protette da autenticazione
- **Password Hashing**: Password utenti crittografate con bcrypt
- **Rate Limiting**: Limitazione tentativi di login

### Best Practices Applicate
- Validazione lato server per tutti i dati
- Uso di Eloquent ORM per prevenire SQL injection
- Gestione corretta delle sessioni
- Headers di sicurezza configurati

## 🚀 Deploy in Produzione

### Checklist Pre-Deploy
- [ ] Configurare `.env` di produzione
- [ ] Impostare `APP_ENV=production`
- [ ] Configurare database di produzione
- [ ] Eseguire `composer install --no-dev --optimize-autoloader`
- [ ] Eseguire `npm run build`
- [ ] Configurare SSL/HTTPS
- [ ] Impostare backup automatici database

### Comandi Deploy
```bash
# Ottimizzazioni produzione
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --no-dev --optimize-autoloader

# Asset produzione
npm run build
```

##  Troubleshooting

### Errori Comuni

**"Class 'App\Models\Product' not found"**
```bash
composer dump-autoload
```

**"SQLSTATE[42000]: Syntax error or access denied"**
- Verifica credenziali database nel file `.env`
- Controlla che il database esista
- Verifica permessi utente database

**"The POST method is not supported"**  
- Verifica presenza `@csrf` nei form
- Controlla metodo HTTP corretto (`@method('PUT')` per update)

**Asset CSS/JS non caricano**
```bash
npm install
npm run dev
```

### Log e Debug
```bash
# Visualizza log in tempo reale
tail -f storage/logs/laravel.log

# Lista tutte le rotte
php artisan route:list

# Stato migrazioni
php artisan migrate:status
```

##  Versioning

Questo progetto utilizza [Semantic Versioning](https://semver.org/):
- **MAJOR**: Cambiamenti non compatibili
- **MINOR**: Nuove funzionalità compatibili  
- **PATCH**: Bug fix compatibili

### Changelog
- **v1.0.0** - Release iniziale con CRUD prodotti e autenticazione




##  Autore

**Giuseppe Denora**
- GitHub: [@GiuseppeDeno](https://github.com/GiuseppeDeno)
- Email: giuseppedeno@gmail.com



## 📚 Documentazione Aggiuntiva

### Link Utili
- [Documentazione Laravel](https://laravel.com/docs)
- [Laravel Fortify](https://laravel.com/docs/fortify)
- [Bootstrap Documentation](https://getbootstrap.com/docs/)


### Espansioni Future
- [ ] Sistema categorie prodotti
- [ ] Caricamento immagini prodotti
- [ ] Export Excel/PDF
- [ ] API REST
- [ ] Sistema notifiche stock basso
- [ ] Multi-utente con ruoli
- [ ] Dashboard analytics avanzata
- [ ] Sistema ordini/vendite

---

**Gestionale-GD** - Sistema di Gestione Inventario Moderno e Sicuro
