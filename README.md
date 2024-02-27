DAY 4
Esercizio di oggi: Laravel Boolfolio - Project Typology
nome repo: [laravel-one-to-many]
Ciao ragazzi,
continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo.
Vi consiglio di far diventare momentaneamente su git la repo laravel_auth come template, ne create una nuova chiamata come indicato sopra a partire dalla repo template appena creata quindi clonatevi laravel_one_to_many in locale. A questo punto fate ridiventare laravel-auth una repo normale. Orao ricordatevi di eseguire i comandi composer install, npm install, copiatevi il file .env.example per creare un nuovo file .env ed inseritegli i parametri di connessione al database (il database rimane lo stesso, non cambia). Eseguite anche il comando php artisan key:generate.

Nel nuovo esercizio aggiungiamo una nuova entità Type. Questa entità rappresenta la tipologia di progetto ed è in relazione one to many con i progetti.
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:
- create il model Type con la migration, seeder, store ed update request e resource controller ( -rcmsR )
- creare la migration di modifica per la tabella projects per aggiungere la chiave esterna
- aggiungere ai model Type e Project i metodi per definire la relazione one to many
- visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
- permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto
- gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione
Bonus 1:
aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.
