mail admin@example.com
password

🎯 Obiettivi

Un **CRM** (Customer Relationship Management) è uno strumento aziendale per la gestione dei rapporti con i clienti potenziali ed esistenti.

L’obiettivo di questo esercizio è costruire un mini CRM utilizzando **Laravel** per gestire aziende e i rispettivi dipendenti.

**Admin**
Sarà presente un unico utente amministratore che potrà eseguire login alla dashboard tramite le proprie credenziali. Non è prevista registrazione. L’admin potrà visualizzare, creare, modificare o eliminare le schede di aziende e impiegati direttamente dal pannello di amministrazione.

**1️⃣ Milestone 1**
Realizza un nuovo progetto Laravel. Completa lo scaffolding e la procedura di inizializzazione di un nuovo progetto.

**2️⃣ Milestone 2**
Realizza le migration per le risorse. Non dimenticare: un dipendente sarà necessariamente associato ad una azienda.

****I campi minimi dell’entità **Azienda** sono:

- Nome
- Logo
- Partita IVA

I campi minimi dell’entità **Impiegato** sono:

- Nome
- Cognome
- Azienda di appartenenza
- Telefono
- Email

**3️⃣ Milestone 3**
Realizza i modelli e poi i seeder per le risorse. 
**I dati** potranno essere generati con **Faker**. 

**3️⃣ Milestone 4**

Sviluppa l’interfaccia della dashboard. Puoi utilizzare un framework css come Bootstrap per velocizzare lo sviluppo.

🚀 **Bonus 1: Validazione dei dati**

Aggiungi la validazione dei dati nei **form di creazione e modifica** per aziende e dipendenti:

- Nome e Cognome devono contenere solo caratteri alfabetici
- La Partita IVA deve essere lunga 11 caratteri e composta solo da numeri
- L’indirizzo email deve essere valido
- Il file per il logo deve essere un’immagine (ad esempio, .png, .jpg)

📊 **Bonus 2: Statistiche Dashboard**

Aggiungi una sezione con **statistiche** generali:

- Numero totale di aziende
- Numero totale di dipendenti
- Azienda con più dipendenti

