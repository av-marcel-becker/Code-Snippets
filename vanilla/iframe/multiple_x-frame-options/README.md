## Wofür brauch ich das? (German)

Deine Domain ist: `https://example.de` und möchtest ein iFrame einbinden: `<iframe src="https://example.com"></iframe>` (example.com gehört dir)

example.com hat allerdings eine "x-frame-option" setting mit dem Wert "sameorigin". Da du nicht example.com bist (du bist ja example.de) 
siehst du an der Stelle eine weiße Seite. Man kann leider nur eine Adresse hinzufügen, mit "ALLOW-FROM" aber das kann mitunter nicht ausreichen
z. B. wegen "www.example.de", "example.de", das wären schon 2 benötigte Einträge, sowie auch http und https.

## Was macht das Script?
Das Script ist in dem Fall für "example.com". Es ruft die Domain ab von wo es aufgerufen wurde mit `$_SERVER['HTTP_REFERER']`. Beim ersten laden 
ist dies in dem Fall "example.de" und wird auch als Ref. übergeben. Klickt man im iFrame ist der Ref. in dem Fall allerdings "example.com" 
somit Prüft das Script im erst Aufruf den Ref. mit der whitelist und fügt diese einer Session hinzu, somit ist "x-frame-options" 
richtig gesetzt. Dasselbe passiert auch wenn man die Subdomain oder Protokoll wechselt z. B. "https://test.example.de" 
oder "http://example.de".
