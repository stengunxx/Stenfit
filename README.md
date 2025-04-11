# StenFit - Sporten en Trainingen Volgen

## Overzicht

StenFit is een webapplicatie die gebruikers in staat stelt om hun trainingen bij te houden, voortgang te volgen en oefeningen te bekijken. De website biedt ook de mogelijkheid voor bezoekers om trainingsschema's te bekijken en hun prestaties op te slaan. Het systeem maakt gebruik van een database en verschillende PHP-bestanden om de functionaliteit te ondersteunen.

## Functionaliteiten

- **Oefeningen Bekijken**: Gebruikers kunnen verschillende oefeningen zien die ze kunnen toevoegen aan hun trainingssessies.
- **Trainingsschema’s Bekijken**: Bezoekers kunnen trainingsschema’s bekijken en een overzicht krijgen van verschillende sportactiviteiten.
- **Voortgang Bijhouden**: Gebruikers kunnen hun voortgang per training volgen.
- **Gebruikersbeheer**: Gebruikers kunnen hun account aanmaken, inloggen en hun persoonlijke gegevens beheren.
- **Database**: Alle gegevens, zoals gebruikersinformatie, oefeningen en voortgang, worden opgeslagen in een database.
  
## Technologieën

- **PHP**: Voor server-side scripting en het afhandelen van gebruikersinvoer en database-interacties.
- **MySQL**: Voor het opslaan van gebruikersdata, oefeningen, trainingen en voortgang.
- **HTML/CSS**: Voor de frontend van de website.
  
## Installatie

Volg onderstaande stappen om het project lokaal op te zetten:

1. **Clone het project** naar je lokale machine:
    ```bash
    git clone https://github.com/stengunxx/Stenfit.git
    ```

2. **Installeer een lokale server** (zoals XAMPP of MAMP) om PHP en MySQL te draaien.

3. **Maak een nieuwe database** in MySQL importeer het bestand `import.sql`

4. **Configureer de databaseverbinding**:
    - Open het bestand `db.php` en vul je databasegegevens in:
      ```php
      $host = 'localhost';
      $dbname = 'stenfit';
      $username = 'root'; // Vul jouw persoonlijke gegevens in
       $password = ''; // Vul jouw persoonlijke gegevens in
      ```

5. **Start de server** en open de website via `http://localhost/Backend-Eindproject/Almost-there-5820506ed00c-fb3c0fd5446c/` in je webbrowser.

## Bestanden en Mappen

- `index.php`: De startpagina van de website.
- `login.php`: Het inlogformulier voor gebruikers, het wachtwoord voor de test gebruiker is w@chtw00rd en de email is test@gmail.com.
- `register.php`: Het registratieformulier voor nieuwe gebruikers.
- `training.php`: Toont de soorten spieren die je kan trainen.
- `oefeningen.php`: Toont de soorten oefening voor de spiergroep
- `oefening.php`: Toont oefening en hun beschrijvingen en een filmpje.
- `voortgang.php`: Pagina voor het bijhouden van de voortgang van de gebruiker.
- `geschiedenis.php`: Pagina om te bekijken welke dag en welke week je hebt gesport en wat je hebt getrained.
- `import.sql`: Bevat de code om de database te maken en te importeren voor XAMPP.
- `db.php`: Om connectie te maken met de database.
- `styles.css`: Stijlbestanden voor de login en register pagina.
- `style.css`: Stijlbestanden voor de website.
- `fotos/`: Alle foto's voor de website.# Stenfit
