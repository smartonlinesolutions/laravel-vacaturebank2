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