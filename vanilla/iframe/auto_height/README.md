## Wie Funktioniert das? (German)
Es wird auf der Zielseite eine Nachricht abgesetzt mit der Höhe der Seite. 
Im iFrame wird die Nachricht aufgefangen und als höhenwert übernommen.

z. B. Du bist example.com und möchtest example.de in einem iFrame einbinden, somit fügst du `iframe_target_script.js` bei example.de hinzu und bei example.com `iframe_script.js`. Jetzt noch bei example.com das iFrame einbinden und fertig: `<iframe src="https://example.de" onload="resize_Iframe(this);"></iframe>`
