DROP DATABASE IF EXISTS `stenfit`;

CREATE DATABASE `stenfit`;

USE `stenfit`;

CREATE TABLE `gebruikers` (
  id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  wachtwoord VARCHAR(100) NOT NULL
);

INSERT INTO `gebruikers` (`username`, `email`, `wachtwoord`) VALUES
('test-user', 'test@gmail.com', '$2a$12$.WqVNncTWscI9MC7UqJKRecx8M9jfMJqvoKBRnZrID2Amw7egVF92');

CREATE TABLE `aantal` (
  id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  dag VARCHAR(100) NOT NULL,
  week INT NOT NULL,
  gebruiker_id MEDIUMINT,
  getrained VARCHAR(100) NOT NULL,
  FOREIGN KEY (gebruiker_id) REFERENCES gebruikers(id)
);

INSERT INTO `aantal` (`dag`, `week`, `gebruiker_id`, `getrained`) VALUES
('maandag', 10, 1, 'armen');

CREATE TABLE `oefeningen` (
  id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  oefening VARCHAR(255) NOT NULL,
  beschrijving TEXT NOT NULL,
  foto VARCHAR(255) NOT NULL,
  filmpje VARCHAR(255) NOT NULL,
  spiergroep VARCHAR(50) NOT NULL
);

