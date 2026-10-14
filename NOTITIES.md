ANTWOORDEN LESDAG 2
Vraag: Waarom staat bedrijf_id in de tabel vacatures en niet andersom?
Antwoord: Omdat een vacature uniek is en een bedrijf niet. Je koppelt een vacature aan een bedrijf, waarbij meerdere vacatures aan hetzelfde bedrijf gekoppeld kunnen worden. Als je het andersom zou doen en in de tabel bedrijf een vacature_id zou opnemen, dan kun je aan één bedrijf slechts één vacature toekennen.

Vraag opdracht 3.3: Vergelijk de JSON van voor en na. Zet beide versies onder elkaar in NOTITIES.md.
Antwoord: 
Eerste versie, met alle informatie:
{"id":1,"titel":"Metaalfrezer","omschrijving":"Et fugiat sint ex voluptate iste soluta. Inventore accusamus quidem vero non magnam nihil ut.","salaris":7217,"fulltime":0,"created_at":"2026-09-21T12:24:28.000000Z","updated_at":"2026-09-21T12:24:28.000000Z","bedrijf_id":1,"user_id":null,"bedrijf":{"id":1,"naam":"Tabakzaak van der Wal","plaats":"Beutenaken","website":null,"created_at":"2026-09-21T12:24:28.000000Z","updated_at":"2026-09-21T12:24:28.000000Z"},"tags":[{"id":3,"naam":"medior","created_at":"2026-09-21T12:24:28.000000Z","updated_at":"2026-09-21T12:24:28.000000Z","pivot":{"vacature_id":1,"tag_id":3}},{"id":5,"naam":"fulltime","created_at":"2026-09-21T12:24:28.000000Z","updated_at":"2026-09-21T12:24:28.000000Z","pivot":{"vacature_id":1,"tag_id":5}},{"id":6,"naam":"parttime","created_at":"2026-09-21T12:24:28.000000Z","updated_at":"2026-09-21T12:24:28.000000Z","pivot":{"vacature_id":1,"tag_id":6}}],"user":null}

Tweede versie, met gebruik van de Resource:
{"data":{"id":1,"titel":"Metaalfrezer","plaats":null,"salaris":7217,"fulltime":0,"bedrijf":"Tabakzaak van der Wal"}}


ANTWOORDEN LESDAG 1

Vraag: Waarom staat .env niet in Git, terwijl .env.example er wel in staat?
Antwoord: Omdat sommige credentials zoals database host en APP_ENV op verschillende omgevingen kunnen afwijken van elkaar. Lokaal heb ik local als APP_ENV en op productie wil ik production als APP_ENV. Als ik mijn .env toevoeg in Git dan wordt dit uitgecheckt op iedere omgeving waar ik de applicatie gebruik.

Vraag: Waarom staat de map vendor in .gitignore, terwijl je project zonder die map niet draait?
Antwoord: omdat deze map gegenereerd wordt bij het draaien van de applicatie op de server. Deze hoeft dus niet mee gecommit te worden.

Opdracht: Voeg bij een van je vacatures een veld omschrijving toe met de waarde uit het kader hieronder: 
'omschrijving' => '<strong>Let op</strong><script>alert("xss")</script>',
Toon dat veld op de detailpagina met accolades. Bekijk de pagina.
Toon het daarna met de uitroeptekens-variant. Bekijk de pagina opnieuw.
Noteer het verschil in NOTITIES.md, in je eigen woorden.
Antwoord: Er verschijnt een popup met de alert melding. Omdat ik de uitroeptekens-variant gebruik, wordt de script tag er niet uit gefilterd. Bij de standaard accolades versie wel en verschijnt er een lege string. 

Vraag: Waarom gebruik je de teruggave van validate() om je model te vullen, en niet $request->all()?
Antwoord: Omdat je vanuit validate() enkel terugkrijgt wat je zelf via fillable() hebt gedefinieerd wat opgeslagen en verwerkt mag worden. De functie $request->all() geeft alles terug wat in de input is meegegeven, ook zaken die je niet nodig hebt.