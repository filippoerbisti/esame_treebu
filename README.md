# Esame Filippo Erbisti
Esame 14/01/2022
Filippo Erbisti

# Startup Treebu
** Progetto: Banca della Terra **

# Installazione 
1. Clonare la repository
```
git clone https://github.com/filippoerbisti/esame_treebu.git
```

# Installazione Client
1. Entrare nella cartella `/client` e installare tutte le dipendenze:
```
npm install
```

2. Serve
```
npn run serve
```

# Collegamento DB

Nella cartella `/server` cercare il file `.env.example`
Creare file `.env` uguale al file `.env.example`, e modificare il nome del database **DB_DATABASE = nome_db**

# Installazione Server

1. Entrare nella cartella `/server` e installare tutte le dipendenze:
```
composer update
```

2. Migrazioni (creazione delle tabelle e struttura del database):
```
php artisan migrate
```

3. Serve
```
php artisan serve
```

# Route Client
const routes = [
  {
    path: '/',
    name: 'list_lands',
    component: ListLands
  },
  {
    path: '/create',
    name: 'create_land',
    component: CreateLand
  },
  {
    path: '/edit/:id',
    name: 'edit_land',
    component: CreateLand
  },
  {
    path: '/view/:id',
    name: 'view_land',
    component: ViewLand
  },
  {
    path: '',
    redirect: '/',
  }
];

# Route Api
Route::get("/lands", [LandController::class, "list"]);

Route::get("/lands/{id}", [LandController::class, "view"]);

Route::post("/lands", [LandController::class, "create"]);

Route::put("/lands/{id}", [LandController::class, "edit"]);

Route::delete("/lands/{id}", [LandController::class, "destroy"]);

# Tabelle create
1. lands
  -> 'municipality': text,
  -> 'img': text,
  -> 'dimension': float,
  -> 'cadastral_sheet': text,
  -> 'cadastral_map': text,
  -> 'cadastral_parcel': text,
  -> 'land_type': text,
  -> 'irrigation_type': text,
  -> 'offer_type': text,
  -> 'offer_fee': float,
  -> 'availability': bolean,
  -> 'created_at': timestamp,
  -> 'update_at': timestamp
 

Please respect all rights.© Filippo Erbisti.