INSERT INTO `oefeningen` (`oefening`, `beschrijving`, `foto`, `filmpje`, `spiergroep`) VALUES
('bicep curls', 'Breng één dumbell naar voren en omhoog door (alleen) de onderarm naar voren te brengen. Roteer tijdens de beweging de hand naar buiten zodat de duim naar buiten wijst aan het einde van de beweging. Ga door tot vlak voor het moment dat je bovenin de beweging de spanning op de biceps kwijtraakt.', './fotos/bicepcurls.jpg', 'https://www.youtube.com/watch?v=ykJmrZ5v0Oo', 'armen'),
('hammer curls', 'Ga staan of zitten en neem in elke hand een halter (handpalmen naar elkaar toe). Adem in en buig één arm of beide armen tegelijk. Span op het bovenste punt extra je biceps aan. Adem aan het einde van de beweging uit.', './fotos/hammer.jpg', 'https://www.youtube.com/watch?v=BRVDS6HVR9Q', 'armen'),
('tricep pushdowns', 'Span je buik, en bilspieren aan en adem in en strek de onderarmen. Zorg ervoor dat je ellebogen dicht bij het lichaam blijven en voor de heup. Adem aan het einde van de beweging uit. Laat het gewicht langzaam terugzakken en houd constante spanning op de triceps.', './fotos/tricep.jpg', 'https://www.youtube.com/watch?v=6Fzep104f0s', 'armen'),
('tricep dips', 'Ga zitten op een bank, plaats je handen naast je heupen en zet je voeten op de grond. Adem in en laat je lichaam langzaam naar beneden zakken door je ellebogen te buigen. Span je triceps aan en duw jezelf weer omhoog terwijl je uitademt.', './fotos/dips.jpg', 'https://www.youtube.com/watch?v=TrJVszDm7ik', 'armen'),
('crunches', 'Ga op je rug liggen en houd je handen op je borst. Plaats je voeten op de grond voor je met je knieën op 90 graden. Adem in en til de schouders van de grond en rol rustig omhoog, waarbij je de onderrug op de grond houdt. Laat je hoofd rustig weer terugzakken en adem uit.', './fotos/crunches.jpg', 'https://www.youtube.com/watch?v=DxYpFbYBPR0', 'abs'),
('planks', 'Ga in een plankpositie staan met je handen onder je schouders en je voeten op schouderbreedte. Span je buikspieren en bilspieren aan, houd je lichaam recht. Adem in en houd de positie vast, zorg ervoor dat je rug niet doorzakt. Adem uit en blijf de plank vasthouden voor de gewenste tijd.', './fotos/planks.jpg', 'https://www.youtube.com/watch?v=5iMTmCywI6E', 'abs'),
('squats', 'Squats zijn een krachttrainingsoefening waarbij je in een gehurkte positie zakt en weer opstaat. Ze richten zich vooral op de benen, bilspieren en de core. Bij het uitvoeren van een squat staan je voeten op schouderbreedte, je knieën buigen naar voren terwijl je heupen naar beneden zakken, en je houdt je rug recht. Het is een uitstekende oefening om kracht, stabiliteit en flexibiliteit te verbeteren.', './fotos/squats.jpg', 'https://www.youtube.com/watch?v=oiyZ8CKo4gY', 'benen'),
('leg press', 'Ga zitten op de leg press machine en plaats je voeten schouderbreedte uit elkaar op het platform. Adem in en buig langzaam je knieën om het gewicht naar je toe te brengen, zorg ervoor dat je knieën niet verder dan je tenen komen. Adem uit en duw het platform gecontroleerd weer terug naar de startpositie door je benen te strekken.', './fotos/legpress.jpg', 'https://www.youtube.com/watch?v=9yZ1akkjkJQ', 'benen'),
('push-ups', 'Push-ups zijn een klassieke lichaamsgewichtoefening waarbij je je bovenlichaam omhoog en omlaag beweegt terwijl je handen en voeten op de grond blijven. Ze richten zich vooral op de borst, schouders, triceps en core. Om een push-up uit te voeren, begin je in een plankpositie met je handen iets breder dan schouderbreedte. Buig je armen om je borst naar de grond te laten zakken en duw jezelf daarna weer omhoog naar de startpositie. Het is een geweldige oefening voor het versterken van het bovenlichaam.', './fotos/pushups.jpg', 'https://www.youtube.com/watch?v=w28KD0SNlts', 'borst'),
('bench press', 'Ga liggen op een bank met je voeten plat op de grond. Pak de stang vast met je handen iets breder dan schouderbreedte. Adem in en laat de stang langzaam naar je borst zakken, houd je ellebogen op een hoek van ongeveer 45 graden. Adem uit en duw de stang gecontroleerd weer omhoog totdat je armen gestrekt zijn.', './fotos/benchpress.jpg', 'https://www.youtube.com/watch?v=l2MGC_9-HNw', 'borst'),
('deadlifts', 'Bij het uitvoeren van een deadlift begin je met de voeten op schouderbreedte, de stang voor je voeten, en de knieën licht gebogen. Buig je heupen en knieën om de stang vast te pakken, houd je rug recht en je borst omhoog. Vervolgens til je de stang omhoog door je heupen en knieën te strekken, totdat je rechtop staat. Daarna breng je de stang gecontroleerd weer naar de grond.', './fotos/deadlift.jpg', 'https://www.youtube.com/watch?v=53gT9IowO4M', 'rug'),
('lat pulldown', 'Zit op de lat pulldown machine en pak de stang vast met beide handen, iets breder dan schouderbreedte. Houd je rug recht en trek je schouders naar beneden. Adem in en trek de stang langzaam naar je borst, terwijl je je ellebogen naar beneden en naar achteren brengt. Adem uit en laat de stang gecontroleerd weer omhoog komen naar de startpositie.', './fotos/latpulldown.jpg', 'https://www.youtube.com/watch?v=QeuPg5que1o', 'rug'),
('Shoulder press', 'Om een schouderpress uit te voeren, begin je met de halters in beide handen op schouderhoogte, met je handen iets breder dan schouderbreedte. Je voeten staan op schouderbreedte. Zet je core vast en duw de halters gecontroleerd omhoog boven je hoofd totdat je armen volledig gestrekt zijn. Laat de gewichten daarna langzaam en gecontroleerd terug naar de startpositie zakken.', './fotos/shoulderpress.jpg', 'https://www.youtube.com/watch?v=uyh_FpHnKTY', 'schouders'),
('lateral raise', 'Sta rechtop met een lichte buiging in je knieën, houd in beide handen een dumbbell met je handpalmen naar binnen. Adem in en til de dumbbells zijwaarts omhoog tot schouderhoogte, terwijl je je armen gestrekt houdt. Adem uit en laat de dumbbells langzaam weer zakken naar de startpositie.', './fotos/lateralraise.jpg', 'https://www.youtube.com/watch?v=m9-P0jubTFs', 'schouders');
